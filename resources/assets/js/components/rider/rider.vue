<template>
        <div>
    
    
    <div class='bg-start'>
        <div class='dark-shade'></div>
    </div>
    
    <h4 class="text-center slideUp mb-5" style='font-family: "Orbitron";'>Hi, {Name}</h4>
    
    <div class='centered slideUp mt-5'>
    
    <div class="row text-center">
    
    <div class="cell order-1 mr-5">
        <button class="shortcut rounded primary ani-hover-horizontal" @click.prevent='checkin()' 
        style="background-color: #5aa599">
            <span class="caption">Check In</span>
            <span class="mif-user-check icon  pulse"></span>
        </button>
    </div>
    
    
    <div class="cell order-2">
            <button class="shortcut rounded primary ani-hover-horizontal" @click.prevent='timeline()' 
            style="background-color: #daa09b">
                <span class="caption">My Trips</span>
                <span class="mif-list2 icon  pulse"></span>
            </button>
        </div>
    
    </div>
    
    
    </div>
    
    
    
    </div>
    
    </template>
    
    
    <script>
    export default {
        data(){
            return {
               
            }
        },
        mounted(){
          
        },
        methods: {
            checkin(){
              
              this.$router.push({name: "checkIn"});
                        
                    
            },
            timeline(){
                this.$router.push({name: "timeline"});
            },
        
        
        },
    }
    </script>