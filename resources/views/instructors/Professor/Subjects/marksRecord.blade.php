
@extends('instructors.layout')
 
@foreach ($subjects as $subject)
 
@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item">عضو هيئة التدريس</li>
    <li class="breadcrumb-item">قائمة المقررات</a>
        <li class="breadcrumb-item"><a href="#">{{$subject->arabic_name}}</a>
        
    </li>
     
 
</ol>
@endsection


@section('content')

                         
<div class="row" style="margin-bottom: 20px">

    <a href="{{route('marksRecord' , ['subject_id' => $subject_id])}}" class="btn btn-success btn-md"><i class="icon-layers"></i>  تعديل الدرجات</a>
    <a href="{{route('attendanceRecord' , ['subject_id' => $subject_id])}}" class="btn btn-primary btn-md"><i class="icon-people"></i>  سجل الحضور</a>
    <a href="{{route('examsDate' , ['subject_id' => $subject_id])}}" class="btn btn-primary btn-md"><i class="icon-calendar"></i>  مواعيد الامتحانات</a>
    
    


</div> 

 <div class="row">


    <div class="col-8">
      

 
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i>قائمة الطلبة 
                    </div>
                    <div class="card-block">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th style="text-align: right"  >الطالب</th>
                                    <th style="text-align: center"  >رقم القيد</th>
                                    <th style="text-align: center"  >الاعمال</th>
                                    <th style="text-align: center"  >الامتحان النهائي</th>
                         
                                </tr>
                            </thead>
                            <tbody>
                        
                                @foreach ($marksData as $mark)
   
                                <tr>
                                    <td> {{$loop->index + 1}}</td>
                                    <td style="text-align: right" > <strong> {{App\Models\student::getNameById($mark->student_id) }} </strong></td>
                                    <td  style="text-align: center" ><strong>{{App\Models\student::getBadgeById($mark->student_id) }}</strong></td>
                                    @if ($mark->work == NULL)
                                    <td style="color:rgb(159, 28, 28);text-align: center">لم تحدد بعد </td>  
                                    @else
                                    <td  style="text-align: center"  > <strong>{{$mark->work}}</strong></td>
                                    @endif
                                    @if ($mark->final == NULL)
                                    <td style="color:rgb(159, 28, 28);text-align: center">لم تحدد بعد </td>  
                                    @else
                                    <td  style="text-align: center"   ><strong>{{$mark->final}}</strong></td>
                                    @endif
                                        


                                        
 

                                
               
                           
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                           
                        <a   style="margin-right : 10px" class="pull-left btn btn-info "href="{{route('marksRecordEdit' , ['subject_id' => $subject_id])}}"><i class="fa fa-bullhorn"></i>        إشعار</a>
                  
                       
                        <a   class="pull-left btn btn-primary "href="{{route('marksRecordEdit' , ['subject_id' => $subject_id])}}"><i class="fa fa-edit"></i>        تعديل</a>
                  

                        
                    </form> 
                    </div>
                </div>
            </div>
            <!--/col-->
        </div>
        </div>
  
    </div>
 
 

        
@endsection
@endforeach
