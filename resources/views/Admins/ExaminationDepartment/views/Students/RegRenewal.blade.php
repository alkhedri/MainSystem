
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
                        <input type="radio" id="inline-radio1" name="searchBy" value="Badge" checked> 
                    <label for="inline-radio1">رقم القيد </label> 
                    <input type="radio" id="inline-radio2" name="searchBy" value="arabic_name">
                    <label for="inline-radio2">الاسم </label> 
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="input-group">
                                    
                                    <input type="text" id="input1-group2" name="badge" class="typeahead form-control" placeholder=" " autocomplete="off">
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
                            
                            <a class="btn btn btn-info" href="{{route('RegRenewalStopped')}}">
                                <i class="fa fa-dot-circle-o"></i>
                                المتوقفين  
                                <span>[ {{App\Models\student::count_stopped()}} ]</span>
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
                                    <td><strong>{{$student->arabic_name}}</strong></td>
                                    <td>{{$student->Badge}}</td>
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
                                     
                                        <a class="btn btn-outline-success  " href="{{route('RenewalComplete' , ['id' => $student->id])}}"><strong>تجديد</strong></a>
                                        
                                        <a class="btn btn-outline-primary  " href="{{route('RenewalCancel' , ['id' => $student->id])}}"><strong>إلغاء</strong></a>
                                  
                                        <a class="btn btn-outline-danger  " href="{{route('RenewalStop' , ['id' => $student->id])}}"><strong>إيقاف</strong></a>
                                   
                                         
                               



                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$students->links()}}
                    </div>
                </div>
            </div>
            <!--/col-->
        </div>
        </div>
  
 
 
 
 
@endsection

@section('js-scripts')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js" integrity="sha512-HWlJyU4ut5HkEj0QsK/IxBCY55n5ZpskyjVlAoV9Z7XQwwkqXoYdCIC93/htL3Gu5H3R4an/S0h2NXfbZk3g7w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.js" integrity="sha512-P2Z/b+j031xZuS/nr8Re8dMwx6pNIexgJ7YqcFWKIqCdbjynk4kuX/GrqpQWEcI94PRCyfbUQrjRcWMi7btb0g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" charset="utf-8">
    var route = "{{ url('autocomplete-search') }}";
    $('input.typeahead').typeahead({
        source: function (query, process) {
            return $.get(route, {
                sb: query,
                
            }, function (data) {
                return process(data);
            });
        }

  
    });
</script>
@endsection