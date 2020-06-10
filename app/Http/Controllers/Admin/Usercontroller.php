<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class Usercontroller extends Controller
{
    protected $ACCESS_LEVELS = [
        'settings' => 'Settings',
        'designation' => 'Designation',
        'fiscalyear' => 'Fiscalyear',
        'service' => 'Service',
        'users' => 'Users',
        'branch' => 'Branch',
    ];

    protected $user = null;

    public function __construct(User $_user)
    {
        $this->user = $_user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = $this->user->where('roles', 'staff')->latest()->get();
        return view('admin.users.list', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $access_levels = $this->ACCESS_LEVELS;
        return view('admin.users.create', compact('access_levels'));
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
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed|min:8',
            'address' => 'required',
            'national_id' => 'required',
            'mobile_no' => 'required|numeric',
        ]);
        $formData = $request->except(['password', 'status', 'password_confirmation', 'access_level', 'access']);
        $formData['password'] = bcrypt($request->password);
        $formData['status'] = is_null($request->status) ? 'Inactive' : 'Active';
        $formData['roles'] = 'staff';
        $formData['access_level'] = '';
        if ($request->access) {
            $accesses = $request->access;
            foreach ($accesses as $access) {
                $formData['access_level'] .= ($formData['access_level'] == '' ? '' : ',') . $access;
            }
        }
        $this->user->create($formData);

        return redirect()->route('users.index')->with('message', 'User added successfully!');
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
        $detail = $this->user->findOrFail($id);
        $access_levels = $this->ACCESS_LEVELS;
        $oldAccesses = $detail->access_level ? explode(',', $detail->access_level) : array();
        return view('admin.users.edit', compact('detail', 'access_levels', 'oldAccesses'));
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
        $detail = $this->user->findOrFail($id);

        $sameEmailVal = $detail->email == $request->email ? true : false;
        $message = ['access.required' => "please select atleast one role"];

        $request->validate($this->rules($detail->id, $sameEmailVal), $message);

        $formData = $request->except(['password', 'status', 'password_confirmation', 'access_level', 'access']);

        if ($request->password) {
            $formData['password'] = bcrypt($request->password);
        }

        $formData['status'] = is_null($request->status) ? 'Inactive' : 'Active';
        $formData['access_level'] = '';

        if ($request->access) {
            $accesses = $request->access;
            foreach ($accesses as $access) {
                $formData['access_level'] .= ($formData['access_level'] == '' ? '' : ',') . $access;
            }
        }
        $detail->update($formData);

        return redirect()->route('users.index')->with('message', 'User updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->user->findOrFail($id)->delete();
        return redirect()->back()->with('message', 'User deleted successfully!');
    }

    public function rules($oldId = null, $sameEmailVal = false)
    {

        $rules =  [
            'email' => 'unique:users|email',
        ];
        if ($sameEmailVal) {
            $rules['email'] = 'unique:users,email,' . $oldId;
        }
        return $rules;
    }
}
