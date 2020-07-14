<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Watch Dog</title>

        <link rel="apple-touch-icon" sizes="180x180" href="/images/fav/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/images/fav/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/images/fav/favicon-16x16.png">
<!--<link rel="manifest" href="/images/fav/site.webmanifest">-->

   <!-- Web Application Manifest -->
   <link rel="manifest" href="/manifest.json">
   
    <!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">   

<!--vuetify material icons-->
<link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">

<!--nprogress-css-->
<link href="https://unpkg.com/nprogress@0.2.0/nprogress.css" rel="stylesheet" />

<link rel="stylesheet" href="https://cdn.metroui.org.ua/v4.3.2/css/metro-all.min.css">

<link href="/css/wicked.min.css" rel="stylesheet" />
<link href="/css/custom.css" rel="stylesheet" />

 <!--fav icon
 <link rel="icon" href="{{ asset('images/fav.jpg') }}">
  -->
        <!-- Styles -->
        <style>
          
        </style>
    </head>
    <body>
        <div id='app' v-cloak>
       <div id="banner-bg-effect" class='particles'>
     <transition name='anime' enter-active-class='animated fadeIn' :duration='200' leave-active-class='animated fadeOut'>
         <router-view></router-view>	
      </transition>
    </div>      
              
                    </div>
                   <script src="https://cdn.metroui.org.ua/v4.3.2/js/metro.min.js"></script>
                    <script src="/js/particles.min.js"></script>
         <script src="https://unpkg.com/nprogress@0.2.0/nprogress.js"></script>
        <script src="{{asset('/js/app.js')}}"></script>

        <script>
          // Initialize the service worker
          if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register('/sWDog.js', {
              scope: '.' 
            }).then(function (registration) {
              // Registration was successful
              console.log('ServiceWorker registration successful with scope: ', registration.scope);
            }, function (err) {
              // registration failed :(
              console.log('ServiceWorker registration failed: ', err);
            });
          }
        </script>

<script>
           /*===================================*
	02. BACKGROUND ANIMATION JS
	*===================================*/
  
  var $particles_js = $("#banner-bg-effect");
  if ($particles_js.length > 0) {
    particlesJS(
      "banner-bg-effect",
      // Update your personal code.
      {
        particles: {
          number: {
            value: 80,
            density: {
              enable: true,
              value_area: 800
            }
          },
          color: {
            value: "#ffffff"
          },
          shape: {
            type: "circle",
            stroke: {
              width: 2,
              color: "#ffffff"
            },
            polygon: {
              nb_sides: 5
            },
            image: {
              src: "img/github.svg",
              width: 100,
              height: 100
            }
          },
          opacity: {
            value: 0.4,
            random: false,
            anim: {
              enable: false,
              speed: 1,
              opacity_min: 0.5,
              sync: false
            }
          },
          size: {
            value: 3,
            random: true,
            anim: {
              enable: false,
              speed: 20,
              size_min: 0.2,
              sync: false
            }
          },
          line_linked: {
            enable: true,
            distance: 150,
            color: "#ffffff",
            opacity: 0.2,
            width: 1
          },
          move: {
            enable: true,
            speed: 6,
            direction: "none",
            random: false,
            straight: false,
            out_mode: "out",
            bounce: false,
            attract: {
              enable: false,
              rotateX: 600,
              rotateY: 1200
            }
          }
        },
        interactivity: {
          detect_on: "canvas",
          events: {
            onhover: {
              enable: false,
              mode: "repulse"
            },
            onclick: {
              enable: true,
              mode: "push"
            },
            resize: true
          },
          modes: {
            grab: {
              distance: 400,
              line_linked: {
                opacity: 1
              }
            },
            bubble: {
              distance: 400,
              size: 20,
              duration: 2,
              opacity: 1,
              speed: 3
            },
            repulse: {
              distance: 200,
              duration: 0.4
            },
            push: {
              particles_nb: 4
            },
            remove: {
              particles_nb: 2
            }
          }
        },
        retina_detect: true
      }
    );
  }
    /*===================================*
	02. BACKGROUND ANIMATION JS
  *===================================*/
    </script>

    </body>
</html>
