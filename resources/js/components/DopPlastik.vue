<template>
      <div>
          <div v-if="balansdop[3] != undefined" class="row ">
           
               
                   <div v-if="balansdop[3] != undefined" class="col-md-4  border-top border-bottom">
                        <span>{{balansdop[3].vid}}</span>  
                        <div class="flexitem">
                          <button  class="btn  btn-circle disabl colorbutt"><font-awesome-icon  :icon = "['fas', 'credit-card']"/></button>    <span class="plastik">{{balansdop[3].summa}} </span></div> 
                   </div>
                   
                   <div v-if="balansdop[4] != undefined" class="col-md-4  border-top border-bottom">
                        <span>{{balansdop[4].vid}}</span>  
                        <div class="flexitem">
                          <button  class="btn  btn-circle disabl colorbutt"><font-awesome-icon  :icon = "['fas', 'credit-card']"/></button>    <span class="plastik">{{balansdop[4].summa}} </span></div> 
                   </div>
                   <div v-if="balansdop[5] != undefined" class="col-md-4  border-top border-bottom">
                        <span>{{balansdop[5].vid}}</span>  
                        <div class="flexitem">
                          <button  class="btn  btn-circle disabl colorbutt"><font-awesome-icon  :icon = "['fas', 'credit-card']"/></button>    <span class="plastik">{{balansdop[5].summa}} </span></div> 
                   </div>
                
                  
              
          
         </div> 
         <div  v-else class="row ">
          <div class="col-md-4 offset-md-4 center">
         <h2 class="sveth1" > Drugih plastikov net</h2>
          </div>
         </div>    
        
    </div>
   
  
</template>

<script>
	


 

    export default {
          data() {
    return {
          estplastik: true,
          netplastik:false

     
    }
  },
       
        mounted() {
            
        },
        methods: {
             
          

        },
        computed:{

         balansdop(){
           return this.$store.getters.balans;
         }

        }

    }
</script>
<style scoped>
   
  
   .border-top{
        display: flex;
         justify-content: center;
        flex-direction:  column;
          align-items: center;
          padding-bottom: 10px;

       
        
     
    }
    .center{
       display: flex;
      justify-content: center;
    }

.btn-circle {
    font-size: 1.5em;
   width: 50px;
    height: 50px;
    border-radius: 25px;
    text-align: center;
    margin: 0 10px;
    
    

}
.flexitem{
    display: flex;
     
    align-items: center;
}
.disabl {
        pointer-events: none;
        cursor: default;
    }
   .nalichnie {
  color: #38C172;
  font-weight: 600;
  font-size: 250%;
    }
    .plastik{
      font-weight: 600; 
       font-size: 250%; 
    }
.btn-primary{
    margin-top: 10px;
    border-radius: 25px;
}
.colorbutt{
    background-color: #F7B924;
}
.sveth1{
  color: #d8d6d6;
}
</style>
