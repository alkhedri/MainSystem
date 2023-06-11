
@extends('Admins.ExaminationDepartment.layout')


@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item"><a href="#">النتيجة النهائية</a>
    </li>
     
 
</ol>
@endsection


@section('content')

<div class="row" style="margin: 20px">
    @if($status == 1)
    <a class="btn btn-danger " href="{{route('FinalResultsReleaseAction')}}">إلغاء الإعلان عن النتيجة النهائية </a>

    @else
    <a class="btn btn-success " href="{{route('FinalResultsReleaseAction')}}">الإعلان عن النتيجة النهائية</a>

    @endif
</div>
 
 
@foreach ($departments as $department)
    

    <!--- subject card STARTS---->
    <div class="col-xs-6 col-lg-3">
        <div class="card">
            <div class="card-block p-a-1 clearfix">
                <i class="icon-book-open bg-info p-a-1 font-2xl m-r-1 pull-left"></i>
                <div class="h5 text-info m-b-0 m-t-h">{{$department->arabic_name}}</div>
                <div class="text-muted text-uppercase font-weight-bold font-xs">
                    
                    {{App\Models\department::getSubjectsDoneCount($department->id) }} /  {{App\Models\department::getSubjectsTottal($department->id) }} 
                </div>
            </div>
           
                 <div class="card-footer p-x-1 p-y-h">
                    <div class=" text-center">
                    
                        @if (  App\Models\department::getSubjectsTottal($department->id) > App\Models\department::getSubjectsDoneCount($department->id) )
                        <div class="card card-default">
                            <div class="card-header">
                                المقررات الغير مكتملة
                                <div class="card-actions">
                                    <a class="btn-maximize collapsed" data-toggle="collapse" href="#collapseExample{{$department->id}}" aria-expanded="false" aria-controls="collapseExample"><i class="icon-arrow-down"></i></a>
                                 </div>
                            </div>
                            <div class="card-block collapse" id="collapseExample{{$department->id}}" aria-expanded="false" style="height: 0px;">
                          
                            @foreach (App\Models\department::getSubjectsNotDone($department->id)  as $item)
                            <li> {{App\Models\subject::getSubjectName($item)}}   </li>
                            
                            @endforeach
                        
                          
                            </div>
                        </div>
                         @endif
                        </div>
                     </div>



        </div>
    </div>
    @endforeach

 
     
 
@endsection