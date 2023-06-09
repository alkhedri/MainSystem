 

 <!DOCTYPE html>
 <html lang="LY-fa" dir="rtl">
 
 <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta name="description" content="Online System">
     <meta name="author" content="Mohammed Al-khuDari">
     <meta name="keyword" content="Ali 0ushah">
     <!-- <link rel="shortcut icon" href="assets/ico/favicon.png"> -->
     <title>نظام الدراسة و الامتحانات - لوحة تحكم الاستاذ</title>
     <!-- Icons -->
     <link href="/css/font-awesome.min.css" rel="stylesheet">
     <link href="/css/simple-line-icons.css" rel="stylesheet">
     <!-- Main styles for this application -->
     <link href="/dest/style.css" rel="stylesheet">
          <!-- CHAT styles for this application -->
          <link href="/css/profile.css" rel="stylesheet">
  
          <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@200;300;400;500&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Kodchasan:ital,wght@0,300;1,200;1,300&family=Montserrat:ital,wght@0,200;0,300;0,800;1,200;1,300;1,400;1,500;1,600;1,700&family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Parisienne&family=Playball&family=Poppins:ital,wght@0,100;0,200;0,300;0,800;0,900;1,100;1,200;1,300&family=Roboto+Condensed:wght@300;400;700&family=Roboto+Mono:ital,wght@0,100;1,100&family=Roboto:ital,wght@0,100;0,300;1,100&family=Rubik+Beastly&family=Teko:wght@300;400;500;600;700&display=swap" rel="stylesheet">
 
 
          <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
          <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
        </head>

 <style>

body{

    background-image:  url('/svg/{{App\Models\system::background()}}') ;

    
}

 
 .animate{
    display: none;
 }
 .lds-roller {
  display: inline-block;
  position: relative;
  width: 80px;
  height: 80px;
}
.lds-roller div {
  animation: lds-roller 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
  transform-origin: 40px 40px;
}
.lds-roller div:after {
  content: " ";
  display: block;
  position: absolute;
  width: 7px;
  height: 7px;
  border-radius: 50%;
  background: #000;
  margin: -4px 0 0 -4px;
}
.lds-roller div:nth-child(1) {
  animation-delay: -0.036s;
}
.lds-roller div:nth-child(1):after {
  top: 63px;
  left: 63px;
}
.lds-roller div:nth-child(2) {
  animation-delay: -0.072s;
}
.lds-roller div:nth-child(2):after {
  top: 68px;
  left: 56px;
}
.lds-roller div:nth-child(3) {
  animation-delay: -0.108s;
}
.lds-roller div:nth-child(3):after {
  top: 71px;
  left: 48px;
}
.lds-roller div:nth-child(4) {
  animation-delay: -0.144s;
}
.lds-roller div:nth-child(4):after {
  top: 72px;
  left: 40px;
}
.lds-roller div:nth-child(5) {
  animation-delay: -0.18s;
}
.lds-roller div:nth-child(5):after {
  top: 71px;
  left: 32px;
}
.lds-roller div:nth-child(6) {
  animation-delay: -0.216s;
}
.lds-roller div:nth-child(6):after {
  top: 68px;
  left: 24px;
}
.lds-roller div:nth-child(7) {
  animation-delay: -0.252s;
}
.lds-roller div:nth-child(7):after {
  top: 63px;
  left: 17px;
}
.lds-roller div:nth-child(8) {
  animation-delay: -0.288s;
}
.lds-roller div:nth-child(8):after {
  top: 56px;
  left: 12px;
}
@keyframes lds-roller {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}

 </style>
 
 <body class="navbar-fixed sidebar-nav fixed-nav content background-image" id="body">
   
   
  
    <header class="navbar">
         <div class="container-fluid">
             <button class="navbar-toggler mobile-toggler hidden-lg-up" type="button">&#9776;</button>
             <?php
                   
             $tmp = \App\Models\system::getDashlogo();
             ?>
              <img class="navbar-brand" src="  {{ Storage::url("/img/$tmp") }}" class=""  alt="الشعار" style="width: 125px; height:58px">
              <ul class="nav navbar-nav hidden-md-down">
                 <li class="nav-item">
                     <a class="nav-link navbar-toggler layout-toggler" href="#">&#9776;</a>
                 </li>
 
 
             </ul>
             <ul class="nav navbar-nav pull-left hidden-md-down">
                 <li class="nav-item">
                     <a class="nav-link aside-toggle" href="#"><i class="icon-bell"></i><span class="tag tag-pill tag-danger">5</span></a>
                 </li>
              
                 <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                         <img src="/img/avatars/4.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                         <span class="hidden-md-down">  {{ Auth::user()->name }} </span>
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
                     <a class="nav-link" href=""><i class="icon-speedometer"></i> قائمة التحكم   </a>
                 </li>
 
