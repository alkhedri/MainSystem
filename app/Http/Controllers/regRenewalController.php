<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;

class regRenewalController extends Controller
{
   
    
    public function search_renewal(Request $request)
    {

        $students = student::where($request->searchBy , 'LIKE', '%'. $request->badge. '%')->paginate(5);
        return view('Admins.ExaminationDepartment.views.Students.RegRenewal' , compact('students'));
    }


    public function show_inter(Request $request)
    {

        $students = student::where('enrollment_status_id' , 3)->paginate(5);
        return view('Admins.ExaminationDepartment.views.Students.RegRenewal' , compact('students'));
    }
    public function show_stopped(Request $request)
    {

        $students = student::where('enrollment_status_id' , 2)->paginate(5);
        return view('Admins.ExaminationDepartment.views.Students.RegRenewal' , compact('students'));
    }


    

    public function action_complete(Request $request)
    {

        student::where('id', $request->id)
        ->update([
            'enrollment_status_id' => 1,    
         ]);

         return back();
    }

    public function action_cancel(Request $request)
    {

        student::where('id', $request->id)
        ->update([
            'enrollment_status_id' => 3,    
         ]);
         return back();
    }

    public function action_stop(Request $request)
    {

        student::where('id', $request->id)
        ->update([
            'enrollment_status_id' => 2,    
         ]);
         return back();
    }

}
