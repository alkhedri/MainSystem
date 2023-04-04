
@extends('instructors.layout')
 
@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item">منسق الدراسة و الامتحانات</li>
    <li class="breadcrumb-item"><a href="#">المقررات</a>
        <li class="breadcrumb-item"><a href="#">اضافة مقرر</a>
    </li>
     
 
</ol>
@endsection


@section('content')
 
    <div class="row">

        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-edit"></i> إضافة المقرر
                    <div class="card-actions">
                        <a href="#" class="btn-setting"><i class="icon-settings"></i></a>
                        <a href="#" class="btn-minimize"><i class="icon-arrow-up"></i></a>
                        <a href="#" class="btn-close"><i class="icon-close"></i></a>
                    </div>
                </div>
                <div class="card-block">
                                <form action="" method="post" class="form-horizontal ">
                                    <div class="form-group row">
                                        <label class="col-lg-4 form-control-label" for="input-small">اسم المقرر [عربي]</label>
                                        <div class="col-lg-7">
                                            <input type="text" id="input-small" name="input-small" class="form-control input-md" placeholder=".input-sm">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 form-control-label" for="input-normal">اسم المقرر [انجليزي]</label>
                                        <div class="col-lg-7">
                                            <input type="text" id="input-normal" name="input-normal" class="form-control" placeholder="Normal">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 form-control-label" for="input-large">رمز المقرر</label>
                                        <div class="col-lg-6">
                                            <input type="text" id="input-large" name="input-large" class="form-control input-lg" placeholder=".input-lg">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 form-control-label" for="input-large">عدد الوحدات</label>
                                        <div class="col-lg-6">
                                            <input type="text" id="input-large" name="input-large" class="form-control input-lg" placeholder=".input-lg">
                                        </div>
                                    </div>
                                    <div class="form-actions" dir="ltr">
                                        <button type="submit" class="btn btn-primary">إضافة</button>
                                        <button type="button" class="btn btn-default">Cancel</button>
                                    </div>
                                </form>
                            </div>
        </div>
        <!--/col-->
    </div>
 
 
</div>
 
 
 
@endsection