
@extends('Admins.ExaminationDepartment.layout')


@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item">الطلبة</li>
    <li class="breadcrumb-item"><a href="#">تجديد القيد</a>
    </li>
     
 
</ol>
@endsection


@section('content')

 
    <div class="row">
        <div class="col-3">
            <div class="card">
                <div class="card-header">
                    <strong>بحث</strong> طالب
                </div>
                <div class="card-block">
                    <form class="form-horizontal" action="{{ route('StudentsRenewalSearch') }} " method="post">
                        
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="input-group">
                                    
                                    <input type="text" id="input1-group2" name="badge" class="form-control" placeholder="رقم القيد">
                                </div>
                            </div>
                            <button type="submit" class="btn btn btn-success"><i class="fa fa-dot-circle-o"></i> بحث</button>
    
                            </form>
    

                       
                        
                        </div>
                        <div style="margin-right: 10px">
                            <a class="btn btn btn-primary" href="{{route('RegRenewal')}}">
                                <i class="fa fa-dot-circle-o"></i>
                                    عرض الكل  
                                    <span>[ {{App\Models\student::count_all()}} ]</span>
                                </a>
                            
                            
                            <a class="btn btn btn-danger" href="{{route('RegRenewalIntermettent')}}">
                                <i class="fa fa-dot-circle-o"></i>
                                المنقطعين  
                                <span>[ {{App\Models\student::count_inter()}} ]</span>
                            </a>
                            
                        </div>
                  
        </div>
       
      

        
    
    </div> 
 

 
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
                                    <th>القسم الدراسي</th>
                                    <th>الحالة</th>
                                    
                                    <th>الاجراء</th>
                                </tr>
                            </thead>
                            <tbody>
                          @foreach ($students as $student)
                              
                    
                                <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{$student->arabic_name}}</td>
                                    <td>{{$student->badge}}</td>
                                    <td>{{App\Models\department::getDepNameById($student->department_id)}} </td>
                                    <td> 
                                        @if ($student->enrollment_status_id == '1')
                                        <span class="tag tag-success">تم التجديد</span>
                                          @elseif($student->enrollment_status_id == '2')
                                        <span class="tag tag-default">متوقف</span>
                                          @else
                                        <span class="tag tag-danger">منقطع</span>

                                        @endif
                                    </td>
                                    <td>
                                     
                                        <a class="btn btn-success btn-sm" href="{{route('RenewalComplete' , ['id' => $student->id])}}">تجديد</a>
                                      ------
                                        <a class="btn btn-primary btn-sm" href="{{route('RenewalCancel' , ['id' => $student->id])}}">إلغاء</a>
                                        ------
                                        <a class="btn btn-danger btn-sm" href="{{route('RenewalStop' , ['id' => $student->id])}}">إيقاف</a>
                                   
                                         
                               



                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
            <!--/col-->
        </div>
        </div>
  
 
 
 
 
@endsection