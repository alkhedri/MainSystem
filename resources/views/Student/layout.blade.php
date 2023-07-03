<!--
 * CoreUI - Open Source Bootstrap Admin Template
 * @version v1.0.0-alpha.2
 * @link http://coreui.io
 * Copyright (c) 2016 creativeLabs Łukasz Holeczek
 * @license MIT
 -->
 <!DOCTYPE html>
 <html lang="LY-fa" dir="rtl">
 
 <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta name="description" content="CoreUI Bootstrap 4 Admin Template">
     <meta name="author" content="Lukasz Holeczek">
     <meta name="keyword" content="CoreUI Bootstrap 4 Admin Template">
    
     <!-- <link rel="shortcut icon" href="assets/ico/favicon.png"> -->
     <title>نظام الدراسة و الامتحانات - لوحة تحكم الطالب</title>
     <!-- Icons -->
     <link href="css/font-awesome.min.css" rel="stylesheet">
     <link href="css/simple-line-icons.css" rel="stylesheet">
     <!-- Main styles for this application -->
     <link href="dest/style.css" rel="stylesheet">
          <!-- CHAT styles for this application -->
          <link href="css/studentCards.css" rel="stylesheet">
          <link href="css/MobileTable.css" rel="stylesheet">
         
    
 </head>
 <!-- BODY options, add following classes to body to change options
         1. 'compact-nav'     	  - Switch sidebar to minified version (width 50px)
         2. 'sidebar-nav'		  - Navigation on the left
             2.1. 'sidebar-off-canvas'	- Off-Canvas
                 2.1.1 'sidebar-off-canvas-push'	- Off-Canvas which move content
                 2.1.2 'sidebar-off-canvas-with-shadow'	- Add shadow to body elements
         3. 'fixed-nav'			  - Fixed navigation
         4. 'navbar-fixed'		  - Fixed navbar
     -->
   
 <body class="navbar-fixed sidebar-nav fixed-nav">
    
     <header class="navbar">
         <div class="container-fluid">
            
             <button class="navbar-toggler mobile-toggler hidden-lg-up" type="button">&#9776;</button>
             <img src="/img/{{App\Models\system::getDashlogo()}}" class="img-avatar" alt="الشعار" style="width: 120px; height:50px">
           
             <ul class="nav navbar-nav hidden-md-down">
                 <li class="nav-item">
                     <a class="nav-link navbar-toggler layout-toggler" href="#">&#9776;</a>
                 </li>
 
                 <!--<li class="nav-item p-x-1">
                     <a class="nav-link" href="#">داشبورد</a>
                 </li>
                 <li class="nav-item p-x-1">
                     <a class="nav-link" href="#">Users</a>
                 </li>
                 <li class="nav-item p-x-1">
                     <a class="nav-link" href="#">Settings</a>
                 </li>-->
             </ul>
             <ul class="nav navbar-nav pull-left hidden-md-down">
                 <li class="nav-item">
                     <a class="nav-link aside-toggle" href="#"><i class="icon-bell"></i><span class="tag tag-pill tag-danger">
                        
               {{ App\Models\notification::unRead() }}
                    </span></a>
                 </li>
              
                 <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        
                         <span class="hidden-md-down">  {{ Auth::user()->name }}  </span>
                     </a>
                     <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                         {{ __('خروج') }}
                     </a>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                     </div>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link navbar-toggler aside-toggle" href="#">&#9776;</a>
                 </li>
 
             </ul>
         </div>
     </header>
     <div class="sidebar">
         <nav class="sidebar-nav">
             <ul class="nav">
                 <li class="nav-item">
                     <a class="nav-link" href=""><i class="icon-speedometer"></i> قائمة التحكم  </a>
                 </li>
 
