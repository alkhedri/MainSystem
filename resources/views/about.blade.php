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
            .code-editor {
  max-width: 500px;
  background-color: #1d1e22;
  box-shadow: 0px 4px 30px rgba(0, 0, 0, 0.5);
  border-radius: 8px;
  padding: 2px;
  margin-left:5rem;
  margin-top:5rem;
}

.header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin: 10px;
 
}

.title {
  font-family: Lato, sans-serif;
  font-weight: 900;
  font-size: 14px;
  letter-spacing: 1.57px;
  color: rgb(212 212 212);
}

.icon {
  width: 20px;
  transition: .2s ease;
}

.icon:hover {
  cursor: pointer;
  border-radius: 50px;
  background-color: #6e7281;
}

.editor-content {
  margin: 0 10px 10px;
  color: white;
}

.property {
  margin-left: 30px;
}

.property:hover {
  cursor: text;
}

.editor-content .color-0 {
  color: rgb(86 156 214);
}

.editor-content .color-1 {
  color: rgb(182 206 168);
}

.editor-content .color-2 {
  color: rgb(156 220 254);
}

.editor-content .color-3 {
  color: rgb(207 146 120);
}

.color-preview-1,.color-preview-2 {
  height: 8px;
  width: 8px;
  border: 1px solid #fff;
  display: inline-block;
  margin-right: 3px;
}

.color-preview-1 {
  background-color: #1d1e22;
}

.color-preview-1 {
  background-color: rgba(0, 0, 0, 0.5);
}
@media only screen and (max-width: 740px) {
    .code-editor {
  max-width:400px;
 
  margin-left:.5rem;
  margin-top:0;
}
  }
@media only screen and (max-width: 414px) {
    .code-editor {
        max-width:400px;
 
 margin-left:.5rem;
 margin-top:0;
}
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
                <div class="hero-copy" style="">
            
                   
                    <div class="code-editor">
                        <div class="header">
                          <span class="title">CSS</span>
                         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="icon"><g stroke-width="0" id="SVGRepo_bgCarrier"></g><g stroke-linejoin="round" stroke-linecap="round" id="SVGRepo_tracerCarrier"></g><g id="SVGRepo_iconCarrier"> <path stroke-linecap="round" stroke-width="2" stroke="#4C4F5A" d="M6 6L18 18"></path> <path stroke-linecap="round" stroke-width="2" stroke="#4C4F5A" d="M18 6L6 18"></path> </g></svg>
                        </div>
                        <div class="editor-content">
                          <code class="code">
                            <p ><span id="f1" class="color-0"></span > <span id="f2"> </span></p>
                  
                            <p class="property">
                              <span id="f3" class="color-2"></span><span id="f4"> </span>
                              <span class="color-1"> </span> 
                            </p>
                            <p class="property">
                              <span id="f5" class="color-2"> </span><span id="f6"> </span>
                           
                            </p>
                            <p class="property">
                              <span id="f7" class="color-2">  </span><span> </span>
                            </p>
                            <p class="property">
                            <span class="color-0" id="f8" > </span>
                        </p>
                          </code>
                        </div>
                      </div>
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
                   
           
      
        <script src="dest/js/main.min.js"></script>
        <script>
      
            var i = 0;
            var txt = '.Online System';
            var speed = 50;
            typeWriter() ;
            function typeWriter() {
              if (i < txt.length) {
                document.getElementById("f1").innerHTML += txt.charAt(i);
                i++;
                setTimeout(typeWriter, speed);
              }else{
                i = 0;
                txt = '{';
                typeWriter1();
                    }
      
            }

        
            function typeWriter1() {
              
              if (i < txt.length) {
                document.getElementById("f1").innerHTML += txt.charAt(i);
                i++;
                setTimeout(typeWriter1, speed);
              } else{    i = 0;
                txt = 'Devoloped-by';
                typeWriter2();
                    }
            }

            function typeWriter2() {
              
              if (i < txt.length) {
                document.getElementById("f3").innerHTML += txt.charAt(i);
                i++;
                setTimeout(typeWriter2, speed);
              }   else{    i = 0;
                txt = ': Mofammed al-khuDari;';
                typeWriter3();
                    }
            }

            function typeWriter3() {
              
              if (i < txt.length) {
                document.getElementById("f4").innerHTML += txt.charAt(i);
                i++;
                setTimeout(typeWriter3, speed);
              }   else{    i = 0;
                txt = 'Accociated-with';
                typeWriter4();
                    }
            }
            
            function typeWriter4() {
              
              if (i < txt.length) {
                document.getElementById("f5").innerHTML += txt.charAt(i);
                i++;
                setTimeout(typeWriter4, speed);
              }   else{    i = 0;
                txt = ': Ali Oushah;';
                typeWriter5();
                    }
            }

            function typeWriter5() {
              
              if (i < txt.length) {
                document.getElementById("f6").innerHTML += txt.charAt(i);
                i++;
                setTimeout(typeWriter5, speed);
              }     else{    i = 0;
                txt = '/* Computer Engineering Department */';
                typeWriter6();
                    }
            }
            function typeWriter6() {
              
              if (i < txt.length) {
                document.getElementById("f7").innerHTML += txt.charAt(i);
                i++;
                setTimeout(typeWriter6, speed);
              }   else{    i = 0;
                txt = '}';
                typeWriter7();
                    }
            }
            function typeWriter7() {
              
              if (i < txt.length) {
                document.getElementById("f8").innerHTML += txt.charAt(i);
                i++;
                setTimeout(typeWriter7, speed);
              }  
            }
            </script>
    </body>
</html>
