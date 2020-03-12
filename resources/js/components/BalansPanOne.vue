<template>
   <div class="card shadow">
        
          <div class="row">
               <div class="col-md-12">
                <h2> Баланс</h2>
               </div>
          </div>
          <div class="row ">
           
               
                   <div class="col-md-4  border-top border-bottom">
                        <span>{{balans[0].vid}}</span>  
                        <div class="flexitem">
                         <button  class="btn btn-success btn-circle disabl "><font-awesome-icon  :icon = "['fas', 'wallet']"/></button>    <span class="nalichnie">{{balans[0].summa}} </span></div> 
                   </div>
                 <div class="col-md-4  border-top border-bottom">
                        <span>{{balans[1].vid}}</span>  
                         <div class="flexitem">
                         <button  class="btn  btn-circle disabl colorbutt"><font-awesome-icon  :icon = "['fas', 'credit-card']"/></button>    <span class="plastik">{{balans[1].summa}} </span></div> 
                   </div>
                   <div class="col-md-4  border-top border-bottom">
                        <span>{{balans[2].vid}}</span>  
                         <div class="flexitem">
                         <button  class="btn  btn-circle disabl colorbutt disabl "><font-awesome-icon  :icon = "['fas', 'credit-card']"/></button>    <span class="plastik">{{balans[2].summa}}</span></div> 
                   </div>
                  
              
          
         </div>   
         <transition name="height">
         <dop-plastik v-show="dopplastik"></dop-plastik>
         </transition>
         <div class="row">
               <div class="col-md-4 center offset-md-4">
               <button v-on:click.prevent="dopplastik= !dopplastik"class="btn btn-primary "><span v-show="!dopplastik">Pokazat vse</span><span v-show="dopplastik">&nbsp &nbsp Zakrit &nbsp &nbsp</span> </button>
               </div>
          </div>
    
   
   </div>
</template>

<script>
	
import DopPlastik from './DopPlastik'

 

    export default {
          data() {
    return {
          dopplastik:false,

     
    }
  },
       
        mounted() {
            
        },
        methods: {
          
       

        },
        components:{
            DopPlastik
        },
        computed:{

         balans(){
           return this.$store.getters.balans;
         }

        }

    }
</script>
<style scoped>
   .height-enter-active, .height-leave-active {
  transition: all 0.8s;
  max-height: 230px;
}
.height-enter, .height-leave-to {
 opacity: 0;
  max-height: 0px;
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
.card{
        padding: 15px;
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
