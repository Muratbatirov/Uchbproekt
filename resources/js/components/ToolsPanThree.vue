<template>
    
         
              <div class="card shadow">
                <div class="card-header">
                   <div class="row">
                   
                            
                            <div class="col-md-10 ">
                               Последние операции
                              
                           </div>
                           
                           

                    
                  </div>
              </div>
               <div class="card-body releative">
              <div class="row">
                   <div class="col-md-12 ">
                    <table  name="slide-fade" is="transition-group">
                               
                             
                        
                                     <tr  v-for="(item, index) in deystviy" :key="item.id" >
                                       
                                       <td  class="tablwidth">{{item.summa}}&nbsp ({{item.nomi}}) <br> na plastik-1 </td><td ><a  :doxid="item.id" class="pencil" href="#" 
v-on:click.stop.prevent="redak"><font-awesome-icon  :icon = "['fas', 'pencil-alt']"/></a></td><td > <a  :uid="item.id"class="delete" href="#" 
v-on:click.stop.prevent="udalit"><font-awesome-icon  :icon = "['fas', 'trash']"/></a></td>
                                
                                      </tr>
                                     </transition-group>
                                  
                      </table>
                   </div>
                   
          </div> 
            <load-component v-show="twoload"></load-component>        
                   
       </div>

              </div>
              
         
      
    
</template>

<script>
    import LoadComponent from './LoadComponent'

 
export default {
      data: function(){
                      return { 
                         
                          
                       
                            
            }
                             
                                     
                       },
       
      created() {
           
                },
      mounted(){
               
               },
      watch: {

        
        },
      
      methods: {
                udalit: function(event){
                


                    let id =event.currentTarget.getAttribute("uid")
                 
                   axios.post('/udalit', {id:id}).then(re => {
                            this.$store.dispatch('setDeystviyper');
                               setTimeout(() => this.$store.dispatch('setDeystviy'), 2000);
                                this.$store.dispatch('setDax');
                                 this.$store.dispatch('setDoxMes');

                               })},

               redak: function(event) {
                      let doxid =event.currentTarget.getAttribute("doxid");
                      
                       this.$store.commit('DOXID', doxid);
                       this.$store.commit('REDAKT');
                       this.$store.commit('MODAL_DOXOD');
                       
                      
                  }
                 },

               
 
               
      components: {
                 LoadComponent
                  },
      computed: { 
                
               deystviy(){
               return this.$store.getters.deystviy;
               } ,
               twoload(){
                             return this.$store.getters.twoload;

                },
                
                }
              }
</script>
<style scoped>
 .releative{
  position: relative;
  overflow: hidden;

 }
.marg{
  padding: 20px;
}

.shrift{
  font-size: 250%;
}
tr {
  color: #669;
  border-top: 1px solid #e8edff;
  border-left:  1px solid #e8edff;
  border-right: 1px solid #e8edff;
  border-bottom: 1px solid #e8edff;

}
table{
  width: 100%;
  
}

.tablwidth{
  
  padding-left: 1em;
}
.delete{
  font-size: 1.5em;
  color:#E9216D;
  
}
.pencil{
  font-size: 1.5em;
  color:green;

}
.card{
  height: 100%;
  overflow: hidden;
}
.number{
  padding: 30px;
  margin-top: auto;
  margin-bottom: auto;
}
@media (max-width: 500px) {
 .shrift{
     font-size: 150%;
   }
 
 }

.slide-fade-leave-active {
  transition: all 0.3s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}
.slide-fade-leave-active {
  transition: all 0.3s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}
.slide-fade-enter, .slide-fade-leave-to
/* .slide-fade-leave-active до версии 2.1.8 */ {
  transform: translateX(20px);
  opacity: 0;
}
</style>
