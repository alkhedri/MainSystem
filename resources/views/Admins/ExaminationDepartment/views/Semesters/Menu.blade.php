
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
        <div class="card card-inverse card-primary">
            <div class="card-header">
                الفصل الدراسي الحالي : ربيع 2020
            </div>
         
                 
                    <span>ملاحظة : لتعيين فصل دراسي للوقت الحالي من جدول الفصول نضغط على تعيين</span>
            </div>
            <span class="border border-dark">ddddd</span>
            <a class="btn btn-primary btn-lg btn-block" href="{{route('NewSemester')}}"><u>إضافة فصل دراسي جديد</u></a>
      
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> قائمة الفصول الدراسية
            </div>
            <div class="card-block">
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>الفصل</th>
                            <th>السنة</th>
                            <th>الحالة</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Member</td>
                            <td>ربيع</td>
                            <td>2012/01/01</td>
                         
                            <td>
                                <button type="button" class="btn btn-outline-danger btn-sm">تعيين</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Staff</td>
                            <td>خريف</td>
                            <td>2012/02/01</td>
                          
                            <td>
                                <button type="button" class="btn btn-outline-danger btn-sm">تعيين</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Admin</td>
                            <td>ربيع</td>
                            <td>2012/02/01</td>
                           
                            <td>
                                <button type="button" class="btn btn-outline-danger btn-sm">تعيين</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Member</td>
                            <td>خريف</td>
                            <td>2012/03/01</td>
                          
                            <td>
                                <button type="button" class="btn btn-outline-danger btn-sm">تعيين</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Staff</td>
                            <td>ربيع</td>
                            <td>2012/01/21</td>
                          
                            <td>
                                <button type="button" class="btn btn-outline-danger btn-sm">تعيين</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">السابق</a>
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
                    <li class="page-item"><a class="page-link" href="#">التالي</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
 
 
 
@endsection