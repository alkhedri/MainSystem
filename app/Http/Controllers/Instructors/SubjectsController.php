<?php

namespace App\Http\Controllers\Instructors;

use App\Models\student;
use App\Models\Instructor;
use App\Models\student_mark;
use App\Models\college;

use App\Models\subject;
use App\Models\subject_date;
use App\Models\subject_requirement;

use App\Models\student_attendanceRecord;

use App\Models\TimeTable;
use App\Models\TimeTable_Room;
use App\Models\ExamsTable;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubjectsController extends Controller
{
 
    public function marksRecord(Request $request)
    {
        $user_id = auth()->user()->id;

        $College_id = Instructor::where('id',$user_id)->value('college_id');
       
        $current_semester_id = College::where('id',$College_id)->value('current_semester');


        $subjects =  subject::where('proffesor_id',$user_id)->where('id',$request->subject_id)->paginate(5);;
        $marksData =  student_mark::where('subject_id',$request->subject_id)->where('semester_id',$current_semester_id)->paginate(5);;
   
$subject_id = $request->subject_id;
        return view('instructors.professor.subjects.marksRecord' , compact('subjects' , 'marksData' , 'subject_id'));
         
    }
    
    public function marksRecordAction(Request $request)
    {
 
        $count_items = count($request->ids);
        $final = $request->get('final');
        $work = $request->get('work');
        $ids = $request->get('ids');

        for($i = 0; $i<$count_items; $i++)
        {
            student_mark::where('id', $ids[$i])
            ->update([
                'work' => $work[$i],
                'final' => $final[$i],
                
             ]);
       
            }
   

        return back();
       
    }
    


    public function attendanceRecord(Request $request)
    {
        $user_id = auth()->user()->id;
 
    

        $subjects =  subject::where('proffesor_id',$user_id)->where('id',$request->subject_id)->paginate(5);;
      
   
        $todaysdate = date('Y-m-d');
        $recordsDates = student_attendanceRecord::where('subject_id',$request->subject_id)->groupBy('date')->get();

        $students =  student_attendanceRecord::where('subject_id',$request->subject_id)->where('date',$todaysdate)->get();
       
        $Newstudents =  student_mark::where('subject_id',$request->subject_id)->get();
        
       
        $subject_id = $request->subject_id;
        return view('instructors.professor.subjects.attendanceRecord' , compact('subjects' , 'students' , 'subject_id' , 'recordsDates' , 'todaysdate' , 'Newstudents'));
         
    } 

    
    public function attendance_EditRecord(Request $request)
    {
        
   
        
        $students =  student_attendanceRecord::where('subject_id',$request->subject_id)->where('date',$request->date)->get();
        
       
        $subject_id = $request->subject_id;
        $recordDate = $request->date;


        return view('instructors.professor.subjects._attendanceEdit' , compact(  'students' , 'recordDate' ,'subject_id' ));
         
    }
    public function AttendanceRecordAction(Request $request)
    {
        $user_id = auth()->user()->id;

        $College_id = Instructor::where('id',$user_id)->value('college_id');
       
        $current_semester_id = College::where('id',$College_id)->value('current_semester');

 
        $students =  student_mark::where('subject_id',$request->subject_id)->where('semester_id',$current_semester_id)->get();
        
        if (student_attendanceRecord::where('date', date('Y-m-d') )->where('subject_id', $request->subject_id )->exists()) {
            return back()->with('exist', 'سجل الحضور لهذا اليوم موجود بالفعل');
        }



        foreach($students as $student){
            student_attendanceRecord::Insert(
                [
                 'student_id' => $student->student_id,
                 'subject_id' => $request->subject_id,
                 'date' => date('Y-m-d'),
                 'status' => 0,
            
                 ]
            );
        }
      

        return back()->with('notexist', 'تم ادراج سجل حضور جديد');;
        
       
    }
    public function AttendanceRecordAction_Update(Request $request)
    {
     
        student_attendanceRecord::where('student_id', $request->student_id)->where('date', $request->date)->where('subject_id', $request->subject_id)
        ->update([
 
            'status' => $request->status,
       
         ]);

    

         return back();
        
       
    } 
    public function Attendance_Search(Request $request)
    {
        $user_id = auth()->user()->id;
 
        $College_id = Instructor::where('id',$user_id)->value('college_id');
       
        $current_semester_id = College::where('id',$College_id)->value('current_semester');


        $subjects =  subject::where('proffesor_id',$user_id)->where('id',$request->subject_id)->paginate(5);;
        
   
 
        $recordsDates = student_attendanceRecord::where('subject_id',$request->subject_id)->groupBy('date')->get();
     
 
        $subject_id = $request->subject_id;
        $students =  student_attendanceRecord::where('subject_id',$request->subject_id)->where('date',$request->date)->get();
        $Newstudents =  student_mark::where('subject_id',$request->subject_id)->get();
        
         
         $todaysdate = date('Y-m-d');
         return view('instructors.professor.subjects.attendanceRecord' , compact('subjects' , 'students' , 'subject_id' , 'recordsDates' , 'todaysdate' , 'Newstudents'));
    
    }


    public function examsDate(Request $request)
    {
        $user_id = auth()->user()->id;
 
      
        $dates =  subject_date::where('subject_id',$request->subject_id)->get();
     
        $subjects =  subject::where('proffesor_id',$user_id)->where('id',$request->subject_id)->paginate(5);;
       
        $subject_id = $request->subject_id;
        return view('instructors.professor.subjects.examsDates' , compact('dates'  , 'subject_id'  , 'subjects'));
         
    }

    public function examsDateAction_Insert(Request $request)
    {

        $user_id = auth()->user()->id;
        $department_id = Instructor::where('id',$user_id)->value('department_id');
       
        $validated = $request->validate([
            'name' => 'required|max:120',
            'due' => 'required',
            'details' => 'max:300'
        ]);
 

        subject_date::insert(
            [
             'name' => $request->name,
             'due_date' => $request->due,
             'sent_date' => date('Y-m-d'),
             'details' => $request->details,
             'department_id' => $department_id,
             'subject_id' => $request->subject_id,
             
             ]
        );

        return back();
       
    }

    public function examsDateAction_Delete(Request $request)
    {
        subject_date::where('id',$request->id)->delete();
        return back()->with('message', 'تم حذف المهمه ');
    }




    //////// DEC SUBJECTS

    public function insert_newSubject(Request $request)
    {

        $user_id = auth()->user()->id;
        $College_id = Instructor::where('id',$user_id)->value('college_id');
        $department_id = Instructor::where('id',$user_id)->value('department_id');
       
        $validated = $request->validate([
            'arabic_name' => 'required|max:80',
            'units' => 'required|numeric',
            'code' => 'required|max:7'
        ]);
 
        subject::insert(
            [
             'code' => $request->code,
             'arabic_name' => $request->arabic_name,
             'english_name' => $request->english_name,
             'units' => $request->units,

             'course_hours' => $request->course_hours,
             'work_hours' => $request->work_hours,

             'work_mark' => 40,
             'final_mark' => 60,

             'department_id' => $department_id,
             'college_id' => $College_id,

             'avaliablity' => 0,
             'required' => 1,

             'proffesor_id' => NULL,
             
             ]
        );
       
        return back()->with('subjectInserted', [
            'Arabic_name' =>  $request->arabic_name,
            'English_name' =>  $request->english_name,
            'Code'          => $request->code,
            'Units'         => $request->units,
            
        ]);;

    }

    public function Delete_Subject(Request $request)
    {
        subject::where('id',$request->id)->delete();
        return back()->with('message', 'تم حذف المقرر ');
    }


    public function Update_Subject(Request $request){
        $validated = $request->validate([
            'arabic_name' => 'required|max:30',
 
        ]);
    
            subject::where('id', $request->id)
            ->update([
                'arabic_name' =>  $request->arabic_name,
                'english_name' => $request->english_name,
                'units' => $request->units,
                'code' => $request->code,

                'course_hours' => $request->course_hours,
                'work_hours' => $request->work_hours,
                'proffesor_id' => $request->professor_id,
             ]);
       
   

        return back()->with('message', 'تم تعديل البيانات ');;
    }

    
    public function Delete_SubjectRequiremet(Request $request)
    {
        subject_requirement::where('id',$request->id)->delete();
        return back()->with('message', 'تم حذف المتطلب ');
    }

    public function insert_newSubjectRequiremet(Request $request)
    {

        subject_requirement::insert(
            [
             'subject' => $request->subject_id,
             'requirement' => $request->requirement_id,
              
             
             ]
        );
       
        return back()->with('subjectInserted', [
            'Arabic_name' =>  $request->arabic_name,
            'English_name' =>  $request->english_name,
            'Code'          => $request->code,
            'Units'         => $request->units,
            
        ]);;

    }
    
    public function Active_SubjectAction(Request $request){
 
    
            subject::where('id', $request->id)
            ->update([
                'avaliablity' => $request->status,
             ]);
       
   

        return back()->with('message', 'تم تعديل البيانات ');;
    }
    
    public function ClassTableEditAction(Request $request){
 
        $FirstPeriod = $request->get('FirstPeriod');
        $SecondPeriod = $request->get('SecondPeriod');
        $ThirdPeriod = $request->get('ThirdPeriod');
        $ForthPeriod = $request->get('ForthPeriod');

        $FirstPeriodRoom = $request->get('FirstPeriodRoom');
        $SecondPeriodRoom = $request->get('SecondPeriodRoom');
        $ThirdPeriodRoom = $request->get('ThirdPeriodRoom');
        $ForthPeriodRoom = $request->get('ForthPeriodRoom');
        


        $Roomids = $request->get('Roomids');
        $ids = $request->get('ids');
        //$SaturdayIDs =  TimeTable::where('day',0);
        
        //  if ($FirstPeriodRoom) {
        //     return back()->with('message', $FirstPeriodRoom[1]);
        //  }
         
        for ($i = 0 ; $i < 4 ; $i++)
            TimeTable::where('day', $request->day)->where('id', $ids[$i])
            ->update([
                'Stp' => $FirstPeriod[$i],
                'Sp' => $SecondPeriod[$i],
                'Tp' => $ThirdPeriod[$i],
                'Fp' => $ForthPeriod[$i],
                

             ]);


             for ($i = 0 ; $i < 4 ; $i++)
             TimeTable_Room::where('day_id', $ids[$i])
             ->update([
                 'Stp' => $FirstPeriodRoom[$i],
                 'Sp' => $SecondPeriodRoom[$i],
                 'Tp' => $ThirdPeriodRoom[$i],
                 'Fp' => $ForthPeriodRoom[$i],
                 
 
              ]);

    return back()->with('message', 'تم تعديل الجدول');
}
  public function CreateClassTable(Request $request)
    {


         $user_id = auth()->user()->id;
         $department_id = Instructor::where('id',$user_id)->value('department_id');


         $check = TimeTable::where('department_id', $department_id )->first();
  
         if (!is_null($check)) {
            return back()->with('message', 'الجدول موجود مسبقا');
         }else{

            for ($j = 0 ; $j < 6 ; $j++)
            for ($i = 0 ; $i < 4 ; $i++)
           TimeTable::insert(
               [
                   'department_id' => $department_id,
                   'day' => $j,
                   'Stp' => NULL,
                   'Sp' => NULL,
                   'Tp' => NULL,
                   'Fp' => NULL,
                ]
           );


           $day_id = TimeTable::where('department_id', $department_id)->get();

            
                foreach ($day_id as $day)
                 TimeTable_Room::insert(
                [
                    'day_id' => $day->id,
                    'Stp' => NULL,
                    'Sp' => NULL,
                    'Tp' => NULL,
                    'Fp' => NULL,
                 ]);
           

         }

         
       
        return back()->with('message', 'تم إنشاء الجدول');;

    } 


    public function ExamsTableEditAction(Request $request)
    {

         $user_id = auth()->user()->id;
         $department_id = Instructor::where('id',$user_id)->value('department_id');


         ExamsTable::insert(
                [
                    'date' => $request->date,
                    'F' => $request->first,
                    'S' => $request->second,
                    'department_id' => $department_id,
                 ]);

       
        return back()->with('message', 'تم إنشاء الجدول');;

    }


   

    public function EditExamsTableActionFirst(Request $request)
    {

         $user_id = auth()->user()->id;
         $department_id = Instructor::where('id',$user_id)->value('department_id');

         ExamsTable::where('id', $request->id)->where('department_id',$department_id)
         ->update([
             'F' => NULL,
          ]);
     //  ExamsTable::where('id',$request->id)->where('department_id',$department_id)->delete();
      
         return back();

    }

    public function EditExamsTableActionSecond(Request $request)
    {

         $user_id = auth()->user()->id;
         $department_id = Instructor::where('id',$user_id)->value('department_id');

         ExamsTable::where('id', $request->id)->where('department_id',$department_id)
         ->update([
             'S' => NULL,
          ]);
     //  ExamsTable::where('id',$request->id)->where('department_id',$department_id)->delete();
      
         return back();

    }
    public function EditExamsTableActionDelete(Request $request)
    {

         $user_id = auth()->user()->id;
         $department_id = Instructor::where('id',$user_id)->value('department_id');

      
       ExamsTable::where('date',$request->date)->where('department_id',$department_id)->delete();
      
         return back();

    }
    
}