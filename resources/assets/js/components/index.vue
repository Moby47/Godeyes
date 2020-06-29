<template>
    <div >
<div class='bg-start'>
    
</div>

<h1 class="text-center slideUp mb-5" style='font-family: "Orbitron";'>
    W<v-icon>visibility</v-icon>tch D<v-icon>pets</v-icon>g</h1>

<div class='centered slideUp mt-5'>

<div class="row text-center">

<div class="cell order-1 mr-5">
    <button class="shortcut rounded primary ani-hover-horizontal" @click.prevent='rider()' 
    style="background-color: #3b6b63">
        <span class="caption">Rider</span>
        <span class="mif-bus icon  ani-float"></span>
    </button>
</div>


<div class="cell order-2">
        <button class="shortcut rounded primary ani-hover-horizontal" @click.prevent='captain()' 
        style="background-color: #e08981">
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
          
     var display = Metro.session.getItem('name')
                        if(display){
                            //old guest, do nothing
                            this.$router.push({name: "rider"});
                        }else{
                            //new guest
                         this.$router.push({name: "fullName"});
                       
                        }
                
        },
        captain(){
            this.$router.push({name: "board"});
        },
    
        
    },
}
</script>