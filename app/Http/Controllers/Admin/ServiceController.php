<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Service;

class ServiceController extends Controller
{
    protected $service = null;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Service $_service)
    {
        $this->service = $_service;
    }
    public function index()
    {
        $details = $this->service->orderBy('created_at', 'DESC')->get();
        return view('admin.service.list', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service.create');
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

        $this->service->create($formData);
        return redirect()->route('service.index')->with('message', 'Service created successfully!');
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
        $detail = $this->service->findOrFail($id);
        return view('admin.service.edit', compact('detail'));
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
        $oldRecord = $this->service->findOrFail($id);
        $formData = $request->except(['published']);

        $formData['published'] = is_null($request->published) ? 0 : 1;
        $oldRecord->update($formData);

        return redirect()->route('service.index')->with('message', 'Service updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->service->findOrFail($id)->delete();

        return redirect()->route('service.index')->with('message', 'Service deleted successfully!');
    }
}
