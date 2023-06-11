
@extends('Student.layout')
 

@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item">الطالب</li>
    <li class="breadcrumb-item"><a href="#">إضافة/اسقاط مقرر</a>
    </li>
     
 
</ol>
@endsection


@section('content')


@if(Session::has('Alert'))
<div class="alert alert-danger" role="alert">

         {{Session::get('Alert')}}
 
  </div>
@endif

@if(Session::has('Success'))
<div class="alert alert-success" role="alert">
    تم تنزيل مقرر 
    - 
         {{Session::get('Success')}} 
         
  </div>
@endif
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <strong>قائمة</strong> المقررات المتاحة
            </div>
            <div class="card-block">
                <form action="{{route('AddSubject')}}" method="post" class="form-horizontal ">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-10">
                            <div class="input-group">
                                <select id="select" name="subject_id" class="form-control input-sm" size="1">
                                    <option value="0" disabled selected>قم بإختيار مقرر</option>
                                    @foreach ($Department_subjects as $subject)
                                    <option value="{{$subject->id}}">{{$subject->arabic_name}}</option>
                                    @endforeach
                                  
                               
                                </select>
                             </div>
                        </div>
    
                    

                          
                 
                    </div>
                    <button class="btn btn-primary" type="submit">  <i class="fa fa-dot-circle-o"></i>
                        إضافة  </button>
                 </div>
    </div> 


  
</div>
      




 <div class="hidden-sm-up">

 
            <table class="table table-hover">
                <thead>
                    <tr >
                        <th style="width: 10px">#</th>
                        <th  style="text-align: right;" > اسم المقرر</th>
                        <th  style="text-align: right;">رمز المقرر</th>
                        <th  style="text-align: right;"> عدد الوحدات</th>
                        <th  style="text-align: right;">الإجراء</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($Student_subjects as $subject)
                    <tr>
                        <td style="width: 10px">{{$loop->index + 1}}</td>
                        <td  style="text-align: right;">{{ App\Models\subject::getSubjectName($subject->subject_id)}} </td>
                        <td  style="text-align: center;">{{ App\Models\subject::getSubjectCode($subject->subject_id)}} </td>
                        <td  style="text-align: center;">{{ App\Models\subject::getSubjectUnits($subject->subject_id)}} </td>
                        <td  style="text-align: center;">
                        <a   href="{{route('DropSubject' , ['subject_id' =>  $subject->id])}}" class="btn btn-danger btn-sm"   >اسقاط</a>
                        </td>
                    </tr>
                    @endforeach
            
                    
                </tbody>
            </table>
    
        
  </div>
<div class="col-xs-12 hidden-sm-down " dir="rtl">


                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i> المقررات
                        </div>
                        <div class="card-block">
                            <table class="table table-hover">
                                <thead>
                                    <tr >
                                        <th style="width: 10px">#</th>
                                        <th  style="text-align: right;" >اسم المقرر</th>
                                        <th  style="text-align: center;">رمز المقرر</th>
                                        <th  style="text-align: center;"> عدد الوحدات</th>
                                        <th  style="text-align: center;">الإجراء</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($Student_subjects as $subject)
                                    <tr>
                                        <td style="width: 10px">{{$loop->index + 1}}</td>
                                        <td  style="text-align: right;">{{ App\Models\subject::getSubjectName($subject->subject_id)}} </td>
                                        <td  style="text-align: center;">{{ App\Models\subject::getSubjectCode($subject->subject_id)}} </td>
                                        <td  style="text-align: center;">{{ App\Models\subject::getSubjectUnits($subject->subject_id)}} </td>
                                        <td  style="text-align: center;">
                                        <a   href="{{route('DropSubject' , ['subject_id' =>  $subject->id])}}" class="btn btn-danger btn-sm"  >اسقاط</a>
                                        </td>
                                    </tr>
                                    @endforeach
                            
                                    
                                </tbody>
                            </table>
                    
                        </div>
                     
                    </div>
           
                    <div class="alert alert-primary" role="alert">
                        <p> إجمالي عدد الوحدات   : [ {{$units}} ]</p>
                       <hr>
                       
                     </div>
</div>

 
 

@endsection