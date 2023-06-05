
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
                                <form action="{{route('ActionInsertNewSubject')}}" method="post" class="form-horizontal ">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-lg-4 form-control-label" for="input-small">اسم المقرر [عربي]</label>
                                        <div class="col-lg-7">
                                            <input type="text" id="input-small" name="arabic_name" class="form-control input-md" placeholder="مقدمة نظم الحاسبات">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 form-control-label" for="input-normal">اسم المقرر [انجليزي]</label>
                                        <div class="col-lg-7">
                                            <input type="text" id="input-normal" name="english_name" class="form-control" placeholder="Introdcution To Computer Systems">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 form-control-label" for="input-large">رمز المقرر</label>
                                        <div class="col-lg-6">
                                            <input type="text" id="input-large" name="code" class="form-control input-lg" placeholder="CET250">
                                            @error('code')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        </div>
                              
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 form-control-label" for="input-large">عدد الوحدات</label>
                                        <div class="col-lg-6">
                                          
                                       <Select id="input-large" name="units" class="form-control input-lg" placeholder=".input-lg">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                       </Select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 form-control-label" for="input-large">ساعات النظري</label>
                                        <div class="col-lg-6">
                                            <Select id="input-large" name="course_hours" class="form-control input-lg" placeholder=".input-lg">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                           </Select>  </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 form-control-label" for="input-large">ساعات العملي</label>
                                        <div class="col-lg-6">
                                            <Select id="input-large" name="work_hours" class="form-control input-lg" placeholder=".input-lg">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                           </Select> </div>
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
 
    <div class="col-lg-6">
        @if(Session::has('subjectInserted'))
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">تم تسجيل المقرر بنجاح</h4>
            <p>التفاصيل :</p>
            <ul>
                <li>  {{Session::get('subjectInserted')['Arabic_name']}} </li>
                <li>  {{Session::get('subjectInserted')['English_name']}}</li>
                <li>  {{Session::get('subjectInserted')['Code']}} </li>
                <li>  {{Session::get('subjectInserted')['Units']}} </li>
        
                
            </ul>
            <hr>
            <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
          </div>
 
@endif

@if ($errors->any()) 
    <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">لم يتم تسجيل المقرر !</h4>
        <p>التفاصيل :</p>
     
        {!! implode('', $errors->all('<div>:message</div>')) !!}


    
        <ul>
       
        <hr>
        <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
      </div>
</div>
@endif
  
</div>
 
 
 
@endsection