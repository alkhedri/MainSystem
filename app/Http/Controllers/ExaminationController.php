<?php

namespace App\Http\Controllers;
use App\Models\department;
use App\Models\semester;
use App\Models\Instructor;
use App\Models\student;

use App\Models\User;
use App\Models\Auth;
use App\Models\college;
use App\Models\semesterplan;
use App\Models\override_request;
use App\Models\placement_request;
use App\Models\notification;
use App\Models\room;
 
use App\Models\city;
 
use Illuminate\Support\Facades\Hash;


use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Validator;
use RealRashid\SweetAlert\Facades\Alert;

use Laratrust\Models\Permission;
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
        
        return view('Admins.ExaminationDepartment.views.Departments.Info' ,  compact( 'departments' , 'staff' , 'hoD', 'deC', 'dqC', 'dpC' , 'hofid'));
    }

    public function Update_DepartmentsInfo(Request $request)
    {


             
                //   TAKE HOD PERMISSIONS
                $hofid = department::where('id' , $request->id)->value('hod');
       
                $user = User::find($hofid);
                if(!is_null($user))
                $user->removePermission('hod-read');



        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'code' => 'required',
            'arabic_name' => 'required',
          

        ]);
      
      if (!is_null($request->image)){
        $imageName = time().'.'.$request->image->extension();  
       
        $request->image->move(public_path('depicon'), $imageName);
        department::where('id', $request->id)
        ->update([
            'english_name' => $request->english_name,
            'arabic_name' => $request->arabic_name,
           
            'code' => $request->code,
            
            'icon' => $imageName,
            'hod' => $request->hodchange,
            
         ]);
      }else {
        department::where('id', $request->id)
        ->update([
            'english_name' => $request->english_name,
            'arabic_name' => $request->arabic_name,
           
            'code' => $request->code,
            
            'hod' => $request->hodchange,
            
         ]);
      }
       
    
     //   GIVE HOD PERMISSIONS
         $user = User::find($request->hodchange);
         if(!is_null($user))
         $user->givePermission('hod-read');
       
 

        return back();
    }

    public function New_Departments()
    {
        return view('Admins.ExaminationDepartment.views.Departments.Add');
    }
    public function Add_Departments(Request $request)
    {


        
        $request->validate([
            'arabic_name' => 'required',
            'english_name' => 'required',
            'code' => 'required',
        

        ]);
        $user_id = auth()->user()->id;
        

        
        $College_id = Instructor::where('id',$user_id)->value('college_id');;


        department::insert(
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

        $user_id = auth()->user()->id;
      

        $College_id = Instructor::where('id', $user_id)->pluck('college_id');
        
        $departments = department::where('college_id' , $College_id)->get();

            
        $title = 'حذف قسم دراسي';
        $text = "هل أنت متأكد من حذ هذا القسم ؟";
        confirmDelete($title, $text);
        return view('Admins.ExaminationDepartment.views.Departments.Delete',  compact( 'departments'));
    
    }

    public function delete_departments(Request $request){
        department::where('id',$request->id)->delete();
        return back()->with('message', 'تم حذف القسم ');
        
    }


    //// Semesters Methods
    public function index_SemestersMenu()
    {
         $user_id = auth()->user()->id;
      

        $College_id = Instructor::where('id', $user_id)->pluck('college_id');
        $Semesters = semester::where('college_id', $College_id)->paginate(5);
       
        $current_semester = college::where('id', $College_id)->pluck('current_semester');
       
        $semester_name = semester::where('id',$current_semester)->value('name');
        $semester_id = semester::where('id',$current_semester)->value('id');;
        
        $title = 'حذف فصل دراسي';
        $text = "هل أنت متأكد من حذ هذا الفصل ؟";
        confirmDelete($title, $text);
        return view('Admins.ExaminationDepartment.views.Semesters.Menu' , compact('Semesters' , 'semester_name' ,'semester_id'));
    }

    public function CurrentSemesterActivate(Request $request)
    {
        $user_id = auth()->user()->id;
        

       
        $College_id = Instructor::where('id',$user_id)->value('college_id');
        college::where('id', $College_id)
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
        $request->validate([
            'seassion' => 'required',
      

        ]);
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
    
    public function index_StudentAccount()
    {
 
        $user_id = auth()->user()->id;
        

        
        $College_id = Instructor::where('id',$user_id)->value('college_id');;

        $ids = City::all('name','id');
        $departments = Department::where('college_id',$College_id)->get();
      
        return view ('Admins.ExaminationDepartment.views.Students.NewStudentAccount',  compact('ids' , 'departments'));
 

    }
    public function index_CreateStudentAccount(Request $request)
    {


        $user_id = auth()->user()->id;
        

        
        $College_id = Instructor::where('id',$user_id)->value('college_id');;
        

  
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' =>  'required|string|min:8|confirmed',
            'badge' => 'required|max:10|min:10|',
        ]);

        $students = student::where('college_id' , $College_id )->get();

        $placementPermission = 0;
        $ResultPermission = 0;
        $subjectsPermission= 0;
        
        foreach( $students as $student){

            $user = User::find($student->id);

            if (is_null($user))

            {}
            
            else{

                if($user->hasPermission('placements'))
                $placementPermission = 1;
                if($user->hasPermission('final-result'))
                $ResultPermission = 1;
                if($user->hasPermission('subjects-create'))
                $subjectsPermission= 1;
                 
                }
        }
     
     
        User::Insert(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),

             ]
        );
   
        Student::Insert(
            [
                'id' => User::select('id')->max('id'), 
                'arabic_name' => $request->name,
                'department_id' => $request->department_id,
                'college_id' => $College_id,
                'badge'  => $request->badge,
                'enrollment_status_id' => 3,

                
          
             ]
        );

        $x = User::select('id')->max('id');
        $user = User::find($x);
        $user->addRole('student');
        $department = department::where('id',$request->department_id)->value('arabic_name');;

        if ($placementPermission == 1)
        $user->givePermission('placements');
        if ($ResultPermission == 1)
        $user->givePermission('final-result');
        if ($subjectsPermission == 1)
        $user->givePermission('subjects-create');

      
        return back()->with('data', [
            'arabic_name' =>  $request->name,
            'email' =>  $request->email,
            'department'  => $department,
          
          

            
        ]);
    

       
   
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

        $departments = Department::where('college_id', $College_id)->get();
 

        $students = student::where('college_id' , $College_id )->get();
        $status = 0;
           foreach( $students as $student){
              $user = User::find($student->id);
              if (is_null($user))
              {}
              else
              if($user->isAbleTo('final-result'))
               $status = 1;
           }
        return view('Admins.ExaminationDepartment.views.Semesters.FinalResults' ,  compact( 'departments' , 'status'));
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

        $user_id = auth()->user()->id;
        

       
        $College_id = Instructor::where('id',$user_id)->value('college_id');
       
        $departments = department::where('college_id',$College_id)->get();
       
        $date =  semesterplan::where('college_id',$College_id)->value('StudntsMove');
       
        $requests =  placement_request::select('placement_requests.*' ,'students.gpa') 
        ->join('students', 'placement_requests.student_id', '=', 'students.id')
        ->groupBy('placement_requests.student_id')
        ->orderBy('students.gpa', 'DESC')
        ->get() ;



     //   $requests = placement_request::all()->unique('student_id')->paginate(15);
       // $requests = placement_request::get()->unique('student_id')->orderBy('gpa','asc')->toQuery()->paginate(20);

        
        return view('Admins.ExaminationDepartment.views.Students.StudentsPlacement',  compact( 'requests' , 'date' , 'departments'));
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
         $title = 'حذف قاعة ';
         $text = "هل أنت متأكد من حذ هذه القاعة ؟";
         confirmDelete($title, $text);

        return view('Admins.ExaminationDepartment.views.Departments.RoomsMenu' , compact('RoomsList' , 'departments'));
    }

    public function index_StudentDropAndAdd()
    {
        $user_id = auth()->user()->id;

        $College_id = Instructor::where('id',$user_id)->value('college_id');

        $students = student::where('college_id' , $College_id )->get();
        $status = 0;
           foreach( $students as $student){
              $user = User::find($student->id);
              if (is_null($user))
              {}
              else
              if($user->isAbleTo('subjects-create'))
               $status = 1;
       }
        return view('Admins.ExaminationDepartment.views.Students.DropAndAdd', compact('status'));
    }
    
    public function index_StudentDropAndAddAction()
    {
        $user_id = auth()->user()->id;

        $College_id = Instructor::where('id',$user_id)->value('college_id');

        $students = student::where('college_id' , $College_id )->get();

        foreach( $students as $student){

            $user = User::find($student->id);

            if (is_null($user))

            {}
            
            else{

                if($user->hasPermission('subjects-create'))
                   $user->removePermission('subjects-create');
                 else
                 $user->givePermission('subjects-create');
                }
        }
         
      
       return back();
      
    }
    public function index_StudentDepartmentPlacement()
    {
        $user_id = auth()->user()->id;

        $College_id = Instructor::where('id',$user_id)->value('college_id');
        $College_Req_Units = college::where('id',$College_id)->value('required_units');
        $GS = department::where('code','GS')->value('id');

        $students = student::where('college_id' , $College_id )
        ->where('units' , '>=' , $College_Req_Units)
        ->where('department_id' , $GS )
        ->get();


        $status = 0;
           foreach( $students as $student){
              $user = User::find($student->id);
              if (is_null($user))
              {}
              else
              if($user->isAbleTo('placements'))
               $status = 1;
       }



      
       $count = $students->count();
        return view('Admins.ExaminationDepartment.views.Students.StudentDepartmentPlacement', compact('status' , 'count' , 'College_Req_Units'));
    }
    
    public function index_StudentDepartmentPlacementAction()
    {
        $user_id = auth()->user()->id;

        $College_id = Instructor::where('id',$user_id)->value('college_id');
        $College_Req_Units = college::where('id',$College_id)->value('required_units');
        $GS = department::where('code','GS')->value('id');


        
        $students = student::where('college_id' , $College_id )
        ->where('units' , '>=' , $College_Req_Units)
        ->where('department_id' , $GS )
        ->get();

        foreach( $students as $student){

            $user = User::find($student->id);

            if (is_null($user))

            {}
            
            else{

                if($user->hasPermission('placements'))
                   $user->removePermission('placements');
                 else
                 $user->givePermission('placements');
                }
        }
         
      
       return back();
    }

    public function CollegeRequiredUnitsChangeAction(Request $request){

        $user_id = auth()->user()->id;

        $College_id = Instructor::where('id',$user_id)->value('college_id');
       
        college::where('id', $College_id)
        ->update([
            'required_units' => $request->units,
            
         ]);

         return back();
   
    }
    

    public function FinalResultsReleaseAction()
    {
        $user_id = auth()->user()->id;

        $College_id = Instructor::where('id',$user_id)->value('college_id');
  
        
        $students = student::where('college_id' , $College_id )->get();

        foreach( $students as $student){

            $user = User::find($student->id);

            if (is_null($user))

            {}
            
            else{

                if($user->hasPermission('final-result'))
                   $user->removePermission('final-result');
                 else
                 $user->givePermission('final-result');
                }
        }
         
      
       return back();
    }





    
}
