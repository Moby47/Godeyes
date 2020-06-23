<template>
    <div>

        <!--
<vue-particles color="#fdf9c6">
</vue-particles>
-->

<div class='bg-start'>
    <div class='dark-shade'></div>
</div>


<div class='centered slideUp'>

<p class="text-center fg-white sub-font-fam">Choose a Role</p>

<div class="row text-center">

<div class="cell order-1 mr-5">
    <button class="shortcut rounded primary ani-hover-horizontal" @click.prevent='rider()' 
    style="background-color: #fbb203">
        <span class="caption">Drop name</span>
        <span class="mif-eye icon  ani-float"></span>
    </button>
</div>


<div class="cell order-2">
        <button class="shortcut rounded primary ani-hover-horizontal" @click.prevent='captain()' 
        style="background-color: #00B0FF">
            <span class="caption">Timeline</span>
            <span class="mif-gamepad icon  ani-float"></span>
        </button>
    </div>

</div>

</div>

<small class="text-muted">We'll never share your email with anyone else.</small>

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