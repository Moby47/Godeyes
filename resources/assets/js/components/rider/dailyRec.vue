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
    
    <h4 class="text-center sub-font-fam">Check-Ins Today</h4>
    
    
    
    <div class='centered slideUp'>
    
        <p class="text-center">Select Bus Captain / Route</p>
        
        
        <div class="row">
        <div class="cell flex-align-self-start"></div>
        <div class="cell flex-align-self-center">
           <form>
                <div class="form-group">
                        <select name='Captain' class="form-control" id='force-select'
                          v-model='captainFullname' v-validate='"required"'
     >
         <option  :value='con.name + " "+ con.surname'
          v-for='con in content'  v-bind:key='con.id'>{{con.name}} {{con.surname}} - {{con.route}}</option>
                            </select>
                </div>
               
            </form>
        </div>
        <div class="cell flex-align-self-end"></div>
    </div>
        
        </div>
        

  <v-card
    class="mx-auto mt-3"
    max-width="344"
    v-show='captainFullname'
  >
  <b class="headline mb-1 ml-1">Morning</b>
    <h4><span class="badge bg-green fg-white">{{morningC}}</span></h4>
  <span>
    <v-card-text  v-for='con in morning'  v-bind:key='con.id'>
      <div>{{con.name}} {{con.surname}}</div>
     <small>{{con.created_at | formatDate}}</small>
    </v-card-text>
  </span>
  </v-card>

  <v-card
  class="mx-auto mt-3"
  max-width="344"
  v-show='captainFullname'
>
<p class="headline mb-1 ml-1">Evening</p>
 <h4><span class="badge bg-green fg-white">{{eveningC}}</span></h4>
  <span>
     <v-card-text  v-for='con in evening'  v-bind:key='con.id'>
      <div>{{con.name}} {{con.surname}}</div>
     <small>{{con.created_at | formatDate}}</small>
    </v-card-text>
  </span>
</v-card>

   
    </div>
    
    
    <floating></floating>
    
    </div>
    
    </template>
    
    
    <script>
    export default {
        data(){
            return {
               morning: [],
               evening:[],
               morningC:'',
               eveningC:'',
               captainFullname:'',
               content:[],
            }
        },
        mounted(){
        this.getCaptains()
        },
        methods: {
           
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
                    
                         Metro.toast.create('A temporary network error occured... Please reload page',
                         null, 5000, 'yellow');
                         Metro.activity.close(activity);
                    })
                
        },

            getMorning(){
                var activity =  Metro.activity.open({
                    type: 'cycle',
                    overlayClickClose: false,
                    text: '<div class=\'mt-2 text-small fg-white\'>Loading...</div>',
                })
                fetch('/api/morning'+'/'+this.captainFullname)
            .then(res => res.json())
            .then(res=>{
               this.morning = res.data;
                Metro.activity.close(activity);
            })
            .catch(error =>{
              console.log(error)
                Metro.activity.close(activity);
                })
         },


         getEvening(){
            var activity2 =  Metro.activity.open({
                    type: 'cycle',
                    overlayClickClose: false,
                    text: '<div class=\'mt-2 text-small fg-white\'>Loading...</div>',
                })
                fetch('/api/evening'+'/'+this.captainFullname)
            .then(res => res.json())
            .then(res=>{
               this.evening = res.data;
                 Metro.activity.close(activity2);
            })
            .catch(error =>{
              console.log(error)
                Metro.activity.close(activity2);
                })
         },

           getMorningCount(){
                fetch('/api/morning-count'+'/'+this.captainFullname)
            .then(res => res.json())
            .then(res=>{
               this.morningC = res;
            })
            .catch(error =>{
              console.log(error)
                })
         },


         getEveningCount(){
                fetch('/api/evening-count'+'/'+this.captainFullname)
            .then(res => res.json())
            .then(res=>{
               this.eveningC = res;
            })
            .catch(error =>{
              console.log(error)
                })
         },

        },


        watch:{

captainFullname(a,b){
if(a){

  this.getMorning()
 this.getEvening()
   this.getMorningCount()
this.getEveningCount()

}
}, // meth


}//watcher
    }
    </script>