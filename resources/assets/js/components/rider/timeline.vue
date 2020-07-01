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
    
    
    <div class="social-box">
       <!-- <div class="header  fg-white" style="background-color: #3b6b63">
            <div class="title">{{name}}</div>
        </div>-->
        <ul class="skills fg-white" style="background-color: #3b6b63">
            <li>
                <div class="text-bold">{{week}}</div>
                <div>This Week</div>
            </li>
            <li>
                <div class="text-bold">{{month}}</div>
                <div>This Month</div>
            </li>
            <li>
                <div class="text-bold">{{total}}</div>
                <div>Total Trips</div>
            </li>
        </ul>
    </div>


  <v-card
    class="mx-auto mt-2"
    max-width="344"
    v-for='con in content'  v-bind:key='con.id'
  >
    <v-card-text>
      <div>{{con.created_at | formatDate}} ~ {{con.time}} trip</div>
     <small>With Captain {{con.captain}}</small>
    </v-card-text>
  </v-card>

     
      
  <div class='text-center'>
       <ul class="pagination mb-5">
                            <li class="page-item"><a class="page-link" href="#" @click.prevent="get(pagination.prev_page_url)" :disabled="!pagination.prev_page_url"> Prev </a></li>

                            <li class="page-item"><a class="page-link" href="#"><span>{{pagination.current_page}} of {{pagination.last_page}}</span></a></li>
                            
                  <li class="page-item"><a class="page-link" href="#" @click.prevent="get(pagination.next_page_url)" :disabled="!pagination.next_page_url">Next </a></li>
                        </ul>
                       
  </div>

    </div>
    
    
    <floating></floating>
    
    </div>
    
    </template>
    
    
    <script>
    export default {
        data(){
            return {
               content:[],
               empty:false,
              pagination:[],
              week:'-',
              month:'-',
              total:'-',
              name:''
            }
        },
        mounted(){
           /*var rider = Metro.session.getItem('level') 
            if(rider != 'rider'){
                this.$router.push({name: "fullName"});
            }*/
          this.get()
          this.getWeek()
          this.getMonth()
          this.getTotal()
         // this.name = Metro.session.getItem('name')
        },
        methods: {
            more(){
                      
                     alert("Feature Under Maintenance")
                       
                },

                get(page_url){
                  var activity =  Metro.activity.open({
                    type: 'cycle',
                    overlayClickClose: false,
                    text: '<div class=\'mt-2 text-small fg-white\'>Loading trips...</div>',
                })
                var   page_url = page_url || '/api/logs'+'/'+Metro.session.getItem('id')
                fetch(page_url)
                .then(res => res.json())
                .then(res=>{
                   this.content = res.data;
                   this.per_page = res.meta.per_page
                   console.log(this.content)
                   Metro.activity.close(activity);
                   var options = {
                                showTop: true,
                            }
                  //to determine if obj is empty 
                          console.log(res.data[0]);
                          if(res.data[0] == undefined){
                          //  alert('No records yet')
                            Metro.toast.create('No records yet',
                         null, 5000, 'yellow', options);
                           // this.$router.push({name: "checkIn"});
                          }else{
                              this.empty = false;
                          }
                  //to determine if obj is empty
                  //to determine if obj is empty
                  this.makePagination(res.meta, res.links);
                
                })
                .catch(error =>{
                  console.log(error)
                    //off loader
                 
                    var options = {
                                showTop: true,
                            }
                         Metro.toast.create('A temporary network error occured... Please reload page',
                         null, 5000, 'yellow', options);
                         Metro.activity.close(activity);
                       
                    })
                },

                makePagination(meta, links){
          var pagination = {
                          current_page: meta.current_page,
                          last_page: meta.last_page,
                          next_page_url: links.next,
                          prev_page_url: links.prev
                           }
            document.body.scrollTop = 0;
           document.documentElement.scrollTop = 0;
          this.pagination = pagination;
              },

          getWeek(){
                fetch('/api/week/'+Metro.session.getItem('surname'))
            .then(res => res.json())
            .then(res=>{
               this.week = res
            })
            .catch(error =>{
              console.log(error)
                })
         },

         getMonth(){
                fetch('/api/month/'+Metro.session.getItem('surname'))
            .then(res => res.json())
            .then(res=>{
               this.month = res
            })
            .catch(error =>{
              console.log(error)
                })
         },

         getTotal(){
                fetch('/api/total/'+Metro.session.getItem('surname'))
            .then(res => res.json())
            .then(res=>{
               this.total = res
            })
            .catch(error =>{
              console.log(error)
                })
         }



        },
    }
    </script>