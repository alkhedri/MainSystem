<?php

namespace App\Models;

use Laratrust\Models\Permission as PermissionModel;
use Illuminate\Support\Facades\DB;
class Permission extends PermissionModel
{
    public $guarded = [];

    public static function getCount($id){

        $count =  DB::table('permission_user')->where('user_id',$id)->get();
        return $count->Count();
       
   }
}
