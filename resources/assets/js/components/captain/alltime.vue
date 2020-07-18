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
 <v-card
    class="mx-auto mt-2"
    max-width="425">
            <div class="row" >
                    <div class="cell flex-align-self-start"> </div>
                    <div class="cell flex-align-self-center"> 
                          From  <input type='date' class='force-select' v-model='from'>
                         To   <input type='date' class='force-select' v-model='to'> 
                            <div class="form-group text-center">
                            <v-btn class="button fg-white" color="green" @click.prevent='go()'>Go</v-btn>
                            </div>
                    </div>
                    <div class="cell flex-align-self-end"></div>
                </div>


            <table class="table table-border table-striped slideUp secondary-color text-cap table-dark">
                    <thead>
                    <tr >
                            <th  class="fg-white">Passenger</th>
                            <th  class="fg-white">Bus Captain</th>
                            <th class="fg-white">date</th>
                            <th class="fg-white">time</th>
                    </tr>
                    </thead>
                    <tbody>
                            <tr v-for='con in content'  v-bind:key='con.id'>
                                    <td>{{con.name}} {{con.surname}}</td>
                                    <td>{{con.captain}}</td>
                                    <td>{{con.created_at | formatDate}}</td>
                                    <td>{{con.time}}</td>
                            </tr>
                            
                               
                    </tbody>

                    
                </table>

 <div class='text-center'>
       <ul class="pagination mb-5">
                            <li class="page-item"><a class="page-link" href="#" @click.prevent="get(pagination.prev_page_url)" v-show="pagination.prev_page_url"> Prev </a></li>

                            <li class="page-item"><a class="page-link" href="#"><span>{{pagination.current_page}} of {{pagination.last_page}}</span></a></li>
                            
                  <li class="page-item"><a class="page-link" href="#" @click.prevent="get(pagination.next_page_url)" v-show="pagination.next_page_url">Next</a></li>
                        </ul>
                       
  </div>
                <div class="form-group text-center">
                        <v-btn class="button fg-white" color="green" @click.prevent="excelFile()">Export</v-btn>
                    </div>

 </v-card>         
          </template>

   
    </div>
    
    
    <floating></floating>
    
    </div>
    
    </template>
    
    
    <script>
    export default {
        data(){
            return {
               content:[],
               pagination:[],
               to:'',
               from:''
            }
        },
        mounted(){
          var state = Metro.session.getItem('state')
                            if(state != 1){
                                //auth
                                var options = {
                                showTop: true,
                            }
                         Metro.toast.create('That page is for bus captains only!',
                         null, 5000, 'info', options);
                                this.$router.push({name: "index"});
                            }

        this.get()
        },

        methods: {

            excelFile(){
                if(this.to == ''  || this.from == ''){
                          var options = {
                                showTop: true,
                            }
 Metro.toast.create('Please select dates',
    null, 5000, 'yellow', options);
                         return;
                 }

                  var activity =  Metro.activity.open({
                    type: 'cycle',
                    overlayClickClose: false,
                    text: '<div class=\'mt-2 text-small fg-white\'>Exporting...</div>',
                })

                axios({
                url: '/api/export-file' +'/'+this.from +'/'+this.to+'/'+Metro.session.getItem('name')+' '+Metro.session.getItem('surname'),
                method: 'GET',
                responseType: 'blob', // important
              }).then((response) => {
                const url = window.URL.createObjectURL(new Blob([response.data]));
                const link = document.createElement('a');
                link.href = url;
                link.setAttribute('download', 'Shuttlers_Passengers.xlsx'); //or any other extension
                document.body.appendChild(link);
                link.click();
                Metro.activity.close(activity);
              });

                /*
                var   page_url = page_url || '/api/export-file' +'/'+this.from +'/'+this.to
                fetch(page_url)
                .then(res => res.json())
                .then(res=>{
                  // this.content = res.data;
                   console.log(res)
                   Metro.activity.close(activity);
                   var options = {
                                showTop: true,
                            }
                  
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
                    */
            },



         go(page_url){

                 if(this.to == ''  || this.from == ''){
                          var options = {
                                showTop: true,
                            }
 Metro.toast.create('Please select dates',
    null, 5000, 'yellow', options);
                         return;
                 }

                  var activity =  Metro.activity.open({
                    type: 'cycle',
                    overlayClickClose: false,
                    text: '<div class=\'mt-2 text-small fg-white\'>Loading data...</div>',
                })
                var   page_url = page_url || '/api/all-logs-filtered' +'/'+this.from +'/'+this.to+'/'+Metro.session.getItem('name')+' '+Metro.session.getItem('surname')
                fetch(page_url)
                .then(res => res.json())
                .then(res=>{
                   this.content = res.data;
                   console.log(this.content)
                   Metro.activity.close(activity);
                   var options = {
                                showTop: true,
                            }
                  //to determine if obj is empty 
                          console.log(res.data[0]);
                          if(res.data[0] == undefined){
                            Metro.toast.create('No records found',
                         null, 5000, 'info', options);
                          }else{
                              this.empty = false;
                          }
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

           get(page_url){
                  var activity =  Metro.activity.open({
                    type: 'cycle',
                    overlayClickClose: false,
                    text: '<div class=\'mt-2 text-small fg-white\'>Loading data...</div>',
                })
                var   page_url = page_url || '/api/all-logs'+'/'+Metro.session.getItem('name')+' '+Metro.session.getItem('surname')
                fetch(page_url)
                .then(res => res.json())
                .then(res=>{
                   this.content = res.data;
                   console.log(this.content)
                   Metro.activity.close(activity);
                   var options = {
                                showTop: true,
                            }
                  //to determine if obj is empty 
                          console.log(res.data[0]);
                          if(res.data[0] == undefined){
                            Metro.toast.create('No records yet',
                         null, 5000, 'info', options);
                          }else{
                              this.empty = false;
                          }
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
        },
    }
    </script>