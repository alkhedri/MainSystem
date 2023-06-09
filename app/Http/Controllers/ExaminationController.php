<?php

namespace App\Http\Controllers;
use App\Models\Department;
use App\Models\Semester;
use App\Models\Instructor;
use App\Models\student;

use App\Models\User;
use App\Models\Auth;
use App\Models\College;
use App\Models\semesterplan;
use App\Models\override_request;
use App\Models\placement_request;
use App\Models\Notification;
use App\Models\Room;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Validator;
class ExaminationController extends Controller
{
  

    public function index()
    {

    
        return view('Admins.ExaminationDepartment.views._main');
    }

    public function index_DepartmetsMenu()
    {

        $user_id = auth()->user()->id;
        

        
        $College_id = Instructor::where('id',$user_id)->value('college_id');

        $departments = Department::all()->where('college_id', $College_id);
        return view('Admins.ExaminationDepartment.views.Departments.Menu',  compact( 'departments'));
    }
    public function index_DepartmentsInfo(request $req)
    {
        $departments = Department::all()->where('id' , $req->id);
        $staff = Instructor::where('department_id' , $req->id)->get();


        $hofid = Department::where('id' , $req->id)->value('hod');
        $deCid = Department::where('id' , $req->id)->value('dec');
        $dqCid = Department::where('id' , $req->id)->value('dqc');
        $dpCid = Department::where('id' , $req->id)->value('dpc');



        $hoD = Instructor::where('id' , $hofid)->value('arabic_name');
        
        $deC = Instructor::where('id' , $deCid)->value('arabic_name');
        
        $dqC = Instructor::where('id' , $dqCid)->value('arabic_name');
        $dpC = Instructor::where('id' , $dpCid)->value('arabic_name');
        
        return view('Admins.ExaminationDepartment.views.Departments.Info' ,  compact( 'departments' , 'staff' , 'hoD', 'deC', 'dqC', 'dpC'));
    }

