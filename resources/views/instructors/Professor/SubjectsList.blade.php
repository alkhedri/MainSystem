
@extends('instructors.layout')
 

@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item">عضو هيئة التدريس</li>
    <li class="breadcrumb-item"><a href="#">قائمة المقررات</a>
    </li>
     
 
</ol>
@endsection


@section('content')
 
@if($subjects->count() == 0)
<div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">لايوجد مقررات !</h4>
    <p>لم يتم إسناد أي مقرر دراسي في هذا الفصل.</p>
    <hr>
    <p class="mb-0">الرجاء مراجعة منسق الدراسة والامتحانات بالقسم.</p>
  </div>
@endif

 

@foreach ($subjects as $subject)


<!--- subject card STARTS---->
<div class="col-xs-6 col-lg-3">
    <div class="card border">
        <div class="card-block p-a-1 clearfix">
          
            <div class="h5   m-b-1 m-t-h text-xl-center text-primary ">{{$subject->arabic_name}}</div>
            <div class="text-uppercase font-weight-bold font-lg" style="margin-left: 10px">رمز المقرر : [  {{$subject->code}}  ]</div>
            <div class="text-uppercase font-weight-bold font-lg" style="margin-left: 10px">عدد الطلبة : [   {{App\Models\student_mark::StudentsCount($subject->id)}}  ]</div>
    
        </div>
        <div class="card-footer p-x-1 p-y-h">
            <div class=" text-center">
                <a href="{{route("marksRecord" , ['subject_id' => $subject->id])}}" class="btn btn-secondary btn-block" data-toggle="tooltip" data-placement="right" title="عرض"><i class="icon-magnifier-add"> </i>
                    عرض
                </a>
                <a href="{{route("NotifyAll" , ['subject_id' => $subject->id])}}" class="btn btn-secondary btn-block" data-toggle="tooltip" data-placement="right" title="عرض"><i class="fa fa-bolt "> </i>
                    إخطار الطلبة
                </a>
                </div>
             </div>
    </div>
</div>
@endforeach

 
        
@endsection