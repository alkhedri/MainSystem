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

        $instructors = instructor::where('arabic_name', 'like', '%' . $request->inst_name . '%')->get();
        
        return view('instructors.HOD.facultyMembers' , compact('instructors'));
    }


 

    public function profile_instructor(Request $request)
    {
       

        $profile = instructor::where('id',  $request->inst_id)->get();
        $subjects =  subject::where('proffesor_id',$request->inst_id)->get();
   
        return view('instructors.HOD.MemberProfile' , compact('profile' , 'subjects'));
    }
}