    public function Update_DepartmentsInfo(Request $request)
    {


             
                //   TAKE HOD PERMISSIONS
                $hofid = Department::where('id' , $request->id)->value('hod');
       
                $user = User::find($hofid);
                $user->removePermission('hod-read');



        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'code' => 'required',
            'hodchange' =>  'required'
        ]);
      
      if ($request->image != NULL){
        $imageName = time().'.'.$request->image->extension();  
       
        $request->image->move(public_path('depicon'), $imageName);
        Department::where('id', $request->id)
        ->update([
            'english_name' => $request->english_name,
            'arabic_name' => $request->arabic_name,
           
            'code' => $request->code,
            
            'icon' => $imageName,
            'hod' => $request->hodchange,
            
         ]);
      }else {
        Department::where('id', $request->id)
        ->update([
            'english_name' => $request->english_name,
            'arabic_name' => $request->arabic_name,
           
            'code' => $request->code,
            
            'hod' => $request->hodchange,
            
         ]);
      }
       
    
     //   GIVE HOD PERMISSIONS
         $user = User::find($request->hodchange);
         $user->givePermission('hod-read');
       
 

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
         $user_id = auth()->user()->id;
      

        $College_id = Instructor::where('id', $user_id)->pluck('college_id');
        $Semesters = Semester::where('college_id', $College_id)->paginate(5);
       
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
    public function add_Semester(Request $request)
    {

        $user_id = auth()->user()->id;
        

        
        $College_id = Instructor::where('id',$user_id)->value('college_id');;

   $str = $request->seassion . ' ' . $request->year;
        Semester::insert(
            [
             'name' => $str,
             'college_id' => $College_id
                
             ]
        );

        return \Redirect::route('SemestersMenu');
    }

    public function delete_Semester(Request $request){
        Semester::where('id',$request->id)->delete();
        return back()->with('message', 'تم حذف القسم ');
        
    }

    
    public function index_Override()
    {
        $user_id = auth()->user()->id;
        

        
        $College_id = Instructor::where('id',$user_id)->value('college_id');
      
        $requests =  override_request::all();
        $requests = override_request::paginate(8);
        return view('Admins.ExaminationDepartment.views.Semesters.OverrideRequest', compact('requests'));
    }



    
    public function index_FinalResults()
    {

        $user_id = auth()->user()->id;
        

        
        $College_id = Instructor::where('id',$user_id)->value('college_id');

        $departments = Department::all()->where('college_id', $College_id);
 

        return view('Admins.ExaminationDepartment.views.Semesters.FinalResults' ,  compact( 'departments'));
    }



    public function index_SemestersPlan()
    {

        $user_id = auth()->user()->id;
        

        
        $College_id = Instructor::where('id',$user_id)->value('college_id');
        $semester_id = College::where('id',$College_id)->value('current_semester');


        $semesterplan =  semesterplan::all()->where('college_id',$College_id)->where('semester_id' , $semester_id);
       
        return view('Admins.ExaminationDepartment.views.Semesters.SemestersPlan',  compact( 'semesterplan'));
    }


    public function create_SemesterPlan(){
        $user_id = auth()->user()->id;
        

       
        $College_id = Instructor::where('id',$user_id)->value('college_id');
        $sem_id = College::where('id',$College_id)->value('current_semester');


        $check = semesterplan::where('semester_id', $sem_id )->where('college_id', $College_id )->first();
  
        if (!is_null($check)) {
           return back()->with('message', 'الخطة موجودة مسبقا');
        }else{

        semesterplan::insert([
            
            'renewalStarts' => NULL,
            'renewalEnds' => NULL,
            'SubjectStarts' => NULL,
            'SubjectEnds' => NULL,

            'StudntsMove' => NULL,
            'semsStart' => NULL,
            'semsEnds' => NULL,

            'LastChanceAdd' => NULL,
            'LastChanceDrop' => NULL,
            'FirstMidsStarts' => NULL,
            'FirstMidsEnds' => NULL,

            'LastStop' => NULL,
            'SecondMidsStarts' => NULL,

            'SecondMidsEnds' => NULL,
            'Lastlecture' => NULL,

            'FinalsStarts' => NULL,
            'FinalsEnds' => NULL,

            'Results' => NULL,
            'ReviewStarts' => NULL,
            'ReviewEnds' => NULL,
            
            'CheckStarts' => NULL,
            'CheckEnds' => NULL,
            'NextSem' => NULL,


            'college_id' => $College_id,
            'semester_id' => $sem_id,


         ]);
        }
        return back()->with('message', 'تم إنشاء الخطة الدراسية');
     


    }
    public function set_SemestersPlan(request $request)
    {

        $user_id = auth()->user()->id;
        

       
        $College_id = Instructor::where('id',$user_id)->value('college_id');
        $sem_id = College::where('id',$College_id)->value('current_semester');

        semesterplan::where('college_id', $College_id)
        ->where('semester_id', $sem_id)
        ->update([
            
            'renewalStarts' => $request->renewalStarts,
            'renewalEnds' => $request->renewalEnds,
            'SubjectStarts' => $request->SubjectStarts,
            'SubjectEnds' => $request->SubjectEnds,

            'StudntsMove' => $request->StudntsMove,
            'semsStart' => $request->semsStart,
            'semsEnds' => $request->semsEnds,

            'LastChanceAdd' => $request->LastChanceAdd,
            'LastChanceDrop' => $request->LastChanceDrop,
            'FirstMidsStarts' => $request->FirstMidsStarts,
            'FirstMidsEnds' => $request->FirstMidsEnds,

            'LastStop' => $request->LastStop,
            'SecondMidsStarts' => $request->SecondMidsStarts,

            'SecondMidsEnds' => $request->SecondMidsEnds,
            'Lastlecture' => $request->Lastlecture,

            'FinalsStarts' => $request->FinalsStarts,
            'FinalsEnds' => $request->FinalsEnds,

            'Results' => $request->Results,
            'ReviewStarts' => $request->ReviewStarts,
            'ReviewEnds' => $request->ReviewEnds,
            
            'CheckStarts' => $request->CheckStarts,
            'CheckEnds' => $request->CheckEnds,
            'NextSem' => $request->NextSem,


         ]);
       
         return back()->with('message', 'تم تعديل الخطة بنجاح');
     
    }



    // students
    public function index_StudentsPlacement()
    {


        $requests =  placement_request::select('placement_requests.*' ,'students.gpa') 
        ->join('students', 'placement_requests.student_id', '=', 'students.id')
        ->groupBy('placement_requests.student_id')
        ->orderBy('students.gpa', 'DESC')
        ->get() ;



     //   $requests = placement_request::all()->unique('student_id')->paginate(15);
       // $requests = placement_request::get()->unique('student_id')->orderBy('gpa','asc')->toQuery()->paginate(20);

        
        return view('Admins.ExaminationDepartment.views.Students.StudentsPlacement',  compact( 'requests'));
    }
    public function index_StudentsMovement()
    {
        $user_id = auth()->user()->id;
        

        
        $College_id = Instructor::where('id',$user_id)->value('college_id');
      
        $students = student::where('college_id' , $College_id)->paginate(5);
        return view('Admins.ExaminationDepartment.views.Students.StudentsMovement' , compact('students'));
    }




    
    public function index_RegRenewal()
    {
        $user_id = auth()->user()->id;
        $College_id = Instructor::where('id',$user_id)->value('college_id');
        $students = student::where('college_id' , $College_id)->paginate(5);

        return view('Admins.ExaminationDepartment.views.Students.RegRenewal' , compact('students'));
    }
    public function index_StopEnrollment()
    {
        return view('Admins.ExaminationDepartment.views.Students.StopEnrollment');
    }


    public function index_StudentNotify()
    {
        $user_id = auth()->user()->id;
        $notificationsList = Notification::where('sender_id',$user_id)->orderBy('id','DESC')->paginate(5);
         

        return view('Admins.ExaminationDepartment.views.Students.StudentsNotify' , compact('notificationsList'));
    }




    public function index_Rooms()
    {
        $user_id = auth()->user()->id;

        $College_id = Instructor::where('id',$user_id)->value('college_id');

        $departments = Department::where('college_id' , $College_id)->get();

         $RoomsList = Room::where('College_id',$College_id)->paginate(5);
         

        return view('Admins.ExaminationDepartment.views.Departments.RoomsMenu' , compact('RoomsList' , 'departments'));
    }
}
