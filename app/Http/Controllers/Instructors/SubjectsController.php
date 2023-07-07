<?php

namespace App\Http\Controllers\Instructors;

use App\Models\student;
use App\Models\Instructor;
use App\Models\student_mark;
use App\Models\college;
use App\Models\semester;
use App\Models\department;
use App\Models\subject;
use App\Models\subject_date;
use App\Models\subject_requirement;
use App\Models\notification;
use App\Models\student_attendanceRecord;
use App\Models\subject_group;

use App\Models\timeTable;
use App\Models\TimeTable_Room;
use App\Models\TimeTable_Group;
use App\Models\ExamsTable;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SubjectsController extends Controller
{
 
    public function marksRecord(Request $request)
    {
        $user_id = auth()->user()->id;

        $College_id = Instructor::where('id',$user_id)->value('college_id');
       
        $current_semester_id = College::where('id',$College_id)->value('current_semester');


        $subjects =  subject::where('id',$request->subject_id)->paginate(5);;
        $marksData =  student_mark::where('subject_id',$request->subject_id)
        ->where('subject_group',$request->group_id)
        ->where('semester_id',$current_semester_id)->paginate(5);;
   
        $subject_id = $request->subject_id;


        $subject_groups =  subject_group::where('instructor_id',$user_id)->get();
        $check = 0;
         foreach($subject_groups as $group)
                if ($group->group == $request->group_id)
                    $check = 1;

                    if($check == 0)
                    abort(404);

        $group_id = $request->group_id;
        return view('instructors.Professor.Subjects.marksRecord' , compact('subjects' , 'marksData' , 'subject_id' , 'group_id'));
         
    }




    

    public function marksRecordEdit(Request $request)
    {
        $user_id = auth()->user()->id;

        $College_id = Instructor::where('id',$user_id)->value('college_id');
       
        $current_semester_id = College::where('id',$College_id)->value('current_semester');


        $subjects =  subject::where('id',$request->subject_id)->paginate(5);;
        $marksData =  student_mark::where('subject_id',$request->subject_id)
        ->where('subject_group',$request->group_id)
        ->where('semester_id',$current_semester_id)->paginate(5);;
   
        $subject_groups =  subject_group::where('instructor_id',$user_id)->get();
        $check = 0;
         foreach($subject_groups as $group)
                if ($group->group == $request->group_id)
                    $check = 1;

                    if($check == 0)
                    abort(404);
     $subject_id = $request->subject_id;

     $group_id = $request->group_id;
        return view('instructors.Professor.Subjects.marksRecordEdit' , compact('subjects' , 'marksData' , 'subject_id' , 'group_id'));
         
    }
    
    
    public function marksRecordAction(Request $request)
    {
        $user_id = auth()->user()->id;

        $subject_groups =  subject_group::where('instructor_id',$user_id)->get();
        $check = 0;
         foreach($subject_groups as $group)
                if ($group->group == $request->group_id)
                    $check = 1;

                    if($check == 0)
                    abort(404);

        



        $count_items = count($request->ids);
        $final = $request->get('final');
        $work = $request->get('work');
        $ids = $request->get('ids');

        $subject_id =  student_mark::where('id',$ids[0])->value('subject_id');

        

        $subjectWorkLimit =  subject::where('id',$subject_id)->value('work_mark');
       
        $subjectFinalLimit =  subject::where('id',$subject_id)->value('final_mark');
       
        for($i = 0; $i<$count_items; $i++)
        {
           
 
            if ($subjectWorkLimit < $work[$i] || $subjectFinalLimit < $final[$i])
            {
                toast('البيانات المدخلة غير صحيحة','warning');
                return back();
            }
            elseif (0 > $work[$i] || 0 > $final[$i])
            {
                toast('لايمكن أن تكون الدرجات بالسالب !','warning');
                return back();
            }
       
                
           
            else{
            student_mark::where('id', $ids[$i])
            ->where('subject_group', $request->group_id)
            ->update([
                'work' => $work[$i],
                'final' => $final[$i],
                
             ]);
       
            }}
           
            
           
            toast('تم رفع الدرجات بنجاح!','success');

        return back();
       
    }
    


    public function attendanceRecord(Request $request)
    {
        $user_id = auth()->user()->id;
 
        $subject_groups =  subject_group::where('instructor_id',$user_id)->get();
        $check = 0;
         foreach($subject_groups as $group)
                if ($group->group == $request->group_id)
                    $check = 1;

                    if($check == 0)
                    abort(404);

        $subjects =  subject::where('id',$request->subject_id)->paginate(5);;
      
   
        $todaysdate = date('Y-m-d');
        $recordsDates = student_attendanceRecord::where('subject_id',$request->subject_id)
        ->where('group_id',$request->group_id)
        ->groupBy('date')->get();

        $students =  student_attendanceRecord::where('subject_id',$request->subject_id)
        ->where('group_id',$request->group_id)
        ->where('date',$todaysdate)->get();
       
        $Newstudents =  student_mark::where('subject_id',$request->subject_id)
        ->where('subject_group',$request->group_id)
        ->get();
        
       
        $subject_id = $request->subject_id;
        $group_id = $request->group_id;
        $title = 'حذف سجل الحضور';
        $text = "هل أنت متأكد من حذ هذا السجل ؟";
        confirmDelete($title, $text);

        return view('instructors.Professor.Subjects.attendanceRecord' , compact('subjects' , 'students' , 'subject_id' , 'group_id' , 'recordsDates' , 'todaysdate' , 'Newstudents'));
         
    } 

    
    public function attendance_EditRecord(Request $request)
    {
        $user_id = auth()->user()->id;
 
        $subject_groups =  subject_group::where('instructor_id',$user_id)->get();
        $check = 0;
         foreach($subject_groups as $group)
                if ($group->group == $request->group_id)
                    $check = 1;

                    if($check == 0)
                    abort(404);
        
     
        $students = student_attendanceRecord::where('subject_id',$request->subject_id)
        ->where('date',$request->date)
        ->where('group_id',$request->group_id)
        ->get();

        $group_id = $request->group_id;
        $subject_id = $request->subject_id;
        $recordDate = $request->date;
        

        return view('instructors.Professor.Subjects._attendanceEdit' , compact(  'students' , 'group_id', 'recordDate' ,'subject_id' ));
         
    }
    public function AttendanceRecordAction(Request $request)
    {
        $user_id = auth()->user()->id;
        $subject_groups =  subject_group::where('instructor_id',$user_id)->get();
        $check = 0;
         foreach($subject_groups as $group)
                if ($group->group == $request->group_id)
                    $check = 1;

                    if($check == 0)
                    abort(404);
        $College_id = Instructor::where('id',$user_id)->value('college_id');
       
        $current_semester_id = College::where('id',$College_id)->value('current_semester');

 
        $students =  student_mark::where('subject_id',$request->subject_id)
        ->where('semester_id',$current_semester_id)
        ->where('subject_group',$request->group_id)
        
        ->get();
        
        if (student_attendanceRecord::where('date', date('Y-m-d') )->where('subject_id', $request->subject_id )->exists()) {
            return back()->with('exist', 'سجل الحضور لهذا اليوم موجود بالفعل');
        }



        foreach($students as $student){
            student_attendanceRecord::Insert(
                [
                 'student_id' => $student->student_id,
                 'subject_id' => $request->subject_id,
                 'group_id' => $request->group_id,
                 'date' => date('Y-m-d'),
                 'status' => 0,
            
                 ]
            );
        }
      

        return back()->with('notexist', 'تم ادراج سجل حضور جديد');;
        
       
    }
    public function AttendanceRecordAction_Update(Request $request)
    {
        $user_id = auth()->user()->id;
        $subject_groups =  subject_group::where('instructor_id',$user_id)->get();
        $check = 0;
         foreach($subject_groups as $group)
                if ($group->group == $request->group_id)
                    $check = 1;

                    if($check == 0)
                    abort(404);

        student_attendanceRecord::where('student_id', $request->student_id)
        ->where('date', $request->date)
        ->where('subject_id', $request->subject_id)
        ->update([
 
            'status' => $request->status,
       
         ]);

    
          
         return back();
        
       
    } 
    public function attendance_DeleteRecord(Request $request)
    {
     
        student_attendanceRecord::where('date', $request->date)->where('subject_id', $request->subject_id)->delete();
 
    

         return back()->with('message', 'تم حذف السجل ');
        
       
    } 
    public function Attendance_sheet(Request $request){

        $students =  student_attendanceRecord::where('subject_id',$request->subject_id)
        ->where('group_id', $request->group_id)
        ->groupby('student_id')->get();
        
       $subject_id = $request->subject_id;

       $user_id = auth()->user()->id;

       $College_id = Instructor::where('id',$user_id)->value('college_id');
       $college_name = college::where('id',$College_id)->value('arabic_name');
      
       $department_id = Instructor::where('id',$user_id)->value('department_id');
      
       $department_name = department::where('id',$department_id)->value('arabic_name');
       $current_semester_id = College::where('id',$College_id)->value('current_semester');
       $semester_name = semester::where('id',$current_semester_id)->value('name');
       
        
        return view('instructors.Professor.Subjects.attendanceSheet' ,
         compact(
            'students' ,
            'subject_id',
            'college_name',
            'department_name',
            'semester_name'
        
        ));
         
    }
 
    
    public function Attendance_Search(Request $request)
    {
        $user_id = auth()->user()->id;
 
        $College_id = Instructor::where('id',$user_id)->value('college_id');
       
        $current_semester_id = College::where('id',$College_id)->value('current_semester');


        $subjects =  subject::where('id',$request->subject_id)->paginate(5);;
        
   
 
        $recordsDates = student_attendanceRecord::where('subject_id',$request->subject_id)->groupBy('date')->get();
     
 
        $subject_id = $request->subject_id;
        $students =  student_attendanceRecord::where('subject_id',$request->subject_id)->where('date',$request->date)->get();
        $Newstudents =  student_mark::where('subject_id',$request->subject_id)->get();
        
        $group_id = $request->group_id;
         $todaysdate = date('Y-m-d');
         return view('instructors.Professor.Subjects.attendanceRecord' , compact('subjects' , 'students' ,  'group_id','subject_id' , 'recordsDates' , 'todaysdate' , 'Newstudents'));
    
    }


    public function examsDate(Request $request)
    {
        $user_id = auth()->user()->id;
 
      
        $dates =  subject_date::where('subject_id',$request->subject_id)
        ->where('group_id',$request->group_id)
        ->get();
     
        $subjects =  subject::where('id',$request->subject_id)->paginate(5);;
        $group_id = $request->group_id;
        $subject_id = $request->subject_id;

        $title = 'حذف الموعد ';
        $text = "هل أنت متأكد من حذ هذا الموعد ؟";
        confirmDelete($title, $text);
        return view('instructors.Professor.Subjects.examsDates' , compact('dates'  , 'subject_id'  , 'subjects' , 'group_id'));
         
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
             'group_id' => $request->group_id,
             
             ]
        );
        toast('تم إضافة المهمة بنجاح!','success');
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

        $checkExists = subject::where('code', $request->code)->first();
        if (!is_null($checkExists))
          return back()->with('Alert', 'هذا المقرر موجود مسبقا');

        subject::insert(
            [
             'code' => $request->code,
             'arabic_name' => $request->arabic_name,
             'english_name' => $request->english_name,
             'units' => $request->units,

             'course_hours' => $request->course_hours,
             'work_hours' => $request->work_hours,
             'groups' => 1,

             'work_mark' => 40,
             'final_mark' => 60,

             'department_id' => $department_id,
             'college_id' => $College_id,

             'avaliablity' => 0,
             'required' => 1,
           

             
             'proffesor_id' => NULL,
             
             ]
        );
        subject_group::insert(
            [
             'subject_id' => subject::select('id')->max('id'),
             'group' => 0,
             'instructor_id' => NULL,
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
            'arabic_name' => 'required|max:40',
            'english_name' => 'required|max:40',
            'units' => 'required|max:1',
            'code' => 'required|max:7',
            'work' => 'required|numeric',
            'final' => 'required|numeric',
            'groups' => 'required',


        ]);
        
            subject::where('id', $request->id)
            ->update([
                'arabic_name' =>  $request->arabic_name,
                'english_name' => $request->english_name,
                'units' => $request->units,
                'code' => $request->code,
                'groups' => $request->groups,
            

                'course_hours' => $request->course_hours,
                'work_hours' => $request->work_hours,
                'work_mark' => $request->work,
                'final_mark' => $request->final,
                'proffesor_id' => $request->professor_id,
             ]);

