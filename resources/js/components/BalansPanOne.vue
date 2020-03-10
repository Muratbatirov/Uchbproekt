<template>
   <div class="card shadow">
        
          <div class="row">
               <div class="col-md-12">
                <h2> Баланс</h2>
               </div>
          </div>
          <div class="row ">
           
               
                   <div class="col-md-4  border-top border-bottom">
                        <span>Nalichnie</span>  
                        <div class="flexitem">
                         <button  class="btn btn-success btn-circle disabl "><font-awesome-icon  :icon = "['fas', 'wallet']"/></button>    <span class="nalichnie">100000 </span></div> 
                   </div>
                 <div class="col-md-4  border-top border-bottom">
                        <span>Nalichnie</span>  
                         <div class="flexitem">
                         <button  class="btn  btn-circle disabl colorbutt"><font-awesome-icon  :icon = "['fas', 'credit-card']"/></button>    <span class="plastik">100000 </span></div> 
                   </div>
                   <div class="col-md-4  border-top border-bottom">
                        <span>Nalichnie</span>  
                         <div class="flexitem">
                         <button  class="btn  btn-circle disabl colorbutt disabl "><font-awesome-icon  :icon = "['fas', 'credit-card']"/></button>    <span class="plastik">100000 </span></div> 
                   </div>
                  
              
          
         </div>     
         <div class="row">
               <div class="col-md-4 center offset-md-4">
               <button class="btn btn-primary ">Pokazat vse</button>
               </div>
          </div>
    
   
   </div>
</template>

<script>
	


 

    export default {
          data() {
    return {
          

     
    }
  },
       
        mounted() {
             this.$store.dispatch('setBalans');
        },
        methods: {
          
       

        },
        computed:{

         balans(){
           return this.$store.getters('balans');
         }

        }

    }
</script>
<style scoped>
   
    .card{
        padding: 15px;
    }
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
</style>
