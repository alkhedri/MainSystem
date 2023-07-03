 
 <!DOCTYPE html>
 <html lang="LY-fa" dir="rtl">
 
 <head>
     
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta name="description" content="Online System">
     <meta name="author" content="Mohammed Al-khuDari">
     <meta name="keyword" content="Ali 0ushah">
     <!-- <link rel="shortcut icon" href="assets/ico/favicon.png"> -->
     <title>لوحة تحكم مدير النظام</title>
     <!-- Icons -->
     <link href="/css/font-awesome.min.css" rel="stylesheet">
     <link href="/css/simple-line-icons.css" rel="stylesheet">
     <!-- Main styles for this application -->
     <link href="/dest/style.css" rel="stylesheet">
     <!-- CHAT styles for this application -->
    <link href="/css/chat.css" rel="stylesheet">
  
    <style>
        body{

background-image:  url('/svg/{{App\Models\system::background()}}') ;


}
        .card {
  max-width: 300px;
  border-radius: 0.5rem;
  background-color: #fff;
  box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
  border: 2px solid black;
}

.content {
  padding: 1.1rem;
}

.image {
  object-fit: cover;
  width: 100%;
  height: 150px;
  background-color: white;
}

.title {
  color: #111827;
  font-size: 1.125rem;
  line-height: 1.75rem;
  font-weight: 600;
}

.desc {
  margin-top: 0.5rem;
  color: #6B7280;
  font-size: 0.875rem;
  line-height: 1.25rem;
}

.action {
  display: inline-flex;
  margin-top: 1rem;
  color: #ffffff;
  font-size: 0.875rem;
  line-height: 1.25rem;
  font-weight: 500;
  align-items: center;
  gap: 0.25rem;
  background-color: #000205;
  padding: 4px 8px;
  border-radius: 4px;
}

.action span {
  transition: .3s ease;
}

.action:hover span {
  transform: translateX(4px);
}

    </style>
 </head>
 
 
 <body class="navbar-fixed sidebar-nav fixed-nav ">
     <header class="navbar">
         <div class="container-fluid">
            
             <button class="navbar-toggler mobile-toggler hidden-lg-up" type="button">&#9776;</button>
            
              <img class="navbar-brand" src="/img/{{App\Models\system::getDashlogo()}}" class=""  alt="الشعار" style="width: 125px; height:58px">
           
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
 
          
                 <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-building-o"></i>الكليات</a>
                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                          <a class="nav-link" href="{{route('CollegesMenu')}}"><i class="icon-size-fullscreen"></i>عرض الكل</a>
                          <a class="nav-link" href="{{route('CollegeDelete')}}"><i class="icon-close"></i>حذف</a>
                         </li>
                       </ul>
                    </li>
                           <li class="nav-item nav-dropdown">
                              <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-lock"></i>الأدوار و الصلاحيات</a>
                              <ul class="nav-dropdown-items">
                                  <li class="nav-item">
                                    <a class="nav-link" href="{{route('SystemUsers')}}"><i class="icon-people"></i>المستخدمين</a>
                                        </li>
                                 </ul>
                              </li>

                              <li class="nav-item nav-dropdown">
                                <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-gears "></i>إعدادات النظام</a>
                                <ul class="nav-dropdown-items">
                                    <li class="nav-item">
                                      <a class="nav-link" href="{{route('SystemIcons')}}"><i class="icon-screen-desktop"></i>أيقونات النظام</a>
                                      <a class="nav-link" href="{{route('SystemText')}}"><i class="icon-pencil"></i>النصوص</a>
                                      <a class="nav-link" href="{{route('SystemBackground')}}"><i class="icon-pencil"></i>الخلفية</a>
                                    
                                      
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
@yield('modals')
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
 
 
 </body>
 
 </html>