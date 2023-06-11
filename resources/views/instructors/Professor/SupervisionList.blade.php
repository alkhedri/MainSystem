
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
                        العدد 
                        [    {{  $students->count()}} ]
                    </div>
                    <div class="card-block">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th style="text-align: center">الطالب</th>
                                    <th style="text-align: center">رقم القيد</th>
                                    <th style="text-align: center">الانذارات</th>
                                    <th style="text-align: center">الاجراء</th>
                              
                                </tr>
                            </thead>
                            <tbody>
                          
                                @foreach ($students as $student)
                                    
                             
                                <tr>
                                    <td> {{$loop->index +1}}</td>
                                    <td style="width: 280px;text-align: center"><strong>{{$student->arabic_name}}</strong></td>
                                    <td style="width: 280px;text-align: center">{{$student->Badge}}</td>
                     
                                  
                                    @if (App\Models\student_warning::CheckWarnings($student->id) == 0)
                                    <td style="text-align: center">   <span class="tag tag-success"> 0 </span></td>
                                    @else         
                                   <td style="text-align: center"><span class="tag tag-danger"><strong>{{App\Models\student_warning::CheckWarnings($student->id)}}</strong></span></td>
                                   @endif


                                   <td style="text-align: center">
                                    <a href="{{route('StudentsProfile' , [ 'id' => $student->id ])}}" class="btn btn-primary ">عرض البيانات</a>
                                    <a href="{{route('Model2Template' , [ 'student_id' => $student->id ])}}" class="btn btn-secondary  ">نموذج 2</a>
 
                                    <a href="{{route('StudentNotofyAlert' , [ 'student_id' => $student->id ])}}" class="btn btn-success  ">إشعار</a>
                                  
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