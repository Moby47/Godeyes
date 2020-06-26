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
    
    
    
        <form>
            <div class="form-group">
                    <select data-role="select">
                            <option class="fg-cyan">One</option>
                            <option selected class="text-bold fg-red">Two</option>
                            <option class="fg-green">Three</option>
                        </select>
            </div>
           
            <div class="form-group">
                <button class="button success">Check In</button>
                <input type="button" class="button" value="back" @click.prevent='back()'>
            </div>
        </form>
    
    
    </div>
    
    
    
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