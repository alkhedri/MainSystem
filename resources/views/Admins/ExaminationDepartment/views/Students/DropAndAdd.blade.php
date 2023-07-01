
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
                    @if($AddStatus == 1)
                    تم تمكين الطلبة من تنزيل  المقررات

                    @else
                    منع  الطلبة من تنزيل المقررات

                    @endif
          

                        </td>
                <td>
                    @if($AddStatus == 1)
                    <a class="btn btn-danger  " href="{{route('StudentDropAndAddActionAdd')}}">إلغاء التمكين </a>
     
                    @else
                    <a class="btn btn-success  " href="{{route('StudentDropAndAddActionAdd')}}">تمكين</a>
     
                    @endif
                 
                       </td>
            </tr>

            <tr>
                <td>
                    @if($DropStatus == 1)
                    تم تمكين الطلبة من  اسقاط المقررات

                    @else
                    منع  الطلبة من  اسقاط المقررات

                    @endif
          

                        </td>
                <td>
                    @if($DropStatus == 1)
                    <a class="btn btn-danger  " href="{{route('StudentDropAndAddActionDrop')}}">إلغاء التمكين </a>
     
                    @else
                    <a class="btn btn-success  " href="{{route('StudentDropAndAddActionDrop')}}">تمكين</a>
     
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