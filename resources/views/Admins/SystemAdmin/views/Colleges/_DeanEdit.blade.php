
@extends('Admins.SystemAdmin.layout')





@section('breadcramp')
<ol class="breadcrumb">
 
    <li class="breadcrumb-item">الكليات</li>
    <li class="breadcrumb-item"><a href="{{route('CollegesMenu')}}">قائمة الكليات</a></li>
    <li class="breadcrumb-item"><a href="{{route('CollegeInfo' , ['id' => $college_id])}}">{{ App\Models\college::getNameById($college_id)}}</a></li>
    <li class="breadcrumb-item">  العميد =>  {{ App\Models\Instructor::getInstructorsName($dean)}}</li>
    
    
                                     
</ol>
@endsection


@section('content')
 
@section('content')

<div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                <strong>بحث</strong> عضو هيئة تدريس
            </div>
            <div class="card-block">
                <form action="{{route('serach_CollegeDean')}}" method="post" class="form-horizontal ">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-6">
                            <div class="input-group">
                       
                                <input type="text" id="input1-group2" name="name" class="form-control" placeholder="الاسم">
                            </div>
                        </div>
                        <input type="hidden" id="input1-group2" name="id" value="{{$college_id}}">
                           
                        <button type="submit" class="btn btn btn-success"><i class="fa fa-dot-circle-o"></i> بحث</button>
                    </div>
                    <a class="btn btn btn-primary" href="{{route('CollegeDean' , ['id' => $college_id ])}}">
                        
                        <i class="fa fa-dot-circle-o"></i>
                          عرض الكل
                    </a>
    </div>
   
                        
</div> 

 
    <div class="col-8">
      

 
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i>قائمة اعضاء هيئة التدريس 
                    </div>
                    <div class="card-block">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الاسم</th>
                                    <th>القسم</th>
                            
                                    <th>الاجراء</th>
                                </tr>
                            </thead>
                            <tbody>
                          
                                @foreach ($staff as $instructor)
                                    
                             
                                <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td> <strong>{{$instructor->arabic_name}}</strong></td>
                                    <td>{{ App\Models\department::getDepNameById($instructor->department_id)}}</td>
                                     
               
                                    <td>
                                        <a class="btn btn-primary btn-sm" 
                                        href="{{route('set_CollegeDean' , [ 'dean' => $instructor->id , 'college_id' => $college_id])}}"
                                        >تعيين عميد</a>
                                 

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                     
                        {{$staff->links()}}
                    </div>
                </div>
            </div>
            <!--/col-->
        </div>
        </div>
  
 
 
 
@endsection