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
     <small>With Captain name surname</small>
    </v-card-text>
    <v-card-actions>
      <v-btn
        text
        color="#3b6b63"
        class='fg-white'
        @click.prevent='more()'
      >
        More
      </v-btn>
    </v-card-actions>
  </v-card>

     
      
  <div class='text-center'>
      <v-btn
        text
        color="#f9b8b4"
        class='fg-white'
      >
        Load More
      </v-btn>
  </div>

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