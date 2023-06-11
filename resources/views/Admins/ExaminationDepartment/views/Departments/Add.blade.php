
@extends('Admins.ExaminationDepartment.layout')


@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item">الاقسام الدراسية</li>
    <li class="breadcrumb-item"><a href="{{route('DepartmentsMenu')}}">قائمة الأقسام</a>
    <li class="breadcrumb-item"><a href="#"> إضافة قسم جديد</a>
    </li>
     
 
</ol>
@endsection


@section('content')
 
<div class="row">
 

    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
               
                <i class="fa fa-edit"></i>
                <strong>قسم</strong> 
                <span>  جديد  </span>
                <div class="card-actions">
                    <a href="#" class="btn-setting"><i class="icon-settings"></i></a>
                    <a href="#" class="btn-minimize"><i class="icon-arrow-up"></i></a>
                    <a href="#" class="btn-close"><i class="icon-close"></i></a>
                </div>
            </div>
            <div class="card-block">
                <form class="form-horizontal" action="{{ route('AddDepartments') }} " method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-control-label" for="prependedInput">اسم القسم  [بالعربي]</label>
                        <div class="controls">
                            <div class="input-prepend input-group">
                                <input id="prependedInput" class="form-control" size="16" type="text"  name="arabic_name">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-control-label" for="prependedInput">اسم القسم  [انجليزي]</label>
                        <div class="controls">
                            <div class="input-prepend input-group">
                                <input id="prependedInput" class="form-control" size="16" type="text"  name="english_name">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-control-label" for="appendedInput">رمز القسم</label>
                        <div class="controls">
                            <div class="input-group">
                                <input id="appendedInput" class="form-control" size="16" type="text"   name="code">
                                
                            </div>
                        
                        </div>
                    </div>
 
                    <input id="id" type="hidden"    name="id">
                                
                    <div class="form-actions" dir="ltr">
                        <button type="submit" class="btn btn-primary">حفظ</button>
                        <button type="button" class="btn btn-default">الغاء</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

  
 
 
@endsection