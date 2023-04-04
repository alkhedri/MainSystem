
@extends('Admins.ExaminationDepartment.layout')


@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item">الطلبة</li>
    <li class="breadcrumb-item"><a href="#">ايقاف القيد</a>
    </li>
     
 
</ol>
@endsection


@section('content')

<div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                <strong>بحث</strong> طالب
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
                        <i class="fa fa-align-justify"></i>قائمة الطلبة 
                    </div>
                    <div class="card-block">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الطالب</th>
                                    <th>رقم القيد</th>
                                    <th>القسم الدراسي</th>
                                    <th>الاجراء</th>
                                </tr>
                            </thead>
                            <tbody>
                          
                                <tr>
                                    <td>1</td>
                                    <td>محمد فرج الخذري</td>
                                    <td>1611200398</td>
                                    <td>الحاسب الالى وتقنية المعلومات</td>
                                    <td>
                                        <button type="button" class="btn btn-danger btn-sm">ايقاف</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>ابراهيم عبدالحكيم ابراهيم مخلوف  </td>
                                    <td>2211110213</td>
                                    <td>الحاسب الالى وتقنية المعلومات</td>
                                    <td>
                                        <button type="button" class="btn btn-danger btn-sm">ايقاف</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>ابرار خيري محمد مشري</td>
                                    <td>2211110008</td>
                                    <td>الحاسب الالى وتقنية المعلومات</td>
                                    <td>
                                        <button type="button" class="btn btn-danger btn-sm">ايقاف</button>
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