<?php

namespace App\Http\Controllers;
use App\Models\Instructor;
use App\Models\city;
use App\Models\department;
use App\Models\college;
use App\Models\semesterplan;
use App\Models\semester;
use App\Models\student;
use App\Models\student_warning;
use App\Models\complaint;
use App\Models\subject;
use App\Models\subject_requirement;
use App\Models\room;

use App\Models\timeTable;

use App\Models\ExamsTable;
use Illuminate\Http\Request;

class InstrController extends Controller
{

    public function students()
    {
      
        $ids = City::all('name','id');
        $departments = Department::all('arabic_name','id');
        $colleges = College::all('arabic_name','id');
    
        return view ('auth.Testregister',  compact('ids' , 'departments' , 'colleges'));
 
 
    }
  
    public function index()
    {
        

        return view('instructors._main');
    }


    public function index_facultyMembers()
    {
        $user_id = auth()->user()->id;

        $user_College_id = Instructor::where('id',$user_id)->value('college_id');

        $user_department_id = Instructor::where('id',$user_id)->value('department_id');

        $instructors = Instructor::where('department_id',$user_department_id)->paginate(5);

        return view('instructors.HOD.facultyMembers' , compact('instructors'));
    }
    
    public function index_SemestersPlan()
    {
        $user_id = auth()->user()->id;
        

        
        $College_id = Instructor::where('id',$user_id)->value('college_id');
        $semester_id = College::where('id',$College_id)->value('current_semester');


        $semesterplan =  semesterplan::all()->where('college_id',$College_id)->where('semester_id' , $semester_id);
     $SEMESTER_NAME = Semester::where('id',$semester_id)->value('name');


        return view('instructors.Professor.SemestersPlan' , compact('semesterplan' , 'SEMESTER_NAME'));
    }

    public function index_StudentsMenu()
    {
        $user_id = auth()->user()->id;
        

        
        $College_id = Instructor::where('id',$user_id)->value('college_id');
        $department_id = Instructor::where('id',$user_id)->value('department_id');
    

        $students =  student::where('college_id',$College_id)->where('department_id' , $department_id)->paginate(5);;
   
        $count = $students->count();
        return view('instructors.HOD.StudentsMenu' , compact('students' , 'count'));
    }

    public function index_Dropped()
    {
        $user_id = auth()->user()->id;

        $College_id = Instructor::where('id',$user_id)->value('college_id');
        $department_id = Instructor::where('id',$user_id)->value('department_id');
    
        $students =  student_warning::where('college_id',$College_id)->where('department_id' , $department_id)->paginate(5);;
   
        $count = $students->count();
        return view('instructors.HOD.DropedStudents' , compact('students' , 'count'));
     
    }
    
    public function index_NewStudents()
    {
        $user_id = auth()->user()->id;
        

        
        $College_id = Instructor::where('id',$user_id)->value('college_id');
        $department_id = Instructor::where('id',$user_id)->value('department_id');
        $current_sem_id = college::where('id',$College_id)->value('current_semester');
       

        $students =  student::where('college_id',$College_id)->where('department_id' , $department_id)->where('DepartmentJoin_sem_id' , $current_sem_id)->paginate(5);;
   
        $count = $students->count();
        

        

   $current_sem = semester::where('id',$current_sem_id)->value('name');

        return view('instructors.HOD.NewStudents', compact('students' , 'count' , 'current_sem', 'department_id'));
    }
    public function index_Complaints()
    {

        $user_id = auth()->user()->id;

        $College_id = Instructor::where('id',$user_id)->value('college_id');
        $department_id = Instructor::where('id',$user_id)->value('department_id');
    
        $complaints =  complaint::where('college_id',$College_id)->where('department_id' , $department_id)->paginate(5);;
   
        $count = $complaints->count();
        return view('instructors.HOD.StudentsComplaints' , compact('complaints' , 'count'));
 
    }

 
    public function index_SubjectsMenu()
    {
        $user_id = auth()->user()->id;
        $College_id = Instructor::where('id',$user_id)->value('college_id');
        $department_id = Instructor::where('id',$user_id)->value('department_id');
        
        $subjects =  subject::where('department_id',$department_id)->paginate(5);;
   
        $title = 'حذف مقرر';
        $text = "هل أنت متأكد من حذ هذا القرر ؟";
        confirmDelete($title, $text);
        return view('instructors.DEC.SubjectsMenu' , compact('subjects'));
    }
    public function index_SubjectDetails(Request $request)
    {
        $user_id = auth()->user()->id;
         $department_id = Instructor::where('id',$user_id)->value('department_id');
        
         $subjects =  subject::all()->where('department_id',$department_id)->where('id' , $request->id);
         $Department_subjects =  subject::all()->where('department_id',$department_id);
         $subject_Code =  subject::where('id',$request->id)->value('code');
       
         $requirements =  subject_requirement::all()->where('subject',$request->id);
         $instructors =  instructor::all()->where('department_id',$department_id);
       

        return view('instructors.DEC.SubjectDetails' , compact('subjects' , 'requirements' ,'subject_Code' , 'instructors' , 'Department_subjects'));
    }
    
    public function index_SubjectsProfessor(Request $request)
    {
        $user_id = auth()->user()->id;
        $department_id = Instructor::where('id',$user_id)->value('department_id');
        $college_id = Instructor::where('id',$user_id)->value('college_id');
       
        $subjects =  subject::all()->where('department_id',$department_id)->where('id' , $request->id);
        $Department_subjects =  subject::all()->where('department_id',$department_id);
        $subject_Code =  subject::where('id',$request->id)->value('code');
      
        $requirements =  subject_requirement::all()->where('subject',$request->id);
        $instructors =  instructor::all();
      

       return view('instructors.DEC._CollegeProfs' , compact('subjects' , 'requirements' ,'subject_Code' , 'instructors' , 'Department_subjects'));
    }

