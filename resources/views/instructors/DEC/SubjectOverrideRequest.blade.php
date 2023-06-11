

@extends('instructors.layout')
 
@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item">منسق الدراسة و الامتحانات</li>
    <li class="breadcrumb-item"><a href="#">المقررات</a>
        <li class="breadcrumb-item"><a href="#">طلب تجاوز</a>
    </li>
     
 
</ol>
@endsection


@section('content')

<div class="row">
    
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                طلب تنزيل مقرر متجاوز
            </div>
            <div class="card-block">
                <form action="{{route('OverrideRequestAction')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">الطالب</span>
                            <input type="text" id="username3" name="student_name" class="form-control">
                            <span class="input-group-addon"><i class="fa fa-user"></i>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">رقم القيد</span>
                            <input type="text" id="email3" name="student_badge" class="form-control">
                            <span class="input-group-addon"><i class="fa fa-asterisk"></i>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">القسم الدراسي </span>
                            <input type="text" id="email3" name="student_department" class="form-control" value="{{ App\Models\department::getDepNameById($department_id)}}">
                            <span class="input-group-addon"><i class="fa fa-asterisk"></i>
                            </span>
                        </div>
                    </div>
                    <div class="row">

                        <div class="form-group col-sm-8">
                            <div class="input-group">
                                <span class="input-group-addon">اسم المقرر </span>
                              
                                <select id="myInput1" onchange="myChangeFunction(this)"  name="selectedSubject" class="form-control" size="1">
                                    <option value="" selected disabled>قم باختيار مقرر</option>
               @foreach ($subjects as $subject)
               <option value="{{$subject->code}}">{{$subject->arabic_name}}</option>
               @endforeach
                                </select>
                                <span class="input-group-addon"><i class="fa fa-asterisk"></i>
                                </span>
                            </div>
                        </div>

                        <div class="form-group col-sm-4">
                            <div class="input-group">
                                <span class="input-group-addon">رمز المقرر</span>
                                <input type="text" id="myInput2" name="code" class="form-control">
                                <span class="input-group-addon"><i class="fa fa-asterisk"></i>
                                </span>
                            </div>
                        </div>

                    </div>
                     
             
                    <div class="form-group">
                        <div class="input-group">
                            <label class="input-group-addon">السبب</label>
                            <textarea id="textarea-input" name="reason" rows="5" class="form-control" placeholder="                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat nemo saepe quibusdam repudiandae in eius possimus nulla molestias tenetur nostrum neque, unde earum necessitatibus, praesentium officiis adipisci quidem maxime iusto!"></textarea>
                                <span class="input-group-addon"><i class="fa fa-envelope"></i>
                            </span>
                        </div>
                    </div>

                    <div class="form-group form-actions" dir="ltr">
                        <button type="submit" class="btn btn-sm btn-primary">تقديم</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-sm-4">

        @if(Session::has('meassegeSent'))
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">تم تقديم الطلب بنجاح</h4>
            <p>التفاصيل :</p>
            <ul>
                <li>  {{Session::get('meassegeSent')['name']}} </li>
                <li>  {{Session::get('meassegeSent')['badge']}}</li>
                <li>  {{Session::get('meassegeSent')['code']}} </li>
        
                
            </ul>
            <hr>
            <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
          </div>
 
@endif
@if ($errors->any()) 
    <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">لم يتم تقديم الطلب !</h4>
        <p>التفاصيل :</p>
     
        {!! implode('', $errors->all('<div>:message</div>')) !!}


    
        <ul>
       
        <hr>
        <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
      </div>
</div>
@endif
    </div>
</div> 

 
  
 
 
 
 
@endsection

<script>
    function myChangeFunction(input1) {
     
      var input2 = document.getElementById('myInput2');
      input2.value = input1.value;
    }
  </script>