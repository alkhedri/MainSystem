
@extends('Student.layout')
 

@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item">الطالب</li>
    <li class="breadcrumb-item"><a href="#">الملف الشخصي</a>
    </li>
     
 
</ol>
@endsection


@section('content')
 
 

<div class="row">

    <div class="col-sm-4">
        <div class="card" style="">
     
         
            <div style="display:flex ; justify-content:center; margin-top 100px">
                <img src="img/avatar.png" alt="" style="width : 140px ; height:140px ; margin-top 100px" class="">
            </div>
                          
            <div class="card-block" >
        
                @foreach ($profile as $student)
                 
                    <li class="list-group-item">
                        <strong  >القسم : {{App\Models\student::getDepNameById($student->id) }}</strong>
                    </li>
                    <li class="list-group-item">
                        <strong   > الفصل الدراسي : {{App\Models\student::StudentsSemestersCount($student->id) }}</strong>
                    </li>
                    <li class="list-group-item">
                        <strong style="text-align:center" > المعدل التراكمي : {{App\Models\student::getGpaById($student->id) }}%</strong>
                    </li>
                    <li class="list-group-item">
                        <strong style="text-align:center" > الوحدات المنجزة : [ {{App\Models\student::getUnitsDoneById($student->id) }} ]</strong>
                    </li>
                    <li class="list-group-item">
                        <strong style="text-align:center" > حالة القيد  : [ {{App\Models\student::getEnrollmentStatus($student->enrollment_status_id) }} ]</strong>
                    </li>
             
         
           
          
               
        
          
            </div>
            @endforeach
        </div>
    </div>


    <div class="col-sm-5">
      <div class="card" style="">
                 
                            <div class="card-block">
                              
                                @foreach ($profile as $student)
                                <form method="POST" action="{{ route('EditProfile') }}">
                                    @csrf
             
               
                                    <div class="row  list-group-item">
                                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('  الإسم [عربي]   :  ') }}</label>
            
                                            <label for="name" class="col-md-8 col-form-label text-md-end"> {{$student->arabic_name}} </label>
            
                                  
                                    </div>


                                    <div class="row list-group-item">
                                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __(' الإسم [إنجليزي] : ') }}</label>
            
                                        <div class="col-md-8">
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$student->english_name}}  " required  autofocus>
            
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row list-group-item">
                                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('البريد الإلكتروني :') }}</label>
            
                                        <div class="col-md-8">
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="  {{App\Models\student::getStudentEmail($student->id) }} " required  autofocus>
            
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                  
                                    <div class="row list-group-item">
                                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('الرقم الوطني') }}</label>
            
                                        <div class="col-md-8">
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value=" {{$student->nat_id}} " required  autofocus>
            
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row list-group-item">
                                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('رقم الهاتف') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value=" {{$student->phone}} " required  autofocus>
            
                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row list-group-item">
                                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('  الصفة') }}</label>
            
                                        <div class="col-md-6">
                                             
                                            <select name="sex" id="" class="form-control" aria-valuemax=""> 
                                                <option value="{{$student->sex}}">{{$student->sex}}</option>
                                                <option value="ذكر">ذكر</option>
                                                <option value="أنثى">أنثى</option>
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row list-group-item">
                                        <label for="birth" class="col-md-4 col-form-label text-md-end">{{ __('تاريخ الميلاد') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="birth" type="date" class="form-control"  name="birth" value="{{$student->birth}}">
             
                                        </div>
                                    </div>
                                    <div class="row list-group-item">
                                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('سنة الإلتحاق') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="          {{$student->enrollment_date}}" required  autofocus>
            
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row list-group-item">
                                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('المشرف') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{App\Models\student::getStudentSpv($student->spv_id) }}"  readonly   >
             
                                        </div>
                                    </div>
                            
                                    <div class="row ">
                                        <div class="col-md-9">
                                        </div>
                                        <div class="col-md-3 " style="margin-top: 10px">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('حفظ') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                          
                            
                             
                                  @endforeach

                            </div>
                        </div>
    </div>


@if((count($Students_warnings) >= 1))
    <div class="col-sm-3">
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">الانذارات</h4>
            <hr>
            <ul>
                @foreach ($Students_warnings as $warning)
                <li class="mb-0">{{App\Models\warning::getWarnInfo($warning) }}</li>
                @endforeach
              
            </ul>
             
          </div>
    </div>
@else
<div class="col-sm-3">
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">الانذارات</h4>
        <hr>
        لاتوجد
         
      </div>
</div>
    @endif
</div>
@endsection