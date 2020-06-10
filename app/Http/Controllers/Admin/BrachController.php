<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Branch;

class BrachController extends Controller
{
    protected $branch = null;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Branch $_branch)
    {
        $this->branch = $_branch;
    }
    public function index()
    {
        $details = $this->branch->latest()->get();
        return view('admin.branch.list', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.branch.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);
        $formData = $request->except(['published']);
        $formData['published'] = is_null($request->published) ? 0 : 1;

        $this->branch->create($formData);
        return redirect()->route('branch.index')->with('message', 'Branch created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort('404');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detail = $this->branch->findOrFail($id);
        return view('admin.branch.edit', compact('detail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
        ]);
        $oldRecord = $this->branch->findOrFail($id);
        $formData = $request->except(['published']);

        $formData['published'] = is_null($request->published) ? 0 : 1;
        $oldRecord->update($formData);

        return redirect()->route('branch.index')->with('message', 'Branch updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->branch->findOrFail($id)->delete();

        return redirect()->route('branch.index')->with('message', 'Branch deleted successfully!');
    }
}
