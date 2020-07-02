<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DaartaChalani;
use Image;

class DaartaChalaniController extends Controller
{

    protected $daartachalani;

    public function __construct(DaartaChalani $_daartachalani)
    {
        $this->daartachalani = $_daartachalani;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = $this->daartachalani->latest()->get();
        return view('admin.daartachalani.list', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.daartachalani.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->rules($request->type));

        $formData = $request->except(['upload_file', 'published']);

        if ($request->hasFile('upload_file')) {
            $formData['upload_file'] = $this->documentProcessing($request->upload_file, $request->type);
        }

        $formData['published'] = is_null($request->published) ? 0 : 1;

        $this->daartachalani->create($formData);
        return redirect()->route('daartachalani.index')->with('message', $formData->type . 'was created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detail = $this->daartachalani->findOrFail($id);
        return view('admin.daartachalani.edit', compact('detail'));
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
        $oldRecord = $this->daartachalani->findOrFail($id);

        $request->validate($this->rules($request->type));

        $formData = $request->except(['upload_file', 'published']);

        if ($request->hasFile('upload_file')) {
            if ($oldRecord->upload_file) {
                $this->unlinkFile($oldRecord->upload_file);
            }
            $formData['upload_file'] = $this->documentProcessing($request->upload_file, $request->type);
        }

        $formData['published'] = is_null($request->published) ? 0 : 1;

        $oldRecord->update($formData);
        return redirect()->route('daartachalani.index')->with('message', $formData->type . 'was updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detail = $this->daartachalani->findOrFail($id);
        if ($detail->upload_file) {
            $this->unlinkFile($detail->upload_file);
        }
        $detail->delete();
        return redirect()->back()->with('message', 'Document deleted successfully');
    }

    public function unlinkFile($filename)
    {
        $daartaPath = public_path('files/daarta/') . $filename;
        $chalaniPath = public_path('files/chalani/') . $filename;
        if (file_exists($daartaPath))
            unlink($daartaPath);
        if (file_exists($chalaniPath))
            unlink($chalaniPath);
        return;
    }

    public function rules($type)
    {
        $validationRules =  [
            'type' => 'required',
            'subject' => 'required',
            'sender' => 'required',
            'fiscalyear' => 'required',
            'date' => 'required',
            'email' => 'required',
            'mobile_number' => 'required',
            'service_type' => 'required',
            'branch_type' => 'required',
            'branch_type_description' => 'required',
            'description' => 'required',
            'upload_file' => 'required|mimes:pdf|max:10000',
        ];
        if ($type == 'Daarta') {
            array_merge(['daarta_number' => 'required',], $validationRules);
        } else if ($type == 'Chalani') {
            array_merge(['chalani_number' => 'required',], $validationRules);
        }
    }

    public function documentProcessing($documents, $type)
    {
        $daartaPath = public_path('files/daarta');
        $chalaniPath = public_path('files/chalani');

        $filename = Date("D-h-i-s") . '-' . rand() . '-' . '.' . $documents->getClientOriginalExtension();
        if ($type == 'Daarta') {
            $documents->move($daartaPath, $filename);
        } elseif ($type == 'Chalani') {
            $documents->move($chalaniPath, $filename);
        }
        $value['document'] = $filename;

        return $value['document'];
    }

    

}
