
@extends('instructors.layout')
 
@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item">رئيس القسم</li>
    <li class="breadcrumb-item"><a href="#">هيئة التدريس</a>
    </li>
     
 
</ol>
@endsection


@section('content')

<div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                <strong>بحث</strong> عضو هيئة تدريس
            </div>
            <div class="card-block">
                <form action="{{route('InstructorSearch')}}" method="post" class="form-horizontal ">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-6">
                            <div class="input-group">
                       
                                <input type="text" id="input1-group2" name="inst_name" class="form-control" placeholder="الاسم">
                            </div>
                        </div>

                        <button type="submit" class="btn btn btn-success"><i class="fa fa-dot-circle-o"></i> بحث</button>
                    </div>
                    <a class="btn btn btn-primary" href="{{route('FacultyMembers')}}">
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
                                    <th>التخصص</th>
                                    <th>الصفة</th>
                                    <th>الاجراء</th>
                                </tr>
                            </thead>
                            <tbody>
                          
                                @foreach ($instructors as $instructor)
                                    
                             
                                <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{$instructor->arabic_name}}</td>
                                    <td>{{$instructor->specialization}}</td>
                                    <td>
                               
                                        {{App\Models\instructor::getPosition($instructor->id) }}
                                    </td>
               
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="{{route('InstructorProfile' , [ 'inst_id' => $instructor->id])}}">عرض البيانات</a>
                                        <button type="button" class="btn btn-danger btn-sm">حذف</button>
 

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                     
                        {{$instructors->links()}}
                    </div>
                </div>
            </div>
            <!--/col-->
        </div>
        </div>
  
 
 
 
 
@endsection