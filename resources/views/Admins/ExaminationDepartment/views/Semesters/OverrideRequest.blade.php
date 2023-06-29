
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
 

            @if(Session::has('Success_message'))
            <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('Success_message') }}</p>
            @endif
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i>    قائمة الطلبات
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
                          @foreach ($requests as $request)
                              
                        
                                <tr>
                                    <td>{{ App\Models\student::getDepNameByID($request->student_id) }}</td>
                                    <td>{{ App\Models\student::getNameByID($request->student_id) }}</td>
                                    <td>Admin</td>
                                    <td>{{App\Models\subject::getSubjectName($request->subject_id) }}</td>
                                    <td>{{App\Models\subject::getSubjectCode($request->subject_id) }}</td>
                                    <td>{{App\Models\subject::getSubjectUnits($request->subject_id) }}</td>
                                    <td>{{$request->message}}</td>
                                    <td>
                                        <a  class="btn btn-success btn-sm" href="{{ route('OverrideRequestAccept' , ['request_id' => $request->id ,'student_id' => $request->student_id , 'subject_id' => $request->subject_id]) }}">قبول</a>
                                        <a  class="btn btn-danger btn-sm" href="{{ route('OverrideRequestDeny' , ['request_id' => $request->id]) }}">رفض</a>
                                         
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                   {{$requests->links()}}
                    </div>
                </div>
            </div>
            <!--/col-->

        </div>
      
    </div>
 
 
 
 
@endsection