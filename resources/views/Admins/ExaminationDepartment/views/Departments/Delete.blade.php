
@extends('Admins.ExaminationDepartment.layout')


@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item"><a href="#">بيانات الطالب</a>
    </li>
     
 
</ol>
@endsection


@section('content')

<div class="row">
     
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Striped Table
            </div>
            <div class="card-block">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>القسم</th>
                            <th>الإجراء</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>الحاسب الالى</td>
                            <td>
                                <button type="button" class="btn btn-danger">حذف</button>
                            </td>
                        
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>الميكانيكية</td>
                            <td>
                                <button type="button" class="btn btn-danger">حذف</button>
                            </td>
                          
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>الكهربائية</td>
                            <td>
                                <button type="button" class="btn btn-danger">حذف</button>
                            </td>
                          
                        </tr>
               
                    </tbody>
                </table>
              
        </div>
    </div>
</div>
 
 
 
@endsection