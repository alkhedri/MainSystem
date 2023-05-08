
@extends('Admins.ExaminationDepartment.layout')


@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item"><a href="#">النتيجة النهائية</a>
    </li>
     
 
</ol>
@endsection


@section('content')

<div class="row">
  
</div>
 

@foreach ($departments as $department)
    

    <!--- subject card STARTS---->
    <div class="col-xs-6 col-lg-3">
        <div class="card">
            <div class="card-block p-a-1 clearfix">
                <i class="icon-book-open bg-info p-a-1 font-2xl m-r-1 pull-left"></i>
                <div class="h5 text-info m-b-0 m-t-h">{{$department->arabic_name}}</div>
                <div class="text-muted text-uppercase font-weight-bold font-xs">
                    
                    {{App\Models\department::getSubjectsTottal($department->id) }} /  {{App\Models\department::getSubjectsTottal($department->id) }} 
                </div>
            </div>
           
                 <div class="card-footer p-x-1 p-y-h">
                    <div class=" text-center">
                    
                        <div class="card card-default">
                            <div class="card-header">
                                Card collapse
                                <div class="card-actions">
                                    <a class="btn-maximize collapsed" data-toggle="collapse" href="#collapseExample{{$department->id}}" aria-expanded="false" aria-controls="collapseExample"><i class="icon-arrow-down"></i></a>
                                 </div>
                            </div>
                            <div class="card-block collapse" id="collapseExample{{$department->id}}" aria-expanded="false" style="height: 0px;">
                           <ul>
                            <li>test 1</li>
                            <li>test 1</li>
                            <li>test 1</li>
                            <li>test 1</li>
                           </ul>
                            </div>
                        </div>
                      
                        </div>
                     </div>



        </div>
    </div>
    @endforeach
@endsection