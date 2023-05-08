
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
<div class="alert alert-success" role="alert">
    <h4 class="alert-heading">تفاصيل طلبة التنسيب</h4>
    <p>موعد التنسيب <span> [ 14/3/2020] </span></p>
    <hr>
     
    <h4> العدد الاجمالي <span> [ 40 ]</span></h4>
    <h4>   عدد الاقسام <span> [ 6 ]</span></h4>
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
                                        <a class="btn btn-sm btn-primary" href="test">تنسيب</a>
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