    public function index_NewSubject()
    {
        return view('instructors.DEC.NewSubject');
    }

    public function index_Supervision()
    {
        $user_id = auth()->user()->id;
        $department_id = Instructor::where('id',$user_id)->value('department_id');
        $instructors =  instructor::all()->where('department_id',$department_id);
        $students =  student::where('department_id',$department_id)->paginate(5);
       

        return view('instructors.DEC.Supervision' ,compact('instructors' , 'students'));
    }


    
    public function index_OverrideRequest()
    {
        $user_id = auth()->user()->id;
        $department_id = Instructor::where('id',$user_id)->value('department_id');
        $instructors =  instructor::all()->where('department_id',$department_id);
        $subjects =  subject::where('department_id',$department_id)->get();
       


        return view('instructors.DEC.SubjectOverrideRequest' , compact('subjects' , 'department_id'));
    }
    public function index_TimeTable()
    {
        $user_id = auth()->user()->id;
        $department_id = Instructor::where('id',$user_id)->value('department_id');

     
        $Saturday = timeTable::where('department_id',$department_id)->where('day', 0)->get();
        $Sunday = timeTable::where('department_id',$department_id)->where('day', 1)->get();
        $Monday = timeTable::where('department_id',$department_id)->where('day', 2)->get();
        $Tuesday = timeTable::where('department_id',$department_id)->where('day', 3)->get();
        $Wedensday = timeTable::where('department_id',$department_id)->where('day', 4)->get();
        $Thursday = timeTable::where('department_id',$department_id)->where('day', 5)->get();
      
 


        $Department_subjects = subject::where('department_id',$department_id)->get();
        $Department_Rooms = room::where('department_id',$department_id)->get();
    $departmentName = department::where('id',$department_id)->value('arabic_name');
        
        return view('instructors.DEC.TimeTable' , compact(
            'Saturday',
            'Sunday',
            'Monday',
            'Tuesday',
            'Wedensday',
            'Thursday',
            'Department_subjects',
            'Department_Rooms',
            'departmentName'
        ));   
    }
     

    public function index_TimeTableEditPeriod(Request $request){
      
        $user_id = auth()->user()->id;
        $department_id = Instructor::where('id',$user_id)->value('department_id');

     
        $Department_subjects = subject::where('department_id',$department_id)->get();
        $Department_Rooms = room::where('department_id',$department_id)->get();


        $id = $request->id;
        $period = $request->period;

 

        return view('instructors.DEC.TimeTableEditSinglePeriod' , 
        compact('Department_subjects' ,
        'Department_Rooms',
        'period',
        'id',
         
        
        ));

    }
    public function index_TimeTableEdit(Request $request)
    {

        $user_id = auth()->user()->id;
        $department_id = Instructor::where('id',$user_id)->value('department_id');
      
     
 
        $Saturday = timeTable::where('department_id',$department_id)->where('day', 0)->get();
        $Sunday = timeTable::where('department_id',$department_id)->where('day', 1)->get();
        $Monday = timeTable::where('department_id',$department_id)->where('day', 2)->get();
        $Tuesday = timeTable::where('department_id',$department_id)->where('day', 3)->get();
        $Wedensday = timeTable::where('department_id',$department_id)->where('day', 4)->get();
        $Thursday = timeTable::where('department_id',$department_id)->where('day', 5)->get();
      
 




        return view('instructors.DEC.EditClassTable' , compact(
            'Saturday',
            'Sunday',
            'Monday',
            'Tuesday',
            'Wedensday',
            'Thursday',
          
            
        ));  
       
          

    }
      
 
    
    ///////////////////////////////////////

    public function index_SubjectsList()
    {
        $user_id = auth()->user()->id;
 
        $subjects =  subject::where('proffesor_id',$user_id)->get();
   
           
        return view('instructors.Professor.SubjectsList' , compact('subjects'));
    }
    public function index_SupervisionList()
    
    {

        $user_id = auth()->user()->id;
 
        $students =  student::where('spv_id',$user_id)->paginate(5);
   
     
        return view('instructors.Professor.SupervisionList' , compact ('students'));
 
    }

    
    public function index_DroppedPaln()
    
    {

        $user_id = auth()->user()->id;
        
        $department_id = Instructor::where('id',$user_id)->value('department_id');
    
      //  $studentsList =  student_warning::where('department_id',$department_id)->unique('student_id')->paginate(5);
        $studentsList = student_warning::select('student_id')->groupBy('student_id')->where('department_id',$department_id)->paginate(5);
     
        return view('instructors.Professor.DroppedPaln' , compact ('studentsList'));
 
    }

    public function index_ExamsTable(Request $request)
    {
        
        $user_id = auth()->user()->id;
        $department_id = Instructor::where('id',$user_id)->value('department_id');


        $dates = ExamsTable::select('date')->groupBy('date')->where('department_id',$department_id)->get();
        
        $Department_subjects = subject::where('department_id',$department_id)->get();
    

        return view('instructors.DEC.ExamsTable' , compact('dates' , 'Department_subjects'));
    }
    public function index_EditExamsTable(Request $request)
    {

        $user_id = auth()->user()->id;
        $department_id = Instructor::where('id',$user_id)->value('department_id');


        $dates = ExamsTable::select('date')->groupBy('date')->where('department_id',$department_id)->get();
        
        $Department_subjects = subject::where('department_id',$department_id)->get();
    

        return view('instructors.DEC.EditExamsTable' , compact('dates' , 'Department_subjects'));

    }

}
