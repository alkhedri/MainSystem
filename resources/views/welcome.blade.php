<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>النظام الإلكتروني - قسم الحاسب الالى</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <link rel="stylesheet" href="dest/css/style.css">
        <script src="https://unpkg.com/animejs@3.0.1/lib/anime.min.js"></script>
        <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>
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
        <section class="hero" >
           
                <div class="hero-inner" >
             
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
                    <div class="hero-copy" style="text-align: right; margin-right:50px">
                        <h1 class="hero-title mt-0">النظام الإلكتروني</h1>
                        <h2 class="hero-paragraph"> قسم هندسة الحاسب الألى وتقنية المعلومات</h2>
                        <p class="hero-paragraph"> كلية الهندسة - جامعة صبراتة</p>
                      
                        <div class="hero-cta"><a class="button button-primary" href="{{route('login')}}">تسجيل الدخول</a>
                            <a class="button" href="#">حول النظام</a></div>
                    </div>
                </div>
           
        </section>
        <script src="dest/js/main.min.js"></script>
    </body>
</html>
