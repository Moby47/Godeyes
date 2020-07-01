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
    
    <h4 class="text-center sub-font-fam">Select Bus Captain</h4>
    
    
    <div class="row">
    <div class="cell flex-align-self-start"></div>
    <div class="cell flex-align-self-center">
       <form>

        
            <div class="form-group">
                    <select name='Captain' class="form-control" id='force-select'
                      v-model='captain' v-validate='"required"'
 >
     <option  :value='con.name + " "+ con.surname'
      v-for='con in content'  v-bind:key='con.id'>{{con.name}} {{con.surname}}</option>
                        </select>
              <p class='fg-red shake' v-show="errors.has('Captain')">{{ errors.first('Captain') }}</p>
            </div>
           
            <div class="form-group text-center">
                <v-btn class="button fg-white" color="green" @click.prevent='ok()'>Check In</v-btn>
            </div>
        </form>
    </div>
    <div class="cell flex-align-self-end"></div>
</div>
     <!--   <form>
            <div class="form-group">
                    <select data-role="select">
                            <option class="fg-cyan">One</option>
                            <option selected class="text-bold fg-red">Two</option>
                            <option class="fg-green">Three</option>
                        </select>
            </div>
           
            <div class="form-group">
                <button class="button success">Check In</button>
            </div>
        </form>
    -->
    
    </div>
    
    
     <floating></floating>

    </div>
    
    </template>
    
    
    <script>
    export default {
        data(){
            return {
               content:[],
               captain:''
            }
        },
        mounted(){
          this.getCaptains()
        },
        methods: {
            back(){
                      
                      this.$router.go(-1)
                       
                     },

        getCaptains(){
            var activity =  Metro.activity.open({
                    type: 'cycle',
                    overlayClickClose: false,
                    text: '<div class=\'mt-2 text-small fg-white\'>Getting Captains...</div>',
                })
                fetch('/api/get-captains')
                .then(res => res.json())
                .then(res=>{
                   this.content = res.data;
                   console.log(this.content)
                   Metro.activity.close(activity);
                  /*to determine if obj is empty 
                          console.log(res.data[0]);
                          if(res.data[0] == undefined){
                              this.empty = true;
                          }else{
                              this.empty = false;
                          }
                  to determine if obj is empty*/
                })
                .catch(error =>{
                  console.log(error)
                    //off loader
                    var options = {
                                showTop: true,
                                distance: 55
                            }
                         Metro.toast.create('A temporary network error occured... Please reload page',
                         null, 5000, 'yellow', options);
                         Metro.activity.close(activity);
                    })
                
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
                    var input = {'Name':Metro.session.getItem('name'), 
                    'Surname':Metro.session.getItem('surname'), 'Captain':this.captain};
                    axios.post('/api/check-in',input)
                    .then(res => {
                        
                        var options = {
                                showTop: true,
                                distance: 55
                            }
                          if(res.data == 1){
                             Metro.activity.close(activity);
                             this.$router.push({name: "success"});
                          }else if(res.data.status == 47){
                            Metro.activity.close(activity);
                            alert('Check-In is complete for this '+ res.data.time)
                            this.$router.push({name: "success"});
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
              
                   }, 
        

        },
    }
    </script>