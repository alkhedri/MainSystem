

@extends('instructors.layout')
 
@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item">منسق الدراسة و الامتحانات</li>
    <li class="breadcrumb-item"><a href="#">جدول المحاضرات</a>

    </li>
     
 
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
    <a class="btn btn-primary" href="{{route('ClassTableEdit')}}" style="margin-left: 10px">تعديل</a>
 
    <a class="btn btn-success" href="{{route('CreateClassTable')}}">إنشاء</a>

    <button  class="btn btn-primary"   onclick="printDiv()"> <i class="fa icon-printer
      "></i>
      طباعة</button>
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
   
    <tr style="border-top:2px solid black">
        
      <th rowspan="5"  style="text-align: center;vertical-align:middle"  >السبت</th>
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
      <th rowspan="5" style="text-align: center;vertical-align:middle">الاحد</th>
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
    
        <th rowspan="5" style="text-align: center;vertical-align:middle">الاثنين</th>
       
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
      
    
        <th rowspan="5" style="text-align: center;vertical-align:middle">الثلاثاء</th>
         
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
      
        <th rowspan="5" style="text-align: center;vertical-align:middle">الاربعاء</th>
         
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
      
       <th rowspan="5" style="text-align: center;vertical-align:middle">الخميس</th>
       
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


   
</div>
 
 
 
 
@endsection


@section('page-js-script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script type="text/javascript">
  
function printDiv( ) {
  var divToPrint=document.getElementById("table");
        newWin= window.open("");
        newWin.document.write(divToPrint.outerHTML);
        newWin.print();
        newWin.close();
}
</script>
@endsection
