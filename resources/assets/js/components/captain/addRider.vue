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
    
    <h4 class="text-center sub-font-fam">Enter Passenger Info</h4>
    
    
     <div class="row">
        <div class="cell flex-align-self-start"></div>
        <div class="cell flex-align-self-center">
            <form>
            <div class="form-group">
               
                <input type="text" placeholder="First Name" name='Name' v-model='Name' class='mt-2' v-validate='"required|max:25"'/>
            <p class='fg-red shake' v-show="errors.has('Name')">{{ errors.first('Name') }}</p>
            <input type="text" placeholder="Last Name" name='Surname' v-model='Surname' class='mt-2' v-validate='"required|max:25"'/>
            <p class='fg-red shake' v-show="errors.has('Surname')">{{ errors.first('Surname') }}</p>
                
               
            </div>
           
            <div class="form-group text-center">
                <v-btn class="button fg-white" color="green"  @click.prevent='ok()'>Check In</v-btn>
            </div>
            
        </form>
    
           
        </div>
         
        <div class="cell flex-align-self-end"></div>
        
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
           Surname:'',
            }
        },
        mounted(){
          
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
                    text: '<div class=\'mt-2 text-small fg-white\'>Checking In...</div>',
                })
                    var input = {'captain':Metro.session.getItem('name')+ ' '+ Metro.session.getItem('surname'), 'name':this.Name, 'surname':this.Surname};
                    axios.post('/api/captain-check-in',input)
                    .then(res => {
                        
                        var options = {
                                showTop: true,
                            }
                          if(res.data == 1){
                             Metro.activity.close(activity);
                              var options = {
                                showTop: true,
                            }
                         Metro.toast.create('Check in for '+this.Name+ ' '+this.Surname +' was successful!',
                         null, 5000, 'success', options);

                             this.$router.push({name: "board"});
                          }else if(res.data.status == 47){
                            Metro.activity.close(activity);
                            alert(this.Name+ ' has checked in this '+ res.data.time)
                         }else if(res.data.status == 48){
                             Metro.activity.close(activity);
                             alert('Check-In is unavailable in the '+ res.data.time)
                          }else if(res.data.status == 49){
                            Metro.activity.close(activity);
                                alert('User is not found or is an admin.')
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
              
                   }, 

        },
    }
    </script>