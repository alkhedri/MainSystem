
@extends('instructors.layout')
             
@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item">رئيس القسم</li>
    <li class="breadcrumb-item"><a href=" {{ url()->previous() }}">طلبة القسم</a></li>
   
    <li class="breadcrumb-item">بيانات طالب</li>
        <li class="breadcrumb-item"><a href="#"> {{$student_arabic_name}}</a></li>
     
 
</ol>
@endsection


@section('content')
 

<div class="row">

    <div class="col-sm-4">
        <div class="card" style="">
     
            <div style="display:flex ; justify-content:center; margin-top 100px">
                <img src="/img/avatar.png" alt="" style="width : 140px ; height:140px ; margin-top 100px" class="">
            </div>
                             
                          
            <div class="card-block" style="text-align:center" >
                <div class="centerize" style="margin-top 70px">
               <h4> {{$student_arabic_name}}</h4>
            </div>
            <div class=""  >
                @foreach ($profile as $student)
   
                <p  >   <strong style="text-align:center" >القسم : {{App\Models\student::getDepNameById($student->id) }}</strong></p>
           
                <p  >   <strong style="text-align:center" > الفصل الدراسي : {{App\Models\student::StudentsSemestersCount($student->id) }}</strong></p>
                <p  >   <strong style="text-align:center" > المعدل التراكمي : {{App\Models\student::getGpaById($student->id) }}%</strong></p>
                <p  >   <strong style="text-align:center" > الوحدات المنجزة : [ {{App\Models\student::getUnitsDoneById($student->id) }} ]</strong></p>
                <p  class="alert alert-info">   <strong style="text-align:center" > حالة القيد  : [ {{App\Models\student::getEnrollmentStatus($student->enrollment_status_id) }} ]</strong></p>
           
            </div>
               
                <ul class="social mb-0 list-inline mt-3 centerize">
                    <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-facebook-f"></i></a></li>
                    <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-twitter"></i></a></li>
                    <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-instagram"></i></a></li>
                    <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-linkedin"></i></a></li>
                </ul>
          
            </div>
            @endforeach
        </div>
    </div>


    <div class="col-sm-5">
      <div class="card" style="border-radius: 10px">
                 
                            <div class="card-block">
                              
                                @foreach ($profile as $student)
                                   
                          
                                <ul class="list-group list-group-flush " style="text-align: right">
                                    <li class="list-group-item" > 
                                        الاسم بالكامل :  
                                     <strong >[ {{$student->arabic_name}} ]</strong> 
                                    </li>
                                    <li class="list-group-item" > 
                                        الاسم بالكامل :  
                                     <strong >[ {{$student->english_name}} ]</strong> 
                                    </li>


                                    <li class="list-group-item">البريدالالكتروني 
                                       :
                                        <strong>[ {{App\Models\student::getStudentEmail($student->id) }} ]</strong> </li>
                                    <li class="list-group-item">    رقم الهاتف 
                                        :
                                      <strong>[ {{$student->phone}} ] </strong> </li>
                                    <li class="list-group-item">الرقم الوطني : 
                                       <strong> [ {{$student->nat_id}} ] </strong> </li>
                                    <li class="list-group-item">الصفة : 
                                      <strong>[ {{$student->sex}} ]</strong> </li>
                                    <li class="list-group-item">تاريخ الميلاد :  
                                       <strong>[ {{$student->birth}} ]</strong> </li>
                                       <li class="list-group-item">سنة الالتحاق :  
                                        <strong>[ {{App\Models\semester::getName($student->enrollment_date) }} ]</strong> </li>
                                        <li class="list-group-item">   المشرف :  
                                            <strong>[ {{App\Models\student::getStudentSpv($student->spv_id) }} ]</strong> </li>
        
                                            
                                  </ul>
                             
                                  @endforeach

                            </div>
                        </div>
    </div>


@if((count($Students_warnings) >= 1))
    <div class="col-sm-3">
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">الانذارات</h4>
            <hr>
            <ul>
                @foreach ($Students_warnings as $warning)
                <li class="mb-0">{{App\Models\warning::getWarnInfo($warning) }}</li>
                @endforeach
              
            </ul>
             
          </div>
    </div>

    @endif
</div>

<div class="row">
    <div class="col-sm-9">
        <div class="card" style="">
            <div class="card-header">
             مقررات الفصل الحالي
            </div>
        <div class="list-group">
         
            <ul class="list-group list-group-flush list-group-item-light">
                @foreach ($Students_Subjects as $subject)

                <li class="list-group-item">
                    <span>{{$loop->index + 1 }}</span>
                     - 
                     {{App\Models\subject::getSubjectName($subject) }}
                    
                     @foreach ($profile as $student)
                                   
                     @if(App\Models\student_mark::checkDuplicate($subject , $student->id) > 1)
                     <span class="tag tag-danger">
                        -
                        
                        إعادة
                     </span>
                     @endif
                     @endforeach
                    </li>
     
                @endforeach
               
              </ul>
        </div>
          </div>
    </div>
   
</div>
 
@endsection