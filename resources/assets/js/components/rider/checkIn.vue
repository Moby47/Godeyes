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

<p class="text-center fg-white sub-font-fam">checkin</p>



    <form>
        <div class="form-group">
            <label>select captain</label>
            <select data-role="select">
                <option class="fg-cyan">One</option>
                <option selected class="text-bold fg-red">Two</option>
                <option class="fg-green">Three</option>
            </select>
            <small class="text-muted">We'll never share your email with anyone else.</small>
        </div>
       
        <div class="form-group">
            <button class="button success">Submit data</button>
            <input type="button" class="button" value="back">
        </div>
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