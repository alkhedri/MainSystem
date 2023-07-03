
@extends('instructors.layout')
 
@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item">رئيس القسم</li>
    <li class="breadcrumb-item"><a href="#">بيانات عضو هيئة التدريس</a>
    </li>
     
 
</ol>
@endsection


@section('content')
 

<div class="row">

    <div class="col-sm-3">
        <div class="card" style="">
     
            <div style="display:flex ; justify-content:center; margin-top 70px">
                <img src="/img/avatar.png" alt="" style="width : 200px ; height:200px ; margin-top 70px" class="">
            </div>
            @foreach ($profile as $instructor)
                                   
                          
            <div class="card-block">
                <div class="centerize" style="margin-top 70px">
               <h4>{{$instructor->arabic_name}}</h4>
            </div>
            <div class="centerize"  >
                <p> التخصص : <strong>{{$instructor->specialization}}</strong></p> <br>
               
            </div>
            <div class="centerize"  >
                <p> الرقم الجامعي : <strong>{{$instructor->job_id}}</strong></p> 
                
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
                              
                                @foreach ($profile as $instructor)
                                   
                          
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"> 
                                        الاسم بالكامل :   <strong>{{$instructor->arabic_name}} </strong>
                                    </li>
                                    <li class="list-group-item">البريدالالكتروني <strong>{{App\Models\instructor::getInstructorEmail($instructor->id) }} </strong></li>
                                    <li class="list-group-item">    رقم الهاتف <strong>{{$instructor->phone}} </strong></li>
                                    <li class="list-group-item">الرقم الوطني : <strong> {{$instructor->nat_id}} </strong></li>
                                    <li class="list-group-item">الصفة : <strong> {{$instructor->sex}} </strong></li>
                                    <li class="list-group-item">تاريخ الميلاد :  <strong> {{$instructor->birth}} </strong></li>
                                    <li class="list-group-item">سنة الالتحاق :  <strong> {{$instructor->enrollment}} </strong></li>
                                  </ul>
                             
                                  @endforeach

                            </div>
                        </div>
    </div>


</div>

<div class="row">
    <div class="col-sm-9">
        <div class="card" style="">
            <div class="card-header">
             مقررات الفصل الحالي
            </div>
        <div class="list-group">
         
            <ul class="list-group list-group-flush list-group-item-light">
                @foreach ($subjects as $subject)
                    <li  class="list-group-item">{{$loop->index + 1}} 
                         <strong> - [ {{$subject->arabic_name }} ]</strong>  

                      
                            <strong> <span style="color:green"> [ {{$subject->code }} ] </span> 
                            </strong>
                       
                       </li>
                @endforeach
              
              </ul>
        </div>
          </div>
    </div>
   
</div>
 
@endsection