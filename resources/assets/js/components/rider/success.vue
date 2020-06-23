<template>
    <div>

        <!--
<vue-particles color="#fdf9c6">
</vue-particles>
-->

<div class='bg-start'>
    <div class='dark-shade'></div>
</div>

<h2 class="text-center fg-white pulse" style='font-family: "Orbitron";'>Success!!</h2>

<div class='centered slideUp'>

<p class="text-center fg-white sub-font-fam">25th</p>

<p class="text-center fg-white sub-font-fam">evening checkin</p>


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
        display(){
          
             var display = Metro.session.getItem('display')
                        if(display){
                            //old guest, do nothing
                        }else{
                            //new guest:
                        //do needful, then
                        //Metro.session.setItem('display','display')
                        }
                
        },
     /*   upload(){
            this.$router.push({name: "upload"});
        },
    */
    
    },
}
</script>