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
                    <select data-role="select">
                            <option class="fg-cyan">Ondtgdgde</option>
                            <option selected class="text-bold fg-red">Twhrehergreherhrho</option>
                            <option class="fg-green">Thrrhehrrthhree</option>
                        </select>
            </div>
           
            <div class="form-group text-center">
                <v-btn class="button fg-white" color="green" >Check In</v-btn>
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
               
            }
        },
        mounted(){
          
        },
        methods: {
            back(){
                      
                      this.$router.go(-1)
                       
                     },
        },
    }
    </script>