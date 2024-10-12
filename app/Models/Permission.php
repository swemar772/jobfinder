<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $table = 'permissions';

    protected $fillable = [
        'name',
        'groupby',
        'status'
    ];

    static public function getRecord()
    {
        $permissions = Permission::groupBy('groupby')->orderBy('id','DESC')->get();
        $result = array();
        foreach($permissions as $value)
        {
            $getPermissionGroup = Permission::getPermissionGroup($value->groupby);
            $data = array();
            $data['id'] = $value->id;
            $data['name'] = $value->name;
            $group = array();
            foreach($getPermissionGroup as $valueGroup)
            {
                $dataGroup = array();
                $dataGroup['id'] = $valueGroup->id;
                $dataGroup['name'] = $valueGroup->name;
                $group[] = $dataGroup;
            }
            $data['group'] = $group;
            $result[] = $data;
        }
        return $result;
    }

    static public function getPermissionGroup($groupby)
    {
        return Permission::where('groupby', '=', $groupby)->get();
    }
}
