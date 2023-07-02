
@extends('instructors.layout')
 
 
@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item">عضو هيئة التدريس</li>
    <li class="breadcrumb-item">قائمة المقررات</a></li>

        <li class="breadcrumb-item"><a href="{{route('marksRecord' , ['subject_id' => $subject_id])}}">
            {{App\Models\subject::getSubjectName($subject_id) }}
        
        </a></li>
        <li class="breadcrumb-item">إشعار بالدرجات</li>

    
     
 
</ol>
@endsection


@section('content')
@if(Session::has('ids'))
<div class="alert alert-success" role="alert">
    <h5 class="alert-heading"><i class="icon-eyeglass"></i>        كشف الدرجات</h5>
    <hr>
    <div class="row"> 
       
        <div class="col-md-3">
            @foreach (Session::get('ids') as $id)
           <strong> {{App\Models\student::getNameById($id) }}</strong>
           
            <br>
          @endforeach
        </div>

        <div class="col-md-3">
            @foreach (Session::get('marks') as $mark)
            @if($mark == NULL) 
            <strong>  => [  غياب  ]</strong>
            @else
         <strong>   => [  {{$mark}}  ]</strong>
            @endif
          
            <br>
          @endforeach
        </div>
    </div>

        
</div>
@endif
                         
<div class="alert alert-primary" role="alert">
    <h5 class="alert-heading"><i class="icon-pin"></i>        ملاحظة</h5>
  <strong> <p><i class="icon-badge"></i>        في حالة غياب الطالب تترك درجته فارغة.</p></strong> 
     
  </div>

 <div class="row">


    <div class="col-8">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> عنوان الدرجات
            </div>
            <div class="card-block">
             <div class="row">
                <div class="col-sm-3">
                    <input style="width: 280px" class="form-control font-weight-bold " type="text" name="title" id="titleForm" value="درجة الإمتحان النصفي الأول"> 
                </div>
                <div class="col-md-4">
                    <input style="width: 280px" class="form-control font-weight-bold " type="text" name="title" id="subject" value="لمقرر :   {{App\Models\subject::getSubjectName($subject_id) }}" readonly> 
             
                    
                </div>
             </div>
      
        </div>
     </div>
 
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i>قائمة الطلبة 
                    </div>
                    <div class="card-block">

                    
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th  >الطالب</th>
                                    <th  >رقم القيد</th>
                                    <th  style="text-align: center" >الدرجة</th>
                         
                                </tr>
                            </thead>
                            <tbody>
                        
                                @foreach ($subjectStudents as $std)
                            
                                <tr>
                                    <td> {{$loop->index + 1}}</td>
                                    <td  > <strong> {{App\Models\student::getNameById($std->student_id) }} </strong></td>
                                    <td  >{{App\Models\student::getBadgeById($std->student_id) }}</td>

                                        <form action="{{route('NotifyEachAction')}}" method="POST" id="submitForm">
                                           
                                        @csrf
                                        <td   ><input  type="text" class="form-control input-md     font-weight-bold  " name="work[]" value="" style="text-align: center" ></td>
                                        <input type="hidden" name="ids[]" value="{{$std->student_id}}">
                                      

                                                                        
               
                           
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                        <button  onclick="handleSubmit()" class="pull-left btn btn-danger "> <i class="icon-fire"></i>     إشعار </button>
                    </form> 
                    </div>
                </div>
            </div>
            <!--/col-->
        </div>
        </div>
  
    </div>
 
 

        
@endsection
 
@section('page-js-script')
<script>
    function handleSubmit() {

        var form=document.getElementById('submitForm');//retrieve the form as a DOM element


        var input = document.createElement('input');//prepare a new input DOM element
        input.setAttribute('name', 'title');//set the param name
        input.setAttribute('value', document.getElementById("titleForm").value + " " +  document.getElementById("subject").value);//set the value
        input.setAttribute('type', 'hidden')//set the type, like "hidden" or other

    

        form.appendChild(input);//append the input to the form
  



        




        form.submit();//send with added input
 
    }
    </script>
@endsection
 