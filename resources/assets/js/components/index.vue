<template>
    <div >
<div class='bg-start'>
    
</div>

<h1 class="text-center slideUp mb-5" style='font-family: "Orbitron";'>
    W<v-icon>visibility</v-icon>tch D<v-icon>pets</v-icon>g</h1>

<div class='centered slideUp mt-5'>

<div class="row text-center">

<div class="cell order-1 mr-5">
    <button class="shortcut rounded primary ani-hover-horizontal" @click.prevent='rider()' 
    style="background-color: #3b6b63">
        <span class="caption">Passengers</span>
        <span class="mif-users icon  ani-float"></span>
    </button>
</div>


<div class="cell order-2">
        <button class="shortcut rounded primary ani-hover-horizontal" @click.prevent='captain()' 
        style="background-color: #e08981">
            <span class="caption">Bus Captain</span>
            <span class="mif-user-secret icon  ani-float"></span>
        </button>
    </div>

</div>

</div>


  
    <div
      class="text-center shift"
      cols="12"
      v-show='passenger'
    >
    <v-btn class="button fg-white" style="background-color: #ce5247"  @click.prevent='last()'>My Last Check-In</v-btn>
    </div>

    <v-card
    class="mx-auto mt-1"
    max-width="344"
  >
    <div class="skill-box">
        <ul class="skills">
            <li>
                <span>Registered Passengers</span>
                <span class="badge fg-white" style="background-color: #3b6b63">{{passengerCount}}</span>
            </li>
            <li>
                <span>Registered Captains</span>
                <span class="badge fg-white" style="background-color: #e08981">{{captainCount}}</span>
            </li>
        </ul>
    </div>
    </v-card>


  <v-footer class='foot-align text-center'>
    <div
      class="text-center"
      cols="12"
      style="text-align: center; margin: auto;"
    >
      {{ new Date().getFullYear() }} — <strong>Developed by
          <a target='_blank' href='https://henrymoby.website/'>Henry</a></strong>
    </div>
  </v-footer>


  <template>
    <div>
            <a @click.prevent='out()' >	
			 <v-btn 
			 fab 
			 dark
			 :color=btnColor
			 small
             relative
             outlined
			 bottom
			 right
			 fixed
			   >
               <v-icon dark > {{icon}} </v-icon> 
			 </v-btn>
            </a>

            </div>
        </template>     
</div>

</template>


<script>
export default {
    data(){
        return {
           passenger:true,
           icon:'power',
           btnColor:'#28a745',
           passengerCount:'loading',
           captainCount:'loading',
        }
    },
    mounted(){
        var state = Metro.session.getItem('state')
                            if(state == 1){
                                this.passenger = false
                            }
        this.isAuth()

        this.passengerC()
        this.captainC()
    },
    methods: {

            passengerC(){
               
                var   page_url = '/api/passengers-count'
                fetch(page_url)
                .then(res => res.json())
                .then(res=>{
                   this.passengerCount = res;
                })
                .catch(error =>{
                  console.log(error)
                    //off loader
                    var options = {
                                showTop: true,
                            }
                         Metro.toast.create('Passenger count failed',
                         null, 5000, 'yellow', options);
                         Metro.activity.close(activity);
                       
                    })
            },

            captainC(){

                var   page_url = '/api/captains-count'
                fetch(page_url)
                .then(res => res.json())
                .then(res=>{
                   this.captainCount = res;
                })
                .catch(error =>{
                  console.log(error)
                    //off loader
                    var options = {
                                showTop: true,
                            }
                         Metro.toast.create('Captain count failed',
                         null, 5000, 'yellow', options);
                         Metro.activity.close(activity);
                       
                    })

            },

        out(){
            
            if(this.isAuth()){
                //logout
                var activity =  Metro.activity.open({
                    type: 'cycle',
                    overlayClickClose: false,
                    text: '<div class=\'mt-2 text-small fg-white\'>Signing off...</div>',
                })
                Metro.session.delItem('token');
                                   Metro.session.delItem('id');
                                   Metro.session.delItem('name');
                                   Metro.session.delItem('surname');
                                   Metro.session.delItem('state');
                    this.isAuth()
                   Metro.activity.close(activity);
            }else{
                //not auth, go to login
                this.$router.push({name: "signin"});
            }
        },

        isAuth(){
          if(Metro.session.getItem('token')){
            this.btnColor ='#dc3545'
            this.icon = 'power_off'
          return true;
         }else{
            this.btnColor ='#28a745'
            this.icon = 'power'
         return false;
        }
        },

        rider(){
         
        this.$router.push({name: "rider"});
                       
                
        },
        captain(){
            this.$router.push({name: "board"});
        },
    last(){
            this.$router.push({name: "success"});
        },
        
    },
}
</script>