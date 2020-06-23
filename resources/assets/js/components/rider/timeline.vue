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

<table class="table">
    <thead>
    <tr>
        <th>checkin</th>
        <th>date</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>morning</td>
        <td>@billy</td>
    </tr>
    <tr>
        <td>evening</td>
        <td>@stevy</td>
    </tr>
  
    </tbody>
</table>

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