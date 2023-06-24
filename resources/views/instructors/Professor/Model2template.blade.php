<html lang="en" dir="rtl"><!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]--><!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]--><!--[if !IE]><!--><!--<![endif]--><!-- BEGIN HEAD --><head>
    <meta charset="utf-8">
    <title> بطاقة نتيجة  </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="" name="description">
    <meta content="" name="author">
 <link href="https://sis.sabu.edu.ly/sis//cssnew/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://sis.sabu.edu.ly/sis//cssnew/assets/global/plugins/bootstrap/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css">
    <link href="https://sis.sabu.edu.ly/sis//cssnew/assets/global/css/components-md-rtl.min.css" rel="stylesheet" id="style_components" type="text/css">
      <link href="https://sis.sabu.edu.ly/sis//cssnew/assets/layouts/layout3/css/layout-rtl.min.css" rel="stylesheet" type="text/css">

     <!-- Icons -->
     <link href="css/font-awesome.min.css" rel="stylesheet">
     <link href="css/simple-line-icons.css" rel="stylesheet">
    
     <style>
        @font-face{
            font-family: "tajawal";
 
            
            font-weight: normal;
            font-style: normal;
        }
        body{
            font-family: "tajawal";
        }
    </style>
    <link rel="shortcut icon" href="favicon.ico">
</head>

<body dir="rtl" class="page-container-bg-solid page-md">

    @php
   $date =  date('Y-m-d');
