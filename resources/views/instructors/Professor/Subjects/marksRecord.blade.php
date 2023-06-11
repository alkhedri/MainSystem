
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
                                    <th>الطالب</th>
                                    <th>رقم القيد</th>
                                    <th>الاعمال</th>
                                    <th>الامتحان النهائي</th>
                         
                                </tr>
                            </thead>
                            <tbody>
                        
                                @foreach ($marksData as $mark)
   
                                <tr>
                                    <td> {{$loop->index + 1}}</td>
                                    <td> {{App\Models\student::getNameById($mark->student_id) }} </td>
                                    <td>{{App\Models\student::getBadgeById($mark->student_id) }}</td>

<form action="{{route('marksRecordAction')}}" method="POST">
@csrf
<td><input type="text" class="form-control input-md     font-weight-bold" name="work[]" value="{{$mark->work}}" style="width:150px; text-align:center"></td>
<td><input type="text"  class="form-control input-md    font-weight-bold" name="final[]" value="{{$mark->final}}" style="width:150px; text-align:center"></td>
<input type="hidden" name="ids[]" value="{{$mark->id}}">

                                
               
                           
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                       
                        <button type="submit" class="pull-left btn btn-primary "> <i class="fa fa-floppy-o"></i>     حفظ  </button>
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
