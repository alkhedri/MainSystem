
@extends('instructors.layout')
@foreach ($profile as $student)
                
@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item">رئيس القسم</li>
    <li class="breadcrumb-item">بيانات طالب</li>
        <li class="breadcrumb-item"><a href="#"> {{$student->arabic_name}}</a></li>
     
 
</ol>
@endsection


@section('content')
 

<div class="row">

    <div class="col-sm-3">
        <div class="card" style="">
     
            <div style="display:flex ; justify-content:center; margin-top 100px">
                <img src="img/avatar.png" alt="" style="width : 180px ; height:180px ; margin-top 100px" class="">
            </div>
                             
                          
            <div class="card-block">
                <div class="centerize" style="margin-top 70px">
               <h4>{{$student->arabic_name}}</h4>
            </div>
            <div class="centerize"  >
                <p>   <strong>{{App\Models\student::getDepNameById($student->id) }}</strong></p>
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


    <div class="col-sm-6">
      <div class="card" style="border-radius: 10px">
                 
                            <div class="card-block">
                              
                                @foreach ($profile as $student)
                                   
                          
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"> 
                                        الاسم بالكامل :   <strong>{{$student->arabic_name}} </strong>
                                    </li>
                                    <li class="list-group-item">البريدالالكتروني <strong>{{App\Models\student::getStudentEmail($student->id) }} </strong></li>
                                    <li class="list-group-item">    رقم الهاتف <strong>{{$student->phone}} </strong></li>
                                    <li class="list-group-item">الرقم الوطني : <strong> {{$student->nat_id}} </strong></li>
                                    <li class="list-group-item">الصفة : <strong> {{$student->sex}} </strong></li>
                                    <li class="list-group-item">تاريخ الميلاد :  <strong> {{$student->birth}} </strong></li>
                                    <li class="list-group-item">سنة الالتحاق :  <strong> {{$student->enrollment}} </strong></li>
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

                <li class="list-group-item"><span>{{$loop->index + 1 }}</span> - {{App\Models\subject::getSubjectName($subject) }}</li>
     
                @endforeach
               
              </ul>
        </div>
          </div>
    </div>
   
</div>
 
@endsection