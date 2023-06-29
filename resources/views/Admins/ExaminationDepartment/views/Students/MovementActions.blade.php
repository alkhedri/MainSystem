
@extends('Admins.ExaminationDepartment.layout')


@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item">الطلبة</li>
    <li class="breadcrumb-item"><a href="{{route('StudentsMovement')}}">نقل الطلبة</a>  </li>
    <li class="breadcrumb-item">نقل طالب  </li>
    <li class="breadcrumb-item">   {{App\Models\student::GetNameById($student_id)}}</li>

 
  
     
 
</ol>
@endsection


@section('content')

<div class="row">
 
                    @if(Session::has('message'))
                    <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('message') }}</p>
                    @endif
   
 
</div> 

 
    <div class="col-8">
      

 
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i>قائمة الاقسام الدراسية 
                    </div>
                    <div class="card-block">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>القسم</th>
                                    <th>الاجراء</th>
                                </tr>
                            </thead>
                            <tbody>
                          @foreach ($departments as $department)
                          <tr>
                            <td>{{$loop->index + 1}}</td>
                            <td> {{$department->arabic_name}}</td>
                           
                            
                            <td>
                               
                                <a class="btn btn-primary btn-sm" href="{{route('StudentsMovementActionDone' , ['newDepId' => $department->id , 'student_id' => $student_id])}}">نقل</a>
                            </td>
                        </tr>
       
                          @endforeach
                               
                            </tbody>
                        </table>
                   {{$departments->links()}}
                    </div>
                </div>
            </div>
            <!--/col-->
        </div>
        </div>
  
 
 
 
 
@endsection