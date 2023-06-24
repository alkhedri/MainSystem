
@extends('instructors.layout')
 

 

  
@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item">عضو هيئة التدريس</li>
    <li class="breadcrumb-item">قائمة المقررات</a>
        <li class="breadcrumb-item">  
            <a href="{{route("marksRecord" , ['subject_id' => $subject_id])}}"> {{App\Models\subject::getSubjectName($subject_id) }}</a>
        </li>

            <li class="breadcrumb-item"> <a href="{{route('attendanceRecord' , ['subject_id' => $subject_id])}}">سجل الحضور</a> </li>
        
        <li class="breadcrumb-item"> 
            {{$recordDate}}
    </li>
     
 
</ol>
@endsection


@section('content')

                         
<div class="row" style="margin-bottom: 20px">
 
 
<div class="alert alert-primary">
    ملاحظة : خانة الحالة تقوم بعرض حالة الطالب في السجل في الوقت الحالي وبالضغط عليها يتم تغيير حالته.
</div>

</div> 
<div class="row">
     

 


    <div class="col-8">
      
 
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i>   سجل الحضور بتاريخ
                        <strong>{{$recordDate}}</strong> 
                    </div>
                    <div class="card-block">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الاسم</th>
                                    <th>رقم القيد</th>
                                    
                                    <th>الحالة</th>
                    
                                    
         
                                
                                </tr>
                            </thead>
                            <tbody>
                        
                                @foreach ($students as $student)
   
                                <tr>
                                    <td> {{$loop->index + 1}}</td>
                                     <td><strong> {{App\Models\student::getNameById($student->student_id) }}</strong> </td>
                                    <td>  {{App\Models\student::getBadgeById($student->student_id) }}</td>
                                
                                    <td>

                                @if($student->status == 1)
                                        <a href="{{route('AttendanceRecordActionUpdate' , [
                                            'student_id' => $student->student_id,
                                            'subject_id' => $subject_id,
                                            'date' => $student->date,
                                            'status' => 0,
                                        ])}}" class="btn btn-success"><strong>حضور</strong></a>

                                        @else
                                        <a href="{{route('AttendanceRecordActionUpdate' , [
                                            'student_id' => $student->student_id,
                                            'subject_id' => $subject_id,
                                            'date' => $student->date,
                                            'status' => 1,
                                        ])}}" class="btn btn-danger"><strong>غياب</strong></a>
                                    
                                    @endif
                                    </td>
                                
 
                                @endforeach
                            </tbody>
                        </table>
                        
                    </form> 
                    </div>
                </div>
            </div>
            <!--/col-->
        </div>
        </div>
  
    
 

        
@endsection
 