
@extends('Admins.ExaminationDepartment.layout')


@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item"><a href="#">الفصل الدراسي</a>
    <li class="breadcrumb-item"><a href="#">الخطة الدراسية</a>
    </li>
     
 
</ol>
@endsection


@section('content')
 
    <div class="row">
        <div class="col-lg-10">
            @if(Session::has('message'))
            <div class="alert alert-primary" role="alert">
               
               {{Session::get('message')}} 
              
              </div>
              @endif
              <div style="display:flex;justify-content:end;width:100%; margin:10px">
                <a   class="btn btn-primary" href="{{route('createSemesterPlan')}}">إنشاء خطة دراسية</a>

              </div>

            <div class="card">
                <div class="card-header">
                    <i class="fa fa-edit"></i>الخطة الدراسية
          
                </div>
                <div class="card-block">
                    @foreach ($semesterplan as $plan)
                        
                
                                <form  action="{{ route('SetSemestersPlan') }} " method="POST" class="form-horizontal ">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-lg-3 form-control-label" for="input-small">تجديد القيد :</label>
                                        <div class="col-lg-3">
                                            <input type="date" id="input-small" name="renewalStarts" class="form-control input-md" value="{{$plan->renewalStarts}}">
                                        </div>
                                        <div class="col-lg-3">
                                            <input type="date" id="input-small" name="renewalEnds" class="form-control input-md" value="{{$plan->renewalEnds}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 form-control-label" for="input-normal">تنزيل المواد</label>
                                        <div class="col-lg-3">
                                            <input type="date" id="input-normal" name="SubjectStarts" class="form-control" value="{{$plan->SubjectStarts}}">
                                        </div>
                                        <div class="col-lg-3">
                                            <input type="date" id="input-normal" name="SubjectEnds" class="form-control" value="{{$plan->SubjectEnds}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 form-control-label" for="input-large">تنسيب الطلبة للأقسام العلمية</label>
                                        <div class="col-lg-6">
                                            <input type="date" id="input-large" name="StudntsMove" class="form-control input-lg" value="{{$plan->StudntsMove}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 form-control-label" for="input-large">بداية الدراسة</label>
                                        <div class="col-lg-6">
                                            <input type="date" id="input-large" name="semsStart" class="form-control input-lg" value="{{$plan->semsStart}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 form-control-label" for="input-large">نهاية الدراسة</label>
                                        <div class="col-lg-6">
                                            <input type="date" id="input-large" name="semsEnds" class="form-control input-lg" value="{{$plan->semsEnds}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 form-control-label" for="input-large">أخر موعد للإضافة</label>
                                        <div class="col-lg-6">
                                            <input type="date" id="input-large" name="LastChanceAdd" class="form-control input-lg" value="{{$plan->LastChanceAdd}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 form-control-label" for="input-large">أخر موعد للحذف</label>
                                        <div class="col-lg-6">
                                            <input type="date" id="input-large" name="LastChanceDrop" class="form-control input-lg" value="{{$plan->LastChanceDrop}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 form-control-label" for="input-large">الامتحانات النصفية الاولى</label>
                                        <div class="col-lg-3">
                                            <input type="date" id="input-large" name="FirstMidsStarts" class="form-control input-lg" value="{{$plan->FirstMidsStarts}}">
                                        </div>
                                        <div class="col-lg-3">
                                            <input type="date" id="input-large" name="FirstMidsEnds" class="form-control input-lg" value="{{$plan->FirstMidsEnds}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 form-control-label" for="input-large">أخر موعد لايقاف القيد</label>
                                        <div class="col-lg-6">
                                            <input type="date" id="input-large" name="LastStop" class="form-control input-lg" value="{{$plan->LastStop}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 form-control-label" for="input-large">الامتحانات النصفية الثانية</label>
                                        <div class="col-lg-3">
                                            <input type="date" id="input-large" name="SecondMidsStarts" class="form-control input-lg" value="{{$plan->SecondMidsStarts}}">
                                        </div>
                                        <div class="col-lg-3">
                                            <input type="date" id="input-large" name="SecondMidsEnds" class="form-control input-lg" value="{{$plan->SecondMidsEnds}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 form-control-label" for="input-large">موعد اخر محاضرة</label>
                                        <div class="col-lg-6">
                                            <input type="date" id="input-large" name="Lastlecture" class="form-control input-lg" value="{{$plan->LastLecture}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 form-control-label" for="input-large">الامتحانات النهائية</label>
                                        <div class="col-lg-3">
                                            <input type="date" id="input-large" name="FinalsStarts" class="form-control input-lg" value="{{$plan->FinalsStarts}}">
                                        </div>
                                        <div class="col-lg-3">
                                            <input type="date" id="input-large" name="FinalsEnds" class="form-control input-lg" value="{{$plan->FinalsEnds}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 form-control-label" for="input-large">موعد اعتماد النتيجة</label>
                                        <div class="col-lg-6">
                                            <input type="date" id="input-large" name="Results" class="form-control input-lg" value="{{$plan->Results}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 form-control-label" for="input-large">تقديم طلبات المراجعة</label>
                                        <div class="col-lg-3">
                                            <input type="date" id="input-large" name="ReviewStarts" class="form-control input-lg" value="{{$plan->ReviewStarts}}">
                                        </div>
                                        <div class="col-lg-3">
                                            <input type="date" id="input-large" name="ReviewEnds" class="form-control input-lg" value="{{$plan->ReviewEnds}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 form-control-label" for="input-large">النظر في طلبات المراجعة</label>
                                        <div class="col-lg-3">
                                            <input type="date" id="input-large" name="CheckStarts" class="form-control input-lg"  value="{{$plan->CheckStarts}}">
                                        </div>
                                        <div class="col-lg-3">
                                            <input type="date" id="input-large" name="CheckEnds" class="form-control input-lg"  value="{{$plan->CheckEnds}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 form-control-label" for="input-large">موعد بداية الفصل القادم</label>
                                        <div class="col-lg-6">
                                            <input type="date" id="input-large" name="NextSem" class="form-control input-lg" value="{{$plan->NextSem}}">
                                        </div>
                                    </div>
                                    <div class="form-actions" dir="ltr">
                                        
                                        <button type="submit" class="btn btn-primary">حفظ التغييرات</button>
                                        <button type="button" class="btn btn-default">Cancel</button>
                                    </div>
                                </form>
                                @endforeach
                            </div>
        </div>
        <!--/col-->
    </div>
</div>
 
 
 
@endsection