<template>
  <div class="container">
     
                     <div id="inputpanel" class="row">
                            <div class="col-md-8">
                                  <doxod-panel-one/>
                            </div>
                           
                           <div class="col-md-4">
                                  <doxod-panel-two/>
                            </div>
                     </div>
                     <div  class="row">
                            <div class="col-md-12">
                                  <doxod-panel-thri/>
                            </div>
                           
                           
                     </div>
                     
                            
                     

         
     </div>
  </div>
</template>

<script>
	

import DoxodPanelOne from './DoxodPanelOne'
import DoxodPanelTwo from './DoxodPanelTwo'
import DoxodPanelThri from './DoxodPanelThri'
import AnimatedNumber from "animated-number-vue";

 
export default {
      data: function(){
                      return {
                             
                             
                              
                             

                             }         
                       },
       
      created() {
           
                },
      mounted(){
               this.$store.dispatch('setDax');
               this.$store.dispatch('setDataDax');
               this.$store.dispatch('setDataMesto');
               this.$store.dispatch('setDeystviy');
               },
      methods: {
                
                 
 
               },
      components: {
                  AnimatedNumber,
                 DoxodPanelThri,
                  
                  DoxodPanelOne,
                  DoxodPanelTwo
                  },
      computed: {
            
                
                        
                         
                  

                }
              }
</script>
<style scoped>

 




#inputpanel{
  padding-bottom: 15px;
}
.padtop{
  padding-top: 15px
}
.row-flex {
    display: flex;
    flex-wrap: wrap;
}




</style>
