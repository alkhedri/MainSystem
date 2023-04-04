
@extends('Admins.ExaminationDepartment.layout')


@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item">الطلبة</li>
    <li class="breadcrumb-item"><a href="#">تنسيب طالب</a>
    </li>
     
 
</ol>
@endsection


@section('content')

<div class="row">
    <label for="">موعد تنسيب الطلبة </label>
    <label for="">  date  </label>
   
</div>
 
 

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
                                    <th>#</th>
                                    <th>الطالب</th>
                                    <th>رقم القيد</th>
                                    <th>الرغبة الاولى</th>
                                    <th>الرغبة الثانية</th>
                                    <th>الرغبة الثالثة</th>
                                    <th>الرغبة الرابعة</th>
                                    <th>الرغبة الخامسة</th>
                                    <th>الاجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                          
                                <tr>
                                    <td>1</td>
                                    <td>ابتهال محمد عمر ابوالخير
                                    </td>
                                    <td>2211110006</td>
                                    <td>الهندسة الميكانيكية</td>
                                    <td>الهندسة البيئية</td>
                                    <td>الهندسة المعمارية</td>
                                    <td>الهندسة الكهربائية</td>
                                    <td>الهندسة المدنية</td>
                                    <td>
                                        <button type="button" class="btn btn-success btn-sm">Success</button>
                                        <button type="button" class="btn btn-danger btn-sm">danger</button>
                                        <button type="button" class="btn btn-primary btn-sm">danger</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>سامي علي محمد مشري
                                    </td>
                                    <td>2211110008</td>
                                    <td>الهندسة الكهربائية</td>
                                    <td>الهندسة المعمارية</td>
                                    <td>الهندسة الميكانيكية</td>
                                    <td>الهندسة البيئية</td>
                                    <td>الهندسة المدنية</td>
                                    <td>
                                        <button type="button" class="btn btn-success btn-sm">Success</button>
                                        <button type="button" class="btn btn-danger btn-sm">danger</button>
                                        <button type="button" class="btn btn-primary btn-sm">danger</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>هدى عبدالإله محمد الطاهر
                                    </td>
                                    <td>17200723112</td>
                                    <td>الهندسة الكيميائية</td>
                                    <td>الهندسة النفطية</td>
                                    <td>الهندسة المدنية</td>
                                    <td>الهندسة الميكانيكية</td>
                                    <td>الهندسة البيئية</td>
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