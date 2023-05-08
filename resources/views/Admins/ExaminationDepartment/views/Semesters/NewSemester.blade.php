
@extends('Admins.ExaminationDepartment.layout')


@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item"><a href="#">الفصل الدراسي</a>
    <li class="breadcrumb-item"><a href="#">قائمة الفصول الدراسية</a>
    </li>
     
 
</ol>
@endsection


@section('content')

<div class="row">
  
    <div class="col-lg-6">
         
       
            <div class="card">
                <div class="card-header">
                    بيانات الفصل الدراسي الجديد
                </div>
                <div class="card-block">
                    <form action="{{ route('AddSemesters') }} " method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-sticky-note"></i>
                                </span>
                                <select id="select" name="seassion" class="form-control input-sm" size="1">
                                    <option value="0">الفصل</option>
                                    <option value="ربيع">ربيع</option>
                                    <option value="خريف">خريف</option>
                                    <option value="صيف">صيف</option>
                                    
                                </select>
                           
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i>
                                </span>
                                <input type="text" id="email2" name="year" class="form-control" placeholder="السنة">
                             
                            </div>
                        </div>
                 
                        <div class="form-group form-actions">
                            <button type="submit" class="btn btn-sm btn-default">تسجيل</button>
                        </div>
                    </form>
              
            </div>
        </div>
    </div>
</div>
 
 
 
@endsection