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
    
    <h4 class="text-center sub-font-fam">Confirm Info</h4>
    
    
     <div class="row">
        <div class="cell flex-align-self-start"></div>
        <div class="cell flex-align-self-center">
            <form>
            <div class="form-group">
               
                <input type="text" placeholder="First Name" name='Name' v-model='Name' class='mt-2' v-validate='"required|max:25"'/>
                <p class='fg-red shake' v-show="errors.has('Name')">{{ errors.first('Name') }}</p>
               
                <input :type="passwordFieldType" placeholder="Password" v-model='pass' class='mt-2' name='Password' v-validate='"required"'/>
                <v-icon class='field-icon' @click="switchVisibility">remove_red_eye</v-icon>
                 <p class='fg-red shake' v-show="errors.has('Password')">{{ errors.first('Password') }}</p>
            </div>
           
            <div class="form-group text-center">
                <v-btn class="button fg-white" color="green"  @click.prevent='ok()'>I'm me</v-btn>
            </div>
            
        </form>
    
           
        </div>
         
        <div class="cell flex-align-self-end"></div>
        
    </div>
       
    
    <div
      class="text-center shift"
      cols="12"
    >
    <v-btn class="button fg-white" style="background-color: #ce5247"   @click.prevent='reg()'>My first time (Passenger)</v-btn>
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
            reg(){
                var options = {
                                showTop: true,
                            }
                             Metro.toast.create('LOL. ok, start here...',
                         null, 5000, 'info', options);
                this.$router.push({name: "reg"});
               },
    
               ok(){
                              //validate specific reg fields
            this.$validator.validateAll().then(() => {
                 if (!this.errors.any()) {
                var activity =  Metro.activity.open({
                        type: 'cycle',
                        overlayClickClose: false,
                        text: '<div class=\'mt-2 text-small fg-white\'>Checking...</div>',
                    })
                      //login
                      var input = {'name':this.Name,'password':this.pass};
                        
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
                      }else{ //if error
                        //error is auto shown, dont worry
                      } //if error
                    })//val
                  
                       }, //suggest
        },
    }
    </script>