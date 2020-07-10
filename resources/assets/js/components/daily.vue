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
    
    
    

  <v-card
    class="mx-auto mt-3"
    max-width="344"
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
            }
        },
        mounted(){
          this.getMorning()
          this.getEvening()
          this.getMorningCount()
          this.getEveningCount()
        },
        methods: {
            more(){
            alert("Feature Under Maintenance")
            },

            getMorning(){
                var activity =  Metro.activity.open({
                    type: 'cycle',
                    overlayClickClose: false,
                    text: '<div class=\'mt-2 text-small fg-white\'>Loading...</div>',
                })
                fetch('/api/morning')
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
                fetch('/api/evening')
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
                fetch('/api/morning-count')
            .then(res => res.json())
            .then(res=>{
               this.morningC = res;
            })
            .catch(error =>{
              console.log(error)
                })
         },


         getEveningCount(){
                fetch('/api/evening-count')
            .then(res => res.json())
            .then(res=>{
               this.eveningC = res;
            })
            .catch(error =>{
              console.log(error)
                })
         },

        },
    }
    </script>