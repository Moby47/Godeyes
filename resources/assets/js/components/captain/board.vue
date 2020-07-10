<template>
        <div >
    <div class='bg-start'>
        
    </div>
    
    <h1 class="text-center slideUp mb-5" style='font-family: "Orbitron";'>
            W<v-icon>visibility</v-icon>tch D<v-icon>pets</v-icon>g</h1>
    
    <div class='centered slideUp mt-5'>
    
    <div class="row text-center">
        
            <div class="row">
                    <div class="cell flex-align-self-start"></div>
                    <div class="cell flex-align-self-center">
                      

                            <div class="tiles-grid tiles-group size-2" data-group-title="">
                                    <div @click.prevent="daily()"
                                            data-role="tile" style="background-color: #3b6b63">
                                        <span class="mif-cloudy icon"></span>
                                        <span class="branding-bar">Today's Records</span>
                                        <span class="badge-bottom">{{today}}</span>
                            </div>
                                    <div data-role="tile" class="bg-cyan" @click.prevent="alltime()">
                                        <span class="mif-database icon"></span>
                                        <span class="branding-bar">All Records</span>
                                    </div>
                                    <div data-role="tile" style="background-color: #e08981" data-size="wide"
                                    @click.prevent="addRider()">
                                        <span class="mif-bus icon"></span>
                                        <span class="branding-bar">Add Passenger</span>
                                    </div>
                                   <!-- <div data-role="tile" data-size="small">
                                        <span class="mif-apple icon"></span>
                                    </div>
                                    <div data-role="tile" data-size="small" class="bg-red">
                                        <span class="mif-bell icon"></span>
                                    </div>
                                    <div data-role="tile" data-size="small" class="bg-teal col-1 row-6">
                                        <span class="mif-windows icon"></span>
                                    </div>
                                    <div data-role="tile" data-size="small" class="bg-brown col-2 row-6">
                                        <span class="mif-wind icon"></span>
                                    </div>
                                    <div data-role="tile" class="bg-cyan">
                                        <span class="mif-table icon"></span>
                                        <span class="branding-bar">Tables</span>
                                    </div>-->
                                </div>
                
                       
                    </div>
                     
                    <div class="cell flex-align-self-end"></div>
                    
                </div>
    
    </div>
    
    </div>
    
    
    <floating></floating>
    </div>
    
    </template>
    
    
    <script>
    export default {
        data(){
            return {
               today:0,
            }
        },
        mounted(){
 var state = Metro.session.getItem('state')
                            if(state != 1){
                                //auth
                                var options = {
                                showTop: true,
                            }
                         Metro.toast.create('This page is for bus captains only!',
                         null, 5000, 'yellow', options);
                                this.$router.push({name: "index"});
                            }

         this.getMorningCount()
         this.getEveningCount()
        },
        methods: {
            rider(){
              
         var display = Metro.session.getItem('newRider')
                            if(display){
                                //old guest, do nothing
                                this.$router.push({name: "rider"});
                            }else{
                                //new guest:
                                Metro.session.setItem('newRider','newRider')
                             this.$router.push({name: "fullName"});
                           
                            }
                    
            },
            addRider(){
             this.$router.push({name: "addRider"});
            },
            daily(){
             this.$router.push({name: "daily"});
            },
            alltime(){
             this.$router.push({name: "alltime"});
            },
        
          getMorningCount(){
                fetch('/api/morning-count')
            .then(res => res.json())
            .then(res=>{
               this.today =  this.today + res;
            })
            .catch(error =>{
              console.log(error)
                })
         },


         getEveningCount(){
                fetch('/api/evening-count')
            .then(res => res.json())
            .then(res=>{
               this.today =  this.today + res;
            })
            .catch(error =>{
              console.log(error)
                })
         },
            
        },
    }
    </script>