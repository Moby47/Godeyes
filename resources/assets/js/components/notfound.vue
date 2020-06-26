<template>
        <div>
    
    
    <div class='bg-start'>
        <div class='dark-shade'></div>
    </div>
    
    <h4 class="text-center slideUp mb-5" style='font-family: "Orbitron";'>404</h4>
    
   
    <h4 class="text-center sub-font-fam">Page Not Found</h4>
    
    <div class='centered slideUp mt-5'>
    
    <div class="row text-center">
    
    <div class="cell order-2">
            <button class="shortcut rounded primary ani-hover-horizontal" @click.prevent='home()' 
            style="background-color: #daa09b">
                <span class="caption">Home</span>
                <span class="mif-home icon  ani-float"></span>
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
           
            home(){
             this.$router.push({name: "index"});
            },
        
        
        },
    }
    </script>