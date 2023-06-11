
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

 
   @foreach ($subjects as $subject)
       

    <!--- subject card STARTS---->
    <div class="col-xs-6 col-lg-3">
        <div class="card">
            <div class="card-block p-a-1 clearfix">
                <i class="icon-book-open bg-info p-a-1 font-2xl m-r-1 pull-left"></i>
                <div class="h5 text-info m-b-0 m-t-h">{{$subject->arabic_name}}</div>
                <div class="text-uppercase font-weight-bold font-lg" style="margin-left: 10px">[  {{$subject->code}}  ]</div>
            </div>
            <div class="card-footer p-x-1 p-y-h">
                <div class=" text-center">
                    <a href="{{route("marksRecord" , ['subject_id' => $subject->id])}}" class="btn btn-secondary btn-block" data-toggle="tooltip" data-placement="right" title="عرض"><i class="icon-magnifier-add"> </i>
                        عرض
                    </a>
                  
                    </div>
                 </div>
        </div>
    </div>
    @endforeach
 
        
@endsection