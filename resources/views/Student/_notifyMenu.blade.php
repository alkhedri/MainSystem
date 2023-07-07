
@extends('Student.layout')
 

@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item">الطالب</li>
    <li class="breadcrumb-item"><a href="#">الاشعارات</a>
    </li>
     
 
</ol>
@endsection


@section('content')
<div class="alert alert-primary" role="alert">
    قم بالضغط على عنوان الرسالة لعرض التفاصيل .
  </div>
  <div class="card">
    <div class="card-block">
<table class="table table-hover table-outline m-b-0">
    <thead class="thead-default">
        <tr>
             <th class="text-xs-left">#</th>
            <th class="text-xs-left">المرسل</th>
            <th class="text-xs-center">العنوان</th>
            
            <th class="text-xs-center">التاريخ</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($notifications as $notification)
            
       
        <tr>
      <td class="text-xs-left"> {{$loop->index + 1}}</td>
            <td>
                <div style="text-align: right;"> 
               <strong> {{ App\Models\Instructor::getInstructorsName($notification->sender_id)}}</strong>  
                 </div>
                <div class="small text-muted" style="text-align: right;">
                    <strong>  {{ App\Models\Instructor::getInstructorDepartment($notification->sender_id)}}</strong> 
                </div>
            </td>
            <td class="text-xs-center">
                <strong>    <a href="{{route('ShowNotificationMessage' , ['id' => $notification->id])}}">   {{$notification->title}}</a></strong> 
             
            </td>
     
        
            <td class="text-xs-center">
                 
                <strong>  {{$notification->date}} </strong>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
</div>
{{$notifications->links()}}
@endsection