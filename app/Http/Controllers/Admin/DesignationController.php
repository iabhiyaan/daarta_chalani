<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Designation;
use Illuminate\Support\Str;

class DesignationController extends Controller
{
    protected $designation = null;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Designation $_designation)
    {
        $this->designation = $_designation;
    }
    public function index()
    {
        $details = $this->designation->orderBy('created_at', 'DESC')->get();
        return view('admin.designation.list', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.designation.create');
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
            'designation_name' => 'required',
        ]);
        $formData = $request->except(['published']);
        $formData['published'] = is_null($request->published) ? 0 : 1;

        $this->designation->create($formData);
        return redirect()->route('designation.index')->with('message', 'Designation created successfully!');
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
        $detail = $this->designation->findOrFail($id);
        return view('admin.designation.edit', compact('detail'));
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
            'designation_name' => 'required',
        ]);
        $oldRecord = $this->designation->findOrFail($id);
        $formData = $request->except(['published']);

        $formData['published'] = is_null($request->published) ? 0 : 1;
        $oldRecord->update($formData);

        return redirect()->route('designation.index')->with('message', 'Designation updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->designation->findOrFail($id)->delete();

        return redirect()->route('designation.index')->with('message', 'Designation deleted successfully!');
    }
}
