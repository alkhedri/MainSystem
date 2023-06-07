
@extends('instructors.layout')
 

@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item">عضو هيئة التدريس</li>
    <li class="breadcrumb-item"><a href="#">قائمة الاشراف</a>
    </li>
     
 
</ol>
@endsection


@section('content')

<div class="row">
  
</div> 

 
    <div class="col-8">
      

 
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i>قائمة الطلبة 
                        -
                        [    {{  $students->count()}}]
                    </div>
                    <div class="card-block">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الطالب</th>
                                    <th>رقم القيد</th>
                                    <th>الانذارات</th>
                                    <th>الاجراء</th>
                              
                                </tr>
                            </thead>
                            <tbody>
                          
                                @foreach ($students as $student)
                                    
                             
                                <tr>
                                    <td> {{$loop->index +1}}</td>
                                    <td style="width: 280px"><strong>{{$student->arabic_name}}</strong></td>
                                    <td style="width: 280px">{{$student->Badge}}</td>
                     
                                  
                                    @if (App\Models\student_warning::CheckWarnings($student->id) == 0)
                                    <td>   <span class="tag tag-success"> 0 </span></td>
                                    @else         
                                   <td><span class="tag tag-danger"><strong>{{App\Models\student_warning::CheckWarnings($student->id)}}</strong></span></td>
                                   @endif


                                   <td>
                                    <a href="{{route('StudentsProfile' , [ 'id' => $student->id ])}}" class="btn btn-primary btn-sm">عرض البيانات</a>
                                    <a href="{{route('Model2Template' , [ 'student_id' => $student->id ])}}" class="btn btn-secondary btn-sm">نموذج 2</a>
                                    <a href="{{route('Model2Template' , [ 'student_id' => $student->id ])}}" class="btn btn-warning btn-sm">سجل الانذارات</a>
                                    <a href="{{route('StudentNotofyAlert' , [ 'student_id' => $student->id ])}}" class="btn btn-success btn-sm">إشعار</a>
                                  
                                </td>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <ul class="pagination">
                            {{$students->links()}}
                        </ul>
                    </div>
                </div>
            </div>
            <!--/col-->
        </div>
        </div>
  
 
 
 
 
@endsection