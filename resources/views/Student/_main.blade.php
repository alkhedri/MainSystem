 
@extends('Student.layout')
 

@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
 
    </li>
     
 
</ol>
@endsection


@section('content')
 
<div class="row">
  <div class="col-sm-6 col-lg-3">
      <div class="card card-inverse card-primary">
          <div class="card-block p-b-0">
              <div class="btn-group pull-left">
 
              </div>
              <h6 class="m-b-0"> الاسم : {{ App\Models\Student::getNameById(Auth::user()->id)}}</h6>
              <p class="m-b-0"> رقم القيد : {{ App\Models\Student::getBadgeById(Auth::user()->id)}}</p>
              <p class="m-b-0">القسم الدراسي : {{ App\Models\Student::getDepNameById(Auth::user()->id)}}</p>
   
          </div>
          <div class="chart-wrapper p-x-1" style="height:70px;"><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; inset: 0px;"></iframe>
              <canvas id="card-chart1" class="chart" height="244" width="1112" style="display: block; width: 318px; height: 70px;"></canvas>
          </div>
      </div>
  </div>
  <!--/col-->

  <div class="col-sm-6 col-lg-3">
      <div class="card card-inverse card-info">
          <div class="card-block p-b-0">
              <button type="button" class="btn btn-transparent active p-a-0 pull-left">
                  <i class="icon-location-pin"></i>
              </button>
              <h4 class="m-b-0">{{$notificationsCount}}</h4>
              <p>الإشعارات
                -
            [ {{$notificationsCountUnRead}} ]
                <a style="color:white" href="{{route('NotifyMenu')}}">غير مقروء</a>
              </p>
          </div>
          <div class="chart-wrapper p-x-1" style="height:70px;"><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; inset: 0px;"></iframe>
              <canvas id="card-chart2" class="chart" height="244" width="1112" style="display: block; width: 318px; height: 70px;"></canvas>
          </div>
      </div>
  </div>
  <!--/col-->

  <div class="col-sm-6 col-lg-3">
      <div class="card card-inverse card-warning">
          <div class="card-block p-b-0">
              <div class="btn-group pull-left">
                  <button type="button" class="btn btn-transparent active dropdown-toggle p-a-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="icon-settings"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right">
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                  </div>
              </div>
              <h4 class="m-b-0">{{$alertDates}}</h4>
              <p>
                <a style="color:white"  href="{{route('RequirementsMenu')}}">المهام</a>
              </p>
          </div>
          <div class="chart-wrapper" style="height:70px;"><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; inset: 0px;"></iframe>
              <canvas id="card-chart3" class="chart" height="244" width="1224" style="display: block; width: 350px; height: 70px;"></canvas>
          </div>
      </div>
  </div>
  <!--/col-->

  <div class="col-sm-6 col-lg-3">
      <div class="card card-inverse card-danger">
          <div class="card-block p-b-0">
              <div class="btn-group pull-left">
                  <button type="button" class="btn btn-transparent active dropdown-toggle p-a-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="icon-settings"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right">
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                  </div>
              </div>
              <h4 class="m-b-0">{{$alertsCount}}</h4>
              <p>الإنذارات</p>
          </div>
          <div class="chart-wrapper p-x-1" style="height:70px;"><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; inset: 0px;"></iframe>
              <canvas id="card-chart4" class="chart" height="244" width="1112" style="display: block; width: 318px; height: 70px;"></canvas>
          </div>
      </div>
  </div>
  <!--/col-->

</div>

