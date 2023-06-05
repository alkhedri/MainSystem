
@extends('Student.layout')
 

@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item">الطالب</li>
    <li class="breadcrumb-item"><a href="#">الاشعارات</a>
    </li>
     
 
</ol>
@endsection


@section('content')

<table class="table table-hover table-outline m-b-0 hidden-sm-down">
    <thead class="thead-default">
        <tr>
             <th>#</th>
            <th class="text-xs-center">المرسل</th>
            <th>الرسالة</th>
            
            <th>التاريخ</th>
        </tr>
    </thead>
    <tbody>
        <tr>
      <td>1</td>
            <td>
                <div>Yiorgos Avraamu</div>
                <div class="small text-muted">
                    <span>New</span>| Registered: Jan 1, 2015
                </div>
            </td>
            <td class="text-xs-center">
                <img src="img/flags/USA.png" alt="USA" style="height:24px;">
            </td>
     
        
            <td>
                <div class="small text-muted">Last login</div>
                <strong>10 sec ago</strong>
            </td>
        </tr>
         
    </tbody>
</table>
@endsection