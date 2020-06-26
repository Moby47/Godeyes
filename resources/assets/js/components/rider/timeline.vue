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
    
    
    
    <table class="table cell-border striped">
            <thead>
            <tr>
                <th>checkin</th>
                <th>date</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="info">morning</td>
                <td class="light">@billy</td>
            </tr>
            <tr>
                <td class="alert">evening</td>
                <td class="light">@stevy</td>
            </tr>
          
            </tbody>
        </table>
    
        <div class="form-group">
                <input type="button" class="button" value="back" @click.prevent='back()'>
            </div>

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