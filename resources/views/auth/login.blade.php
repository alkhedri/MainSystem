@extends('layouts.loginlayout')

@section('LoginForm')

<div class="body-wrap">
     
        <div class="hero-inner" >
            <div class="mainlogo">
                <img src="img\University-Logo.png" alt="" style="width: 200px;height:200px;">
            
            </div>
            <div class="hero-figure anime-element">
                <svg class="placeholder" width="528" height="396" viewBox="0 0 528 396">
                    <rect width="528" height="396" style="fill:transparent;" />
                </svg>
                <div class="hero-figure-box hero-figure-box-01" data-rotation="45deg"></div>
                <div class="hero-figure-box hero-figure-box-02" data-rotation="-45deg"></div>
                <div class="hero-figure-box hero-figure-box-03" data-rotation="0deg"></div>
                <div class="hero-figure-box hero-figure-box-04" data-rotation="-135deg"></div>
                <div class="hero-figure-box hero-figure-box-05"></div>
                <div class="hero-figure-box hero-figure-box-06"></div>
                <div class="hero-figure-box hero-figure-box-07"></div>
                <div class="hero-figure-box hero-figure-box-08" data-rotation="-22deg"></div>
                <div class="hero-figure-box hero-figure-box-09" data-rotation="-52deg"></div>
                <div class="hero-figure-box hero-figure-box-10" data-rotation="-50deg"></div>
            </div>
            <div class="hero-copy" >
           
                <div class="container">

                                <div class="pricing-table-inner is-revealing">
                                    <div class="mainlogoDesktop">
                                        <img src="img\University-Logo.png" alt="" style="width: 200px;height:200px;">
                                    
                                    </div>
                                        <form method="POST" action="{{ route('login') }}" style="text-align: center" dir="rtl">
                                            @csrf
                                        <h1>تسجيل الدخول</h1>
                                        <p class="text-muted">لوحة تسجيل الدخول للنظام الإلكتروني</p>
                                        <div class="input-group m-b-1">
                                            <span class="input-group-addon"><i class="icon-user"></i>
                                            </span>
                                             <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                             @error('email')
                                             <span class="invalid-feedback" role="alert">
                                                 <small>{{ $message }}</small>
                                             </span>
                                         @enderror
                                        </div>
                                        <div class="input-group m-b-2">
                                            <span class="input-group-addon"><i class="icon-lock"></i>
                                            </span>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <small>{{ $message }}</small>
                                                </span>
                                            @enderror  </div>
                                        <div class="row">
                                            <div class="col-xs-6 text-align:center">
                                                <button type="submit" class="button button-primary button-shadow" style=" ">
                                                    {{ __('دخول') }}
                                                </button>
                
                                        
                                            </div>
                                            <br> 
                                            <br> 
                                      
                                            <div class="">
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
                    </div>
                </div>
 
 
@endsection
