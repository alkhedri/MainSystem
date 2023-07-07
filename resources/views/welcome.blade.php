<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Online System">
        <meta name="author" content="Mohammed Al-khuDari">
        <meta name="keyword" content="Ali 0ushah">
        <title>النظام الإلكتروني - قسم الحاسب الالى</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <link rel="stylesheet" href="dest/css/style.css">
 
        <script src="https://unpkg.com/animejs@3.0.1/lib/anime.min.js"></script>
        <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>

        <style>
            button {
  padding: 12.5px 30px;
  border: 0;
  border-radius: 100px;
  background-color: #2ba8fb;
  color: #ffffff;
  font-weight: Bold;
  transition: all 0.5s;
  -webkit-transition: all 0.5s;
}

button:hover {
  background-color: #6fc5ff;
  box-shadow: 0 0 20px #6fc5ff50;
  transform: scale(1.1);
}

button:active {
  background-color: #3d94cf;
  transition: all 0.25s;
  -webkit-transition: all 0.25s;
  box-shadow: none;
  transform: scale(0.98);
}
            .fade-in-text {
 
  animation: fadeIn 5s;
  -webkit-animation: fadeIn 5s;
  -moz-animation: fadeIn 5s;
  -o-animation: fadeIn 5s;
            }
  .mainlogoDesktop{
                           display: block;
                margin-top: 10px;
     margin-left: 100px;
           animation: fadeIn 5s; 
                       margin-left: 140px;
  }
     
       .mainlogo{
   display: none;
                    }
                @media only screen and (max-width: 740px) {
                      .mainlogoDesktop{
    display: none;
  }
               .mainlogo{
                              display: block;
                       position: absolute;
                            animation: fadeIn 5s; 
                       top : 15vh;
                       left: 26vw;
                     
                       margin-left: 0;
                       z-index : 999999;
                    }
                    
   
}

@media only screen and (max-width: 414px) {
                      .mainlogoDesktop{
    display: none;
  }
               .mainlogo{
                              display: block;
                       position: absolute;
                            animation: fadeIn 5s; 
                       top : 15vh;
                       left: 24vw;
                     
                       margin-left: 0;
                       z-index : 999999;
                    }
                    
   
}
@keyframes fadeIn {
  0% { opacity: 0; }
  100% { opacity: 1; }
}

@keyframes fadeIn {
  0% { opacity: 0; }
  100% { opacity: 1; }
}

@-moz-keyframes fadeIn {
  0% { opacity: 0; }
  100% { opacity: 1; }
}

@-webkit-keyframes fadeIn {
  0% { opacity: 0; }
  100% { opacity: 1; }
}

@-o-keyframes fadeIn {
  0% { opacity: 0; }
  100% { opacity: 1; }
}

@-ms-keyframes fadeIn {
  0% { opacity: 0; }
  100% { opacity: 1; }
}
        </style>
    </head>
    <body class="is-boxed has-animations" style="font-family: 'tajawal'">
        <div class="body-wrap">
            <header class="site-header">
                <div class="container">
                    <div class="site-header-inner">
                        <div class="brand header-brand">
                            <h1 class="m-0">
                                <a href="#">
                                  </a>
                            </h1>
                        </div>
                    </div>
                </div>
            </header>
      
                <div class="hero-inner" >
                    <div class="mainlogo">
                   
                           </div>
                    <div class="hero-figure anime-element">
                        <svg class="placeholder" width="528" height="396" viewBox="0 0 528 396">
                            <rect width="528" height="396" style="fill:transparent;" />
                        </svg>
                        <div class="hero-figure-box hero-figure-box-01" data-rotation="45deg"></div>
                        <div class="hero-figure-box hero-figure-box-02" data-rotation="-45deg"></div>
                        <div class="hero-figure-box hero-figure-box-03" data-rotation="0deg"></div>
                        <div class="hero-figure-box hero-figure-box-04" data-rotation="-135deg"></div>
                        <div class="hero-figure-box hero-figure-box-05"></div>
                        <div class="hero-figure-box hero-figure-box-06"></div>
                        <div class="hero-figure-box hero-figure-box-07"></div>
                        <div class="hero-figure-box hero-figure-box-08" data-rotation="-22deg"></div>
                        <div class="hero-figure-box hero-figure-box-09" data-rotation="-52deg"></div>
                        <div class="hero-figure-box hero-figure-box-10" data-rotation="-50deg"></div>
                    </div>
                    <div class="hero-copy" style="text-align: center;">
                        <div class="mainlogoDesktop">
                          <?php
                   
                   $tmp = \App\Models\system::getMainlogo();
                ?>
                            <img src="  {{ Storage::url("/img/$tmp") }}" class="img-avatar"  alt="" style="width: 200px;height:200px;">
            
                        </div>
                       
                        <h1 class="hero-title  mt-0 fade-in-text">النظام الإلكتروني</h1>
                        <h2 style="margin-top: 0px" class="hero-paragraph fade-in-text" fade-in-text>
                            {{App\Models\system::getWelcomeText()}}
                        </h2>
                        <div style="margin-top: 50px"  class="hero-cta fade-in-text"><a class="button button-primary" href="{{route('login')}}">تسجيل الدخول</a>
                            <a class="button" href="{{route('about')}}">حول النظام</a></div>
                    </div>
                </div>
           
      
        <script src="dest/js/main.min.js"></script>
    </body>
</html>
