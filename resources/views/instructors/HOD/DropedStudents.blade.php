
@extends('instructors.layout')
 

@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item">رئيس القسم</li>
    <li class="breadcrumb-item"><a href="#">الطلبة المتعثرين</a>
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
                <form action="" method="post" class="form-horizontal ">
                    <div class="form-group row">
                        <div class="col-md-6">
                            <div class="input-group">
                       
                                <input type="text" id="input1-group2" name="input1-group2" class="form-control" placeholder="رقم القيد">
                            </div>
                        </div>
                        <button type="submit" class="btn btn btn-success"><i class="fa fa-dot-circle-o"></i> بحث</button>
                    </div>
    </div>
   
 
</div> 

 
    <div class="col-8">
      

 
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i>قائمة الطلبة 
                        -
                        [{{$count}}]
                    </div>
                    <div class="card-block">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الطالب</th>
                                    <th>رقم القيد</th>
                                   
                                    <th>المعدل التراكمي</th>
                                    <th>الوحدات المنجزة</th>
                     
                                    <th>الاجراء</th>
                                </tr>
                            </thead>
                            <tbody>
                          @foreach ($students as $student)
                              
                   
                                <tr>
                                    <td> {{ $loop->index + 1}}</td>
                                    <td>  {{App\Models\student::getNameById($student->student_id) }}</td>
                                    <td> {{App\Models\student::getBadgeById($student->student_id) }}</td>
                                    <td>{{App\Models\student::getGpaById($student->student_id) }}</td>
                                    <td>{{App\Models\student::getUnitsDoneById($student->student_id) }}</td>
                                    <td>
                                      
                                      <a href="{{route('StudentsProfile' , ['id' => $student->student_id])}}" class="btn btn-primary btn-sm">عرض البيانات</a>
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