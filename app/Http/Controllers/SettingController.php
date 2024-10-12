<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        // $data['Roles'] = Role::get();
        return view('findjob_admin.settings.index');
    }

    public function create()
    {
        return view('findjob_admin.settings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:roles,name'],
        ],[
            'name.required' => 'Role Name is required.',
            'name.unique' => 'Sorry, this name has already been taken!'
        ]);

        // Role::create($request->all());

        return redirect()->route('settings.index')->with('success' , 'Role Created Successfully.');
    }

    public function edit($id)
    {
        // $data['role'] = Role::findOrFail($id);
        return view('findjob_admin.settings.edit');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:Roles,name,'.$id],
        ],[
            'name.required' => 'Role Name is required.',
            'name.unique' => 'Sorry, this name has already been taken!'
        ]);

        // $role = Role::findOrFail($id);
        // $role->name = $request->name;
        // $role->status = $request->status;
        // $role->save();

        return redirect()->route('settings.index')->with('success' , 'Role Updated Successfully.');
    }

    public function delete($id)
    {
        // $role = Role::findOrFail($id);
        // $role->delete();

        return redirect()->route('settings.index')->with('success' , 'Role Deleted Successfully.');
    }
}
