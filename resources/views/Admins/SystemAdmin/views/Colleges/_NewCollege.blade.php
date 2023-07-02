
@extends('Admins.SystemAdmin.layout')


@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الكليات</li>
    <li class="breadcrumb-item">قائمة الكليات</li>
    <li class="breadcrumb-item">جديد</li>
     
 
</ol>
@endsection


@section('content')
 
<div class="row">
 

    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
               
                <i class="fa fa-edit"></i>
                <strong>إضافة</strong> 
                <span>  كلية  </span>
     
            </div>
            <div class="card-block">
                <form class="form-horizontal" action="{{ route('NewCollegeActionAdd') }} " method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-control-label" for="prependedInput">اسم الكلية  [بالعربي]</label>
                        <div class="controls">
                            <div class="input-prepend input-group">
                                <input id="prependedInput" class="form-control" size="16" type="text"  name="arabic_name">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-control-label" for="prependedInput">اسم الكلية  [انجليزي]</label>
                        <div class="controls">
                            <div class="input-prepend input-group">
                                <input id="prependedInput" class="form-control" size="16" type="text"  name="english_name">
                            </div>
                        </div>
                    </div>         
                    <div class="form-actions" dir="ltr">
                        <button type="submit" class="btn btn-primary">حفظ</button>
             
                    </div>
                </form>
            </div>
        </div>
    </div>

  
 
 
@endsection