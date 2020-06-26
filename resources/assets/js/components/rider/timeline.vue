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
    
    <h4 class="text-center sub-font-fam">Trip History</h4>
    
    
    

  <v-card
    class="mx-auto mt-3"
    max-width="344"
  >
    <v-card-text>
      <div>Mon 23th April 07:30AM</div>
     
    </v-card-text>
    <v-card-actions>
      <v-btn
        text
        color="accent-4"
        @click.prevent='more()'
      >
        More
      </v-btn>
    </v-card-actions>
  </v-card>

      <v-card
    class="mx-auto mt-3"
    max-width="344"
  >
    <v-card-text>
      <div>Mon 23th April 07:30AM</div>
     
    </v-card-text>
    <v-card-actions>
      <v-btn 
        text
        color="accent-4"
      >
        More
      </v-btn>
    </v-card-actions>
  </v-card>

    <v-card
    class="mx-auto mt-3"
    max-width="344"
  >
    <v-card-text>
      <div>Mon 23th April 07:30AM</div>
     
    </v-card-text>
    <v-card-actions>
      <v-btn
        text
        color="accent-4"
      >
        More
      </v-btn>
    </v-card-actions>
  </v-card>
      

    </div>
    
    
    <floating></floating>
    
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
            more(){
                      
                     alert("Feature Under Maintenance")
                       
                     },
        },
    }
    </script>