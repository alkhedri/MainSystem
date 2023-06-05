
@extends('Student.layout')
 

@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item">الطالب</li>
    <li class="breadcrumb-item"><a href="#">مقررات الفصل الحالي</a>
    </li>
     
 
</ol>
@endsection


@section('content')

 
 
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>المقرر</th>
                    <th>الرمز</th>
                    <th>عدد الوحدات</th>
                 
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Yiorgos Avraamu</td>
                    <td>2012/01/01</td>
                    <td>Member</td>
                  
                </tr>
                <tr>
                    <td>Avram Tarasios</td>
                    <td>2012/02/01</td>
                    <td>Staff</td>
                
                </tr>
                <tr>
                    <td>Quintin Ed</td>
                    <td>2012/02/01</td>
                    <td>Admin</td>
                  
                </tr>
                <tr>
                    <td>Enéas Kwadwo</td>
                    <td>2012/03/01</td>
                    <td>Member</td>
                  
                </tr>
                <tr>
                    <td>Agapetus Tadeáš</td>
                    <td>2012/01/21</td>
                    <td>Staff</td>
                  
                </tr>
            </tbody>
        </table>
     
 
@endsection