{{--                  
                 <li class="nav-title">
                   الفصول الدراسية
                 </li> --}}
                  
                    {{-- <li class="nav-title">
                        الأقسام الدراسية
                     </li> --}}
                     
                    {{-- <li class="nav-title">
                       الطلبة
                      </li> --}}
                      <li class="nav-item nav-dropdown">
                         <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-user
                            "></i>الطالب</a>
                         <ul class="nav-dropdown-items">
                             <li class="nav-item">
                             
                     
                          <a class="nav-link" href="{{route('studentDashboard')}}"><i class="icon-home
                            "></i>الرئيسية</a>
                            <a class="nav-link" href="{{route('studentProfile')}}"><i class="icon-home
                                "></i>الملف الشخصي</a>
                          <a class="nav-link" href="{{route('currentSemSubs')}}"><i class="icon-book-open"></i>  مقررات الفصل الحالي</a>
                          <a class="nav-link" href="{{route('oldSemSubs')}}"><i class="icon-loop"></i>الفصول السابقة</a>
                          
                          @permission('subjects-delete')
                          <a class="nav-link" href="{{route('EditSubjects')}}"><i class="icon-pencil
                            "></i>إضافة/اسقاط مقرر</a>
                          @endpermission()
                          @permission('placements')
                          <a class="nav-link" href="{{route('PlacementApplication')}}"><i class="icon-directions
                            "></i>طلب التنسيب للاقسام العلمية</a>
                          @endpermission()
                          <a class="nav-link" href="{{route('CurrentSemestersPlan')}}"><i class="icon-map
                            "></i>الخطة الدراسية للفصل الحالي</a>
                            <a class="nav-link" href="{{route('NotifyMenu')}}"><i class="icon-bell
                                "></i>
                                
                                الاشعارات
<span class="tag tag-danger">
      {{ App\Models\notification::unRead() }}  

</span>
                               
                            </a>
                                <a class="nav-link" href="{{route('RequirementsMenu')}}"><i class="icon-notebook
                                    "></i>
                                    المهام
                                    <span class="tag tag-danger">
                                        {{ App\Models\subject_date::datesCount() }}  
                                  
                                  </span>
                                </a>
                                     
                            
                  
                        </li>
                         
                         
                     </ul>
                     
                         </li>
                         <li class="nav-item nav-dropdown hidden-md-up">
                            <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();"><i class="icon-logout"></i>
                             {{ __('خروج') }}
                         </a>
                          </li>

                 <!--<li class="nav-item nav-dropdown">
                     <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i> ثبت کاربر جدید</a>
                     <ul class="nav-dropdown-items">
                         <li class="nav-item">
                             <a class="nav-link" href="components-buttons.html"><i class="icon-puzzle"></i> لیست کاربران</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="components-social-buttons.html"><i class="icon-puzzle"></i> Social Buttons</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="components-cards.html"><i class="icon-puzzle"></i> Cards</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="components-forms.html"><i class="icon-puzzle"></i> Forms</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="components-switches.html"><i class="icon-puzzle"></i> Switches</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="components-tables.html"><i class="icon-puzzle"></i> Tables</a>
                         </li>
                     </ul>
                 </li>-->
 
                 <!--<li class="nav-item nav-dropdown">
                     <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-star"></i> Icons</a>
                     <ul class="nav-dropdown-items">
                         <li class="nav-item">
                             <a class="nav-link" href="icons-font-awesome.html"><i class="icon-star"></i> Font Awesome</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="icons-simple-line-icons.html"><i class="icon-star"></i> Simple Line Icons</a>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="widgets.html"><i class="icon-calculator"></i> Widgets <span class="tag tag-info">NEW</span></a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="charts.html"><i class="icon-pie-chart"></i> Charts</a>
                 </li>-->
                 <!--<li class="divider"></li>
                 <li class="nav-title">
                     Extras
                 </li>
                 <li class="nav-item nav-dropdown">
                     <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-star"></i> Pages</a>
                     <ul class="nav-dropdown-items">
                         <li class="nav-item">
                             <a class="nav-link" href="pages-login.html" target="_top"><i class="icon-star"></i> Login</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="pages-register.html" target="_top"><i class="icon-star"></i> Register</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="pages-404.html" target="_top"><i class="icon-star"></i> Error 404</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="pages-500.html" target="_top"><i class="icon-star"></i> Error 500</a>
                         </li>
                     </ul>
                 </li>-->
 
             </ul>
         </nav>
     </div>
     <!-- Main content -->
     <main class="main">
        
         <!-- Breadcrumb -->
