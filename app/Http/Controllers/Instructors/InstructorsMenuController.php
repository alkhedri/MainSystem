<?php

namespace App\Http\Controllers\Instructors;

use App\Models\Instructor;
use App\Models\subject;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InstructorsMenuController extends Controller
{
    public function search_instructor(Request $request)
    {
        $user_id = auth()->user()->id;

        $department_id = Instructor::where('id',$user_id)->value('department_id');
       
        $instructors = Instructor::where('arabic_name', 'like', '%' . $request->inst_name . '%')->where('department_id',$department_id)->paginate(5);
        
        return view('instructors.HOD.facultyMembers' , compact('instructors'));
    }


 

    public function profile_instructor(Request $request)
    {
       
        $user_id = auth()->user()->id;

        $department_id = Instructor::where('id',$user_id)->value('department_id');
       

        $profile = Instructor::where('id',  $request->inst_id)->where('department_id',$department_id)->get();
        $subjects =  subject::where('proffesor_id',$request->inst_id)->get();
   
        return view('instructors.HOD.MemberProfile' , compact('profile' , 'subjects'));
    }
}
