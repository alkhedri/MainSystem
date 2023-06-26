
@extends('Admins.ExaminationDepartment.layout')


@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item">قائمة الطلبة</li>
    <li class="breadcrumb-item">صلاحيات الطلبة</li>
    <li class="breadcrumb-item"><a href="#">التنسيب للاقسام العلمية</a>
    </li>
     
 
</ol>
@endsection


@section('content')

<div class="col-md-6">
    <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">ملاحظات هامة</h4>
        <p>بمجرد تمكين الصلاحيات سيتم منح الإذن للطلبة المستهدفين بتقديم طلبات التنسيب للاقسام العلمية</p>
        <hr>
        <p class="mb-0">يسمح لكل طالب بتقديم طلب واحد فقط ! وبمجرد تقديمه للطلب سيتم سحب صلاحية طلب التنسيب منه بشكل تلقائي</p>
      </div>
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
                    تم تمكين الطلبة من طلب التنسيب للأقسام العلمية
                    @else
                    منع  الطلبة من   طلب التنسيب للأقسام العلمية

                    @endif
          

                        </td>
                <td>
                    @if($status == 1)
                    <a class="btn btn-danger " href="{{route('StudentDepartmentPlacementAction')}}">إلغاء التمكين </a>
     
                    @else
                    <a class="btn btn-success  " href="{{route('StudentDepartmentPlacementAction')}}">تمكين</a>
     
                    @endif
                 
                       </td>
            </tr>

         
                   
                </tbody>
            </table>
                   
            <div class="alert alert-primary">
                    الطلبة المستهدفين [{{$count}}]
            </div>
        </div>
    </div>
</div>
<!--/col-->
</div>
</div>




</div>
 
 
@endsection