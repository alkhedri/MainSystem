@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Students Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

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
                            <label for="enname" class="col-md-4 col-form-label text-md-end">{{ __('Name English') }}</label>

                            <div class="col-md-6">
                                <input id="enname" type="text" class="form-control @error('enname') is-invalid @enderror" name="enname" value="{{ old('enname') }}" required autocomplete="enname" autofocus>

                                @error('enname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

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
                            <label for="Badge" class="col-md-4 col-form-label text-md-end">{{ __('Badge  ') }}</label>

                            <div class="col-md-6">
                                <input id="Badge" type="text" class="form-control @error('Badge') is-invalid @enderror" name="Badge" value="{{ old('Badge') }}" required autocomplete="Badge" autofocus>

                                @error('Badge')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

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
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        
                        <div class="row mb-3">
                            <label for="natid" class="col-md-4 col-form-label text-md-end">{{ __('National ID  ') }}</label>

                            <div class="col-md-6">
                                <input id="natid" type="text" class="form-control @error('natid') is-invalid @enderror" name="natid" value="{{ old('natid') }}" required autocomplete="natid" autofocus>

                                @error('natid')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="sex" class="col-md-4 col-form-label text-md-end">{{ __('sex ID  ') }}</label>

                            <div class="col-md-6">
                                  <select id="sex" class="form-control @error('sex') is-invalid @enderror" name="sex">
                                    <option value="MALE">MALE</option>
                                    <option value="FEMALE">FEMALE</option>
                                  </select>
                                @error('sex')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="city" class="col-md-4 col-form-label text-md-end">{{ __('city ID  ') }}</label>

                            <div class="col-md-6">
                                  <select id="city" class="form-control @error('city') is-invalid @enderror" name="city">
                                    @foreach($ids as $id)
                                    <option value="{{ $id->id }}">{{ $id->name }}</option>
                                    @endforeach
                              
                                  </select>
                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('phone ID  ') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Birth ') }}</label>

                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-3">
                                    <input id="birth" type="text" class="form-control @error('birth') is-invalid @enderror" name="birth" value="{{ old('birth') }}" required autocomplete="birth" autofocus>
                                </div>
                                
                                <div class="col-md-3">
                                       <select id="birth" class="form-control @error('birth') is-invalid @enderror" name="birth">
                                    <option value="MALE">January</option>
                                    <option value="FEMALE">Febreuary</option>
                                    <option value="FEMALE">March</option>
                                    <option value="FEMALE">April</option>
                                    <option value="FEMALE">May</option>
                                    
                                  </select> </div>
                                  <div class="col-md-3">
                                    <input id="birth" type="text" class="form-control @error('birth') is-invalid @enderror" name="birth" value="{{ old('birth') }}" required autocomplete="birth" autofocus>
                                  </div>
                                </div>
                             
                                @error('birth')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Enrollment Date ') }}</label>

                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-3">
                                    <input id="birth" type="text" class="form-control @error('birth') is-invalid @enderror" name="birth" value="{{ old('birth') }}" required autocomplete="birth" autofocus>
                                </div>
                                
                                <div class="col-md-3">
                                       <select id="birth" class="form-control @error('birth') is-invalid @enderror" name="birth">
                                    <option value="MALE">January</option>
                                    <option value="FEMALE">Febreuary</option>
                                    <option value="FEMALE">March</option>
                                    <option value="FEMALE">April</option>
                                    <option value="FEMALE">May</option>
                                    
                                  </select> </div>
                                  <div class="col-md-3">
                                    <input id="birth" type="text" class="form-control @error('birth') is-invalid @enderror" name="birth" value="{{ old('birth') }}" required autocomplete="birth" autofocus>
                                  </div>
                                </div>
                             
                                @error('birth')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                         

                        <div class="row mb-3">
                            <label for="department" class="col-md-4 col-form-label text-md-end">{{ __('department ID  ') }}</label>

                            <div class="col-md-6">
                                  <select id="department" class="form-control @error('department') is-invalid @enderror" name="department">
                                    @foreach($departments as $id)
                                    <option value="{{ $id->id }}">{{ $id->arabic_name }}</option>
                                    @endforeach
                              
                                  </select>
                                @error('department')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="college" class="col-md-4 col-form-label text-md-end">{{ __('college ID  ') }}</label>

                            <div class="col-md-6">
                                  <select id="college" class="form-control @error('college') is-invalid @enderror" name="college">
                                    @foreach($colleges as $id)
                                    <option value="{{ $id->id }}">{{ $id->arabic_name }}</option>
                                    @endforeach
                              
                                  </select>
                                @error('college')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <input id="user_type" type="hidden" value="student"  name="user_type">
                                

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
