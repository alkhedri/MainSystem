<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Laratrust\Models\Role as RoleModel;

class Role extends RoleModel
{
    public $guarded = [];


    public static function getRoleName($id){

        $role_id =  DB::table('role_user')->where('user_id',$id)->value('role_id');
        $role_name =  Role::where('id',$role_id)->value('display_name');


         return $role_name;
        
    }

    public static function getRoleColor($id){

        $role_id =  DB::table('role_user')->where('user_id',$id)->value('role_id');
        $role_name =  Role::where('id',$role_id)->value('display_name');

         if ( $role_id == 1)
         return 'red';
         elseif ( $role_id == 2)
         return 'green';
         elseif ( $role_id == 3)
         return 'blue';
         elseif ( $role_id == 4)
         return 'black';
         elseif ( $role_id == 5)
         return 'green';
        
        
    }


    
}

 