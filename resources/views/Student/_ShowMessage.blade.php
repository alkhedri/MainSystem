
@extends('Student.layout')
 

@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item">الطالب</li>
    <li class="breadcrumb-item"><a href="{{route('NotifyMenu')}}">الاشعارات</a></li>
        <li class="breadcrumb-item">عرض الرسالة</li>
        
    
     
 
</ol>
@endsection


@section('content')
@foreach ($message as $item)
<div class="alert alert-primary" role="alert">
    <h4 class="alert-heading">{{$item->title}}</h4>
    <p>المرسل : {{ App\Models\Instructor::getInstructorsName($item->sender_id)}}</p>
    <p>التاريخ : {{$item->date}}</p>
    <hr>
    <h2>الرسالة</h2>
    <h4 class="mb-0">{{$item->message}}</h4>
  </div>
@endforeach

 
@endsection