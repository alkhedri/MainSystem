
@extends('Admins.ExaminationDepartment.layout')


@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item">قائمة الطلبة</li>
    <li class="breadcrumb-item">صلاحيات الطلبة</li>
    <li class="breadcrumb-item"><a href="#">تنزيل و اسقاط </a>
    </li>
     
 
</ol>
@endsection


@section('content')

<div class="col-md-6">
 
    <div class="card">
        <div class="card-header">
            <i class="fa fa-align-justify"></i> صلاحيات الطلبة
        </div>
        <div class="card-block">
            <table class="table">
                <thead>
                    <tr>
                         
                        <th>الحالة</th>
                        <th>الاجراء</th>
                    </tr>
                </thead>
                <tbody>
              
              <tr>
                <td>
                    @if($status == 1)
                    تم تمكين الطلبة من تنزيل و اسقاط المقررات

                    @else
                    منع  الطلبة من تنزيل و اسقاط المقررات

                    @endif
          

                        </td>
                <td>
                    @if($status == 1)
                    <a class="btn btn-danger btn-sm" href="{{route('StudentDropAndAddAction')}}">إلغاء التمكين </a>
     
                    @else
                    <a class="btn btn-success btn-sm" href="{{route('StudentDropAndAddAction')}}">تمكين</a>
     
                    @endif
                 
                       </td>
            </tr>

         
                   
                </tbody>
            </table>
   
        </div>
    </div>
</div>
<!--/col-->
</div>
</div>




</div>
 
 
@endsection