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
    
    <h4 class="text-center sub-font-fam">Trip Records</h4>
    
    
    
    <template>

            <div class="row">
                    <div class="cell flex-align-self-start"> </div>
                    <div class="cell flex-align-self-center"> 
                            <input data-role="datepicker">
                            <input data-role="datepicker"> 
                            <div class="form-group text-center">
                            <v-btn class="button fg-white" color="green" >Go</v-btn>
                            </div>
                    </div>
                    <div class="cell flex-align-self-end"></div>
                </div>


            <table class="table table-border table-striped slideUp secondary-color text-cap table-dark">
                    <thead>
                    <tr >
                            <th  class="fg-white">Name</th>
                            <th class="fg-white">date</th>
                            <th class="fg-white">time</th>
                    </tr>
                    </thead>
                    <tbody>
                            <tr>
                                    <td>dfr</td><td>dfr</td><td>dfr</td>
                            </tr>
                            <tr>
                                    <td>dfr</td><td>dfr</td><td>dfr</td>
                            </tr>
                            <tr>
                                    <td>dfr</td><td>dfr</td><td>dfr</td>
                            </tr>
                               
                    </tbody>
                </table>

                <div class="form-group text-center">
                        <v-btn class="button fg-white" color="green" >Export</v-btn>
                    </div>

           
          </template>

   
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