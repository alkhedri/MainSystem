<head>
    <meta charset="utf-8">
    <title>كشف     </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="" name="description">
    <meta content="" name="author">
   <link href="https://sis.sabu.edu.ly/sis//cssnew/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://sis.sabu.edu.ly/sis//cssnew/assets/global/plugins/bootstrap/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css">
      <link href="https://sis.sabu.edu.ly/sis//cssnew/assets/layouts/layout3/css/layout-rtl.min.css" rel="stylesheet" type="text/css">
 

    
     <style>
        @font-face{
            font-family: "Droid Arabic Kufi";
            src: url('https://sis.sabu.edu.ly/sis//cssnew/assets/fonts/DroidKufi-Regular.ttf') format('truetype');
            font-weight: normal;
            font-style: normal;
      
        }
        body{
            font-family: "Droid Arabic Kufi";font-size:12px;
        }
    span.tab-space {padding-right:5em;}
    </style>
    <link rel="shortcut icon" href="favicon.ico">
</head>
<body dir="rtl" class="page-container-bg-solid page-md">




<div class="page-wrapper-row full-height">
                <div class="page-wrapper-middle">
                    <div class="page-container">
                        <div class="page-content-wrapper">
                            <!-- BEGIN CONTENT BODY -->
                            <!-- BEGIN PAGE HEAD-->
                            <div class="page-head">
                                <div class="container">
                                    <!-- BEGIN PAGE TITLE -->
                                    <div class="page-title">
                                        <h1>نموذج حضور وغياب مقرر دراسى                                          
                                        </h1>
                                        <br>
                                         <button onclick="window.print()" class="btn btn-primary" style="width: 150px"><i class="icon-print"></i>طباعة  </button>
                                    </div>
                                    
                                </div>
                               
                            </div>
                            <!-- END PAGE HEAD-->
                            <!-- BEGIN PAGE CONTENT BODY -->
            <div class="page-content">
              <div class="container">            
                 <!-- BEGIN PAGE CONTENT INNER -->
                 <div class="page-content-inner">
                  <div class="row">
                    <div class="col-md-12">
                     <div class="portlet light portlet-fit  calendar">
                       <div class="portlet-title">

                       <div class="portlet-body">
                         <div class="row">
                           <div class="col-md-1 col-sm-10">
                                                               
                           </div>
                     <div class="col-md-12 col-sm-12">
                         <div class="col-xs-4 col-md-4 text-left"><img src="https://sis.sabu.edu.ly/sis//17.jpg" style="width: 60px;height: 60px"> 
                          <br> الكلية :  {{$college_name}}                
                  <br> القسم :        {{$department_name}} 
                         
                         <br> اسم المقرر :       {{ App\Models\subject::getSubjectName($subject_id)}}            </div><br>
                      
                         <div class="col-xs-4 col-md-4 text-center">وزارة التعليم العالي والبحث العلمي <br>        كـــــــشف   حضور وغياب  لمقـــرار دراســـى <br><br> رقم المقرر:{{ App\Models\subject::getSubjectCode($subject_id)}}  </div>
                         <div class="col-xs-4 col-md-4 text-center"></div><br><br><br>
                      
                         <div class="col-xs-4 col-md-4 text-right">الفصل الدراسى:     {{$semester_name}}  <br>  </div>
                       
                      <br><br><br><br> <br><br> <hr>
                                                         
     
             
                  <table class="table table-bordered " style="width:100% ; text-align:center; font-size:10px;margin-left:auto;margin-right:auto; ">
            <thead style="background-color: rgba(163, 163, 163, 0.32); font-size: 9">
                <tr>
                    <th>ر.م</th>
                    <th style="text-align:center">   رقم القيد </th>
                    <th style="text-align:center"><span class=" font-green sbold ">اسم الطالب </span></th>
                    <th style="text-align:center">نسبة الحضور</th>
                    <th style="text-align:center">1 </th>
                        <th style="text-align:center">2 </th>
