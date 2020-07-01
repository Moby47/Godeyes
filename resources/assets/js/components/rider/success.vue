<template>
    <div>


    <div class='bg-col mt-4' >

<div class='bg-start'>
    <div class='dark-shade'></div>
</div>

<h3 class="text-center pulse" style='font-family: "Orbitron";'>Latest Check-In</h3>
<br>

<div class='centered slideUp'>
<span   v-for='con in content'  v-bind:key='con.id'>
<h5 class="text-center sub-font-fam">{{con.created_at | formatDate}} </h5>
<h5 class="text-center sub-font-fam">{{con.time}}</h5>
<h5 class="text-center sub-font-fam">Bus Captain {{con.captain}}</h5>
</span>

</div>



</div>

<div class='centered slideUp mt-5'>
    
        <div class="row text-center">
        
        <div class="cell order-2">
                <button class="shortcut rounded primary ani-hover-horizontal" @click.prevent='home()' 
                style="background-color: #e08981">
                    <span class="caption">Home</span>
                    <span class="mif-home icon  ani-float"></span>
                </button>
            </div>
        
        </div>
        
        </div>

        </div>

</template>


<script>
export default {
    data(){
        return {
           content:[],
        }
    },
    mounted(){
         var options = {
                                showTop: true,
                            }
         var rider = Metro.session.getItem('level') 
            if(rider != 'rider'){
                             Metro.toast.create('Please Enter Profile Info',
                         null, 5000, 'success', options);
                this.$router.push({name: "fullName"});
            }
      this.get()
    },
    methods: {
        exit(){
            window.top.close();
         },
         home(){
            this.$router.push({name: "index"});
        },  

          get(){
                  var activity =  Metro.activity.open({
                    type: 'cycle',
                    overlayClickClose: false,
                    text: '<div class=\'mt-2 text-small fg-white\'>Loading...</div>',
                })
                var   page_url = '/api/success-data'+'/'+Metro.session.getItem('surname')
                fetch(page_url)
                .then(res => res.json())
                .then(res=>{
                   this.content = res.data;

                   Metro.activity.close(activity);
                
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
        },
      
    

}
</script>