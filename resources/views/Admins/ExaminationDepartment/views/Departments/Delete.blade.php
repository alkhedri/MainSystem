
@extends('Admins.ExaminationDepartment.layout')


@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item"><a href="{{route('DepartmentsMenu')}}">قائمة الأقسام</a>
        <li class="breadcrumb-item">حذف قسم</li>
    </li>
     
 
</ol>
@endsection


@section('content')

<div class="row">
     

    @if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('message') }}</p>
@endif
<div class="col-md-8">


        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> قائمة الأقسام
            </div>
            <div class="card-block">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>القسم</th>
                            <th>الإجراء</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($departments as $department)
                            
                   
                        <tr>
                            <td>{{$loop->index + 1 }}</td>
                            <td>{{$department->arabic_name}}</td>
                            <td>
                                <a data-confirm-delete="true" href="{{route('DepartmentsDeleteAction' , ['id' => $department->id])}}" class="btn btn-danger" >حذف</a>
                            </td>
                        
                        </tr>
                        @endforeach
               
                    </tbody>
                </table>
              
        </div>
    </div>
</div>
</div>
 
 
 
@endsection