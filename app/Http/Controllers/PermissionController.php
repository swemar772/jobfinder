<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use App\Models\PermissionRole;
use Illuminate\Support\Facades\Auth;

class PermissionController extends Controller
{
    public function index()
    {
        $PermissionPermission = PermissionRole::getPermission('Permissions', Auth::user()->role_id);
        if(empty($PermissionPermission))
        {
            return redirect()->back();
        }
        $data['PermissionCreate'] = PermissionRole::getPermission('Permissions Create', Auth::user()->role_id);
        $data['PermissionShow'] = PermissionRole::getPermission('Permissions Show', role_id: Auth::user()->role_id);
        $data['PermissionEdit'] = PermissionRole::getPermission('Permissions Edit', Auth::user()->role_id);
        $data['PermissionDelete'] = PermissionRole::getPermission('Permissions Delete', Auth::user()->role_id);

        $data['permissions'] = Permission::get();
        return view('findjob_admin.permissions.index', $data);
    }

    public function create()
    {
        $PermissionPermission = PermissionRole::getPermission('Permissions Create', Auth::user()->role_id);
        if(empty($PermissionPermission))
        {
            return redirect()->back();
        }
        return view('findjob_admin.permissions.create');
    }

    public function store(Request $request)
    {
        $PermissionPermission = PermissionRole::getPermission('Permissions Create', Auth::user()->role_id);
        if(empty($PermissionPermission))
        {
            return redirect()->back();
        }
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:permissions,name'],
            'groupby' => ['required'],
        ],[
            'name.required' => 'Permission Name is required.',
            'groupby.required' => 'Groupby is required.',
            'name.unique' => 'Sorry, this name has already been taken!'
        ]);

        Permission::create($request->all());

        return redirect()->route('permissions.index')->with('success' , 'Permission Created Successfully.');
    }

    public function edit($id)
    {
        $PermissionPermission = PermissionRole::getPermission('Permissions Edit', Auth::user()->role_id);
        if(empty($PermissionPermission))
        {
            return redirect()->back();
        }
        $data['permission'] = Permission::findOrFail($id);
        return view('findjob_admin.permissions.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $PermissionPermission = PermissionRole::getPermission('Permissions Edit', role_id: Auth::user()->role_id);
        if(empty($PermissionPermission))
        {
            return redirect()->back();
        }
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:permissions,name,'.$id],
            'groupby' => ['required'],
        ],[
            'name.required' => 'Permission Name is required.',
            'groupby.required' => 'Groupby is required.',
            'name.unique' => 'Sorry, this name has already been taken!'
        ]);

        $permission = Permission::findOrFail($id);
        $permission->name = $request->name;
        $permission->groupby = $request->groupby;
        $permission->status = $request->status;
        $permission->save();

        return redirect()->route('permissions.index')->with('success' , 'Permission Updated Successfully.');
    }

    public function delete($id)
    {
        $PermissionPermission = PermissionRole::getPermission('Permissions Delete', role_id: Auth::user()->role_id);
        if(empty($PermissionPermission))
        {
            return redirect()->back();
        }
        $permission = Permission::findOrFail($id);
        $permission->delete();

        return redirect()->route('permissions.index')->with('success' , 'Permission Deleted Successfully.');
    }


}