<th style="text-align:center">3 </th>
                                <th style="text-align:center">4 </th>
                                <th style="text-align:center">5 </th>
                                <th style="text-align:center">6 </th>
                                <th style="text-align:center">7 </th>
                                <th style="text-align:center">8 </th>
                                <th style="text-align:center">9 </th>
                                <th style="text-align:center">10 </th>
                                <th style="text-align:center">11 </th>
                                <th style="text-align:center">12 </th>
                                <th style="text-align:center">13 </th>
                                <th style="text-align:center">14 </th>
                                <th style="text-align:center">15 </th>
                                <th style="text-align:center">16 </th>
                                <th style="text-align:center">17 </th>
                                <th style="text-align:center">18 </th>
                                <th style="text-align:center">19 </th>
                                <th style="text-align:center">20 </th>
                                <th style="text-align:center">21 </th>
                                <th style="text-align:center">22 </th>
                                <th style="text-align:center">23 </th>
                                <th style="text-align:center">24 </th>
                                    <th style="text-align:center">25 </th>
                                <th style="text-align:center">26 </th>
                                <th style="text-align:center">27 </th>
                                <th style="text-align:center">28 </th>
                                    <th style="text-align:center"><span class=" font-green sbold ">ملاحظات   </span></th>
                                
                                
                                
                            </tr>
                                
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                
                       
                                    <tr>

                                <td>{{$loop->index + 1}}</td>
<td> {{ App\Models\student::getBadgeById($student->student_id)}}</td>
                <td>
                    <span class=" font-green sbold ">{{ App\Models\student::getNameById($student->student_id)}}</span>
                </td>
                <td>
                    {{App\Models\student_attendanceRecord::AttendanceSheetPresentCount($student->student_id , $subject_id)}}
                 %

                    
                </td>
                @foreach (App\Models\student_attendanceRecord::CheckStatusSheet($student->student_id , $subject_id) as $item)
            
                  
                @if ($item->status == 1)
                <td>P</td>
                @else
                <td>A</td>
                @endif
             
                @endforeach
                
             
                {{-- <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td> --}}
            </tr>

            @endforeach
                         
                                     </tbody>
                                   </table>
         
                                                                 
                        
                                                                    <br><br><br>
                                                                 
   
                                                                       
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="row">
       
                 <div class="col-xs-6 col-md-6 text-left">  اعتماد رئيس القسم<br> .........................  </div>
                 <div class="col-xs-6 col-md-6 text-center">   </div>
                  
                  <div class="col-xs-12 col-md-12 text-right">        <br>   </div>
       
       
       
           </div>
<!-- END PAGE CONTENT INNER -->
                                </div>
                            </div>
                            <!-- END PAGE CONTENT BODY -->
                            <!-- END CONTENT BODY -->
                        </div>
                    </div>
                </div>
            </div>
            
            
            
            
            
            
             
</div>
<!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script>
<![endif]-->
<script async="" src="//www.google-analytics.com/analytics.js"></script><script src="https://sis.sabu.edu.ly/sis//cssnew/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="https://sis.sabu.edu.ly/sis//cssnew/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="https://sis.sabu.edu.ly/sis//cssnew/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="https://sis.sabu.edu.ly/sis//cssnew/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="https://sis.sabu.edu.ly/sis//cssnew/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="https://sis.sabu.edu.ly/sis//cssnew/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<script src="https://sis.sabu.edu.ly/sis//cssnew/assets/global/plugins/moment.min.js" type="text/javascript"></script>
<script src="https://sis.sabu.edu.ly/sis//cssnew/assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="https://sis.sabu.edu.ly/sis//cssnew/assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="https://sis.sabu.edu.ly/sis//cssnew/assets/global/scripts/app.min.js" type="text/javascript"></script>
<script src="https://sis.sabu.edu.ly/sis//cssnew/assets/apps/scripts/calendar.min.js" type="text/javascript"></script>
<script src="https://sis.sabu.edu.ly/sis//cssnew/assets/layouts/layout3/scripts/layout.min.js" type="text/javascript"></script>
<script src="https://sis.sabu.edu.ly/sis//cssnew/assets/layouts/layout3/scripts/demo.min.js" type="text/javascript"></script>
<script src="https://sis.sabu.edu.ly/sis//cssnew/assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>


 
</body>
