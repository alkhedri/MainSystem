

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
    
    <div class="col-sm-8">
        <div class="card">
            <div class="card-header">
                طلب تنزيل مقرر متجاز
            </div>
            <div class="card-block">
                <form action="" method="post">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">الطالب</span>
                            <input type="text" id="username3" name="username3" class="form-control">
                            <span class="input-group-addon"><i class="fa fa-user"></i>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">رقم القيد</span>
                            <input type="text" id="email3" name="email3" class="form-control">
                            <span class="input-group-addon"><i class="fa fa-asterisk"></i>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">القسم الدراسي </span>
                            <input type="text" id="email3" name="email3" class="form-control">
                            <span class="input-group-addon"><i class="fa fa-asterisk"></i>
                            </span>
                        </div>
                    </div>
                    <div class="row">

                        <div class="form-group col-sm-8">
                            <div class="input-group">
                                <span class="input-group-addon">اسم المقرر </span>
                                <input type="text" id="email3" name="email3" class="form-control">
                                <span class="input-group-addon"><i class="fa fa-asterisk"></i>
                                </span>
                            </div>
                        </div>

                        <div class="form-group col-sm-4">
                            <div class="input-group">
                                <span class="input-group-addon">رمز المقرر</span>
                                <input type="text" id="email3" name="email3" class="form-control">
                                <span class="input-group-addon"><i class="fa fa-asterisk"></i>
                                </span>
                            </div>
                        </div>

                    </div>
                     
             
                    <div class="form-group">
                        <div class="input-group">
                            <label class="input-group-addon">السبب</label>
                            <textarea id="textarea-input" name="textarea-input" rows="5" class="form-control" placeholder="                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat nemo saepe quibusdam repudiandae in eius possimus nulla molestias tenetur nostrum neque, unde earum necessitatibus, praesentium officiis adipisci quidem maxime iusto!"></textarea>
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
    
 
</div> 

 
  
 
 
 
 
@endsection