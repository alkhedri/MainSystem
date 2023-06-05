
@extends('instructors.layout')
 

@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item">عضو هيئة التدريس</li>
    <li class="breadcrumb-item"><a href="#">وضع خطة دراسية</a>
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
                        [    {{  $studentsList->count()}}]
                    </div>
                    <div class="card-block">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الطالب</th>
                                    <th>رقم القيد</th>
                                  
                                    <th>الاجراء</th>
                              
                                </tr>
                            </thead>
                            <tbody>
                          
                                @foreach ($studentsList as $student)
                                    
                             
                                <tr>
                                    <td> {{$loop->index +1}}</td>
                                    <td style="width: 280px"><strong>{{App\Models\student::getNameById($student->student_id)}} </strong></td>
                                    <td style="width: 280px">{{App\Models\student::getBadgeById($student->student_id)}} </td>
                                    


                                   <td>
                                    <a href="{{route('StudentsProfile' , [ 'id' => $student->student_id ])}}" class="btn btn-primary btn-sm">عرض البيانات</a>
                                    <a href="{{route('StudentsProfile' , [ 'id' => $student->student_id ])}}" class="btn btn-secondary btn-sm">وضع خطة</a>
                                  
                                </td>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <ul class="pagination">
                            {{$studentsList->links()}}
                        </ul>
                    </div>
                </div>
            </div>
            <!--/col-->
        </div>
        </div>
  
 
 
 
 
@endsection