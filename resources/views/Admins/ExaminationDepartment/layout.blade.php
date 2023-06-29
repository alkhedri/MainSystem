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
     
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta name="description" content="CoreUI Bootstrap 4 Admin Template">
     <meta name="author" content="Lukasz Holeczek">
     <meta name="keyword" content="CoreUI Bootstrap 4 Admin Template">
     <!-- <link rel="shortcut icon" href="assets/ico/favicon.png"> -->
     <title>منظومة الدراسة و الامتحانات - لوحة تحكم الطالب</title>
     <!-- Icons -->
     <link href="css/font-awesome.min.css" rel="stylesheet">
     <link href="css/simple-line-icons.css" rel="stylesheet">
     <!-- Main styles for this application -->
     <link href="dest/style.css" rel="stylesheet">
          <!-- CHAT styles for this application -->
          <link href="css/chat.css" rel="stylesheet">
  
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
             <a class="navbar-brand" href="#"></a>
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
                     <a class="nav-link aside-toggle" href="#"><i class="icon-bell"></i><span class="tag tag-pill tag-danger">5</span></a>
                 </li>
             
                 <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                         <img src="img/avatars/4.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                         <span class="hidden-md-down">{{ Auth::user()->name }}</span>
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
                     <a class="nav-link" href=""><i class="icon-speedometer"></i> قائمة التحكم </a>
                 </li>
 
                 
                 <li class="nav-title">
                   الفصول الدراسية
                 </li>
                 <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-folder-alt"></i>
                        إدارة فصل دراسي
                    </a>
                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                        
                     <a class="nav-link" href="{{route('SemestersMenu')}}"><i ><svg width="15" height="15" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.5 6.75H21"></path>
                        <path d="M7.5 12H21"></path>
                        <path d="M7.5 17.25H21"></path>
                        <path d="M3.75 7.5a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z"></path>
                        <path d="M3.75 12.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z"></path>
                        <path d="M3.75 18a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z"></path>
                      </svg></i>قائمة الفصول الدراسية</a>
                     <a class="nav-link" href="{{route('GetSemestersPlan')}}"><i ><svg width="15" height="15" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.25 19.493V3.375a1.128 1.128 0 0 0-1.125-1.125H3.375A1.128 1.128 0 0 0 2.25 3.375v16.5a1.88 1.88 0 0 0 1.875 1.875H19.5"></path>
                        <path d="M19.5 21.75a2.25 2.25 0 0 1-2.25-2.25V6h3.375a1.125 1.125 0 0 1 1.125 1.125V19.5a2.25 2.25 0 0 1-2.25 2.25Z"></path>
                        <path d="M11.25 6h3"></path>
                        <path d="M11.25 9h3"></path>
                        <path d="M5.25 12h9"></path>
                        <path d="M5.25 15h9"></path>
                        <path d="M5.25 18h9"></path>
                        <path fill="currentColor" stroke="none" d="M8.25 9.75h-3A.75.75 0 0 1 4.5 9V6a.75.75 0 0 1 .75-.75h3A.75.75 0 0 1 9 6v3a.75.75 0 0 1-.75.75Z"></path>
                      </svg></i>الخطة الدراسية</a>
                     <a class="nav-link" href="{{route('Request')}}"><i ><svg width="15" height="15" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6 21.75a2.25 2.25 0 1 0 0-4.5 2.25 2.25 0 0 0 0 4.5Z"></path>
                        <path d="M6 6.75v10.5"></path>
                        <path d="m13.5 7.5-3-3 3-3"></path>
                        <path d="M6 6.75a2.25 2.25 0 1 0 0-4.5 2.25 2.25 0 0 0 0 4.5Z"></path>
                        <path d="M18 21.75a2.25 2.25 0 1 0 0-4.5 2.25 2.25 0 0 0 0 4.5Z"></path>
                        <path d="M11.25 4.5h3.938A2.812 2.812 0 0 1 18 7.313v9.937"></path>
                      </svg></i>طلبات التجاوز</a>
                     <a class="nav-link" href="{{route('FinalResults')}}"><i class="icon-docs"></i>النتيجة النهائية</a>
                    </li>
           
                
                </ul>
                    </li>
              
                    <li class="nav-title">
                        الأقسام الدراسية
                     </li>
                      <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-folder-alt"></i>إدارة قسم دراسي</a>
                        <ul class="nav-dropdown-items">
                             <li class="nav-item">
                              <a class="nav-link" href="{{route('DepartmentsMenu')}}"><i ><svg width="15" height="15" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.5 6.75H21"></path>
                                <path d="M7.5 12H21"></path>
                                <path d="M7.5 17.25H21"></path>
                                <path d="M3.75 7.5a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z"></path>
                                <path d="M3.75 12.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z"></path>
                                <path d="M3.75 18a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z"></path>
                              </svg></i>قائمة الأقسام</a>
                             </li>
                             <li class="nav-item">
                                <a class="nav-link" href="{{route('Rooms')}}"><i ><svg width="15" height="15" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.5 9 12 3l10.5 6L12 15 1.5 9Z"></path>
                                    <path d="M5.25 11.25v6L12 21l6.75-3.75v-6"></path>
                                    <path d="M22.5 17.25V9"></path>
                                    <path d="M12 15v6"></path>
                                  </svg></i>القاعات الدراسية</a>
                               </li>
                            <li class="nav-item">
                             <a class="nav-link" href="{{route('DepartmentsDelete')}}"><i ><svg width="15" height="15" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="m5.25 5.25.938 15c.044.867.675 1.5 1.5 1.5h8.625c.828 0 1.447-.633 1.5-1.5l.937-15"></path>
                                <path d="M3.75 5.25h16.5"></path>
                                <path d="M9 5.25V3.375a1.122 1.122 0 0 1 1.125-1.125h3.75A1.121 1.121 0 0 1 15 3.375V5.25"></path>
                                <path d="M12 8.25v10.5"></path>
                                <path d="M8.625 8.25 9 18.75"></path>
                                <path d="M15.375 8.25 15 18.75"></path>
                              </svg></i>حذف قسم دراسي</a>
                            </li>
    
                    </ul>
                        </li>
     
                    <li class="nav-title">
                       الطلبة
                      </li>
                      <li class="nav-item nav-dropdown">
                         <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-people"></i>إدارة الطلبة</a>
                         <ul class="nav-dropdown-items">
                             <li class="nav-item">
                             
                          <a class="nav-link" href="{{route('StudentAccount')}}"><i>
                            <svg width="15" height="15" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.625 6.75c-.184 2.478-2.063 4.5-4.125 4.5-2.063 0-3.945-2.021-4.125-4.5-.188-2.578 1.64-4.5 4.125-4.5 2.484 0 4.312 1.969 4.125 4.5Z"></path>
                                <path d="M13.5 14.25c-4.078 0-8.217 2.25-8.983 6.497-.093.512.198 1.003.734 1.003h16.5c.536 0 .825-.491.733-1.003-.766-4.247-4.905-6.497-8.984-6.497Z"></path>
                                <path d="M4.125 8.25v5.25"></path>
                                <path d="M6.75 10.875H1.5"></path>
                              </svg></i>إضافة طالب</a>
                          <a class="nav-link" href="{{route('StudentsPlacement')}}"><i class="icon-docs"></i>تنسيب طالب إلى قسم</a>
                          <a class="nav-link" href="{{route('StudentsMovement')}}"><i>
                            <svg width="15" height="15" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.25 5.25 12 1.5l3.75 3.75"></path>
                                <path d="M12 1.5v21"></path>
                                <path d="M8.25 18.75 12 22.5l3.75-3.75"></path>
                                <path d="M18.75 8.25 22.5 12l-3.75 3.75"></path>
                                <path d="M5.25 8.25 1.5 12l3.75 3.75"></path>
                                <path d="M1.5 12h21"></path>
                              </svg></i>نقل طالب إلى قسم</a>
                          <a class="nav-link" href="{{route('RegRenewal')}}"><i class="icon-docs"></i>القيد الدراسي</a>
                      
                        
                          <a class="nav-link" href="{{route('StudentNotify')}}"><i><svg width="15" height="15" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20.047 16.473c-1.204-1.473-2.053-2.223-2.053-6.285 0-3.72-1.9-5.044-3.463-5.688a.835.835 0 0 1-.466-.495C13.79 3.072 13.022 2.25 12 2.25s-1.791.823-2.063 1.756a.827.827 0 0 1-.466.494c-1.565.645-3.463 1.965-3.463 5.688-.002 4.062-.852 4.812-2.056 6.285-.499.61-.062 1.527.81 1.527h14.48c.867 0 1.301-.92.805-1.527Z"></path>
                            <path d="M15 18v.75a3 3 0 0 1-6 0V18"></path>
                          </svg></i>إخطار طالب</a>
                          <a class="nav-link" href="#"><i class="fa fa-bar-chart"></i>عرض الطلبة المتعثرين</a>
                         </li>
                         
                         
                     </ul>
                         </li>
           


                       
                           <li class="nav-item nav-dropdown">
                              <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-lock"></i>صلاحيات الطلبة</a>
                              <ul class="nav-dropdown-items">
                                  <li class="nav-item">
                                  
                                    <a class="nav-link" href="{{route('StudentDropAndAdd')}}"><i class="icon-note"></i>تنزيل و اسقاط</a>
                                    <a class="nav-link" href="{{route('StudentDepartmentPlacement')}}"><i class="icon-star"></i>التنسيب للاقسام</a>
                     

                               
                              </li>
                              
                              
                          </ul>
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
                @include('sweetalert::alert')
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
             <li class="nav-item">
                 <a class="nav-link" data-toggle="tab" href="#messages" role="tab"><i class="icon-speech"></i></a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" data-toggle="tab" href="#settings" role="tab"><i class="icon-settings"></i></a>
             </li>
         </ul>
         <!-- Tab panes -->
         <div class="tab-content">
             <div class="tab-pane active" id="timeline" role="tabpanel">
                 <div class="callout m-a-0 p-y-h text-muted text-xs-center bg-faded text-uppercase">
                     <small><b>Today</b>
                     </small>
                 </div>
                 <hr class="transparent m-x-1 m-y-0">
                 <div class="callout callout-warning m-a-0 p-y-1">
                     <div class="avatar pull-xs-right">
                         <img src="img/avatars/7.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                     </div>
                     <div>Meeting with
                         <strong>Lucas</strong>
                     </div>
                     <small class="text-muted m-r-1"><i class="icon-calendar"></i>&nbsp; 1 - 3pm</small>
                     <small class="text-muted"><i class="icon-location-pin"></i>&nbsp; Palo Alto, CA</small>
                 </div>
                 <hr class="m-x-1 m-y-0">
                 <div class="callout callout-info m-a-0 p-y-1">
                     <div class="avatar pull-xs-right">
                         <img src="img/avatars/4.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                     </div>
                     <div>Skype with
                         <strong>Megan</strong>
                     </div>
                     <small class="text-muted m-r-1"><i class="icon-calendar"></i>&nbsp; 4 - 5pm</small>
                     <small class="text-muted"><i class="icon-social-skype"></i>&nbsp; On-line</small>
                 </div>
                 <hr class="transparent m-x-1 m-y-0">
                 <div class="callout m-a-0 p-y-h text-muted text-xs-center bg-faded text-uppercase">
                     <small><b>Tomorrow</b>
                     </small>
                 </div>
                 <hr class="transparent m-x-1 m-y-0">
                 <div class="callout callout-danger m-a-0 p-y-1">
                     <div>New UI Project -
                         <strong>deadline</strong>
                     </div>
                     <small class="text-muted m-r-1"><i class="icon-calendar"></i>&nbsp; 10 - 11pm</small>
                     <small class="text-muted"><i class="icon-home"></i>&nbsp; creativeLabs HQ</small>
                     <div class="avatars-stack m-t-h">
                         <div class="avatar avatar-xs">
                             <img src="img/avatars/2.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                         </div>
                         <div class="avatar avatar-xs">
                             <img src="img/avatars/3.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                         </div>
                         <div class="avatar avatar-xs">
                             <img src="img/avatars/4.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                         </div>
                         <div class="avatar avatar-xs">
                             <img src="img/avatars/5.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                         </div>
                         <div class="avatar avatar-xs">
                             <img src="img/avatars/6.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                         </div>
                     </div>
                 </div>
                 <hr class="m-x-1 m-y-0">
                 <div class="callout callout-success m-a-0 p-y-1">
                     <div>
                         <strong>#10 Startups.Garden</strong>Meetup</div>
                     <small class="text-muted m-r-1"><i class="icon-calendar"></i>&nbsp; 1 - 3pm</small>
                     <small class="text-muted"><i class="icon-location-pin"></i>&nbsp; Palo Alto, CA</small>
                 </div>
                 <hr class="m-x-1 m-y-0">
                 <div class="callout callout-primary m-a-0 p-y-1">
                     <div>
                         <strong>Team meeting</strong>
                     </div>
                     <small class="text-muted m-r-1"><i class="icon-calendar"></i>&nbsp; 4 - 6pm</small>
                     <small class="text-muted"><i class="icon-home"></i>&nbsp; creativeLabs HQ</small>
                     <div class="avatars-stack m-t-h">
                         <div class="avatar avatar-xs">
                             <img src="img/avatars/2.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                         </div>
                         <div class="avatar avatar-xs">
                             <img src="img/avatars/3.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                         </div>
                         <div class="avatar avatar-xs">
                             <img src="img/avatars/4.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                         </div>
                         <div class="avatar avatar-xs">
                             <img src="img/avatars/5.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                         </div>
                         <div class="avatar avatar-xs">
                             <img src="img/avatars/6.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                         </div>
                         <div class="avatar avatar-xs">
                             <img src="img/avatars/7.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                         </div>
                         <div class="avatar avatar-xs">
                             <img src="img/avatars/8.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                         </div>
                     </div>
                 </div>
                 <hr class="m-x-1 m-y-0">
             </div>
             <div class="tab-pane p-a-1" id="messages" role="tabpanel">
                 <div class="message">
                     <div class="p-y-1 p-b-3 m-r-1 pull-left">
                         <div class="avatar">
                             <img src="img/avatars/7.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                             <span class="avatar-status tag-success"></span>
                         </div>
                     </div>
                     <div>
                         <small class="text-muted">Lukasz Holeczek</small>
                         <small class="text-muted pull-left m-t-q">1:52 PM</small>
                     </div>
                     <div class="text-truncate font-weight-bold">Lorem ipsum dolor sit amet</div>
                     <small class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...</small>
                 </div>
                 <hr>
                 <div class="message">
                     <div class="p-y-1 p-b-3 m-r-1 pull-left">
                         <div class="avatar">
                             <img src="img/avatars/7.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                             <span class="avatar-status tag-success"></span>
                         </div>
                     </div>
                     <div>
                         <small class="text-muted">Lukasz Holeczek</small>
                         <small class="text-muted pull-left m-t-q">1:52 PM</small>
                     </div>
                     <div class="text-truncate font-weight-bold">Lorem ipsum dolor sit amet</div>
                     <small class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...</small>
                 </div>
                 <hr>
                 <div class="message">
                     <div class="p-y-1 p-b-3 m-r-1 pull-left">
                         <div class="avatar">
                             <img src="img/avatars/7.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                             <span class="avatar-status tag-success"></span>
                         </div>
                     </div>
                     <div>
                         <small class="text-muted">Lukasz Holeczek</small>
                         <small class="text-muted pull-right m-t-q">1:52 PM</small>
                     </div>
                     <div class="text-truncate font-weight-bold">Lorem ipsum dolor sit amet</div>
                     <small class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...</small>
                 </div>
                 <hr>
                 <div class="message">
                     <div class="p-y-1 p-b-3 m-r-1 pull-left">
                         <div class="avatar">
                             <img src="img/avatars/7.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                             <span class="avatar-status tag-success"></span>
                         </div>
                     </div>
                     <div>
                         <small class="text-muted">Lukasz Holeczek</small>
                         <small class="text-muted pull-right m-t-q">1:52 PM</small>
                     </div>
                     <div class="text-truncate font-weight-bold">Lorem ipsum dolor sit amet</div>
                     <small class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...</small>
                 </div>
                 <hr>
                 <div class="message">
                     <div class="p-y-1 p-b-3 m-r-1 pull-left">
                         <div class="avatar">
                             <img src="img/avatars/7.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                             <span class="avatar-status tag-success"></span>
                         </div>
                     </div>
                     <div>
                         <small class="text-muted">Lukasz Holeczek</small>
                         <small class="text-muted pull-right m-t-q">1:52 PM</small>
                     </div>
                     <div class="text-truncate font-weight-bold">Lorem ipsum dolor sit amet</div>
                     <small class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...</small>
                 </div>
             </div>
             <div class="tab-pane p-a-1" id="settings" role="tabpanel">
                 <h6>Settings</h6>
                 <div class="aside-options">
                     <div class="clearfix m-t-2">
                         <small><b>Option 1</b>
                         </small>
                         <label class="switch switch-text switch-pill switch-success switch-sm pull-right">
                             <input type="checkbox" class="switch-input" checked>
                             <span class="switch-label" data-on="On" data-off="Off"></span>
                             <span class="switch-handle"></span>
                         </label>
                     </div>
                     <div>
                         <small class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</small>
                     </div>
                 </div>
                 <div class="aside-options">
                     <div class="clearfix m-t-1">
                         <small><b>Option 2</b>
                         </small>
                         <label class="switch switch-text switch-pill switch-success switch-sm pull-right">
                             <input type="checkbox" class="switch-input">
                             <span class="switch-label" data-on="On" data-off="Off"></span>
                             <span class="switch-handle"></span>
                         </label>
                     </div>
                     <div>
                         <small class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</small>
                     </div>
                 </div>
                 <div class="aside-options">
                     <div class="clearfix m-t-1">
                         <small><b>Option 3</b>
                         </small>
                         <label class="switch switch-text switch-pill switch-success switch-sm pull-right">
                             <input type="checkbox" class="switch-input">
                             <span class="switch-label" data-on="On" data-off="Off"></span>
                             <span class="switch-handle"></span>
                         </label>
                     </div>
                 </div>
                 <div class="aside-options">
                     <div class="clearfix m-t-1">
                         <small><b>Option 4</b>
                         </small>
                         <label class="switch switch-text switch-pill switch-success switch-sm pull-right">
                             <input type="checkbox" class="switch-input" checked>
                             <span class="switch-label" data-on="On" data-off="Off"></span>
                             <span class="switch-handle"></span>
                         </label>
                     </div>
                 </div>
                 <hr>
                 <h6>System Utilization</h6>
                 <div class="text-uppercase m-b-q m-t-2">
                     <small><b>CPU Usage</b>
                     </small>
                 </div>
                 <progress class="progress progress-xs progress-info m-a-0" value="25" max="100">25%</progress>
                 <small class="text-muted">348 Processes. 1/4 Cores.</small>
                 <div class="text-uppercase m-b-q m-t-h">
                     <small><b>Memory Usage</b>
                     </small>
                 </div>
                 <progress class="progress progress-xs progress-warning m-a-0" value="70" max="100">70%</progress>
                 <small class="text-muted">11444GB/16384MB</small>
                 <div class="text-uppercase m-b-q m-t-h">
                     <small><b>SSD 1 Usage</b>
                     </small>
                 </div>
                 <progress class="progress progress-xs progress-danger m-a-0" value="95" max="100">95%</progress>
                 <small class="text-muted">243GB/256GB</small>
                 <div class="text-uppercase m-b-q m-t-h">
                     <small><b>SSD 2 Usage</b>
                     </small>
                 </div>
                 <progress class="progress progress-xs progress-success m-a-0" value="10" max="100">10%</progress>
                 <small class="text-muted">25GB/256GB</small>
             </div>
         </div>
     </aside>
 
     <footer class="footer">
         <span class="text-left">
         &copy; 2023 Mohammed .
         </span>
      
     </footer>

     @yield('js-scripts')
     <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js">
</script>
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
 
 
 </body>
 
 </html>