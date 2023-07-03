
@extends('Admins.SystemAdmin.layout')





@section('breadcramp')
<ol class="breadcrumb">
 
    <li class="breadcrumb-item">الكليات</li>
    <li class="breadcrumb-item"><a href="{{route('CollegesMenu')}}">قائمة الكليات</a></li>
    <li class="breadcrumb-item">حذف كلية</li>
    
    
                                     
</ol>
@endsection


@section('content')

<div class="row">
     
 
<div class="col-md-8">


        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> قائمة الكليات
            </div>
            <div class="card-block">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>الكلية</th>
                            <th>الإجراء</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Colleges as $College)
                            
                   
                        <tr>
                            <td>{{$loop->index + 1 }}</td>
                            <td>{{$College->arabic_name}}</td>
                            <td>
                                <a data-confirm-delete="true" href="{{route('deleteCollegeAction' , ['id' => $College->id])}}" class="btn btn-danger" >حذف</a>
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