//------------ SUBHECT GROUPS TABLE DELETE AND RE CRAETE DATA
                subject_group::where('subject_id',$request->id)->delete();
                for($i = 0 ; $i < $request->groups ; $i++)
                subject_group::insert(
                    [
                     'subject_id' => $request->id,
                     'group' => $i,
                     'instructor_id' => NULL,
                     ]
                );

       
        
             $instructors = $request->get('instructors');
             $i=0;
              foreach( $instructors as  $instructor){
                
                subject_group::where('subject_id', $request->id)->where('group', $i)
                ->update([
                    'instructor_id' =>  $instructor,
            
                ]);
                $i++;
              }
              

        return back()->with('message', 'تم تعديل البيانات ');;
    }
    public function Update_SubjectProfessor(Request $request){
 
        
        subject_group::where('id', $request->group_id)
            ->update([
 
                'instructor_id' => $request->professor_id,
             ]);
       
   
            
        return redirect()->route('SubjectsDetails' , ['id' => $request->subject_id ]);
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
            
        ]);

    }
    
    public function Active_SubjectAction(Request $request){
 
    
            subject::where('id', $request->id)
            ->update([
                'avaliablity' => $request->status,
             ]);
       
   

        return back()->with('message', 'تم تعديل البيانات ');;
    }
    
    public function TimeTableEditAction(Request $request){
 
        $user_id = auth()->user()->id;
        $department_id = Instructor::where('id',$user_id)->value('department_id');


   if (!is_null($request->First) || !is_null($request->Second) || !is_null($request->Third) || !is_null($request->Forth) )
        TimeTable::insert(
               [
                   'day' => $request->Day,
                   'Stp' => $request->First,
                   'Sp' => $request->Second,
                   'Tp' => $request->Third,
                   'Fp' => $request->Forth,
                   'department_id' => $department_id,
                ]);

                TimeTable_Room::insert(
                    [
                        'day_id' => TimeTable::select('id')->max('id'),
                        'Stp' => $request->FirstRoom,
                        'Sp' => $request->SecondRoom,
                        'Tp' => $request->ThirdRoom,
                        'Fp' => $request->ForthRoom,
                     ]);
     
                     TimeTable_Group::insert(
                        [
                            'day_id' => TimeTable::select('id')->max('id'),
                            'Stp' => $request->FirstGroup,
                            'Sp' => $request->SecondGroup,
                            'Tp' => $request->ThirdGroup,
                            'Fp' => $request->ForthGroup,
                         ]);
    return back();
} 

