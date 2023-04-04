
@extends('instructors.layout')
 
@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item">رئيس القسم</li>
    <li class="breadcrumb-item"><a href="#">هيئة التدريس</a>
    </li>
     
 
</ol>
@endsection


@section('content')

<div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                <strong>بحث</strong> عضو هيئة تدريس
            </div>
            <div class="card-block">
                <form action="" method="post" class="form-horizontal ">
                    <div class="form-group row">
                        <div class="col-md-6">
                            <div class="input-group">
                       
                                <input type="text" id="input1-group2" name="input1-group2" class="form-control" placeholder="رقم القيد">
                            </div>
                        </div>
                        <button type="submit" class="btn btn btn-success"><i class="fa fa-dot-circle-o"></i> بحث</button>
                    </div>
    </div>
   
 
</div> 

 
    <div class="col-8">
      

 
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i>قائمة اعضاء هيئة التدريس 
                    </div>
                    <div class="card-block">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الاسم</th>
                                    <th>التخصص</th>
                                    <th>الاجراء</th>
                                </tr>
                            </thead>
                            <tbody>
                          
                                <tr>
                                    <td>1</td>
                                    <td>2012/02/01</td>
                                    <td>Admin</td>
               
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm">عرض البيانات</button>
                                        <button type="button" class="btn btn-danger btn-sm">حذف</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>2012/03/01</td>
                                    <td>Member</td>
                        
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm">عرض البيانات</button>
                                        <button type="button" class="btn btn-danger btn-sm">حذف</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>2012/01/21</td>
                                    <td>Staff</td>
                     
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm">عرض البيانات</button>
                                        <button type="button" class="btn btn-danger btn-sm">حذف</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Prev</a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">4</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--/col-->
        </div>
        </div>
  
 
 
 
 
@endsection