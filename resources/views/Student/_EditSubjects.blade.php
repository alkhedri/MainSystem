
@extends('Student.layout')
 

@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item">الطالب</li>
    <li class="breadcrumb-item"><a href="#">تزيل \ اسقاط مقرر</a>
    </li>
     
 
</ol>
@endsection


@section('content')

<div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                <strong>فائمة</strong> المقررات المتاحة
            </div>
            <div class="card-block">
                <form action="  " method="post" class="form-horizontal ">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-6">
                            <div class="input-group">
                                <select id="select" name="select" class="form-control input-sm" size="1">
                                    <option value="0">Please select</option>
                                    <option value="1">Option #1</option>
                                    <option value="2">Option #2</option>
                                    <option value="3">Option #3</option>
                                </select>
                             </div>
                        </div>

                     </div>
                    <a class="btn btn btn-primary" href=" ">
                        <i class="fa fa-dot-circle-o"></i>
                           تنزيل  
                    </a>
    </div>
   
                        
</div> 
 
<div class="card">
    <div class="card-header">
        <i class="fa fa-align-justify"></i> Striped Table
    </div>
    <div class="card-block">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Date registered</th>
                    <th>Role</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Yiorgos Avraamu</td>
                    <td>2012/01/01</td>
                    <td>Member</td>
                    <td>
                       <a href="" class="btn btn-danger">اسقاط</a>
                    </td>
                </tr>
                <tr>
                    <td>Avram Tarasios</td>
                    <td>2012/02/01</td>
                    <td>Staff</td>
                    <td>
                        <a href="" class="btn btn-danger">اسقاط</a>
                    </td>
                </tr>
                <tr>
                    <td>Quintin Ed</td>
                    <td>2012/02/01</td>
                    <td>Admin</td>
                    <td>
                        <a href="" class="btn btn-danger">اسقاط</a>
                    </td>
                </tr>
                <tr>
                    <td>Enéas Kwadwo</td>
                    <td>2012/03/01</td>
                    <td>Member</td>
                    <td>
                        <a href="" class="btn btn-danger">اسقاط</a>
                    </td>
                </tr>
                <tr>
                    <td>Agapetus Tadeáš</td>
                    <td>2012/01/21</td>
                    <td>Staff</td>
                    <td>
                        <a href="" class="btn btn-danger">اسقاط</a>
                    </td>
                </tr>
            </tbody>
        </table>
  
    </div>
</div>
@endsection