
@extends('Admins.SystemAdmin.layout')





@section('breadcramp')
<ol class="breadcrumb">
 
    <li class="breadcrumb-item">الإعدادات</li>
    <li class="breadcrumb-item">نصوص النظام</li>
 
 
    
    
                                     
</ol>
@endsection


@section('content')
 
 
 
  <div class="row">
    
 
 
    <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i>  الشاشة الرئيسية       
                    </div>
                    <div class="card-block">
                         
                        <form class="form-horizontal" action="{{ route('UpdateText') }} " method="POST"  >
                            @csrf

                            <div class="form-group">
                               
                                <div class="controls">
                                    <div class="input-group">
                                        <input class="form-control" type="text"  value="{{$SystemText}}"  name="text">
                                        
                                    </div>
                                    
                                </div>
                            </div>

                            <button class="btn btn-primary pull-left">حفظ</button>
                        </form>
                     
                     
                    </div>
              </div>
     </div>
 
    </div>

 
 
@endsection