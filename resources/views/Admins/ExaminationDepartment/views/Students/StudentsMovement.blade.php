
@extends('Admins.ExaminationDepartment.layout')


@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item">الطلبة</li>
    <li class="breadcrumb-item"><a href="{{route('StudentsMovement')}}">نقل طالب</a>
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
               
                <form class="form-horizontal" action="{{ route('StudentsMovementSearch') }} " method="post">
                    
                    @csrf
                    <input type="radio" id="inline-radio1" name="searchBy" value="Badge" checked> 
                    <label for="inline-radio1">رقم القيد </label> 
                    <input type="radio" id="inline-radio2" name="searchBy" value="arabic_name">
                    <label for="inline-radio2">الاسم </label> 
                    <div class="form-group row">
                        <div class="col-md-6">
                            <div class="input-group">
                                
                                <input type="text" id="input1-group2" name="badge" class="typeahead form-control" data-provide="typeahead" autocomplete="off">

                    
                            </div>
                        </div>
                        <button type="submit" class="btn btn btn-success"><i class="fa fa-dot-circle-o"></i> بحث</button>

                        </form>
                    </div>

                    <div style="margin-right: 10px">
                        <a class="btn btn btn-primary" href="{{route('StudentsMovement')}}">
                            <i class="fa fa-dot-circle-o"></i>
                                عرض الكل  
                                <span>[ {{App\Models\student::count_all()}} ]</span>
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
                                    <th>الفصل الدراسي</th>
                                    <th>القسم السابق</th>

                                    <th>القسم الدراسي</th>

                                    <th>الاجراء</th>
                                </tr>
                            </thead>
                            <tbody>
                          @foreach ($students as $student)
                          <tr>
                            <td>{{$loop->index + 1}}</td>
                            <td><strong>{{$student->arabic_name}}</strong></td>
                            <td>{{$student->Badge}}</td>
                               
                           <td>{{App\Models\student::StudentsSemestersCount($student->id)}}</td>

                           <td> {{App\Models\department::getDepNameById($student->old_department_id)}} </td>
                            <td> {{App\Models\department::getDepNameById($student->department_id)}} </td>
                            <td>
                            
                                <a class="btn btn-primary btn-sm" href="{{ route('StudentsMovementAction' , ['id' => $student->id ]) }}">نقل</a>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js">
</script>
<script type="text/javascript">
    var route = "{{ url('Movement_autocomplete-search') }}";


    


    $('input.typeahead').typeahead({
        source: function (query, process) {
            return $.get(route, {
                sb: query,
                 search : document.querySelector('input[name = "searchBy"]:checked').value
            }, function (data) {
                return process(data);
            });
        }

  
    });
</script>
@endsection