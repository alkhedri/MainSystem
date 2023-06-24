<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>النظام الإلكتروني - قسم الحاسب الالى</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
  <!-- Icons -->
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/simple-line-icons.css" rel="stylesheet">
        <!-- Styles -->
        <link rel="stylesheet" href="dest/style.css">
        <link rel="stylesheet" href="dest/css/style.css">
        <script src="https://unpkg.com/animejs@3.0.1/lib/anime.min.js"></script>
        <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>

        <style>
              .mainlogoDesktop{
                margin-top: 10px;
     margin-left: 100px;
  }
         .mainlogo{
            display: none;
           
                }
                 button{
                    width: 390px;
                }
            @media only screen and (max-width: 844px) {
  .mainlogoDesktop{
    display: none;
  }
                .mainlogo{
                    display: block;
                   position: absolute;
                   top : 50px;
                  left : 80px;
                  margin-top:0;
                  margin-left:0;
                  z-index: 999;
                }
                
                 button{
                    width: 333px;
                }
}


@media only screen and (max-width: 414px) {
    .mainlogoDesktop{
    display: none;
  }
                .mainlogo{
                    display: block;
                   position: absolute;
                   top : 15vh;
                  left : 25vw;
                  margin-top:0;
                  margin-left:0;
                  z-index: 999;
                }
                
                button{
                    width: 290px;
                }     
   
}
@media only screen and (max-width: 390px) {
    .mainlogoDesktop{
    display: none;
  }
                .mainlogo{
                    display: block;
                   position: absolute;
                   top : 15vh;
                  left : 25vw;
                  margin-top:0;
                  margin-left:0;
                  z-index: 999;
                }
    button{
                    width: 310px;
                }

}
@media only screen and (max-width: 360px) {
    .mainlogoDesktop{
    display: none;
  }
                .mainlogo{
                    display: block;
                   position: absolute;
                   top : 15vh;
                  left : 25vw;
                  margin-top:0;
                  margin-left:0;
                  z-index: 999;
                }
    button{
                    width: 280px;
                }

}
    </style>

    </head>
    <body class="is-boxed has-animations" style="font-family: 'tajawal'">
@yield('LoginForm')
        <script src="dest/js/main.min.js"></script>
    </body>
</html>
