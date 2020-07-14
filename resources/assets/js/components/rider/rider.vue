<template>
        <div >
    <div class='bg-start'>
        
    </div>
    
   <h4 class="text-center slideUp mb-5" style='font-family: "Orbitron";'>Hi, {{this.name}}</h4>
    
    <div class='centered slideUp mt-5'>
    
    <div class="row text-center">
        
            <div class="row">
                    <div class="cell flex-align-self-start"></div>
                    <div class="cell flex-align-self-center">
                      

                            <div class="tiles-grid tiles-group size-2" data-group-title="">
                                    <div @click.prevent='checkin()' 
                                            data-role="tile" style="background-color: #3b6b63">
                                        <span class="mif-user-check icon"></span>
                                        <span class="branding-bar">Check In</span>
                            </div>
                                    <div data-role="tile" class="bg-cyan" @click.prevent='timeline()'>
                                        <span class="mif-list2 icon"></span>
                                        <span class="branding-bar">My Trips</span>
                                        <span class="badge-bottom">{{mytrips}}</span>
                                    </div>
                               <!--     <div data-role="tile" style="background-color: #e08981" data-size="wide"
                                   @click.prevent='timeline()'>
                                        <span class="mif-list2 icon"></span>
                                        <span class="branding-bar">My Trips</span>
                                        <span class="badge-bottom">{{mytrips}}</span>
                                    </div>-->
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
               name:'',
               today:0,
               mytrips:0
            }
        },
        mounted(){
        var state = Metro.session.getItem('state')
                            if(state != 0){
                                //auth
                                var options = {
                                showTop: true,
                            }
                         Metro.toast.create('That page is for passengers only!',
                         null, 5000, 'yellow', options);
                                this.$router.push({name: "index"});
                            }

         this.name = Metro.session.getItem('name')

         this.getMorningCount()
         this.getEveningCount()

         this.getTimelineCount()
         
        },
        methods: {
            checkin(){
              
              this.$router.push({name: "checkIn"});
                        
                    
            },
            timeline(){
                this.$router.push({name: "timeline"});
            },
            daily(){
             this.$router.push({name: "daily"});
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
        
         getTimelineCount(){
                fetch('/api/logs-count'+'/'+Metro.session.getItem('id'))
            .then(res => res.json())
            .then(res=>{
               this.mytrips = res;
            })
            .catch(error =>{
              console.log(error)
                })
         },

        },
    }
    </script>