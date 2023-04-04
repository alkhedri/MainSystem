
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
                    Example Form
                </div>
                <div class="card-block">
                    <form action="" method="post">
                        <div class="form-group">
                            <div class="input-group">
                                <select id="select" name="select" class="form-control input-sm" size="1">
                                    <option value="0">الفصل</option>
                                    <option value="1">ربيع</option>
                                    <option value="2">خريف</option>
                                </select>
                                <span class="input-group-addon"><i class="fa fa-user"></i>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="email" id="email2" name="email2" class="form-control" placeholder="السنة">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i>
                                </span>
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