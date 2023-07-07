
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
@permission('subjects-create')
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
                                <select id="myop" name="subject_id" class="form-control input-sm" size="1">
                                    <option value="0" disabled selected>قم بإختيار مقرر</option>
                                    @foreach ($Department_subjects as $subject)
                                    <option value="{{$subject->id}}">{{$subject->arabic_name}}</option>
                                    @endforeach
                                  
                               
                                </select>
                             </div>
                        </div>
                    </div>
                        <div class="form-group row">
                            
                                <div class="input-group">
                             <label class="col-md-3" for="">المجموعة : </label> 
                                <div class="col-md-3">
                                    <select id="my-select" name="subject_group" class="form-control input-sm" size="1">
                             
                                         
                                      
                                   
                                    </select>
                                 </div>
                            </div>

                          
                 
                    </div>
                    <button class="btn btn-primary" type="submit">  <i class="icon-plus"></i>
                        إضافة       </button>
                 </div>
    </div> 


  
</div>
      

@endpermission


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
                            
                        <a  data-confirm-delete="true" href="{{route('DropSubject' , ['subject_id' =>  $subject->id])}}" class="btn btn-danger btn-sm 
                            "   >
                            <i class="icon-close"></i>
                            اسقاط</a>
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
                                        <th  style="text-align: center;" >اسم المقرر</th>
                                        <th  style="text-align: center;">رمز المقرر</th>
                                        <th  style="text-align: center;"> عدد الوحدات</th>
                                        <th  style="text-align: center;">الإجراء</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($Student_subjects as $subject)
                                    <tr>
                                        <td style="width: 10px">{{$loop->index + 1}}</td>
                                        <td  style="text-align: center;"> <strong>{{ App\Models\subject::getSubjectName($subject->subject_id)}}</strong> </td>
                                        <td  style="text-align: center;">{{ App\Models\subject::getSubjectCode($subject->subject_id)}} </td>
                                        <td  style="text-align: center;">{{ App\Models\subject::getSubjectUnits($subject->subject_id)}} </td>
                                        <td  style="text-align: center;">
                                        <a  data-confirm-delete="true" href="{{route('DropSubject' , ['subject_id' =>  $subject->id])}}" class="btn btn-danger btn-sm"  >
                                            <i class="icon-close"></i>
                                            اسقاط      </a>
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

@section('js-scripts')
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<script>
 
 



$('#myop').change(function(){
    var id = document.getElementById("myop").value;
   var i = 0;
  
    $.ajax({ 
         url: "{{ route('getGroups') }}",
         data: {"subject_id":id},
         type: 'get',
         success: function(result){
             
               
              $("#my-select").empty();
              var xY = 'A'
         
              for(x = 0 ; x < result.data ; x++){
             
        var option = document.createElement("option");
        option.text = xY;
        option.value = x;
        var select = document.getElementById("my-select");
        select.appendChild(option);
        xY = String.fromCharCode(xY.charCodeAt() + 1)
       }


         }
        });

        
      
    

})




       

</script>


@endsection