<div class="card">
  <div class="card-block">
      <div class="row">
          <div class="col-xs-5">
              <h4 class="card-title">جدول المقررات</h4>
              <div class="" style="margin-top:-10px;">{{$current_semester_name}}</div>
          </div>
          <div class="col-xs-7">
               
          </div>
      </div>
   
      <div class="hidden-sm-up">
        <div style="overflow-x:auto;">
            <table>
                <tr>
                    <th rowspan="2"> اليوم / المحاضرة </th>
                             
                              
                </tr>
               <tr>
               <th colspan="2" style="text-align: center" > 
                الاولىssss
               <br>
               [10:30 - 8:30]
            </th>
                <th colspan="2" style="text-align: center">
                    الثانية
                    <br>
                    [12:30 - 10:30]
                </th>
                <th colspan="2" style="text-align: center">
                    الثالثة
                    <br>
                    [02:30 - 12:30]
                </th>
                <th colspan="2" style="text-align: center">
                    الرابعة
                    <br>
                    [04:30 - 02:30]
                </th>
               
               </tr>
                  <tr style="">
                      
                    <th rowspan="1"  style="text-align: center;vertical-align:middle"  >السبت</th>
                  
                    
                    <td> </td>
                    <td>8:30</td>
         
              
                    <td> </td>
                     <td>10:00</td>
              
              
                     <td> </td>
                      <td>قاعه</td>
          
              
                      <td> </td>
                        <td>قاعه</td>
                     
                     
                  </tr>
                  
               
                   <tr>
                    <th rowspan="1" style="text-align: center;vertical-align:middle">الاحد</th>
                    <td>برمجة حاسوب</td>
                    <td>8:30</td>
         
              
                    <td>هيكلة بيانات</td>
                     <td>10:00</td>
              
              
                      <td>مقرر</td>
                      <td>قاعه</td>
          
              
                        <td>مقرر</td>
                        <td>قاعه</td>
                  
                  </tr>
               
                        <tr>
                    <th rowspan="1" style="text-align: center;vertical-align:middle">الاثنين</th>
                    <td>برمجة حاسوب</td>
                    <td>8:30</td>
                  
              
                    <td>هيكلة بيانات</td>
                     <td>10:00</td>
                   
              
                      <td>مقرر</td>
                      <td>قاعه</td>
                      
                       
                        <td>مقرر</td>
                        <td>قاعه</td>
              
                  </tr>
                  <tr>
                      <th rowspan="1" style="text-align: center;vertical-align:middle">الثلاثاء</th>
                      <td>برمجة حاسوب</td>
                      <td>8:30</td>
             
                
                      <td>هيكلة بيانات</td>
                       <td>10:00</td>
                   
                
                        <td>مقرر</td>
                        <td>قاعه</td>
                       
                         
                          <td>مقرر</td>
                          <td>قاعه</td>
                           
                    </tr>
            </table>
          </div>
      </div>

    
        
      <table class="table  table-bordered hidden-sm-down" style="width:100%" id="table"     >
        <tr>
            <th rowspan="2" style="text-align: center">
              المحاضرة
              <hr>
              اليوم \  التوقيت</th>
         
          
          </tr>
         <tr>
         <td colspan="2" style="text-align: center">
          الاولى
          <hr>
          [08:00 - 10:00]
        </td>
          <td colspan="2" style="text-align: center">
            الثانية
            <hr>
            [10:00 - 12:00]
          </td>
          <td colspan="2" style="text-align: center">
            الثالثة
            <hr>
          [12:00 - 02:00]
          </td>
          <td colspan="2" style="text-align: center">
            الرابعة
            <hr>
            [02:00 - 04:00]
          </td>
         
         </tr>
         
          <tr style="border-top:2px solid black">
              
            <th rowspan="{{App\Models\TimeTable::getRowsStd(0)}}"  style="text-align: center;vertical-align:middle"  >السبت</th>
          </tr>
           
      
          @foreach ($Saturday as $item)
           <tr>
            
              <td class="alert-info">{{App\Models\subject::getSubjectName($item->Stp)}}</td>
              @if($item->Stp == NULL)
              <td class="alert-info"> </td>
              @else
              <td class="alert-info">{{App\Models\TimeTable_Room::getStpRoomByDayID($item->id)}}</td>
              @endif
             
      
              <td class="alert-success">{{App\Models\subject::getSubjectName($item->Sp)}}</td>
              @if($item->Sp == NULL)
              <td class="alert-success"> </td>
              @else
              <td class="alert-success">{{App\Models\TimeTable_Room::getSpRoomByDayID($item->id)}}</td>
              @endif


              <td class="alert-danger">{{App\Models\subject::getSubjectName($item->Tp)}}</td>
              @if($item->Tp == NULL)
              <td class="alert-danger"> </td>
              @else
              <td class="alert-danger">{{App\Models\TimeTable_Room::getTpRoomByDayID($item->id)}}</td>
              @endif


              <td class="alert-info">{{App\Models\subject::getSubjectName($item->Fp)}}</td>
              @if($item->Fp == NULL)
              <td class="alert-info"> </td>
              @else
              <td class="alert-info">{{App\Models\TimeTable_Room::getFpRoomByDayID($item->id)}}</td>
              @endif
           </tr>
           @endforeach
                  
                
          
           <tr>
            <th rowspan="{{App\Models\TimeTable::getRowsStd(1)}}" style="text-align: center;vertical-align:middle">الاحد</th>
          </tr> 
      
          @foreach ($Sunday as $item)
           <tr >
       
              <td class="alert-info">{{App\Models\subject::getSubjectName($item->Stp)}}</td>
              <td class="alert-info">{{App\Models\TimeTable_Room::getStpRoomByDayID($item->id)}}</td>
            
              <td>{{App\Models\subject::getSubjectName($item->Sp)}}</td>
              <td>{{App\Models\TimeTable_Room::getSpRoomByDayID($item->id)}}</td>
       
              <td>{{App\Models\subject::getSubjectName($item->Tp)}}</td>
              <td>{{App\Models\TimeTable_Room::getTpRoomByDayID($item->id)}}</td>
         
              <td>{{App\Models\subject::getSubjectName($item->Fp)}}</td>
              <td>{{App\Models\TimeTable_Room::getFpRoomByDayID($item->id)}}</td>
            
             
           </tr>
           @endforeach
           
           <tr>
          
              <th rowspan="{{App\Models\TimeTable::getRowsStd(2)}}" style="text-align: center;vertical-align:middle">الاثنين</th>
             
            </tr>
            
            @foreach ($Monday as $item)
           <tr >
              <td class="alert-info">{{App\Models\subject::getSubjectName($item->Stp)}}</td>
              <td class="alert-info">{{App\Models\TimeTable_Room::getStpRoomByDayID($item->id)}}</td>
         
              <td>{{App\Models\subject::getSubjectName($item->Sp)}}</td>
              <td>{{App\Models\TimeTable_Room::getSpRoomByDayID($item->id)}}</td>
              
              <td>{{App\Models\subject::getSubjectName($item->Tp)}}</td>
              <td>{{App\Models\TimeTable_Room::getTpRoomByDayID($item->id)}}</td>
            
              <td>{{App\Models\subject::getSubjectName($item->Fp)}}</td>
              <td>{{App\Models\TimeTable_Room::getFpRoomByDayID($item->id)}}</td>
        
          </tr>
           @endforeach
          
             <tr>
            
          
              <th rowspan="{{App\Models\TimeTable::getRowsStd(3)}}" style="text-align: center;vertical-align:middle">الثلاثاء</th>
               
            </tr>
            
            @foreach ($Tuesday as $item)
           <tr >
              <td class="alert-info">{{App\Models\subject::getSubjectName($item->Stp)}}</td>
              <td class="alert-info">{{App\Models\TimeTable_Room::getStpRoomByDayID($item->id)}}</td>
            
              <td>{{App\Models\subject::getSubjectName($item->Sp)}}</td>
              <td>{{App\Models\TimeTable_Room::getSpRoomByDayID($item->id)}}</td>
               
              <td>{{App\Models\subject::getSubjectName($item->Tp)}}</td>
              <td>{{App\Models\TimeTable_Room::getTpRoomByDayID($item->id)}}</td>
           
              <td>{{App\Models\subject::getSubjectName($item->Fp)}}</td>
              <td>{{App\Models\TimeTable_Room::getFpRoomByDayID($item->id)}}</td>
           
           </tr>
           @endforeach
          
             <tr>
            
              <th rowspan="{{App\Models\TimeTable::getRowsStd(4)}}" style="text-align: center;vertical-align:middle">الاربعاء</th>
               
            </tr>
            
            @foreach ($Wedensday as $item)
           <tr>
              <td class="alert-info">{{App\Models\subject::getSubjectName($item->Stp)}}</td>
              <td class="alert-info">{{App\Models\TimeTable_Room::getStpRoomByDayID($item->id)}}</td>
            
              <td>{{App\Models\subject::getSubjectName($item->Sp)}}</td>
              <td>{{App\Models\TimeTable_Room::getSpRoomByDayID($item->id)}}</td>
       
              <td>{{App\Models\subject::getSubjectName($item->Tp)}}</td>
              <td>{{App\Models\TimeTable_Room::getTpRoomByDayID($item->id)}}</td>
            
              <td>{{App\Models\subject::getSubjectName($item->Fp)}}</td>
              <td>{{App\Models\TimeTable_Room::getFpRoomByDayID($item->id)}}</td>
             
           </tr>
           @endforeach
          
             <tr>
            
             <th rowspan="{{App\Models\TimeTable::getRowsStd(5)}}" style="text-align: center;vertical-align:middle">الخميس</th>
             
           </tr>
           
           @foreach ($Thursday as $item)
           <tr >
              <td class="alert-info">{{App\Models\subject::getSubjectName($item->Stp)}}</td>
              <td class="alert-info">{{App\Models\TimeTable_Room::getStpRoomByDayID($item->id)}}</td>
             
              <td>{{App\Models\subject::getSubjectName($item->Sp)}}</td>
              <td>{{App\Models\TimeTable_Room::getSpRoomByDayID($item->id)}}</td>
          
              <td>{{App\Models\subject::getSubjectName($item->Tp)}}</td>
              <td>{{App\Models\TimeTable_Room::getTpRoomByDayID($item->id)}}</td>
         
              <td>{{App\Models\subject::getSubjectName($item->Fp)}}</td>
              <td>{{App\Models\TimeTable_Room::getFpRoomByDayID($item->id)}}</td>
              
           </tr>
           @endforeach
            
          
        </table>
 
</div>
 
  <div class="card-footer">
       
  </div>
</div>
@endsection



