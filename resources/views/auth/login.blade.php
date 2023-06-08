@extends('layouts.loginlayout')

@section('LoginForm')

 
 <div class="container">


    <div class="row" style="padding-top:150px">

        <div class="col-lg-2">

       </div>
                <div class="col-lg-2" style="padding-top:25px">
            
                    <div class="card card-inverse card-primary" style="">
                        <div class="card-block text-xs-center">
                            <div>
                                <img src="img/University-Logo.png" alt="" style="width: 200px; height: 200px">
                            
                            </div>
                        </div>
  
        </div>
    </div>
 

           
        <div class="col-lg-6" style=" ">
   
                <div class="card p-a-2">
                 

              


                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                        <h1>تسجيل الدخول</h1>
                        <p class="text-muted">لوحة تسجيل الدخول للنظام الإلكتروني</p>
                        <div class="input-group m-b-1">
                            <span class="input-group-addon"><i class="icon-user"></i>
                            </span>
                             <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                             @error('email')
                             <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                         @enderror
                        </div>
                        <div class="input-group m-b-2">
                            <span class="input-group-addon"><i class="icon-lock"></i>
                            </span>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror  </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <button type="submit" class="btn btn-primary" style="width:200px">
                                    {{ __('دخول') }}
                                </button>

                        
                            </div>
                            <div class="col-xs-6 text-xs-right">
                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('نسيت كلمة المرور ؟') }}
                                </a>
                            @endif
                            </div>
                        </div>
                    </form>
                    </div>

                </div>
                
            </div>
     
        </div>
 
@endsection