public function TimeTableEditPeriodAction(Request $request){
    $user_id = auth()->user()->id;
    $department_id = Instructor::where('id',$user_id)->value('department_id');


    if($request->period == 1){
        TimeTable::where('id', $request->id)->where('department_id',$department_id)
        ->update([
        'Stp' => $request->Subject,
          ]);
          TimeTable_Room::where('day_id', $request->id)
          ->update([
          'Stp' => $request->Room,
            ]);

    }
         
            elseif($request->period == 2){
                TimeTable::where('id', $request->id)->where('department_id',$department_id)
                ->update([
                    'Sp' => $request->Subject,
                ]);
                TimeTable_Room::where('day_id', $request->id)
                ->update([
                'Sp' => $request->Room,
                  ]);
            }
       
            elseif($request->period == 3){
                TimeTable::where('id', $request->id)->where('department_id',$department_id)
                ->update([
                    'Tp' => $request->Subject,
                ]);
                TimeTable_Room::where('day_id', $request->id)
                ->update([
                'Tp' => $request->Room,
                  ]);
            }
      
            elseif($request->period == 4){
                TimeTable::where('id', $request->id)->where('department_id',$department_id)
                ->update([
                    'Fp' => $request->Subject,
                ]);
                TimeTable_Room::where('day_id', $request->id)
                ->update([
                'Fp' => $request->Room,
                  ]);
            }
   
    return redirect()->route('TimeTableEdit');
}


