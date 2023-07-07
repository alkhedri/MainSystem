
@extends('Admins.SystemAdmin.layout')





@section('breadcramp')
<ol class="breadcrumb">
 
    <li class="breadcrumb-item">الإعدادات</li>
    <li class="breadcrumb-item">أيفونات النظام</li>
 
 
    
    
                                     
</ol>
@endsection


@section('content')
 
 
 
  <div class="row">
    
 
 
    <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i>   الشاشة الرئيسية و تسجيل الدخول     
                    </div>
                    <div class="card-block">
                         
                        <form class="form-horizontal" action="{{ route('UpdateMainLogos') }} " method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                               
                                <div class="controls">
                                    <div class="input-group">
                                        <input type="file" id="file-input" name="image" lang="ar" accept="image/png, image/jpeg">
                                        
                                    </div>
                                    
                                </div>
                            </div>

                            <button class="btn btn-primary pull-left">حفظ</button>
                        </form>
                     
                     
                    </div>
              </div>
     </div>
     <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <i class="icon-picture"></i>
                <strong>  أيقونة النظام </strong> 
                
            </div>
            <div class="card-block">
                 
                <div class="card-block" style="display: flex; justify-content : center">
                    <img src="{{ Storage::url("/img/$SystemIcon") }}" class="img-avatar" alt="الشعار" style="width: 300px; height:300px">
                </div>
                
            </div>
      </div>
    </div>
    </div>

    <div class="row">
         <!--/col-->
         <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-align-justify"></i>            لوحة التحكم     
                </div>
                <div class="card-block">
                    <form class="form-horizontal" action="{{ route('UpdateDashBaordLogos') }} " method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <div class="controls">
                                <div class="input-group">
                                    <input type="file" id="file-input" name="image" lang="ar" accept="image/png, image/jpeg">
                                </div>
                            </div>
                        </div>
                     <button class="btn btn-primary pull-left">حفظ</button>
                    </form>
                </div>
          </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <i class="icon-picture"></i>
                    <strong>  أيقونة لوحة التحكم </strong> 
                    
                </div>
                <div class="card-block">
                     
                    <div class="card-block" style="display: flex; justify-content : center">
                        <img src="{{ Storage::url("/img/$DashBoardIcon") }}" class="img-avatar" alt="الشعار" style="width: 340px; height:140px">
                        
                    </div>
                 
                </div>
          </div>
        </div>
    </div>
           
  
</div>
 
 
@endsection