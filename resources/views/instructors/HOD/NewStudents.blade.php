
@extends('instructors.layout')
 

@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item">رئيس القسم</li>
    <li class="breadcrumb-item"><a href="#">الطلبة المنسبين [جدد]</a>
    </li>
     
 
</ol>
@endsection


@section('content')

<div class="row">
 

 
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
                                    <th>الفصل الدراسي</th>
                                    <th>المعدل الفصلي</th>
                                    <th>المعدل التراكمي</th>
                                    
                                    <th>الاجراء</th>
                                </tr>
                            </thead>
                            <tbody>
                          
                                <tr>
                                    <td>1</td>
                                    <td>2012/02/01</td>
                                    <td>Admin</td>
                                    <td>Pompeius René</td>
                                    <td>Pompeius René</td>
                                    <td>Pompeius René</td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm">عرض البيانات</button>
                                      
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>2012/03/01</td>
                                    <td>Member</td>
                                    <td>Pompeius René</td>
                                    <td>Pompeius René</td>
                                    <td>Pompeius René</td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm">عرض البيانات</button>
                                     
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>2012/01/21</td>
                                    <td>Staff</td>
                                    <td>Pompeius René</td>
                                    <td>Pompeius René</td>
                                    <td>Pompeius René</td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm">عرض البيانات</button>
                             
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