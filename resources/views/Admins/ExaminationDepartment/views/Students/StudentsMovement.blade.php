
@extends('Admins.ExaminationDepartment.layout')


@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item">الطلبة</li>
    <li class="breadcrumb-item"><a href="#">نقل طالب</a>
    </li>
     
 
</ol>
@endsection


@section('content')

<div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                <strong>بحث</strong> طالب
            </div>
            <div class="card-block">
                <form class="form-horizontal" action="{{ route('StudentsMovementSearch') }} " method="post">
                    
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-6">
                            <div class="input-group">
                                
                                <input type="text" id="input1-group2" name="badge" class="form-control" placeholder="رقم القيد">
                            </div>
                        </div>
                        <button type="submit" class="btn btn btn-success"><i class="fa fa-dot-circle-o"></i> بحث</button>

                        </form>
                    </div>
    </div>
   
 
</div> 

 
    <div class="col-8">
      

 
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i>قائمة الطلبة 
                    </div>
                    <div class="card-block">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الطالب</th>
                                    <th>رقم القيد</th>
                                    <th>القسم الدراسي</th>
                                    <th>الاجراء</th>
                                </tr>
                            </thead>
                            <tbody>
                          @foreach ($students as $student)
                          <tr>
                            <td>{{$loop->index + 1}}</td>
                            <td>{{$student->arabic_name}}</td>
                            <td>{{$student->badge}}</td>

                           
                            <td> {{App\Models\department::getDepNameById($student->department_id)}} </td>
                            <td>
                            
                                <a class="btn btn-primary btn-sm" href="{{ route('StudentsMovementAction' , ['id' => $student->id ]) }}">نقل</a>
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