@yield('breadcramp')
 
         <div class="container-fluid">
           
             <div class="animated fadeIn">
               
                    @yield('content')

            
                 <!--/row-->
             </div>
 
         </div>
         <!--/.container-fluid-->
     </main>
 
     <aside class="aside-menu">
         <ul class="nav nav-tabs" role="tablist">
             <li class="nav-item">
                 <a class="nav-link active" data-toggle="tab" href="#timeline" role="tab"><i class="icon-list"></i></a>
             </li>
 
         </ul>
         <!-- Tab panes -->
         <div class="tab-content">
             <div class="tab-pane active" id="timeline" role="tabpanel">
                 <div class="callout m-a-0 p-y-h text-muted text-xs-center bg-faded text-uppercase">
                     <small><b>الإشعارات غير المقروءة</b>
                     </small>
                 </div>
                 <hr class="transparent m-x-1 m-y-0">
           
                    
                    @foreach ( App\Models\notification::getUnRead() as $item)
                    <div class="callout callout-warning m-a-0 p-y-1">
                 
                 
                     <div>
                        <a href="{{route('ShowNotificationMessage' , ['id' => $item->id])}}">  <strong>{{$item->title}}</strong></a>
                       
                     </div>
                     |
                     <small class="text-muted"><i class="icon-user"></i>&nbsp;{{$item->date}} </small>
                   
                     <small class="text-muted"><i class="icon-calendar"></i>&nbsp; {{ App\Models\Instructor::getInstructorsName($item->sender_id)}}</small>
                    |
                 </div>


                 <hr class="m-x-1 m-y-0">
 
                 @endforeach
                 <hr class="transparent m-x-1 m-y-0">
                 <div class="callout m-a-0 p-y-h text-muted text-xs-center bg-faded text-uppercase">
                     <small><b>المهام</b>
                     </small>
                 </div>
                 <hr class="transparent m-x-1 m-y-0">

                 @foreach ( App\Models\subject_date::getStudentSubject() as $subject)


                 @foreach ( App\Models\subject_date::getReq($subject->subject_id) as $item)
                 <div class="callout callout-danger m-a-0 p-y-1">
                    <div>
                        <strong>{{App\Models\subject_date::getName($item->id)}} </strong>
                    </div>
                    
                    <small class="text-muted m-r-1"> &nbsp;{{App\Models\subject_date::getDueDate($item->id)}}</small>
                    <small class="text-muted"> &nbsp; {{App\Models\subject::getSubjectName($item->subject_id)}}</small>
                 
                </div>
                @endforeach

                @endforeach
            </div>
            
             
         
     </aside>
 
     <footer class="footer">
         <span class="text-left">
            &copy; 2023 Mohammed .
         </span>
      
     </footer>


     <!-- Bootstrap and necessary plugins -->
    
     <script src="js/libs/jquery.min.js"></script>
     <script src="js/libs/tether.min.js"></script>
     <script src="js/libs/bootstrap.min.js"></script>
     <script src="js/libs/pace.min.js"></script>
 
     <!-- Plugins and scripts required by all views -->
     <script src="js/libs/Chart.min.js"></script>
 
     <!-- CoreUI main scripts -->
 
     <script src="js/app.js"></script>
 
     <!-- Plugins and scripts required by this views -->
     <!-- Custom scripts required by this view -->
     <script src="js/views/main.js"></script>
 
     <!-- Grunt watch plugin -->

     @include('sweetalert::alert')
     
  
 </body>
 
 </html>

 