

@extends('instructors.layout')
 
@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item">منسق الدراسة و الامتحانات</li>
    <li class="breadcrumb-item"><a href="{{route('ExamsTable')}}">جدول الامتحانات</a>
    </li>
        <li class="breadcrumb-item">تعديل جدول الامتحانات</li>
       

    
     
 
</ol>
@endsection
 
@section('content')
 

<table class="table  table-bordered" style="width:100%">
    <tr>
      <th rowspan="2">التاريخ</th>
   
    
    </tr>
   <tr>
   <td colspan="1" style="text-align: center">الفترة الاولى</td>
    <td colspan="1" style="text-align: center">الفترة الثانية</td>
 
   
   </tr>
   
   @foreach ($dates as $date)
   <tr style="border-top:2px solid black">
    <th rowspan="{{ App\Models\ExamsTable::getRows($date->date)}}"  style="text-align: center;vertical-align:middle"  >
        {{$date->date}}
   - 
    <a class="btn btn-danger btn-sm" href="{{route('EditExamsTableActionDelete' , ['date' => $date->date])}}">حذف</a> 
    </th>
  

    @foreach (App\Models\ExamsTable::getSubs($date->date) as $item)
    <tr class="alert-primary">
        <td>   {{ App\Models\ExamsTable::getSubjectName($item->F)}} - <a class="btn btn-danger btn-sm" href="{{route('EditExamsTableActionFirst' , ['id' => $item->id])}}">حذف</a> </td>
        <td>   {{ App\Models\ExamsTable::getSubjectName($item->S)}} - <a class="btn btn-danger btn-sm" href="{{route('EditExamsTableActionSecond' , ['id' => $item->id])}}">حذف</a></td>
    </tr>
        
    @endforeach

 

   @endforeach
   
   
 
</table>
@endsection