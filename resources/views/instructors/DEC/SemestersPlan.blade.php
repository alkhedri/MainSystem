
@extends('instructors.layout')
 
@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item">منسق الدراسة و الامتحانات</li>
    <li class="breadcrumb-item"><a href="#">الخطة الدراسية</a>
    </li>
     
 
</ol>
@endsection


@section('content')
 
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-edit"></i>الخطة الدراسية
                    <div class="card-actions">
                        <a href="#" class="btn-setting"><i class="icon-settings"></i></a>
                        <a href="#" class="btn-minimize"><i class="icon-arrow-up"></i></a>
                        <a href="#" class="btn-close"><i class="icon-close"></i></a>
                    </div>
                </div>
                <div class="card-block">
                                <form action="" method="post" class="form-horizontal ">
                                    <div class="form-group row">
                                        <label class="col-lg-2 form-control-label" for="input-small">تجديد القيد :</label>
                                        <div class="col-lg-4">
                                            <input type="text" id="input-small" name="input-small" class="form-control input-md" placeholder=".input-sm">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 form-control-label" for="input-normal">تنزيل المواد</label>
                                        <div class="col-lg-6">
                                            <input type="text" id="input-normal" name="input-normal" class="form-control" placeholder="Normal">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 form-control-label" for="input-large">تنسيب الطلبة للأقسام العلمية</label>
                                        <div class="col-lg-6">
                                            <input type="text" id="input-large" name="input-large" class="form-control input-lg" placeholder=".input-lg">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 form-control-label" for="input-large">بداية الدراسة</label>
                                        <div class="col-lg-6">
                                            <input type="text" id="input-large" name="input-large" class="form-control input-lg" placeholder=".input-lg">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 form-control-label" for="input-large">نهاية الدراسة</label>
                                        <div class="col-lg-6">
                                            <input type="text" id="input-large" name="input-large" class="form-control input-lg" placeholder=".input-lg">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 form-control-label" for="input-large">أخر موعد للإضافة</label>
                                        <div class="col-lg-6">
                                            <input type="text" id="input-large" name="input-large" class="form-control input-lg" placeholder=".input-lg">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 form-control-label" for="input-large">أخر موعد للحذف</label>
                                        <div class="col-lg-6">
                                            <input type="text" id="input-large" name="input-large" class="form-control input-lg" placeholder=".input-lg">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 form-control-label" for="input-large">الامتحانات النصفية الاولى</label>
                                        <div class="col-lg-6">
                                            <input type="text" id="input-large" name="input-large" class="form-control input-lg" placeholder=".input-lg">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 form-control-label" for="input-large">أخر موعد لايقاف القيد</label>
                                        <div class="col-lg-6">
                                            <input type="text" id="input-large" name="input-large" class="form-control input-lg" placeholder=".input-lg">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 form-control-label" for="input-large">الامتحانات النصفية الثانية</label>
                                        <div class="col-lg-6">
                                            <input type="text" id="input-large" name="input-large" class="form-control input-lg" placeholder=".input-lg">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 form-control-label" for="input-large">موعد اخر محاضرة</label>
                                        <div class="col-lg-6">
                                            <input type="text" id="input-large" name="input-large" class="form-control input-lg" placeholder=".input-lg">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 form-control-label" for="input-large">الامتحانات النهائية</label>
                                        <div class="col-lg-6">
                                            <input type="text" id="input-large" name="input-large" class="form-control input-lg" placeholder=".input-lg">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 form-control-label" for="input-large">موعد اعتماد النتيجة</label>
                                        <div class="col-lg-6">
                                            <input type="text" id="input-large" name="input-large" class="form-control input-lg" placeholder=".input-lg">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 form-control-label" for="input-large">تقديم طلبات المراجعة</label>
                                        <div class="col-lg-6">
                                            <input type="text" id="input-large" name="input-large" class="form-control input-lg" placeholder=".input-lg">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 form-control-label" for="input-large">النظر في طلبات المراجعة</label>
                                        <div class="col-lg-6">
                                            <input type="text" id="input-large" name="input-large" class="form-control input-lg" placeholder=".input-lg">
                                        </div>
                                    </div>
                                
                                </form>
                            </div>
        </div>
        <!--/col-->
    </div>
</div>
 
 
 
@endsection