<template>
       <div id="banner-bg-effect" class='particles'>
    
    
    <div class='bg-start'>
        <div class='dark-shade'></div>
    </div>
    
    <h4 class="text-center slideUp mb-5" style='font-family: "Orbitron";'>Hi, {Name}</h4>
    
    <div class='centered slideUp mt-5'>
    
    <div class="row text-center">
    
    <div class="cell order-1 mr-5">
        <button class="shortcut rounded primary ani-hover-horizontal" @click.prevent='checkin()' 
        style="background-color: #3b6b63">
            <span class="caption">Check In</span>
            <span class="mif-user-check icon  pulse"></span>
        </button>
    </div>
    
    
    <div class="cell order-2">
            <button class="shortcut rounded primary ani-hover-horizontal" @click.prevent='timeline()' 
            style="background-color: #e08981">
                <span class="caption">My Trips</span>
                <span class="mif-list2 icon  pulse"></span>
            </button>
        </div>
    
    </div>
    
    
    </div>
    
    <floating></floating>
    
    </div>
    
    </template>
    
    
    <script>
    export default {
        data(){
            return {
               
            }
        },
        mounted(){
           this.particles()
        },
        methods: {
            checkin(){
              
              this.$router.push({name: "checkIn"});
                        
                    
            },
            timeline(){
                this.$router.push({name: "timeline"});
            },
        
         particles(){
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
        }
        
        },
    }
    </script>