

@extends('instructors.layout')
 
@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item">منسق الدراسة و الامتحانات</li>
    <li class="breadcrumb-item"><a href="{{route('TimeTable')}}"> جدول المحاضرات</a>   </li>
    <li class="breadcrumb-item">تعديل جدول المحاضرات   </li>

 
     
 
</ol>
@endsection

@section('content')
 
<div class="col-lg-12">
  @if(Session::has('message'))
  <div class="alert alert-danger" role="alert">
          {{Session::get('message')}} 
</div>
@endif
  <div  style="display:flex;justify-content:end; margin:10px;">
  
 
 
  </div>
    <div class="card">
        <div class="card-header">
            <i class="fa fa-align-justify"></i> جدول المحاضرات
        </div>
        <div class="card-block">
              
<table class="table  table-bordered" style="width:100%" id="table" border='1' cellpadding='1'   >
    <tr>
      <th rowspan="2">المحاضرة  اليوم </th>
   
    
    </tr>
   <tr>
   <td colspan="3" style="text-align: center">الاولى</td>
    <td colspan="3" style="text-align: center">الثانية</td>
    <td colspan="3" style="text-align: center">الثالثة</td>
    <td colspan="3" style="text-align: center">الرابعة</td>
   
   </tr>
   
    <tr style="border-top:2px solid black"  >
        
      <th rowspan="{{App\Models\TimeTable::getRows(0)}}"  style="text-align: center;vertical-align:middle"  >السبت</th>
    </tr>
     

    @foreach ($Saturday as $item)
     <tr class="alert-primary">
        <td>{{App\Models\subject::getSubjectName($item->Stp)}} -
          <a class="tag tag-danger" href="{{route('TimeTableDeleteAction' , ['id' => $item->id , 'period' => 1])}}">حذف</a>
          <a class="tag tag-primary" href="{{route('TimeTableEditPeriod' , ['id' => $item->id , 'period' => 1])}}">تعديل</a>

      </td>
      <td>{{App\Models\TimeTable_Room::getStpRoomByDayID($item->id)}}</td>
        <td>TIME</td>

        <td>{{App\Models\subject::getSubjectName($item->Sp)}}
          -
          <a class="tag tag-danger" href="{{route('TimeTableDeleteAction' , ['id' => $item->id , 'period' => 2])}}">حذف</a>
          <a class="tag tag-primary" href="{{route('TimeTableEditPeriod' , ['id' => $item->id , 'period' => 2])}}">تعديل</a>

        </td>
        <td>{{App\Models\TimeTable_Room::getSpRoomByDayID($item->id)}}</td>
        <td>TIME</td>
        <td>{{App\Models\subject::getSubjectName($item->Tp)}}       -
          <a class="tag tag-danger" href="{{route('TimeTableDeleteAction' , ['id' => $item->id , 'period' => 3])}}">حذف</a>
          <a class="tag tag-primary" href="{{route('TimeTableEditPeriod' , ['id' => $item->id , 'period' => 3])}}">تعديل</a>

          <td>{{App\Models\TimeTable_Room::getTpRoomByDayID($item->id)}}</td>
          <td>TIME</td>
        <td>{{App\Models\subject::getSubjectName($item->Fp)}}       -
          <a class="tag tag-danger" href="{{route('TimeTableDeleteAction' , ['id' => $item->id , 'period' => 4])}}">حذف</a>
          <a class="tag tag-primary" href="{{route('TimeTableEditPeriod' , ['id' => $item->id , 'period' => 4])}}">تعديل</a>

          <td>{{App\Models\TimeTable_Room::getFpRoomByDayID($item->id)}}</td>
          <td>TIME</td>
     </tr>
     @endforeach
            
          
    
     <tr >
      <th rowspan="{{App\Models\TimeTable::getRows(1)}}" style="text-align: center;vertical-align:middle">الاحد</th>
    </tr> 

    @foreach ($Sunday as $item)
     <tr class="alert-success text-white">
 
        <td>{{App\Models\subject::getSubjectName($item->Stp)}}       -
          <a class="tag tag-danger" href="{{route('TimeTableDeleteAction' , ['id' => $item->id , 'period' => 1])}}">حذف</a>
          <a class="tag tag-primary" href="{{route('TimeTableEditPeriod' , ['id' => $item->id , 'period' => 1])}}">تعديل</a>


          <td>{{App\Models\TimeTable_Room::getStpRoomByDayID($item->id)}}</td>
          <td>TIME</td>
        <td>{{App\Models\subject::getSubjectName($item->Sp)}}       -
          <a class="tag tag-danger" href="{{route('TimeTableDeleteAction' , ['id' => $item->id , 'period' => 2])}}">حذف</a>
          <a class="tag tag-primary" href="{{route('TimeTableEditPeriod' , ['id' => $item->id , 'period' => 2])}}">تعديل</a>

          <td>{{App\Models\TimeTable_Room::getSpRoomByDayID($item->id)}}</td>
          <td>TIME</td>
        <td>{{App\Models\subject::getSubjectName($item->Tp)}}       -
          <a class="tag tag-danger" href="{{route('TimeTableDeleteAction' , ['id' => $item->id , 'period' => 3])}}">حذف</a>
          <a class="tag tag-primary" href="{{route('TimeTableEditPeriod' , ['id' => $item->id , 'period' => 3])}}">تعديل</a>

          <td>{{App\Models\TimeTable_Room::getTpRoomByDayID($item->id)}}</td>
          <td>TIME</td>
        <td>{{App\Models\subject::getSubjectName($item->Fp)}}       -
          <a class="tag tag-danger" href="{{route('TimeTableDeleteAction' , ['id' => $item->id , 'period' => 4])}}">حذف</a>
          <a class="tag tag-primary" href="{{route('TimeTableEditPeriod' , ['id' => $item->id , 'period' => 4])}}">تعديل</a>

          <td>{{App\Models\TimeTable_Room::getFpRoomByDayID($item->id)}}</td>
          <td>TIME</td>
       
     </tr>
     @endforeach
     
     <tr>
    
        <th rowspan="{{App\Models\TimeTable::getRows(2)}}" style="text-align: center;vertical-align:middle">الاثنين</th>
       
      </tr>
      
      @foreach ($Monday as $item)
     <tr class="alert-danger">
        <td>{{App\Models\subject::getSubjectName($item->Stp)}}       -
          <a class="tag tag-danger" href="{{route('TimeTableDeleteAction' , ['id' => $item->id , 'period' => 1])}}">حذف</a>
          <a class="tag tag-primary" href="{{route('TimeTableEditPeriod' , ['id' => $item->id , 'period' => 1])}}">تعديل</a>

          <td>{{App\Models\TimeTable_Room::getStpRoomByDayID($item->id)}}</td>
          <td>TIME</td>
        <td>{{App\Models\subject::getSubjectName($item->Sp)}}       -
          <a class="tag tag-danger" href="{{route('TimeTableDeleteAction' , ['id' => $item->id , 'period' => 2])}}">حذف</a>
          <a class="tag tag-primary" href="{{route('TimeTableEditPeriod' , ['id' => $item->id , 'period' => 2])}}">تعديل</a>

          <td>{{App\Models\TimeTable_Room::getSpRoomByDayID($item->id)}}</td>V
          <td>TIME</td>
        <td>{{App\Models\subject::getSubjectName($item->Tp)}}       -
          <a class="tag tag-danger" href="{{route('TimeTableDeleteAction' , ['id' => $item->id , 'period' => 3])}}">حذف</a>
          <a class="tag tag-primary" href="{{route('TimeTableEditPeriod' , ['id' => $item->id , 'period' => 3])}}">تعديل</a>

          <td>{{App\Models\TimeTable_Room::getTpRoomByDayID($item->id)}}</td>
          <td>TIME</td>
        <td>{{App\Models\subject::getSubjectName($item->Fp)}}       -
          <a class="tag tag-danger" href="{{route('TimeTableDeleteAction' , ['id' => $item->id , 'period' =>4])}}">حذف</a>
          <a class="tag tag-primary" href="{{route('TimeTableEditPeriod' , ['id' => $item->id , 'period' => 4])}}">تعديل</a>

          <td>{{App\Models\TimeTable_Room::getFpRoomByDayID($item->id)}}</td>
          <td>TIME</td>
    </tr>
     @endforeach
    
       <tr style="margin: 20px">
      
    
        <th rowspan="{{App\Models\TimeTable::getRows(3)}}" style="text-align: center;vertical-align:middle">الثلاثاء</th>
         
      </tr>
      
      @foreach ($Tuesday as $item)
     <tr class="alert-warning">
        <td>{{App\Models\subject::getSubjectName($item->Stp)}}       -
          <a class="tag tag-danger" href="{{route('TimeTableDeleteAction' , ['id' => $item->id , 'period' => 1])}}">حذف</a>
          <a class="tag tag-primary" href="{{route('TimeTableEditPeriod' , ['id' => $item->id , 'period' => 1])}}">تعديل</a>

          <td>{{App\Models\TimeTable_Room::getStpRoomByDayID($item->id)}}</td>
          <td>TIME</td>
        <td>{{App\Models\subject::getSubjectName($item->Sp)}}       -
          <a class="tag tag-danger" href="{{route('TimeTableDeleteAction' , ['id' => $item->id , 'period' => 2])}}">حذف</a>
          <a class="tag tag-primary" href="{{route('TimeTableEditPeriod' , ['id' => $item->id , 'period' => 2])}}">تعديل</a>

          <td>{{App\Models\TimeTable_Room::getSpRoomByDayID($item->id)}}</td>
          <td>TIME</td>
        <td>{{App\Models\subject::getSubjectName($item->Tp)}}       -
          <a class="tag tag-danger" href="{{route('TimeTableDeleteAction' , ['id' => $item->id , 'period' => 3])}}">حذف</a>
          <a class="tag tag-primary" href="{{route('TimeTableEditPeriod' , ['id' => $item->id , 'period' => 3])}}">تعديل</a>

          <td>{{App\Models\TimeTable_Room::getTpRoomByDayID($item->id)}}</td>
          <td>TIME</td>
        <td>{{App\Models\subject::getSubjectName($item->Fp)}}       -
          <a class="tag tag-danger" href="{{route('TimeTableDeleteAction' , ['id' => $item->id , 'period' => 4])}}">حذف</a>
          <a class="tag tag-primary" href="{{route('TimeTableEditPeriod' , ['id' => $item->id , 'period' => 4])}}">تعديل</a>

          <td>{{App\Models\TimeTable_Room::getFpRoomByDayID($item->id)}}</td>
          <td>TIME</td>
     </tr>
     @endforeach
    
       <tr style="margin: 20px">
      
        <th rowspan="{{App\Models\TimeTable::getRows(4)}}" style="text-align: center;vertical-align:middle">الاربعاء</th>
         
      </tr>
      
      @foreach ($Wedensday as $item)
     <tr >
        <td>{{App\Models\subject::getSubjectName($item->Stp)}}       -
          <a class="tag tag-danger" href="{{route('TimeTableDeleteAction' , ['id' => $item->id , 'period' => 1])}}">حذف</a>
          <a class="tag tag-primary" href="{{route('TimeTableEditPeriod' , ['id' => $item->id , 'period' => 1])}}">تعديل</a>

          <td>{{App\Models\TimeTable_Room::getStpRoomByDayID($item->id)}}</td>
          <td>TIME</td>
        <td>{{App\Models\subject::getSubjectName($item->Sp)}}       -
          <a class="tag tag-danger" href="{{route('TimeTableDeleteAction' , ['id' => $item->id , 'period' => 2])}}">حذف</a>
          <a class="tag tag-primary" href="{{route('TimeTableEditPeriod' , ['id' => $item->id , 'period' => 2])}}">تعديل</a>

          <td>{{App\Models\TimeTable_Room::getSpRoomByDayID($item->id)}}</td>
          <td>TIME</td>
        <td>{{App\Models\subject::getSubjectName($item->Tp)}}       -
          <a class="tag tag-danger" href="{{route('TimeTableDeleteAction' , ['id' => $item->id , 'period' => 3])}}">حذف</a>
          <a class="tag tag-primary" href="{{route('TimeTableEditPeriod' , ['id' => $item->id , 'period' => 3])}}">تعديل</a>

          <td>{{App\Models\TimeTable_Room::getTpRoomByDayID($item->id)}}</td>
          <td>TIME</td>
        <td>{{App\Models\subject::getSubjectName($item->Fp)}}       -
          <a class="tag tag-danger" href="{{route('TimeTableDeleteAction' , ['id' => $item->id , 'period' => 4])}}">حذف</a>
          <a class="tag tag-primary" href="{{route('TimeTableEditPeriod' , ['id' => $item->id , 'period' => 4])}}">تعديل</a>

          <td>{{App\Models\TimeTable_Room::getFpRoomByDayID($item->id)}}</td>
          <td>TIME</td>
     </tr>
     @endforeach
    
       <tr>
      
       <th rowspan="{{App\Models\TimeTable::getRows(5)}}" style="text-align: center;vertical-align:middle">الخميس</th>
       
     </tr>
     
     @foreach ($Thursday as $item)
     <tr class="alert-info">
        <td>{{App\Models\subject::getSubjectName($item->Stp)}}       -
          <a class="tag tag-danger" href="{{route('TimeTableDeleteAction' , ['id' => $item->id , 'period' => 1])}}">حذف</a>
          <a class="tag tag-primary" href="{{route('TimeTableEditPeriod' , ['id' => $item->id , 'period' => 1])}}">تعديل</a>

          <td>{{App\Models\TimeTable_Room::getStpRoomByDayID($item->id)}}</td>
        <td>TIME</td>
        <td>{{App\Models\subject::getSubjectName($item->Sp)}}       -
          <a class="tag tag-danger" href="{{route('TimeTableDeleteAction' , ['id' => $item->id , 'period' =>2])}}">حذف</a>
          <a class="tag tag-primary" href="{{route('TimeTableEditPeriod' , ['id' => $item->id , 'period' => 2])}}">تعديل</a>

          <td>{{App\Models\TimeTable_Room::getSpRoomByDayID($item->id)}}</td>
        <td>TIME</td>
        <td>{{App\Models\subject::getSubjectName($item->Tp)}}       -
          <a class="tag tag-danger" href="{{route('TimeTableDeleteAction' , ['id' => $item->id , 'period' => 3])}}">حذف</a>
          <a class="tag tag-primary" href="{{route('TimeTableEditPeriod' , ['id' => $item->id , 'period' => 3])}}">تعديل</a>

          <td>{{App\Models\TimeTable_Room::getTpRoomByDayID($item->id)}}</td>
        <td>TIME</td>
        <td>{{App\Models\subject::getSubjectName($item->Fp)}}       -
          <a class="tag tag-danger" href="{{route('TimeTableDeleteAction' , ['id' => $item->id , 'period' => 4])}}">حذف</a>
          <a class="tag tag-primary" href="{{route('TimeTableEditPeriod' , ['id' => $item->id , 'period' => 4])}}">تعديل</a>

          <td>{{App\Models\TimeTable_Room::getFpRoomByDayID($item->id)}}</td>
          <td>TIME</td>
     </tr>
     @endforeach
      
    
  </table>
        </div>
    </div>


   
</div>
 
 
 
 
@endsection
 
