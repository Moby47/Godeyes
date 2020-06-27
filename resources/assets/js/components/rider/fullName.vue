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

<h4 class="text-center sub-font-fam">Enter Profile Info</h4>


 <div class="row">
    <div class="cell flex-align-self-start"></div>
    <div class="cell flex-align-self-center">
        <form>
        <div class="form-group">
           
            <input type="text" placeholder="First Nme" class='mt-2'/>
           
            <input type="text" placeholder="Last Name" class='mt-2'/>
           
            <input type="email" placeholder="Email" class='mt-2'/>
        </div>
       
        <div class="form-group text-center">
            <v-btn class="button fg-white" color="green" >Continue</v-btn>
        </div>
        
    </form>

       
    </div>
     
    <div class="cell flex-align-self-end"></div>
    
</div>
    <b class="bg-white">*This is a one time setup.</b>


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
      
    },
    methods: {
        back(){
                  
                  this.$router.go(-1)
                   
                 },
    },
}
</script>