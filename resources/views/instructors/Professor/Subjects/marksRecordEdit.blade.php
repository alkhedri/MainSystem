
@extends('instructors.layout')
 
 
 
@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item">عضو هيئة التدريس</li>
    <li class="breadcrumb-item">قائمة المقررات</a></li>

        <li class="breadcrumb-item"><a href="{{route('marksRecord' , ['subject_id' => $subject_id , 'group_id' =>$group_id])}}">
            {{App\Models\subject::getSubjectName($subject_id) }}
        
        </a></li>
        <li class="breadcrumb-item">تعديل درجات مقرر</li>

    
     
 
</ol>
@endsection


@section('content')

                         
 

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
                                    <th  >الطالب</th>
                                    <th  >رقم القيد</th>
                                    <th  >الاعمال</th>
                                    <th  >الامتحان النهائي</th>
                         
                                </tr>
                            </thead>
                            <tbody>
                        
                                @foreach ($marksData as $mark)
   
                                <tr>
                                    <td> {{$loop->index + 1}}</td>
                                    <td  > <strong> {{App\Models\student::getNameById($mark->student_id) }} </strong></td>
                                    <td  >{{App\Models\student::getBadgeById($mark->student_id) }}</td>

<form action="{{route('marksRecordAction')}}" method="POST">
@csrf
<td   ><input style="width: 100px" type="text" class="form-control input-md     font-weight-bold  " name="work[]" value="{{$mark->work}}" style="text-align: center" ></td>
<td    ><input style="width: 100px" type="text"  class="form-control input-md    font-weight-bold" name="final[]" value="{{$mark->final}}" style="text-align: center"></td>
<input type="hidden" name="ids[]" value="{{$mark->id}}">
<input type="hidden" name="group_id" value="{{$group_id}}">

                        

                           
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
 

@section('page-js-script')
 

 
@endsection
 
