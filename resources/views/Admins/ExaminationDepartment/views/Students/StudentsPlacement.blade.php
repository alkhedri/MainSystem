
@extends('Admins.ExaminationDepartment.layout')


@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item">الطلبة</li>
    <li class="breadcrumb-item"><a href="#">تنسيب طالب</a>
    </li>
     
 
</ol>
@endsection


@section('content')
<div class="alert alert-primary" role="alert">

    <p> <i class="icon-calendar"></i> موعد التنسيب <span>
        @isset($date)
        [ {{$date}} ]
        @else
     [ لم يحدد بعد ]
        @endisset
       
         </span></p>

    <p>    <i class="icon-people"></i>  عدد الطلبة المستهدفين :    <span>[ {{ $requests->count()}} ]</span></p>
 
    <hr>
   
    <p> <i class="icon-badge"></i> سيتم عرض كل طالب مع الاقسام التي ادخلها حسب الرغبة</span></p>
    <p> <i class="icon-badge"></i>  ترتيب الطلبة حسب المعدل التراكمي</span></p>
    <p> <i class="icon-badge"></i>   سيتم ادراج المقررات المطلوبه لكل قسم امام اسم القسم</span></p>
    <p> <i class="icon-badge"></i>    المقررات التي انجزها الطالب باللون الاخضر والغير منجزة باللون الاحمر</span></p>
 

  </div>
 
 
 

<div class="row">
    <div class="col-lg-12">
        <div class="row">
 

 
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i>   قائمة الطلبة   
                        [الترتيب حسب المعدل التراكمي]
                    </div>
                    <div class="card-block">
                  
                          @foreach ($requests as $request)
                              
                         
                          <div class="card card-default">
                            <div class="card-header">
                                {{ App\Models\student::getNameById($request->student_id) }} - 

                                <span>المعدل التراكمي</span>
                                {{ $request->gpa  }}  
%
                                <div class="card-actions">
                                    <a class="btn-maximize collapsed" data-toggle="collapse" href="#collapseExample{{$request->id}}" aria-expanded="false" aria-controls="collapseExample"><i class="icon-arrow-down"></i></a>
                                 </div>
                            </div>
                            <div class="card-block collapse" id="collapseExample{{$request->id}}" aria-expanded="false" style="height: 0px;">
                           <ul>
                         
                            @foreach (App\Models\placement_request::getDeoartmentsById($request->student_id) as $item)
                                
                               
                                    <li>
                                        {{App\Models\department::getDepNameById($item->department_id)}} - 
                                        <a class="btn btn-sm btn-primary" href="{{route('StudentsMovementActionDone' , ['newDepId' => $item->department_id , 'student_id' => $request->student_id])}}">تنسيب</a>
                                  -

                                
                                  @foreach (App\Models\department_demand::getDemandedSubjects($item->department_id)  as $subject)
                               
                                           @if (App\Models\student_mark::checkIfPassed($subject->subject_id ,$request->student_id) == 0 )
                                         
                                         <strong class="tag tag-danger"> [ {{App\Models\subject::getSubjectName($subject->subject_id)}} ] </strong> 
                                           
                                           
                                           @else 
                                           <strong class="tag tag-success"> [ {{App\Models\subject::getSubjectName($subject->subject_id)}} ] </strong> 
                                           
                                           @endif
                                  @endforeach
                                    </li>
                              
<br>                                
                            @endforeach
                       
                           </ul>
                            </div>
                        </div>
                                @endforeach
                      
                               
                        
                    </div>
                </div>
            </div>
            <!--/col-->

        </div>
      
    </div>
 
 
 
 
@endsection