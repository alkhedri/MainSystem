 
@extends('Student.layout')
 

@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item">الطالب</li>
    <li class="breadcrumb-item">طلب التنسيب للاقسام العلمية</li>
 
    </li>
     
 
</ol>
@endsection


@section('content')

<div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">ملاحظة هامة</h4>
    <p>تقديم الطلب يتم لمرة واحدة فقط !</p>
    <hr>
    <p class="mb-0">الرجاء ترتيب الطلب من حيث الرغبة اولا.</p>
  </div>
<div class="row">

    
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-edit"></i>   طلب التنسيب
       
            </div>
            <div class="card-block">
                            <form action="{{route('PlacementApplicationAction')}}" method="post" class="form-horizontal ">
                                @csrf
                                @foreach ($departments as $test)
                                <div class="form-group row">
                                    <label class="col-lg-3 form-control-label" for="input-large">القسم</label>
                                    <div class="col-lg-6">
                                      
                                   <Select id="input-large" name="applications[]" class="form-control input-lg" placeholder=".input-lg">
                                    <option value="" selected disabled>القسم العلمي </option>
                                    @foreach ($departments as $item)
                                   <option value="{{$item->id}}">{{$item->arabic_name}}</option>
                                    @endforeach
                                 
                       
                                   </Select>
                                    </div>
                                </div>
                                
                                @endforeach
                       
                            
                                <div class="form-actions" dir="ltr">
                                    <button type="submit" class="btn btn-primary">تقديم الطلب</button>
                             
                                </div>
                            </form>
                        </div>
    </div>
    <!--/col-->
</div>

 
 
@endsection