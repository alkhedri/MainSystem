<?php

namespace App\Http\Controllers;
use App\Models\Department;
use App\Models\Semester;
use App\Models\Instructor;
use App\Models\Auth;
use App\Models\College;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Validator;
class ExaminationController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        return view('Admins.ExaminationDepartment.views.Departments.Menu',  compact( 'departments'));
    }


    public function index_DepartmetsMenu()
    {
        $departments = Department::all();
        return view('Admins.ExaminationDepartment.views.Departments.Menu',  compact( 'departments'));
    }
    public function index_DepartmentsInfo(request $req)
    {
        $departments = Department::all()->where('id' , $req->id);
    
        return view('Admins.ExaminationDepartment.views.Departments.Info' ,  compact( 'departments'));
    }

    public function Update_DepartmentsInfo(Request $request)
    {

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'code' => 'required',
        ]);
      
   
        $imageName = time().'.'.$request->image->extension();  
       
        $request->image->move(public_path('depicon'), $imageName);
    
  


        Department::where('id', $request->id)
        ->update([
            'english_name' => $request->english_name,
           
            'code' => $request->code,
            'icon' => $imageName,
           
            
         ]);

        return back();
    }

    public function New_Departments()
    {
        return view('Admins.ExaminationDepartment.views.Departments.Add');
    }
    public function Add_Departments(Request $request)
    {

        $user_id = auth()->user()->id;
        

        
        $College_id = Instructor::where('id',$user_id)->value('college_id');;


        Department::insert(
            [
             'arabic_name' => $request->arabic_name,
             'english_name' =>$request->english_name,
             'code' => $request->code,
             'college_id' => $College_id
                
             ]
        );

        return \Redirect::route('DepartmentsMenu');
    }

    public function index_DepartmetsDelete()
    {
        $departments = Department::all();
        return view('Admins.ExaminationDepartment.views.Departments.Delete',  compact( 'departments'));
    
    }

    public function delete_departments(Request $request){
        Department::where('id',$request->id)->delete();
        return back()->with('message', 'تم حذف القسم ');
        
    }


    //// Semesters Methods
    public function index_SemestersMenu()
    {
        $Semesters = Semester::all();
        $user_id = auth()->user()->id;
        

        $College_id = Instructor::where('id', $user_id)->pluck('college_id');
        
        $current_semester = College::where('id', $College_id)->pluck('current_semester');
       
        $semester_name = Semester::where('id',$current_semester)->value('name');
        $semester_id = Semester::where('id',$current_semester)->value('id');;
        

        return view('Admins.ExaminationDepartment.views.Semesters.Menu' , compact('Semesters' , 'semester_name' ,'semester_id'));
    }

    public function CurrentSemesterActivate(Request $request)
    {
        $user_id = auth()->user()->id;
        

       
        $College_id = Instructor::where('id',$user_id)->value('college_id');
        College::where('id', $College_id)
        ->update([
            'current_semester' => $request->id
         ]);

        return back();
    }

    public function index_NewSemester()
    {
        return view('Admins.ExaminationDepartment.views.Semesters.NewSemester');
    }


    
    public function index_Override()
    {
        return view('Admins.ExaminationDepartment.views.Semesters.OverrideRequest');
    }

    public function index_FinalResults()
    {
        return view('Admins.ExaminationDepartment.views.Semesters.FinalResults');
    }

    public function index_SemestersPlan()
    {
        return view('Admins.ExaminationDepartment.views.Semesters.SemestersPlan');
    }




    // students
    public function index_StudentsPlacement()
    {
        return view('Admins.ExaminationDepartment.views.Students.StudentsPlacement');
    }
    public function index_StudentsMovement()
    {
        return view('Admins.ExaminationDepartment.views.Students.StudentsMovement');
    }
    public function index_RegRenewal()
    {
        return view('Admins.ExaminationDepartment.views.Students.RegRenewal');
    }
    public function index_StopEnrollment()
    {
        return view('Admins.ExaminationDepartment.views.Students.StopEnrollment');
    }
}
