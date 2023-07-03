<?php

namespace App\Http\Controllers\SystemAdmin;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
class usersController extends Controller
{
    public function indexUsers(){
        $users = User::paginate(5);;
   
        return view('Admins.SystemAdmin.views.Users._allUsers' , compact('users'));
    }

    public function serach_Users(Request $request)
    {
  
        $users = User::where('name', 'like', '%' . $request->name . '%')->paginate(5);
            
   
        return view('Admins.SystemAdmin.views.Users._allUsers' , compact('users'));
    }
    public function indexRolesAndPermissions(Request $request){
        
        $user = User::find($request->id);
        $userName = User::where('id', $request->id)->value('name');
        $userID= User::where('id', $request->id)->value('id');
        $Roles = Role::all();
        $Permissions = Permission::all();


        return view('Admins.SystemAdmin.views.Users._UsersRolesPermissions' , compact( 'user' , 'userID', 'userName' , 'Roles' , 'Permissions'));
    }

    public function ChangeRoleAction(Request $request){
        $Current_role_id =  DB::table('role_user')->where('user_id',$request->user_id)->value('role_id');
        $Current_role_name = Role::where('id' , $Current_role_id)->value('name');

        $user = User::find($request->user_id);
        if (is_null($user)) {}
        else{
            if ($user->hasRole($Current_role_name))
                $user->removeRole($Current_role_name);
                $user->addRole($request->role);
        }
        
        toast('تم تعديل البيانات بنجاح!','success');
        return back();
         
      
    }
}
