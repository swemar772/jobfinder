<?php

namespace App\Http\Controllers;

use App\Models\PermissionRole;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $PermissionUser = PermissionRole::getPermission('Users', Auth::user()->role_id);
        if(empty($PermissionUser))
        {
            return redirect()->back();
        }
        $data['PermissionCreate'] = PermissionRole::getPermission('Users Create', Auth::user()->role_id);
        $data['PermissionShow'] = PermissionRole::getPermission('Users Show', role_id: Auth::user()->role_id);
        $data['PermissionEdit'] = PermissionRole::getPermission('Users Edit', Auth::user()->role_id);
        $data['PermissionDelete'] = PermissionRole::getPermission('Users Delete', Auth::user()->role_id);

        $data['users'] = User::where('role_id', '!=', 5)->get();
        return view('findjob_admin.users.index', $data);
    }
    public function create()
    {
        $PermissionUser = PermissionRole::getPermission('Users Create', Auth::user()->role_id);
        if(empty($PermissionUser))
        {
            return redirect()->back();
        }
        $data['roles'] = Role::all();
        return view('findjob_admin.users.create', $data);
    }

    public function store(Request $request)
    {
        $PermissionUser = PermissionRole::getPermission('Users Create', Auth::user()->role_id);
        if(empty($PermissionUser))
        {
            return redirect()->back();
        }
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ],[
            'name.required' => 'Full Name is required.',
            'email.required' => 'Email is required.',
            'password.required' => 'Password is required'
        ]);

        if($validator->passes())
        {

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role_id = $request->role_id;
            $user->status = $request->status;
            $user->save();

            return redirect()->route('users.index')->with('success', 'User Created Successfully.');

        }
        else
        {
            return back()->withInput()->withErrors($validator);
        }
    }

    public function edit($id)
    {
        $PermissionUser = PermissionRole::getPermission('Users Edit', role_id: Auth::user()->role_id);
        if(empty($PermissionUser))
        {
            return redirect()->back();
        }
        $data['roles'] = Role::all();
        $data['user'] = User::findOrFail($id);
        return view('findjob_admin.users.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $PermissionUser = PermissionRole::getPermission('Users Edit', Auth::user()->role_id);
        if(empty($PermissionUser))
        {
            return redirect()->back();
        }
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            // 'password' => 'required|confirmed',
        ],[
            'name.required' => 'Full Name is required.',
            'email.required' => 'Email is required.',
            // 'password.required' => 'Password is required'
        ]);

        if($validator->passes())
        {

            $user = User::findOrFail($id);
            $user->name = $request->name;
            $user->email = $request->email;
            // $user->password = Hash::make($request->password);
            $user->role_id = $request->role_id;
            $user->status = $request->status;
            $user->save();

            return redirect()->route('users.index')->with('success', 'User Updated Successfully.');

        }
        else
        {
            return back()->withInput()->withErrors($validator);
        }
    }

    public function changepassword(Request $request, $id)
    {
        $PermissionUser = PermissionRole::getPermission('Users Edit', role_id: Auth::user()->role_id);
        if(empty($PermissionUser))
        {
            return redirect()->back();
        }
        $validator = Validator::make($request->all(),[

            'password' => 'required|confirmed',

        ],[

            'password.required' => 'Password is required'
        ]);

        if($validator->passes())
        {

            $user = User::findOrFail($id);
            $user->password = Hash::make($request->password);
            $user->save();

            return redirect()->route('users.index')->with('success', 'Change Password Successfully.');

        }
        else
        {
            return back()->withInput()->withErrors($validator);
        }
    }

    public function delete($id)
    {
        $PermissionUser = PermissionRole::getPermission('Users Delete', Auth::user()->role_id);
        if(empty($PermissionUser))
        {
            return redirect()->back();
        }
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success' , 'User Deleted Successfully.');
    }
}
