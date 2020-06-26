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



    <form>
        <div class="form-group">
            <input type="text" placeholder="First Name"/>
            <input type="text" placeholder="Last Name"/>
            <input type="email" placeholder="Email"/>
        </div>
       
        <div class="form-group">
            <button class="button success">Submit</button>
            <input type="button" class="button" value="back" @click.prevent='back()'>
        </div>
         <small class="text-warning">*This is a one time setup.</small>
    </form>


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
        back(){
                  
                  this.$router.go(-1)
                   
                 },
    },
}
</script>