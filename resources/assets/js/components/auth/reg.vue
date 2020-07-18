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
           
            <input type="text" placeholder="First Name" name='Name' v-model='Name' class='mt-2' v-validate='"required|max:25"'/>
            <p class='fg-red shake' v-show="errors.has('Name')">{{ errors.first('Name') }}</p>
            <input type="text" placeholder="Last Name" name='Surname' v-model='Surname' class='mt-2' v-validate='"required|max:25"'/>
            <p class='fg-red shake' v-show="errors.has('Surname')">{{ errors.first('Surname') }}</p>
            <input type="email" placeholder="Personal Email" v-model='mail' class='mt-2' name='Email' v-validate='"required|email|max:100"'/>
            <p class='fg-red shake' v-show="errors.has('Email')">{{ errors.first('Email') }}</p>
            <input :type="passwordFieldType" placeholder="Password" v-model='pass' class='mt-2' name='Password' v-validate='"required"'/>
            <v-icon class='field-icon' @click="switchVisibility">remove_red_eye</v-icon>
            <p class='fg-red shake' v-show="errors.has('Password')">{{ errors.first('Password') }}</p>
        </div>
       
        <div class="form-group text-center">
            <v-btn class="button fg-white" color="green"  @click.prevent='ok()'>Let's go</v-btn>
        </div>
        
    </form>

       
    </div>
     
    <div class="cell flex-align-self-end"></div>
    
</div>
   

</div>

<floating></floating>

</div>

</template>

<style scoped>
    .field-icon {
 float: right;
 margin-left: -25px;
 margin-top: -25px;
 position: relative;
 z-index: 2;
}
   </style>

<script>
export default {
    data(){
        return {
           Name:'',
           Surname:'',
           mail:'',
           pass:'',
           passwordFieldType: 'password'
        }
    },
    mounted(){
        var display = Metro.session.getItem('id')
                        if(display){
                            //auth
                            this.$router.push({name: "index"});
                        }
    },
    methods: {

        switchVisibility() {
      this.passwordFieldType = this.passwordFieldType === 'password' ? 'text' : 'password'
    },

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
                    var input = {'name':this.Name, 'surname':this.Surname, 'email':this.mail, 'password':this.pass};
                    
                    axios.post('/api/signup',input)
                    .then(res => {
                        
                        var options = {
                                showTop: true,
                            }
                          if(res.data == 1){

        //login
                  axios.post('/api/signin',input)
                    .then(res => {
                    var result = res.data.result;
                    var options = {
                                showTop: true,
                            }
                         if(result == 2){
                            Metro.toast.create('Invalid credentials. Refresh and try again',
                             null, 9000, 'alert', options);
                             Metro.activity.close(activity);
                          }else{
                           
                            //start login 
                               Metro.session.setItem('token',res.data.token);
                               Metro.session.setItem('id',res.data.id);
                               Metro.session.setItem('name',res.data.name);
                               Metro.session.setItem('surname',res.data.surname);
                               Metro.session.setItem('state',res.data.state);

                               var options = {
                                showTop: true,
                            }
                               Metro.activity.close(activity);
                               if(Metro.session.getItem('state') == 1){
                                    this.$router.push({name: "board"});
                                   }else if(Metro.session.getItem('state') == 0){
                                    this.$router.push({name: "rider"});
                                   }else{
                                      Metro.toast.create('You are you, please proceed...',
                                 null, 9000, 'success', options);
                                 this.$router.push({name: "index"});
                                   }
                          }
                    })
                    .catch(error =>{
                        Metro.activity.close(activity);
                      console.log('err',error)
                    })
                           /* Metro.toast.create('You are ready!',
                             null, 5000, 'success', options);
                             Metro.session.setItem('name',this.Name)
                             Metro.session.setItem('surname',this.Surname)
                             Metro.session.setItem('mail',this.mail)
                             Metro.session.setItem('level','rider')
                             Metro.activity.close(activity);
                             this.$router.push({name: "rider"});*/
                          
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