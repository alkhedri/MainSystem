
@extends('Admins.ExaminationDepartment.layout')


@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item">الطلبة</li>
    <li class="breadcrumb-item">اخطار طالب </li>
        <li class="breadcrumb-item">  {{$student_id}} </li>
        
    
     
 
</ol>
@endsection


@section('content')

<div class="row">
    
    <div class="col-sm-8">
        <div class="card">
            <div class="card-header">
            نموذج اخطار طالب
        </div>
        <div class="card-block">
            <form action="{{route('StudentNotofyAlertAction')}}" method="post">
                @csrf
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">رقم القيد</span>
                        <input  type="text" id="username3" name="studnet_badge" class="form-control" value="{{$student_id}}">
                        <span class="input-group-addon"><i class="fa fa-user"></i>
                        </span>
                    </div>
                </div>
            
                <div class="form-group">
                    <div class="input-group">
                        <label class="input-group-addon">العنوان</label>
                        <input type="text" id="username3" name="title" class="form-control">
                              <span class="input-group-addon"><i class="fa fa-envelope"></i>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <label class="input-group-addon">الرسالة</label>
                        <textarea id="textarea-input" name="message" rows="5" class="form-control" placeholder="  
                        "></textarea>
                            <span class="input-group-addon"><i class="fa fa-envelope"></i>
                        </span>
                    </div>
                </div>

                <div class="form-group form-actions" dir="ltr">
                    <button type="submit" class="btn btn-sm btn-primary">اشعار</button>
                </div>
            </form>
        </div>
    </div>


</div>

   <div class="col-sm-4">
       @if(Session::has('name'))
      <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">تم ارسال الاشعار بنجاح</h4>
       
        <hr>
        <p class="mb-0">
            <p>   تفاصيل الاشعار :</p>
           
            <span> المستقبل : {{Session::get('name')}}</span>
            <br>
            <span> رقم القيد : {{Session::get('badge')}}</span>
            <br>
            <span>  القسم : {{Session::get('department')}}</span>
            
        </p>
      </div>
      </div>
      @endif

      
</div> 


</div>
  
 
@endsection