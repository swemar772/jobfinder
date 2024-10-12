<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionRole extends Model
{
    use HasFactory;

    protected $table = "permission_role";

    static public function InsertUpdateRecord($permission_ids, $role_id)
    {
        PermissionRole::where('role_id', '=', $role_id)->delete();
        foreach($permission_ids as $permission_id)
        {
            $role = new PermissionRole();
            $role->permission_id = $permission_id;
            $role->role_id = $role_id;
            $role->save();
        }
    }

    static public function getRolePermission($role_id)
    {
        return PermissionRole::where('role_id', '=', $role_id)->get();
    }

    static public function getPermission($name, $role_id)
    {
        return PermissionRole::select('permission_role.id')
                ->join('permissions','permissions.id', '=', 'permission_role.permission_id')
                ->where('permission_role.role_id', '=', $role_id)
                ->where('permissions.name', '=', $name)
                ->count();
    }
}