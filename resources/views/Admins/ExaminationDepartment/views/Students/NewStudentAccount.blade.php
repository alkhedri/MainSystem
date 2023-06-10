
@extends('Admins.ExaminationDepartment.layout')


@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item">الطلبة</li>
    <li class="breadcrumb-item"><a href="#">تسجيل حساب طالب جديد</a>
    </li>
     
 
</ol>
@endsection


@section('content')

 
  
<div class="row">
        <div class="col-md-6">
       <div class="card">
            <div class="card-header">
                <strong>حساب</strong> طالب
            </div>
            <div class="card-block">
                    <form method="POST" action="{{ route('CreateStudentAccount') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('الاسم') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="badge" class="col-md-4 col-form-label text-md-end">{{ __('رقم القيد') }}</label>

                            <div class="col-md-6">
                                <input id="badge" type="text" class="form-control @error('badge') is-invalid @enderror" name="badge" value="{{ old('badge') }}" required autocomplete="badge" autofocus>

                                @error('badge')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('البريد الإلكتروني') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                 

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('كلمة المرور') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('تأكيد كلمة المرور') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

      

                        <div class="row mb-3">
                            <label for="department_id" class="col-md-4 col-form-label text-md-end">{{ __('القسم الدراسي') }}</label>

                            <div class="col-md-6">
                                  <select id="department_id" class="form-control @error('department_id') is-invalid @enderror" name="department_id">
                                    @foreach($departments as $id)
                                    <option value="{{ $id->id }}">{{ $id->arabic_name }}</option>
                                    @endforeach
                              
                                  </select>
                                @error('department_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                      


                        <input id="user_type" type="hidden" value="student"  name="user_type">
                                

                        <div class="row mb-2">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('تسجيل') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

 


<div class="col-md-4">

    @if(Session::has('data'))
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">تم تسجيل الطالب بنجاح</h4>
        <p>التفاصيل :</p>
        <ul>
            <li>  {{Session::get('data')['arabic_name']}} </li>
            <li>  {{Session::get('data')['email']}}</li>
            <li>  {{Session::get('data')['department']}} </li>
 
    
            
        </ul>
        <hr>
        <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
      </div>

@endif

</div>


</div>    </div>
 
@endsection