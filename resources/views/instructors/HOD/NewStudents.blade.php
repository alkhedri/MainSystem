
@extends('instructors.layout')
 

@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item">رئيس القسم</li>
    <li class="breadcrumb-item"><a href="#">الطلبة المنسبين [جدد]</a>
    </li>
     
 
</ol>
@endsection


@section('content')

<div class="row">
 

 
    <div class="col-8">
      
        <div class="alert alert-primary" role="alert">
            الطلبة المنسبين لقسم <a href="#" class="alert-link">[ {{App\Models\department::getDepNameById($department_id) }} ]</a>
            . للفصل الدراسي.
            <a href="#" class="alert-link">[{{ $current_sem }}  ]</a>
          </div>
 
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i>قائمة الطلبة 
                        -
                        [ {{$count}} ]
                    </div>
                    <div class="card-block">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الطالب</th>
                                    <th>رقم القيد</th>
                                    <th>الفصل الدراسي</th>
                                    <th>المعدل التراكمي</th>
                                    
                                    <th>الاجراء</th>
                                </tr>
                            </thead>
                            <tbody>
                          @foreach ($students as $student)
                              
                         
                                <tr>
                                    <td> {{$loop->index + 1 }}</td>
                                    <td> {{$student->arabic_name}}</td>
                                    <td>{{$student->Badge}}</td>
                                    <td> {{App\Models\student::StudentsSemestersCount($student->id)}}</td>
                                    <td>{{$student->gpa}} %</td>
                                    <td>
                                        
                                      <a href="{{route('StudentsProfile' , ['id' => $student->id])}}" class="btn btn-primary btn-sm">عرض البيانات</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                     {{   $students->links()}}
                       
                    </div>
                </div>
            </div>
            <!--/col-->
        </div>
        </div>
  
 
 
 
 
@endsection