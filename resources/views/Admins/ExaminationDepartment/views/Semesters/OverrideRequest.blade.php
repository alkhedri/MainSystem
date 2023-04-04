
@extends('Admins.ExaminationDepartment.layout')


@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item"><a href="#">الفصل الدراسي</a>
    <li class="breadcrumb-item"><a href="#">طلبات التجاوز</a>
    </li>
     
 
</ol>
@endsection


@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="row">
 

 
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Bordered Table
                    </div>
                    <div class="card-block">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>القسم</th>
                                    <th>الطالب</th>
                                    <th>رقم القيد</th>
                                    <th>المقرر</th>
                                    <th>رمز المقرر</th>
                                    <th>الوحدات</th>
                                    <th>ملاحظات</th>
                                    <th>الاجراء</th>
                                </tr>
                            </thead>
                            <tbody>
                          
                                <tr>
                                    <td>Micheal Mercurius</td>
                                    <td>2012/02/01</td>
                                    <td>Admin</td>
                                    <td>Pompeius René</td>
                                    <td>2012/01/01</td>
                                    <td>Member</td>
                                    <td>Member</td>
                                    <td>
                                        <button type="button" class="btn btn-success btn-sm">Success</button>
                                        <button type="button" class="btn btn-danger btn-sm">danger</button>
                                        <button type="button" class="btn btn-primary btn-sm">danger</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Ganesha Dubhghall</td>
                                    <td>2012/03/01</td>
                                    <td>Member</td>
                                    <td>Pompeius René</td>
                                    <td>2012/01/01</td>
                                    <td>Member</td>
                                    <td>Member</td>
                                    <td>
                                        <button type="button" class="btn btn-success btn-sm">Success</button>
                                        <button type="button" class="btn btn-danger btn-sm">danger</button>
                                        <button type="button" class="btn btn-primary btn-sm">danger</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Hiroto Šimun</td>
                                    <td>2012/01/21</td>
                                    <td>Staff</td>
                                    <td>Pompeius René</td>
                                    <td>2012/01/01</td>
                                    <td>Member</td>
                                    <td>Member</td>
                                    <td>
                                        <button type="button" class="btn btn-success btn-sm">Success</button>
                                        <button type="button" class="btn btn-danger btn-sm">danger</button>
                                        <button type="button" class="btn btn-primary btn-sm">danger</button>
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