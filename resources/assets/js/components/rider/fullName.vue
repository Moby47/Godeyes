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
           
            <input type="text" placeholder="First Nme" name='Name' v-model='Name' class='mt-2' v-validate='"required|max:25"'/>
            <p class='fg-red shake' v-show="errors.has('Name')">{{ errors.first('Name') }}</p>
            <input type="text" placeholder="Last Name" name='Surname' v-model='Surname' class='mt-2' v-validate='"required|max:25"'/>
            <p class='fg-red shake' v-show="errors.has('Surname')">{{ errors.first('Surname') }}</p>
            <input type="email" placeholder="Email" v-model='mail' class='mt-2' name='Email' v-validate='"required|email|max:100"'/>
            <p class='fg-red shake' v-show="errors.has('Email')">{{ errors.first('Email') }}</p>
        </div>
       
        <div class="form-group text-center">
            <v-btn class="button fg-white" color="green"  @click.prevent='ok()'>Continue</v-btn>
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
           Name:'',
           Surname:'',
           mail:'',
        }
    },
    mounted(){
        var display = Metro.session.getItem('name')
                        if(display){
                            //old guest, do nothing
                            this.$router.push({name: "rider"});
                        }else{
                            //new guest
                        }
    },
    methods: {
        back(){
                  this.$router.go(-1)
           },

           ok(){
                          //validate specific reg fields
        this.$validator.validateAll().then(() => {
             if (!this.errors.any()) {
            var activity =  Metro.activity.open({
                    type: 'cycle',
                    overlayClickClose: false,
                    text: '<div class=\'mt-2 text-small fg-white\'>Please, wait...</div>',
                })
                    var input = {'Name':this.Name, 'Surname':this.Surname, 'Email':this.mail};
                    axios.post('/api/create-rider',input)
                    .then(res => {
                        
                        var options = {
                                showTop: true,
                                distance: 55
                            }
                          if(res.data == 1){
                            Metro.toast.create('You are ready!',
                             null, 5000, 'success', options);
                             Metro.session.setItem('name',this.Name)
                             Metro.session.setItem('surname',this.Surname)
                             Metro.session.setItem('mail',this.mail)
                             Metro.session.setItem('level','rider')
                             Metro.activity.close(activity);
                             this.$router.push({name: "rider"});
                          
                          }else{
                            Metro.activity.close(activity);
                                alert('An error coccured, please try again.')
                          }
                    })
                    .catch(error =>{
                        Metro.activity.close(activity);
                      console.log(error)
                      var options = {
                                showTop: true,
                                distance: 55
                            }
                         Metro.toast.create('A temporary network error occured... Please try again',
                         null, 5000, 'yellow', options);
                       
                    })
                  }else{ //if error
                    //error is auto shown, dont worry
                  } //if error
                })//val
              
                   }, //suggest
    },
}
</script>