{{--                  
                 <li class="nav-title">
                   الفصول الدراسية
                 </li> --}}
                 @permission('hod-read')
               
                 <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i>رئيس القسم</a>
                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                        
                     <a class="nav-link" href="{{route('FacultyMembers')}}"><i class="icon-docs"></i> أعضاء هيئة التدريس</a>
 
                     <a class="nav-link" href="{{route('StudentsMenu')}}"><i class="icon-docs"></i>طلبة القسم</a>
                     <a class="nav-link" href="{{route('Dropped')}}"><i class="icon-docs"></i>الطلبة المتعثرين</a>
                     <a class="nav-link" href="{{route('NewStudents')}}"><i class="icon-docs"></i>الطلبة المنسبين للقسم</a>
                     <a class="nav-link" href="{{route('Complaints')}}"><i class="icon-docs"></i>شكاوى الطلبة</a>
                     <a class="nav-link" href="{{route('Stats')}}"><i class="icon-docs"></i> الاحصائيات العامة</a>

                    </li>
           
                
                </ul>
                    </li>
                  
                @endpermission
                    {{-- <li class="nav-title">
                        الأقسام الدراسية
                     </li> --}}
                     @permission('dec-read')
           
                      <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#"><svg width="16" height="16" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 9h16"></path>
                            <path d="M4 15h16"></path>
                            <path d="M10 3 8 21"></path>
                            <path d="m16 3-2 18"></path>
                          </svg>
                            الدراسة و الامتحانات
                        </a>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                      
                              <a class="nav-link" href="{{route('SubjectsMenu')}}"><i class="icon-docs
                                "></i>المقررات الدراسية</a>
                         
                      
                       
       
                                <a class="nav-link" href="{{route('StudentsMenu')}}"><i class="icon-docs"></i>طلبة القسم</a>
                             <a class="nav-link" href="{{route('Supervision')}}"><i class="icon-star
                                "></i>الاشراف</a>
                         
                     
                                <a class="nav-link" href="{{route('Dropped')}}"><i class="icon-user-follow"></i>الطلبة المتعثرين</a>
                    
                                <a class="nav-link" href="{{route('OverrideRequest')}}"><i class="icon-speech
                                    "></i>طلب تنزيل مواد</a>
                          
                                <a class="nav-link" href="{{route('TimeTable')}}"><i class="icon-grid"></i>جدول المحاضرات</a>
                           
                                <a class="nav-link" href="{{route('ExamsTable')}}"><i class="icon-grid"></i>جدول  الامتحانات</a>
                  
                                        </li>
                    </ul>
                        </li>
                        @endpermission
                    {{-- <li class="nav-title">
                       الطلبة
                      </li> --}}
                      <li class="nav-item nav-dropdown">
                         <a class="nav-link nav-dropdown-toggle" href="#"><svg width="16" height="16" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 9h16"></path>
                            <path d="M4 15h16"></path>
                            <path d="M10 3 8 21"></path>
                            <path d="m16 3-2 18"></path>
                          </svg>
                            هيئة التدريس</a>
                         <ul class="nav-dropdown-items">
                             <li class="nav-item">
                             
                     
                          <a class="nav-link" href="{{route('SubjectsList')}}"><i class="icon-docs
                            "></i>
                            قائمة المقررات</a>
                          <a class="nav-link" href="{{route('SupervisionList')}}"><i class="icon-people
                            "></i>طلبة الاشراف</a>
                            <a class="nav-link" href="{{route('DroppedPaln')}}"><i class="icon-docs"></i>وضع خطة دراسية لطالب</a>
                          <a class="nav-link" href="{{route('SemestersPlanC')}}"><i class="icon-map
                            "></i>الخطة الدراسية    </a>
                         </li>
                         
                         
                     </ul>
                         </li>
             
         
             </ul>
         </nav>
     </div>
     <!-- Main content -->
     <main class="main">
       
         <!-- Breadcrumb -->
@yield('breadcramp')
 
         <div class="container-fluid">
 
             <div class="animated fadeIn">

                <div style="width:100%;display:flex;justify-content:center;align-items:center">
                    {{-- <div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
               --}}
                </div>
             
                {{-- <div class="animate"> --}}
                    @include('sweetalert::alert')
                    @yield('content')
                {{-- </div> --}}
                   

            
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
                         <strong>Mohammed</strong>
                     </div>
                     <small class="text-muted m-r-1"><i class="icon-calendar"></i>&nbsp; 1 - 3pm</small>
                     <small class="text-muted"><i class="icon-location-pin"></i>&nbsp; Sabratha, LY</small>
                 </div>
                 <hr class="m-x-1 m-y-0">
                 <div class="callout callout-info m-a-0 p-y-1">
                     <div class="avatar pull-xs-right">
                         <img src="img/avatars/4.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                     </div>
                     <div>Skype with
                         <strong>Ali</strong>
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
                     <small class="text-muted"><i class="icon-home"></i>&nbsp;CET HQ</small>
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
                         <small class="text-muted">Mohammed Khudari</small>
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
                         <small class="text-muted">Ali Oushah</small>
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
                         <small class="text-muted">Jhon Dow</small>
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
     @yield('page-js-script')
     <script src="sweetalert2.all.min.js"></script>
     <!-- Bootstrap and necessary plugins -->
     <script src="/js/libs/jquery.min.js"></script>
     <script src="/js/libs/tether.min.js"></script>
     <script src="/js/libs/bootstrap.min.js"></script>
     <script src="/js/libs/pace.min.js"></script>
 
     <!-- Plugins and scripts required by all views -->
     <script src="/js/libs/Chart.min.js"></script>
 
     <!-- CoreUI main scripts -->
 
     <script src="/js/app.js"></script>
 
     <!-- Plugins and scripts required by this views -->
     <!-- Custom scripts required by this view -->
     <script src="/js/views/main.js"></script>
 
  
     @yield('modals')

 </body>

 </html>



