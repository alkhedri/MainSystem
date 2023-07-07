
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
    <h4 class="alert-heading mb-0"><i class="fa fa-hashtag"></i>      العنوان : {{$item->title}}</h4>
    <p ><i class="icon-user"></i>        المرسل : {{ App\Models\Instructor::getInstructorsName($item->sender_id)}}</p>
    <p><i class="fa fa-calendar"></i>        التاريخ : {{$item->date}}</p>
    <hr>
    <h3><i class="icon-envelope-letter"></i>        الرسالة</h3>
    <h4 class="m-3">{{$item->message}}</h4>
  </div>
@endforeach

 
@endsection