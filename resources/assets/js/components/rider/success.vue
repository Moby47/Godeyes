<template>
    <div>


    <div class='bg-col mt-4' >

<div class='bg-start'>
    <div class='dark-shade'></div>
</div>

<h1 class="text-center pulse" style='font-family: "Orbitron";'>Latest Check-In</h1>

<div class='centered slideUp'>

<h4 class="text-center sub-font-fam">25th ~ Evening</h4>


</div>



</div>

<div class='centered slideUp mt-5'>
    
        <div class="row text-center">
        
        <div class="cell order-2">
                <button class="shortcut rounded primary ani-hover-horizontal" @click.prevent='home()' 
                style="background-color: #e08981">
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
        exit(){
            window.top.close();
         },
         home(){
            this.$router.push({name: "index"});
        },  
        },
      
    

}
</script>