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
               
                <input type="password" placeholder="Password" v-model='pass' class='mt-2' name='Password' v-validate='"required"'/>
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
    <v-btn class="button"  @click.prevent='reg()'>It's my first time</v-btn>
    </div>

    </div>
    
    <floating></floating>
    
    </div>
    
    </template>
    
    
    <script>
    export default {
        data(){
            return {
               Name:'',
               pass:''
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
            reg(){
                var options = {
                                showTop: true,
                            }
                             Metro.toast.create('LOL. ok, start here...',
                         null, 5000, 'success', options);
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
                                 null, 9000, 'yellow', options);
                                 Metro.activity.close(activity);
                              }else{
                               
                                //start login 
                                   Metro.session.setItem('token',res.data.token);
                                   Metro.session.setItem('id',res.data.id);
                                   Metro.session.setItem('name',res.data.name);

                                   Metro.toast.create('You are you, please proceed...',
                                 null, 9000, 'success', options);

                                   Metro.activity.close(activity);
                                   this.$router.push({name: "index"});
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