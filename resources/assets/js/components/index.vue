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
        <span class="caption">Passengers</span>
        <span class="mif-users icon  ani-float"></span>
    </button>
</div>


<div class="cell order-2">
        <button class="shortcut rounded primary ani-hover-horizontal" @click.prevent='captain()' 
        style="background-color: #e08981">
            <span class="caption">Bus Captain</span>
            <span class="mif-user-secret icon  ani-float"></span>
        </button>
    </div>

</div>

</div>


  
    <div
      class="text-center shift"
      cols="12"
      v-show='passenger'
    >
    <v-btn class="button fg-white" style="background-color: #ce5247"  @click.prevent='last()'>My Last Check-In</v-btn>
    </div>




  <v-footer class='foot-align text-center'>
    <div
      class="text-center"
      cols="12"
      style="text-align: center; margin: auto;"
    >
      {{ new Date().getFullYear() }} — <strong>Developed by
          <a target='_blank' href='https://henrymoby.website/'>Henry</a></strong>
    </div>
  </v-footer>


</div>

</template>


<script>
export default {
    data(){
        return {
           passenger:true
        }
    },
    mounted(){
        var state = Metro.session.getItem('state')
                            if(state == 1){
                                this.passenger = false
                            }
    },
    methods: {
        rider(){
         
        this.$router.push({name: "rider"});
                       
                
        },
        captain(){
            this.$router.push({name: "board"});
        },
    last(){
            this.$router.push({name: "success"});
        },
        
    },
}
</script>