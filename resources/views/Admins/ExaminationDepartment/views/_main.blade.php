
@extends('Admins.ExaminationDepartment.layout')


@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item"><a href="#">بيانات الطالب</a>
    </li>
     
 
</ol>
@endsection


@section('content')

<div class="row">
  
</div>
 
    <!--- subject card STARTS---->
    <div class="col-xs-6 col-lg-3">
        <div class="card">
            <div class="card-block p-a-1 clearfix">
                <i class="icon-book-open bg-info p-a-1 font-2xl m-r-1 pull-left"></i>
                <div class="h5 text-info m-b-0 m-t-h">قسم الحاسب الالى وتقنية المعلومات</div>
                <div class="text-muted text-uppercase font-weight-bold font-xs">CET250</div>
            </div>
            <div class="card-footer p-x-1 p-y-h">
                <div class=" text-center">
                    <button type="button" class="btn btn-secondary btn-block" data-toggle="tooltip" data-placement="right" title="عرض"><i class="icon-bubbles"> </i>
                        عرض
                    </button>
                  
                    </div>
                 </div>
        </div>
    </div>
 
    <!--- subject card STARTS---->
    <div class="col-xs-6 col-lg-3">
        <div class="card">
            <div class="card-block p-a-1 clearfix">
                <i class="icon-book-open bg-info p-a-1 font-2xl m-r-1 pull-left"></i>
                <div class="h5 text-info m-b-0 m-t-h">قسم الهندسة الميكانيكية</div>
                <div class="text-muted text-uppercase font-weight-bold font-xs">CET250</div>
            </div>
            <div class="card-footer p-x-1 p-y-h">
                <div class=" text-center">
                    <button type="button" class="btn btn-secondary btn-block" data-toggle="tooltip" data-placement="right" title="عرض"><i class="icon-bubbles"> </i>
                        عرض
                    </button>
                  
                    </div>
                 </div>
        </div>
    </div>
    
    <!--- subject card STARTS---->
    <div class="col-xs-6 col-lg-3">
        <div class="card">
            <div class="card-block p-a-1 clearfix">
                <i class="icon-book-open bg-info p-a-1 font-2xl m-r-1 pull-left"></i>
                <div class="h5 text-info m-b-0 m-t-h">قسم الهندسة المدنية</div>
                <div class="text-muted text-uppercase font-weight-bold font-xs">CET</div>
            </div>
            <div class="card-footer p-x-1 p-y-h">
                <div class=" text-center">
                    <button type="button" class="btn btn-secondary btn-block" data-toggle="tooltip" data-placement="right" title="عرض"><i class="icon-bubbles"> </i>
                        عرض
                    </button>
                  
                    </div>
                 </div>
        </div>
    </div>
@endsection