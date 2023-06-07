 
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
              <h4 class="m-b-0">9.823</h4>
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
              <div class="small text-muted" style="margin-top:-10px;">November 2015</div>
          </div>
          <div class="col-xs-7">
               
          </div>
      </div>
      <div class="chart-wrapper" style="height:300px;margin-top:40px;"><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; inset: 0px;"></iframe>
      
      <div class="hidden-sm-up">
        <div style="overflow-x:auto;">
            <table>
                <tr>
                    <th rowspan="2"> اليوم / المحاضرة </th>
                             
                              
                </tr>
               <tr>
               <th colspan="2" style="text-align: center" > 
                الاولى
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
                    <td  >برمجة حاسوب</td>
                     <td>8:30</td>
              
                     <td>هيكلة بيانات</td>
                      <td>10:00</td>
            
                       <td>مقرر</td>
                       <td>قاعه</td>
                 
                         <td>مقرر</td>
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
<table class="table hidden-sm-down" >
    <tr>
        <th rowspan="2"> اليوم / المحاضرة </th>
                 
                  
    </tr>
   <tr>
   <th colspan="2" style="text-align: center" > 
    الاولى
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
      <td  >برمجة حاسوب</td>
       
       <td  style="" >8:30</td>
       <td>هيكلة بيانات</td>
        <td>10:00</td>
       
         <td>مقرر</td>
         <td>قاعه</td>
         
           <td>مقرر</td>
           <td>قاعه</td>
         
    </tr>
    
 
     <tr>
      <th rowspan="1" style="text-align: center;vertical-align:middle">الاحد</th>
      <td>برمجة حاسوب</td>
     
      <td>8:30</td>

      <td>هيكلة بيانات</td>
      
       <td>8:30</td>

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
 
  <div class="card-footer">
       
  </div>
</div>
@endsection