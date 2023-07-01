
@extends('instructors.layout')
 

@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item">رئيس القسم</li>
    <li class="breadcrumb-item"><a href="#">طلبة القسم</a>
    </li>
     
 
</ol>
@endsection


@section('content')

<div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                <strong>بحث</strong> طالب
            </div>
            <div class="card-block">
                <form action="{{route('SearchStudent')}}" method="post" class="form-horizontal ">
                    @csrf
                    <input type="radio" id="inline-radio1" name="searchBy" value="Badge" checked onclick="changeplaceholder('رقم القيد')"> 
                    <label for="inline-radio1">رقم القيد </label> 
                    <input type="radio" id="inline-radio2" name="searchBy" value="arabic_name"  onclick="changeplaceholder('الإسم')">
                    <label for="inline-radio2">الاسم </label> 
                    <div class="form-group row">
                        <div class="col-md-6">
                            <div class="input-group">
                       
                                <input type="text" id="input1-group2" name="student_name" class="typeahead form-control" placeholder="رقم القيد" data-provide="typeahead" autocomplete="off">
                            </div>
                        </div>
                        <button type="submit" class="btn btn btn-success"><i class="fa fa-dot-circle-o"></i> بحث</button>
                    </div>
                    
                    <a href="{{route('StudentsMenu')}}" class="btn btn btn-primary"><i class="fa fa-dot-circle-o"></i> الكل</a>
                     <a class="btn btn btn-success" href="{{route('ActiveStudents')}}"> <i class="fa fa-dot-circle-o"></i>  المستمرين </a>
                     
                    <a  href="{{route('notActiveStudents')}}" class="btn btn btn-danger"><i class="fa fa-dot-circle-o"></i> المنقطعين</a>
    </div>
   
 
</div> 

 
    <div class="col-8">
      

 
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i>قائمة الطلبة 

                         <span> - </span>  [ {{$count}} ]
                    </div>
                    <div class="card-block">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الطالب</th>
                                    <th>رقم القيد</th>
                                    <th>حالة القيد</th>
                                                   <th>الاجراء</th>
                                </tr>
                            </thead>
                            <tbody>
                          @foreach ($students as $student)
                              
                       
                                <tr>
                                    <td> {{$loop->index + 1}}</td>
                                    <td> {{ $student->arabic_name}}</td>
                                    <td> {{$student->Badge}}</td>

                                  
                                    @if ($student->enrollment_status_id == 1)
                                    <td>  <span class="tag tag-success">{{App\Models\student::getEnrollmentStatus($student->enrollment_status_id) }}</span></td>
                                   
                                    @elseif($student->enrollment_status_id == 2)
                                            
                                   <td><span class="tag tag-primary">{{App\Models\student::getEnrollmentStatus($student->enrollment_status_id) }} </span></td>
                                   @elseif($student->enrollment_status_id == 3)
                                            
                                    <td><span class="tag tag-danger">{{App\Models\student::getEnrollmentStatus($student->enrollment_status_id) }}</span></td>
                                   
                                    @endif
                                    

                                    
                                    
                                    <td>
                                        <a href="{{route('StudentsProfile' , [ 'id' => $student->id ])}}" class="btn btn-primary btn-sm">عرض البيانات</a>
                                        <a href="{{route('StudentsStats' , [ 'id' => $student->id ])}}" class="btn btn-success btn-sm">الاحصائيات</a>
 
                                        
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

@section('page-js-script')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js" integrity="sha512-HWlJyU4ut5HkEj0QsK/IxBCY55n5ZpskyjVlAoV9Z7XQwwkqXoYdCIC93/htL3Gu5H3R4an/S0h2NXfbZk3g7w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.js" integrity="sha512-P2Z/b+j031xZuS/nr8Re8dMwx6pNIexgJ7YqcFWKIqCdbjynk4kuX/GrqpQWEcI94PRCyfbUQrjRcWMi7btb0g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" charset="utf-8">
    var route = "{{ url('Department_autocomplete-search') }}";
    $('input.typeahead').typeahead({
        source: function (query, process) {
            return $.get(route, {
                sb: query,
                
            }, function (data) {
                return process(data);
            });
        }

  
    });


    let changeplaceholder = function(string){
        const element = document.getElementById("input1-group2");
        element.placeholder = string ;
    }
   

</script>
@endsection