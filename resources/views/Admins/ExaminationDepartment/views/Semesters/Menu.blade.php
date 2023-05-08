
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
        <div class="alert alert-info" role="alert">
             
            <p> الفصل الدراسي الحالي - [{{$semester_name}}]  </p>
            <hr>
            <p class="mb-0"> ملاحظة : لتعيين فصل دراسي للوقت الحالي من جدول الفصول نضغط على تعيين</p>
          </div>
        
           
            <a class="btn btn-info btn-lg btn-block" href="{{route('NewSemester')}}"><u>إضافة فصل دراسي جديد</u></a>
      
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
                      
                            <th>الحالة</th>
                            <th>خيارات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Semesters as $semester)
                            
                      
                        <tr>
                            <td>{{ $loop->index + 1}}</td>
                            <td>{{$semester->name}}</td>
                            
                         
                            <td>
                     
                                @if ($semester_id == $semester->id)
                                         
                                <a class="btn btn-outline-success btn-sm" href="{{ route('CurrentSemesterActivate') }}"
                   >
                                 {{ __('الفصل الحالي') }}
                             </a>
                        
                                   @else
                                   <a class="btn btn-outline-danger btn-sm" href="{{ route('CurrentSemesterActivate' , ['id' => $semester->id]) }}"
                             >
                                    {{ __('تعيين') }}
                                </a>  
                                          
                                @endif
                       
                            
                               
                            </td>

                            <td>
                                <a class="btn btn-outline-danger btn-sm" href="{{route('SemestersDeleteAction' , ['id' => $semester->id])}}"
                                    >    {{ __('حذف') }}
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>


                {{ $Semesters->links()}}
                  
               
            </div>
          
        </div>
    </div>
</div>
 
 
 
@endsection