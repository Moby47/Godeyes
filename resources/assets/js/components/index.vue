<template>
    <div>


<div class='bg-start'>
    <div class='dark-shade'></div>
</div>

<h1 class="text-center slideUp mb-5" style='font-family: "Orbitron";'>GodsEye</h1>

<div class='centered slideUp mt-5'>

<div class="row text-center">

<div class="cell order-1 mr-5">
    <button class="shortcut rounded primary ani-hover-horizontal" @click.prevent='rider()' 
    style="background-color: #5aa599">
        <span class="caption">Rider</span>
        <span class="mif-bus icon  ani-float"></span>
    </button>
</div>


<div class="cell order-2">
        <button class="shortcut rounded primary ani-hover-horizontal" @click.prevent='captain()' 
        style="background-color: #daa09b">
            <span class="caption">Captain</span>
            <span class="mif-user-secret icon  ani-float"></span>
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
        rider(){
          
     var display = Metro.session.getItem('newRider')
                        if(display){
                            //old guest, do nothing
                            this.$router.push({name: "rider"});
                        }else{
                            //new guest:
                            Metro.session.setItem('newRider','newRider')
                         this.$router.push({name: "fullName"});
                       
                        }
                
        },
        captain(){
           // this.$router.push({name: "upload"});
        },
    
    
    },
}
</script>