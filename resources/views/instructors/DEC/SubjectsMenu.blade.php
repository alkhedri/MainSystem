
@extends('instructors.layout')
 
@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item">منسق الدراسة و الامتحانات</li>
    <li class="breadcrumb-item"><a href="{{route('SubjectsMenu')}}">المقررات</a>
    </li>
     
 
</ol>
@endsection


@section('content')

<div class="row" style="margin-bottom: 10px">
    
    <div class="col-md-10">
       
        
    </div>

    <div class="col-md-2">
 
          <a class="btn btn-success" href="{{route('NewSubject')}}"><i class="icon-docs"></i>إضافة مقرر</a>
                        
    </div>
</div> 
 

<div class="row">


 
    <div class="col-8">
      

 
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i>قائمة   المقررات 
                    </div>
                    <div class="card-block">
                        <table class="table table-hover table-outline">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>المقرر</th>
                                    <th>الرمز</th>
                                    <th>الوحدات</th>
                                    <th>الحالة</th>
                                    <th>الاجراء</th>
                                </tr>
                            </thead>
                            <tbody>
                          
                                @foreach ($subjects as $subject)
                                    
                           
                                <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{$subject->arabic_name}}</td>
                                        <td>{{$subject->code}}</td>
                                        <td>{{$subject->units}}</td>
                                        <td>

                                            @if ($subject->avaliablity === 1)
                                            <a class="btn btn-success btn-sm" href="{{route('ActionActiveSubject' , ['id' => $subject->id,'status' => 0  ])}}">متاح</a>
                                          
                                            @else
                                            <a class="btn btn-danger btn-sm" href="{{route('ActionActiveSubject' , ['id' => $subject->id,'status' => 1  ])}}">غير متاح</a>
                                  
                                            @endif
                                         
                                             
                                        </td>
                                    <td>
                                        <a href="{{route('SubjectsDetails' ,['id' => $subject->id ])}}" class="btn btn-primary btn-sm">عرض</a>
                             
                                        <a class="btn btn-danger btn-sm" href="{{route('ActionDeleteSubject' , ['id' => $subject->id ])}}">حذف</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                       {{$subjects->links()}}
                    </div>
                </div>
            </div>
            <!--/col-->
        </div>
        </div>
    </div>
 
 
 
 
@endsection