
@extends('Student.layout')
 

@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item">الطالب</li>
    <li class="breadcrumb-item"><a href="#">الخطة الدراسية</a>
    </li>
     
 
</ol>
@endsection

 

@section('content')

 
    <div class="row">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-edit"></i>الخطة الدراسية <strong>[{{$SEMESTER_NAME}}]</strong>
            
                </div>
                <div class="card-block">
                    <div class="card-block">
                        @foreach ($semesterplan as $plan)
                        
                                        <div class="form-group row">
                                            <label class="col-lg-3 form-control-label" for="input-small">تجديد القيد :</label>
                                            <div class="col-lg-3">
                                                <strong>
                                                <input type="text" id="input-small" name="renewalStarts" class="form-control input-md" value="{{$plan->renewalStarts}}">
                                            </strong>
                                        </div>
                                            <div class="col-lg-3">
                                                <strong>
                                                <input type="text" id="input-small" name="renewalEnds" class="form-control input-md" value="{{$plan->renewalEnds}}">
                                            </strong>
                                        </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 form-control-label" for="input-normal">تنزيل المواد</label>
                                            <div class="col-lg-3">
                                                <strong>
                                                <input type="text" id="input-normal" name="SubjectStarts" class="form-control" value="{{$plan->SubjectStarts}}">
                                            </strong>
                                        </div>
                                            <div class="col-lg-3">
                                                <strong>
                                                <input type="text" id="input-normal" name="SubjectEnds" class="form-control" value="{{$plan->SubjectEnds}}">
                                            </strong>
                                        </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 form-control-label" for="input-large">تنسيب الطلبة للأقسام العلمية</label>
                                            <div class="col-lg-6">
                                                <strong>
                                                <input type="text" id="input-large" name="StudntsMove" class="form-control input-lg" value="{{$plan->StudntsMove}}">
                                            </strong>
                                        </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 form-control-label" for="input-large">بداية الدراسة</label>
                                            <div class="col-lg-6">
                                                <strong>
                                                <input type="text" id="input-large" name="semsStart" class="form-control input-lg" value="{{$plan->semsStart}}">
                                            </strong>
                                        </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 form-control-label" for="input-large">نهاية الدراسة</label>
                                            <div class="col-lg-6">
                                            <strong>
                                                <input type="text" id="input-large" name="semsEnds" class="form-control input-lg" value="{{$plan->semsEnds}}">
                                            </strong>
                                        </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 form-control-label" for="input-large">أخر موعد للإضافة</label>
                                            <div class="col-lg-6">
                                                <strong>
                                                <input type="text" id="input-large" name="LastChanceAdd" class="form-control input-lg" value="{{$plan->LastChanceAdd}}">
                                            </strong>
                                        </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 form-control-label" for="input-large">أخر موعد للحذف</label>
                                            <div class="col-lg-6">
                                                <strong>
                                                <input type="text" id="input-large" name="LastChanceDrop" class="form-control input-lg" value="{{$plan->LastChanceDrop}}">
                                            </strong>
                                        </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 form-control-label" for="input-large">الامتحانات النصفية الاولى</label>
                                            <div class="col-lg-3">
                                                <strong>
                                                <input type="text" id="input-large" name="FirstMidsStarts" class="form-control input-lg" value="{{$plan->FirstMidsStarts}}">
                                            </strong>
                                        </div>
                                            <div class="col-lg-3">
                                                <strong>
                                                <input type="text" id="input-large" name="FirstMidsEnds" class="form-control input-lg" value="{{$plan->FirstMidsEnds}}">
                                            </strong>
                                        </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 form-control-label" for="input-large">أخر موعد لايقاف القيد</label>
                                            <div class="col-lg-6">
                                                <strong>
                                                <input type="text" id="input-large" name="LastStop" class="form-control input-lg" value="{{$plan->LastStop}}">
                                            </strong>
                                        </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 form-control-label" for="input-large">الامتحانات النصفية الثانية</label>
                                            <div class="col-lg-3">
                                                <strong>
                                                <input type="text" id="input-large" name="SecondMidsStarts" class="form-control input-lg" value="{{$plan->SecondMidsStarts}}">
                                            </strong>
                                        </div>
                                            <div class="col-lg-3">
                                                <strong>
                                                <input type="text" id="input-large" name="SecondMidsEnds" class="form-control input-lg" value="{{$plan->SecondMidsEnds}}">
                                            </strong>
                                        </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 form-control-label" for="input-large">موعد اخر محاضرة</label>
                                            <div class="col-lg-6">
                                                <strong>
                                                <input type="text" id="input-large" name="Lastlecture" class="form-control input-lg" value="{{$plan->LastLecture}}">
                                            </strong>
                                        </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 form-control-label" for="input-large">الامتحانات النهائية</label>
                                            <div class="col-lg-3">
                                                <strong>
                                                <input type="text" id="input-large" name="FinalsStarts" class="form-control input-lg" value="{{$plan->FinalsStarts}}">
                                            </strong>
                                        </div>
                                            <div class="col-lg-3">
                                                <strong>
                                                <input type="text" id="input-large" name="FinalsEnds" class="form-control input-lg" value="{{$plan->FinalsEnds}}">
                                            </strong>
                                        </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 form-control-label" for="input-large">موعد اعتماد النتيجة</label>
                                            <div class="col-lg-6">
                                                <strong>
                                                <input type="text" id="input-large" name="Results" class="form-control input-lg" value="{{$plan->Results}}">
                                            </strong>
                                        </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 form-control-label" for="input-large">تقديم طلبات المراجعة</label>
                                            <div class="col-lg-3">
                                            <strong>
                                                <input type="text" id="input-large" name="ReviewStarts" class="form-control input-lg" value="{{$plan->ReviewStarts}}">
                                            </strong>
                                        </div>
                                            <div class="col-lg-3">
                                                <strong>
                                                <input type="text" id="input-large" name="ReviewEnds" class="form-control input-lg" value="{{$plan->ReviewEnds}}">
                                            </strong>
                                        </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 form-control-label" for="input-large">النظر في طلبات المراجعة</label>
                                            <div class="col-lg-3">
                                                <strong>
                                                <input type="text" id="input-large" name="CheckStarts" class="form-control input-lg"  value="{{$plan->CheckStarts}}">
                                            </strong>
                                            </div>
                                            <div class="col-lg-3">
                                                <strong>
                                                <input type="text" id="input-large" name="CheckEnds" class="form-control input-lg"  value="{{$plan->CheckEnds}}">
                                            </strong>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 form-control-label" for="input-large">موعد بداية الفصل القادم</label>
                                            <div class="col-lg-6">
                                                <strong>     <input type="text" id="input-large" name="NextSem" class="form-control input-lg" value="{{$plan->NextSem}}">
                                                </strong>
                                            </div>
                                        </div>
                                        <div class="form-actions" dir="ltr">
                                            
                             
                                        </div>
                          
                                    @endforeach
                                </div>
            </div>
            <!--/col-->
    </div>
</div>
 
 
 
@endsection