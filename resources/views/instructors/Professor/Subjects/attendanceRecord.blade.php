
@extends('instructors.layout')
 

 

@foreach ($subjects as $subject)


 

  
@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item">عضو هيئة التدريس</li>
    <li class="breadcrumb-item">قائمة المقررات</a>
        <li class="breadcrumb-item"><a href="#">{{$subject->arabic_name}}</a>
        
    </li>
     
 
</ol>
@endsection


@section('content')

 
@if(Session::has('notexist'))
<p class="alert {{ Session::get('alert-class', 'alert-success') }}"><strong>{{ Session::get('notexist') }}</strong></p>
@endif      
@if(Session::has('exist'))
<p class="alert {{ Session::get('alert-class', 'alert-danger') }}"> <strong>{{ Session::get('exist') }}</strong></p>
@endif      
@if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-danger') }}"> <strong>{{ Session::get('message') }}</strong></p>
@endif      
         


<div class="row" style="margin-bottom: 20px">

    <div class="col-lg-8">

 
    <a href="{{route('marksRecord' , ['subject_id' => $subject_id])}}" class="btn btn-primary btn-md"><i class="icon-layers"></i>  تعديل الدرجات</a>
    <a href="{{route('attendanceRecord' , ['subject_id' => $subject_id])}}" class="btn btn-success btn-md"><i class="icon-people"></i>  سجل الحضور</a>
    <a href="{{route('examsDate' , ['subject_id' => $subject_id])}}" class="btn btn-primary btn-md"><i class="icon-calendar"></i>  مواعيد الامتحانات</a>
</div>

    <div class="col-lg-2"  >
        <a style="padding-left: 5px"class="btn btn-primary" href="{{route('AttendanceRecordAction', ['subject_id' => $subject_id])}}">إضافة سجل جديد [تاريخ اليوم]</a>
 
    </div>
    <div class="col-lg-2">
         
        <a class="btn btn-primary" href="{{route('AttendanceSheet', ['subject_id' => $subject_id])}}">طباعة السجل</a>

    </div>


</div> 

  
<div class="row">
     
                  
 


    <div class="col-8">
      
     
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i>قائمة السجلات 
                    </div>
                    <div class="card-block">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th style="text-align: center">التاريخ</th>
                                    <th style="text-align: center">عدد الحضور</th>
                   
                                    <th style="text-align: center">عدد الغياب</th>
                                    <th style="text-align: center">الاجراء</th>
                                    
         
                                
                                </tr>
                            </thead>
                            <tbody>
                        
                                @foreach ($recordsDates as $records)
   
                                <tr>
                                    <td> {{$loop->index + 1}}</td>
                                     <td style="text-align: center"class="font-weight-bold"> {{$records->date}} </td>
                                    <td style="text-align: center">
                                        <p class="text-success font-weight-bold " style="text-align: center">
                                            {{App\Models\student_attendanceRecord::CountPresent($records->date ,$subject_id) }}
                                        </p>
                                        
                                    </td >
                               
                                    <td style="text-align: center"> 
                                        <p class="text-danger font-weight-bold">
                                            
                                            {{App\Models\student_attendanceRecord::CountUpsent($records->date ,$subject_id) }}
                                        </p>
                                     
                                    </td>
                                    <td style="text-align: center">

                                
                                        <a class="btn btn-primary" href="{{route('attendanceEdit' , ['date' => $records->date , 'subject_id' => $subject->id] )}}">عرض</a>
                                        <a data-confirm-delete="true" class="btn btn-danger" href="{{route('attendanceDelete' , ['date' => $records->date , 'subject_id' => $subject->id] )}}">حذف</a>
                                    
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
@endforeach
