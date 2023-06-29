<?php

namespace App\Http\Controllers;



use App\Models\Auth;
use App\Models\notification;
use App\Models\department;
use App\Models\student;
use Illuminate\Http\Request;
 
use RealRashid\SweetAlert\Facades\Alert;

class NotificationsController extends Controller
{
    public function action_NotifyStudent(Request $request)
    {



         $request->validate([
          
            'studnet_badge' => 'required',
            'message' =>  'required',
            'title' =>  'required',
          

            
        ]);
  
        
        $user_id = auth()->user()->id;

        $student_id = student::where('badge',$request->studnet_badge)->value('id');



        
        $studnet_name = student::where('badge',$request->studnet_badge)->value('arabic_name');
        $studnet_department_id = student::where('badge',$request->studnet_badge)->value('department_id');
        $studnet_department = department::where('id',$studnet_department_id)->value('arabic_name');
       

        Notification::insert(
            [
             'sender_id' =>  $user_id ,
             'reciver_id' => $student_id,
             'title' => $request->title,
             'message' =>$request->message,
             'read' => 0,
             'date' => date('Y-m-d')
             
          
             ]
        );
        return back()->with([
             'name' => $studnet_name,
             'badge' => $request->studnet_badge,
             'department' => $studnet_department,
             
             
             ]);
    }
}
