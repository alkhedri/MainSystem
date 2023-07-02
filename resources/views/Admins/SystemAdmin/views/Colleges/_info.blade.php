
@extends('Admins.SystemAdmin.layout')





@section('breadcramp')
<ol class="breadcrumb">
 
    <li class="breadcrumb-item">الكليات</li>
    <li class="breadcrumb-item"><a href="{{route('CollegesMenu')}}">قائمة الكليات</a></li>
    <li class="breadcrumb-item">{{ App\Models\college::getNameById($college_id)}}</li>
     
 
</ol>
@endsection


@section('content')
@foreach($college as $data)
 
<div class="row">
 

    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
               
                <i class="fa fa-edit"></i>
                <strong>كلية</strong> 
                <span> [   {{$data->arabic_name}}
                    ] </span>
        
            </div>
            <div class="card-block">
                <form class="form-horizontal" action="{{ route('CollegeUpdate') }} " method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="form-control-label" for="prependedInput">اسم الكلية  [بالعربي]</label>
                        <div class="controls">
                            <div class="input-prepend input-group">
                                <input id="prependedInput" class="form-control" size="16" type="text" value="{{$data->arabic_name}}"name="arabic_name">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-control-label" for="prependedInput">اسم الكلية  [انجليزي]</label>
                        <div class="controls">
                            <div class="input-prepend input-group">
                                <input id="prependedInput" class="form-control" size="16" type="text" value="{{$data->english_name}}"name="english_name">
                            </div>
                        </div>
                    </div>

            

                    <div class="form-group">
                        <label class="form-control-label" for="appendedInput">شعار الكلية</label>
                        <div class="controls">
                            <div class="input-group">
                                <input type="file" id="file-input" name="image">
                                
                            </div>
                            
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="form-control-label" for="appendedPrependedInput">عميد الكلية</label>
                        <div class="controls">
                            <div class="input-prepend input-group">
                                <input id="prependedInput" class="form-control" size="16" type="text" value="{{ App\Models\Instructor::getInstructorsName($dean)}}"name="dean" readonly>
                    
                                
                               <a class="tag tag-primary " href="{{route('CollegeDean' , ['id' => $data->id])}}">تغيير</a>
                                
                            </div>
                        </div>
                    </div>
               
                    <input id="id" type="hidden" value="{{$data->id}}"  name="id">
                                
                    <div class="form-actions" dir="ltr">
                        <button type="submit" class="btn btn-primary">حفظ</button>
          
                    </div>
                </form>
            </div>
        </div>
    </div>

  
<div class="col-6">
    <div class="col-sm-4 ">
        <div class="card">
            <div class="card-header">
               
                <i class="icon-picture"></i>
                <strong>شعار الكلية</strong> 
             
            </div>
            <div class="card-block" style="display: flex; justify-content : center">
                <img src="colicon/{{$data->icon}}" class="img-avatar" alt="الشعار" style="width: 300px; height:300px">
            </div>
        </div>
    </div>
</div>
</div>
@endforeach
@endsection