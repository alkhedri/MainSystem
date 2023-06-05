

@extends('instructors.layout')
 
@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item">منسق الدراسة و الامتحانات</li>
    <li class="breadcrumb-item"><a href="#">جدول المحاضرات</a>
        <li class="breadcrumb-item"><a href="#">تعديل جدول المحاضرات</a>

    </li>
     
 
</ol>
@endsection

@section('content')

@if(Session::has('message'))
<p>{{Session::get('message')}}</p>
@endif
<div class="col-lg-12">
    <div class="alert alert-primary" role="alert">
        ملاحظة : قم بإختيار اليوم المراد تغيير الجدول به 
      </div>
    <div class="card">
        <div class="card-header">
            <i class="fa fa-align-justify"></i>    جدول المحاضرات
        </div>
        <div class="card-block">
              
<table class="table  table-bordered" style="width:100%;">

    <tr>
      <th rowspan="2">المحاضرة  اليوم </th>
   
    
    </tr>
   <tr>
   <td colspan="3" style="text-align: center">الاولى</td>
    <td colspan="3" style="text-align: center">الثانية</td>
    <td colspan="3" style="text-align: center">الثالثة</td>
    <td colspan="3" style="text-align: center">الرابعة</td>
   
   </tr>
   
    <tr style="border-top:2px solid black;border-bottom: 2px solid black">
        
      <th rowspan="5"  style="text-align: center;vertical-align:middle">
    <a href="{{route("DayToBeEdited" , ['day' => 0])}}">السبت</a>
    </th>
</tr>
     

@foreach ($Saturday as $item)
<tr class="alert-primary">
    
        <td>  {{ App\Models\subject::find($item->Stp)->arabic_name ?? 'None' }} </td>
        <td>{{ App\Models\Timetable_Room::getStpRoomByDayID($item->id) }} </td>
        <td  style="border-left:2px solid black" >8:30</td>
        
        <td>  {{ App\Models\subject::find($item->Sp)->arabic_name ?? 'None' }}  </td>
        <td>{{ App\Models\Timetable_Room::getSpRoomByDayID($item->id) }} </td>
        <td  style="border-left:2px solid black" >8:30</td>
        
        <td>  {{ App\Models\subject::find($item->Tp)->arabic_name ?? 'None'  }} </td>
        <td>{{ App\Models\Timetable_Room::getTpRoomByDayID($item->id) }} </td>
        <td  style="border-left:2px solid black" >8:30</td>
        
        <td>   {{ App\Models\subject::find($item->Fp)->arabic_name ?? 'None' }} </td>
        <td>{{ App\Models\Timetable_Room::getFpRoomByDayID($item->id) }} </td>
        <td  style="border-left:2px solid black" >8:30</td>
       </tr>
@endforeach
       
     
  
<tr>
    <th rowspan="5"  style="text-align: center;vertical-align:middle">
   
 <a href="{{route("DayToBeEdited" , ['day' => 1])}}">الاحد</a>
 </th>
</tr> 

@foreach ($Sunday as $item)
<tr class="alert-success text-white">

    <td>  {{ App\Models\subject::find($item->Stp)->arabic_name ?? 'None' }} </td>
    <td>{{ App\Models\Timetable_Room::getStpRoomByDayID($item->id) }} </td>
    <td  style="border-left:2px solid black" >8:30</td>
    
    <td>  {{ App\Models\subject::find($item->Sp)->arabic_name ?? 'None' }}  </td>
    <td>{{ App\Models\Timetable_Room::getSpRoomByDayID($item->id) }} </td>
    <td  style="border-left:2px solid black" >8:30</td>
    
    <td>  {{ App\Models\subject::find($item->Tp)->arabic_name ?? 'None'  }} </td>
    <td>{{ App\Models\Timetable_Room::getTpRoomByDayID($item->id) }} </td>
    <td  style="border-left:2px solid black" >8:30</td>
    
    <td>   {{ App\Models\subject::find($item->Fp)->arabic_name ?? 'None' }} </td>
    <td>{{ App\Models\Timetable_Room::getFpRoomByDayID($item->id) }} </td>
    <td  style="border-left:2px solid black" >8:30</td>
</tr>
@endforeach

<tr>

    <th rowspan="5"  style="text-align: center;vertical-align:middle">
   
   <a href="{{route("DayToBeEdited" , ['day' => 2])}}">الاثنين</a>
</th>
 </tr>
 
