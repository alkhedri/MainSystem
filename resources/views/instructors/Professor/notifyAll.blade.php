
@extends('instructors.layout')


@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item"><a href="{{route('SubjectsList')}}">المقررات</a></li>
    <li class="breadcrumb-item">اخطار جميع الطلاب </li>
        <li class="breadcrumb-item">{{App\Models\subject::getSubjectName($subject_id)}}</li>
        
    
     
 
</ol>
@endsection


@section('content')

<div class="row">
    <div class="col-sm-8">
        @if(Session::has('message'))
        <div class="alert alert-success">
        {{Session::get('message')}} 
    </div>
        @endif
        
    <div class="alert alert-primary">
        <strong>  عدد الطلبة المستهدفين [ {{$studentsCount}} ] </strong>
 
    </div>
</div>
    <div class="col-sm-8">
        <div class="card">
            <div class="card-header">
            نموذج اخطار طالب
        </div>
        <div class="card-block">
            <form action="{{route('NotifyAllAction')}}" method="post">
                @csrf
                 
            
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
                <input type="hidden" value="{{$subject_id}}" name="subject_id">
                <input type="hidden" value="{{$group_id}}" name="group_id">

                   
                <div class="form-group form-actions" dir="ltr">
                    <button type="submit" class="btn btn-sm btn-primary">اشعار</button>
                </div>
            </form>
        </div>
    </div>


</div>

    
 

</div>
  
 
@endsection