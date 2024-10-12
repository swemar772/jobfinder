<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\PermissionRole;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function index()
    {
        $PermissionRole = PermissionRole::getPermission('Roles', Auth::user()->role_id);
        if(empty($PermissionRole))
        {
            return redirect()->back();
        }
        $data['PermissionCreate'] = PermissionRole::getPermission('Roles Create', Auth::user()->role_id);
        $data['PermissionShow'] = PermissionRole::getPermission('Roles Show', role_id: Auth::user()->role_id);
        $data['PermissionEdit'] = PermissionRole::getPermission('Roles Edit', Auth::user()->role_id);
        $data['PermissionDelete'] = PermissionRole::getPermission('Roles Delete', Auth::user()->role_id);

        $data['roles'] = Role::get();
        return view('findjob_admin.roles.index', $data);
    }

    public function create()
    {
        $PermissionRole = PermissionRole::getPermission('Roles Create', Auth::user()->role_id);
        if(empty($PermissionRole))
        {
            return redirect()->back();
        }
        $data['getPermissions'] = Permission::getRecord();

        return view('findjob_admin.roles.create', $data);
    }

    public function store(Request $request)
    {
        $PermissionRole = PermissionRole::getPermission('Roles Create', Auth::user()->role_id);
        if(empty($PermissionRole))
        {
            return redirect()->back();
        }
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:roles,name'],
        ],[
            'name.required' => 'Role Name is required.',
            'name.unique' => 'Sorry, this name has already been taken!'
        ]);

        $role = new Role();
        $role->name = $request->name;
        $role->save();

        PermissionRole::InsertUpdateRecord($request->permission_id, $role->id);

        return redirect()->route('roles.index')->with('success' , 'Role Created Successfully.');
    }

    public function edit($id)
    {
        $PermissionRole = PermissionRole::getPermission('Roles Create', Auth::user()->role_id);
        if(empty($PermissionRole))
        {
            return redirect()->back();
        }
        $data['role'] = Role::findOrFail($id);
        $data['getPermissions'] = Permission::getRecord();
        $data['getRolePermission'] = PermissionRole::getRolePermission($id);
        return view('findjob_admin.roles.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $PermissionRole = PermissionRole::getPermission('Roles Create', Auth::user()->role_id);
        if(empty($PermissionRole))
        {
            return redirect()->back();
        }
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:roles,name,'.$id],
        ],[
            'name.required' => 'Role Name is required.',
            'name.unique' => 'Sorry, this name has already been taken!'
        ]);

        $role = Role::findOrFail($id);
        $role->name = $request->name;
        $role->save();

        PermissionRole::InsertUpdateRecord($request->permission_id, $role->id);


        return redirect()->route('roles.index')->with('success' , 'Role Updated Successfully.');
    }

    public function delete($id)
    {
        $PermissionRole = PermissionRole::getPermission('Roles Create', Auth::user()->role_id);
        if(empty($PermissionRole))
        {
            return redirect()->back();
        }
        $role = Role::findOrFail($id);
        $role->delete();
        PermissionRole::where('role_id', '=', $id)->delete();

        return redirect()->route('roles.index')->with('success' , 'Role Deleted Successfully.');
    }
}