@foreach ($Monday as $item)
<tr class="alert-danger">

    <td>  {{ App\Models\subject::find($item->Stp)->arabic_name ?? 'None' }} </td>
    <td>{{ App\Models\Timetable_Room::getStpRoomByDayID($item->id) }} </td>
    <td  style="border-left:2px solid black" >8:30</td>
    
    <td>  {{ App\Models\subject::find($item->Sp)->arabic_name ?? 'None' }}  </td>
    <td>{{ App\Models\Timetable_Room::getSpRoomByDayID($item->id) }} </td>
    <td  style="border-left:2px solid black" >8:30</td>
    
    <td>  {{ App\Models\subject::find($item->Tp)->arabic_name ?? 'None'  }} </td>
    <td>{{ App\Models\Timetable_Room::getTpRoomByDayID($item->id) }} </td>
    <td  style="border-left:2px solid black" >8:30</td>
    
    <td>   {{ App\Models\subject::find($item->Fp)->arabic_name ?? 'None' }} </td>
    <td>{{ App\Models\Timetable_Room::getFpRoomByDayID($item->id) }} </td>
    <td  style="border-left:2px solid black" >8:30</td>
</tr>
@endforeach
  <tr>
    <th rowspan="5"  style="text-align: center;vertical-align:middle">
   
    <a href="{{route("DayToBeEdited" , ['day' => 3])}}">الثلاثاء</a>
</th>
    
 </tr>
 
@foreach ($Tuesday as $item)
<tr class="alert-warning">
 
    <td>  {{ App\Models\subject::find($item->Stp)->arabic_name ?? 'None' }} </td>
    <td>{{ App\Models\Timetable_Room::getStpRoomByDayID($item->id) }} </td>
    <td  style="border-left:2px solid black" >8:30</td>
    
    <td>  {{ App\Models\subject::find($item->Sp)->arabic_name ?? 'None' }}  </td>
    <td>{{ App\Models\Timetable_Room::getSpRoomByDayID($item->id) }} </td>
    <td  style="border-left:2px solid black" >8:30</td>
    
    <td>  {{ App\Models\subject::find($item->Tp)->arabic_name ?? 'None'  }} </td>
    <td>{{ App\Models\Timetable_Room::getTpRoomByDayID($item->id) }} </td>
    <td  style="border-left:2px solid black" >8:30</td>
    
    <td>   {{ App\Models\subject::find($item->Fp)->arabic_name ?? 'None' }} </td>
    <td>{{ App\Models\Timetable_Room::getFpRoomByDayID($item->id) }} </td>
    <td  style="border-left:2px solid black" >8:30</td>
</tr>
@endforeach
  <tr>
 
    <th rowspan="5"  style="text-align: center;vertical-align:middle">
   
   <a href="{{route("DayToBeEdited" , ['day' => 4])}}">الاربعاء</a>
</th>
 </tr>
 
@foreach ($Wedensday as $item)
<tr>
 
    <td>  {{ App\Models\subject::find($item->Stp)->arabic_name ?? 'None' }} </td>
    <td>{{ App\Models\Timetable_Room::getStpRoomByDayID($item->id) }} </td>
    <td  style="border-left:2px solid black" >8:30</td>
    
    <td>  {{ App\Models\subject::find($item->Sp)->arabic_name ?? 'None' }}  </td>
    <td>{{ App\Models\Timetable_Room::getSpRoomByDayID($item->id) }} </td>
    <td  style="border-left:2px solid black" >8:30</td>
    
    <td>  {{ App\Models\subject::find($item->Tp)->arabic_name ?? 'None'  }} </td>
    <td>{{ App\Models\Timetable_Room::getTpRoomByDayID($item->id) }} </td>
    <td  style="border-left:2px solid black" >8:30</td>
    
    <td>   {{ App\Models\subject::find($item->Fp)->arabic_name ?? 'None' }} </td>
    <td>{{ App\Models\Timetable_Room::getFpRoomByDayID($item->id) }} </td>
    <td  style="border-left:2px solid black" >8:30</td>
</tr>
@endforeach
  <tr>
 
    <th rowspan="5"  style="text-align: center;vertical-align:middle">
   
  <a href="{{route("DayToBeEdited" , ['day' => 5])}}">الخميس</a>
    </th>
   
</tr>

@foreach ($Thursday as $item)
<tr class="alert-info">
 
    <td>  {{ App\Models\subject::find($item->Stp)->arabic_name ?? 'None' }} </td>
    <td>{{ App\Models\Timetable_Room::getStpRoomByDayID($item->id) }} </td>
    <td  style="border-left:2px solid black" >8:30</td>
    
    <td>  {{ App\Models\subject::find($item->Sp)->arabic_name ?? 'None' }}  </td>
    <td>{{ App\Models\Timetable_Room::getSpRoomByDayID($item->id) }} </td>
    <td  style="border-left:2px solid black" >8:30</td>
    
    <td>  {{ App\Models\subject::find($item->Tp)->arabic_name ?? 'None'  }} </td>
    <td>{{ App\Models\Timetable_Room::getTpRoomByDayID($item->id) }} </td>
    <td  style="border-left:2px solid black" >8:30</td>
    
    <td>   {{ App\Models\subject::find($item->Fp)->arabic_name ?? 'None' }} </td>
    <td>{{ App\Models\Timetable_Room::getFpRoomByDayID($item->id) }} </td>
    <td  style="border-left:2px solid black" >8:30</td>
</tr>
@endforeach
 

</table>
   </div>
</div>

 

@endsection