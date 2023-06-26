
@extends('instructors.layout')
 

@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item">منسق الدراسة و الامتحانات</li>
    <li class="breadcrumb-item"><a href="#">الاشراف</a>
    </li>
 
</ol>
@endsection


@section('content')

<div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                <strong>  فرز  </strong> حسب المشرف
            </div>
            <div class="card-block">
                <form action="{{route('SupervisorSearch')}}" method="post" class="form-horizontal ">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-6">
                            <div class="input-group">
                                <select id="select" name="selectedSpv" class="form-control" size="1">
                                    <option value="0">المشرف</option>
               @foreach ($instructors as $instructor)
               <option value="{{$instructor->id}}">{{$instructor->arabic_name}}</option>
               @endforeach
                                </select>
                                
                            </div>
                        </div>
                        <button type="submit" class="btn btn btn-success"><i class="fa fa-dot-circle-o"></i> فرز</button>
                    </div>
                    <a  href="{{route('Supervision')}}" class="btn btn btn-primary"><i class="fa fa-dot-circle-o"></i>       عرض الكل     </a>
    </div>
   
   
</div> 

 
    <div class="col-8">
      

 
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i>قائمة الطلبة 
                    </div>
                    <div class="card-block">
                        <table class="table table-hover table-outline">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الطالب</th>
                                    <th>رقم القيد</th>
                                    <th>المشرف</th>
                                    <th>الاجراء</th>
                                </tr>
                            </thead>
                            <tbody>
                          
                                @foreach ($students as $student)
                                    
                              
                                <tr>
                                    <td> {{$loop->index + 1}}</td>
                                    <td> <strong>{{$student->arabic_name}}</strong></td>
                                    <td>{{$student->Badge}}</td>
                                    <td>
                                        <form></form>
                                        <form id="change-form{{$student->id}}" action="{{route('SupervisorUpdateAction')}}" method="post">
                                            @csrf
                                             <select id="select" name="spvid" class="form-control" size="1">
                                                <option value="0" selected hidden ><strong>{{App\Models\student::getStudentSpv($student->spv_id) }} </strong></option>
                                                @foreach ($instructors as $instructor)
                                                <option  class="bg-primary"value="{{$instructor->id}}"> {{$instructor->arabic_name}}</option>
                                                @endforeach
                                             </select>
                                             <input type="hidden" name="id" value="{{$student->id}}">
                                        </form>
                                        </td>
                                     
                                    <td>
                                        <a class="btn btn-primary" href="{{route('SupervisorUpdateAction')}}"
                                        onclick="event.preventDefault();
                                                      document.getElementById('change-form{{$student->id}}').submit();">
                                         {{ __('تغيير') }}
                                     </a>
                                         
                                  
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                         {{$students->links()}}
                    </div>
                </div>
            </div>
            <!--/col-->
        </div>
        </div>
  
 
 
 
 
@endsection