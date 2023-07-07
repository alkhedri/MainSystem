
@extends('Admins.ExaminationDepartment.layout')


@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item"><a href="{{route('DepartmentsMenu')}}">قائمة الأقسام</a>
    </li>
     
 
</ol>
@endsection


@section('content')

<div class="row">
    <div class="col-md-10">
       
    </div>
    <div class="col-md-2 p-a-1">
        <a class="btn btn-outline-primary" href="{{ route('NewDepartments') }}"><i class="fa fa-star"></i>&nbsp; إضافة قسم</a>
        
    </div>
   
</div>
@foreach($departments as $department)
 
    <!--- subject card STARTS---->
    <div class="col-xs-6 col-lg-3">
        <div class="card">
            <div class="card-block p-a-1 clearfix">
                <i class=" pull-left">
                    <img src="{{ Storage::url("/departments/$department->icon") }}" class="img-avatar" alt="الشعار" style="width: 90px; height:90px">
                   

                </i>
                <div class="h5 text-info m-b-0 m-t-h">قسم  <span>{{$department->arabic_name  }}</span></div>
                <div class="text-muted text-uppercase font-weight-bold h6"><strong>{{$department->code  }}</strong></div>
            </div>
            <div class="card-footer p-x-1 p-y-h">
                <div class=" text-center">
                    <a href="{{route('DepartmentsInfo', ['id' => $department->id])}}" class="btn btn-secondary btn-block" data-toggle="tooltip" data-placement="right" title="عرض"><i class="icon-bubbles"> </i>
                        عرض
                    </a>
                  
                    </div>
                 </div>
        </div>
    </div>
 
    @endforeach
    
 
 
@endsection