@endphp


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
                                        <h1>النتيجة الدراسية
                                            
                                        </h1>
                                        <br>
                                        <button onclick="window.print()" class="btn btn-primary" style="width: 150px"><span class="fa icon-printer"></span>        طباعة النتيجة         </button>

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
                        <div class="col-md-10 col-sm-12">
                          <div class="col-md-6 text-left">
                           <div class="col-md-2 text-left"><img src="https://sis.sabu.edu.ly/sis/17.jpg" style="width: 60px;height: 60px"></div>
                           <div class="col-md-5 text-left">دولة ليبيا <br> وزارة التعلمي العالي والبحث العلمي   <br> جامعة صبراتة</div>
                             </div>
                            <div class="col-md-6 text-right">كلية :الهندسة صبراته                                  <br>نموذج تقدير درجات \نموذج2 <b university="" of="" sabrartha="" <br=""> <img alt="UNIVERSITY OF Sabrartha#1611200398" src="https://sis.sabu.edu.ly/sis/barcode.php?text=1611200398" width="180px" title="UNIVERSITY OF Sabrartha#1611200398>">     
                             </b></div><b university="" of="" sabrartha="" <br="">
                                 <br><br><br><br>
                      
                                 <br>    
                                 @foreach ($studentData as $student)
                                     
                                       
     <div class="row" style="box-shadow: 1px 2px 10px  black;padding: 10px;background-color: rgba(163, 163, 163, 0.32)">
         <div class="col-xs-5 col-md-5">  إسم الطالب : <strong>  {{$student->arabic_name}} </strong><br>
           <br>القسم العام :          <strong>  {{App\Models\department::getDepNameById($student->department_id)}} </strong><br><br>
       </div>
       <div class="col-xs-4 col-md-4"> رقم الطالب  : <strong>{{ $student->Badge }}</strong><br>
          <br>التخصص   : <strong> {{App\Models\department::getDepNameById($student->department_id)}}  </strong><br>
          <br>
    	</div>
         <div class="col-xs-3 col-md-3">القيد  : <strong>نظامي</strong><br>
            <br>الفصل   : <strong> {{App\Models\student::StudentsSemestersCount($student->id)}}  </strong><br>
    	</div>
     </div>
     @endforeach   
             <hr>
                                                                    <table class="table table-hover">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>م</th>
                                                                                <th>أسم القرر</th>
                                                                                <th>رمز المقرر</th>
                                                                                <th>الوحدات</th>
                                                                                 
                                                                                <th>ملاحظات</th>
                                                                             
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                                
                                                                            @foreach ($studentSubjects as $subject)
                                                                            <tr class="alert alert-success" style="color: black;font-size: 150px">
                                                                                <td> {{$loop->index + 1 }}</td>
                                                                                <td>  {{App\Models\subject::getSubjectName($subject->subject_id)}}</td>
                                                                                <td>  {{App\Models\subject::getSubjectCode($subject->subject_id)}}</td>
                                                                                <td>  {{App\Models\subject::getSubjectUnits($subject->subject_id)}}</td>
                                                                                
                                                                                <td>1</td>
                                                                            </tr> 
                                                                            @endforeach<tr>
                                                                            
                                                        
                        
                                        
                                                                             
                                                                             
                                     </tbody>
                                   </table>
                                   
                                    <div class="col-xs-2 col-md-4 text-left"> </div>
                                    <div class="col-xs-10 col-md-8 text-right">
                                         <table class="table" width="50px">
                                         <thead style="background-color: rgba(163, 163, 163, 0.32)">
                                                 <tr>
                                                                          
                                                                               <th>المجموع  :{{$unitsCount}} </th>
                                                                           
                                                                               
                                                                               
                                                                                
                                                                             
                                                                            </tr>
                                             </thead>
                                             <tbody>
                                               
                                              </tbody>
                                           </table> 
          
          </div>
                                   
                                   
                                                                    
                                                                   
                                                                    <br>
                                                                    <div class="row">
        .<table class="table-responsive table">
          
            <tbody><tr>
             <td><strong style="color: black;font-size: 15px">المشرف   </strong></td>
             <td><strong style="color: black;font-size: 15px">    </strong></td>
            <td><strong style="color: black;font-size: 15px">    </strong></td>
             <td> <strong style="color: black;font-size: 15px">توقيع الطالب  </strong> </td>
             </tr>
              <tr>
             <td>   </td><td>  </td>
             <td>  </td>
             <td>  </td>
             <td>   </td>
             </tr>
               <tr>
             <td><strong style="color: black;font-size: 15px">التاريخ   </strong></td>
             <td><strong style="color: black;font-size: 15px">    </strong></td>
            <td><strong style="color: black;font-size: 15px">    </strong></td>
             <td> <strong style="color: black;font-size: 15px">التاريخ  </strong> </td>
             </tr>
              <tr>
             <td>   {{$date}}</td>
             <td>   </td>
             <td> </td>
             <td> {{$date}}   </td>
             </tr>
         </tbody></table>
                                                                    </div>
                                                                    <br><br><br>
                                                                 
   
                                                                     	
                                                            </b></div><b university="" of="" sabrartha="" <br="">
                                                        </b></div><b university="" of="" sabrartha="" <br="">
                                                        
                                                    </b></div><b university="" of="" sabrartha="" <br="">
                                                </b></div><b university="" of="" sabrartha="" <br="">
                                            </b></div><b university="" of="" sabrartha="" <br="">
                                        </b></div><b university="" of="" sabrartha="" <br="">
                                    </b></div><b university="" of="" sabrartha="" <br="">
                                    
                                    <!-- END PAGE CONTENT INNER -->
                                </b></div><b university="" of="" sabrartha="" <br="">
                            </b></div><b university="" of="" sabrartha="" <br="">
                            <!-- END PAGE CONTENT BODY -->
                            <!-- END CONTENT BODY -->
                        </b></div><b university="" of="" sabrartha="" <br="">
                    </b></div><b university="" of="" sabrartha="" <br="">
                </b></div><b university="" of="" sabrartha="" <br="">
            </b></div><b university="" of="" sabrartha="" <br="">
            
            
            
            
            
            
             
</b></div><b university="" of="" sabrartha="" <br="">
<!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script>
<![endif]-->
<script async="" src="//www.google-analytics.com/analytics.js"></script><script src="https://sis.sabu.edu.ly/sis//assets/global/plugins/jquery.min.js" type="text/javascript"></script>
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



<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-68518207-1', 'auto');
    ga('send', 'pageview');
 
</script>
</b></body></html>