public function TimeTableDeleteAction(Request $request)
{

     $user_id = auth()->user()->id;
     $department_id = Instructor::where('id',$user_id)->value('department_id');

  
    // TimeTable::where('id',$request->id)->where('department_id',$department_id)->delete();

    if($request->period == 1){
        TimeTable::where('id', $request->id)->where('department_id',$department_id)
        ->update([
        'Stp' => NULL,
          ]);
          TimeTable_Room::where('day_id', $request->id)
          ->update([
          'Stp' => NULL,
            ]);
            TimeTable_Group::where('day_id', $request->id)
            ->update([
            'Stp' => NULL,
              ]);

    }
         
            elseif($request->period == 2){
                TimeTable::where('id', $request->id)->where('department_id',$department_id)
                ->update([
                    'Sp' => NULL,
                ]);
                TimeTable_Room::where('day_id', $request->id)
                ->update([
                'Sp' => NULL,
                  ]);
                  TimeTable_Group::where('day_id', $request->id)
                  ->update([
                  'Sp' => NULL,
                    ]);
            }
       
            elseif($request->period == 3){
                TimeTable::where('id', $request->id)->where('department_id',$department_id)
                ->update([
                    'Tp' => NULL,
                ]);
                TimeTable_Room::where('day_id', $request->id)
                ->update([
                'Tp' => NULL,
                  ]);
                  TimeTable_Group::where('day_id', $request->id)
                  ->update([
                  'Tp' => NULL,
                    ]);
            }
      
            elseif($request->period == 4){
                TimeTable::where('id', $request->id)->where('department_id',$department_id)
                ->update([
                    'Fp' => NULL,
                ]);
                TimeTable_Room::where('day_id', $request->id)
                ->update([
                'Fp' => NULL,
                  ]);
                  TimeTable_Group::where('day_id', $request->id)
                  ->update([
                  'Fp' => NULL,
                    ]);
            }
      

            $check = TimeTable::where('id', $request->id)
            ->where('department_id',$department_id)
            ->value( 'Stp' , 'Sp' , 'Tp'  ,'Fp');

            if(is_null($check)){

                TimeTable_Group::where('day_id',$request->id)
                ->delete();

                TimeTable_Room::where('day_id',$request->id)
                ->delete();

                TimeTable::where('id',$request->id)
                ->where('department_id',$department_id)
                ->delete();


            }
            

     return back();

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

         $secondCheck = ExamsTable::where('id',$request->id)->where('department_id',$department_id)->value('S');

          if (is_null($secondCheck))
          ExamsTable::where('id',$request->id)->where('department_id',$department_id)->delete();
      
          else
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
         $FirstCheck = ExamsTable::where('id',$request->id)->where('department_id',$department_id)->value('F');

         if (is_null($FirstCheck))
         ExamsTable::where('id',$request->id)->where('department_id',$department_id)->delete();
         else
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

    public function NotifyEach(Request $request)
    {
        $user_id = auth()->user()->id;

        $College_id = Instructor::where('id',$user_id)->value('college_id');
       
        $current_semester_id = College::where('id',$College_id)->value('current_semester');


        $subjects =  subject::where('id',$request->subject_id)->paginate(5);

        $subjectStudents =  student_mark::where('subject_id',$request->subject_id)
        ->where('subject_group',$request->group_id)
        ->where('semester_id',$current_semester_id)
        ->paginate(5);;
   
        $subject_id = $request->subject_id;
        return view('instructors.Professor.Subjects.notifyEach' , compact('subjects' , 'subjectStudents' , 'subject_id'));
         
    }

public function NotifyEachAction(Request $request){
    $count_items = count($request->ids);
    $work = $request->get('work');
    $ids = $request->get('ids');
    $user_id = auth()->user()->id;
    for($i = 0; $i<$count_items; $i++)
    {

        
         if ($work[$i] == NULL) {
           
         } else {
            notification::insert(
            [
             'sender_id' =>  $user_id ,
             'reciver_id' => $ids[$i],
             'title' => $request->title,
             'message' =>$work[$i],
             'read' => 0,
             'date' => date('Y-m-d')
             
          
             ]
        );
        }
    }


    return back()->with([
        'ids' => $ids,
        'marks' => $work,
        
    ]);
    
    //return redirect('SupervisionList');
   
}
    
}
