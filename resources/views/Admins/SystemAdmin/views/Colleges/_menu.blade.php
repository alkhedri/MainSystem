
@extends('Admins.SystemAdmin.layout')


@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الكليات</li>
    <li class="breadcrumb-item">قائمة الكليات</li>
     
 
</ol>
@endsection


@section('content')

<div class="row">
    <div class="col-md-10">
       
    </div>
    <div class="col-md-2 p-a-1">
        <a class="btn btn-primary" href="{{ route('NewCollege') }}"><i class="fa fa-star"></i>&nbsp; إضافة كلية</a>
        
    </div>
   
</div>
@foreach($Colleges as $College)
 
    <!--- subject card STARTS---->
    <div class="col-xs-6 col-lg-3">
        <div class="card border border-info">
            <div class="card-block p-a-1 clearfix">
                <i class=" pull-left">
                     
                   
                    <img src="{{ Storage::url("/colleges/$College->icon") }}" style="width: 90px; height:90px">
                    

                </i>
                <div class="h5 text-info m-b-0 m-t-h">كلية  <span>{{$College->arabic_name  }}</span></div>
                <div class="text-muted text-uppercase font-weight-bold h6"><strong>{{$College->english_name  }}</strong></div>
            </div>
            <div class="card-footer p-x-1 p-y-h">
                <div class=" text-center">
                    <a href="{{route('CollegeInfo' , ['id' => $College->id ])}}" class="btn btn-secondary btn-block" data-toggle="tooltip" data-placement="right" title="عرض بيانات الكلية"><i class="icon-magnifier-add"> </i>
                              عرض
                    </a>
                  
                    </div>
                 </div>
        </div>
    </div>
 
    @endforeach
    
 
 
@endsection