<template>
    
         
              <div class="card shadow">
                <div class="card-header">
                   <div class="row">
                   
                            
                            <div class="col-md-6 ">
                               Управление категориями <br> доходов
                              
                           </div>
                           <div class="col-md-6  ">
                             <button type="button" v-on:click="modalcat" class="btn btn-primary btn-sm float-right">Добавить категорию</button>
                              
                           </div>
                           
                           

                    
                  </div>
              </div>
               <div class="card-body releative">

              <div class="row">
                   <div class="col-md-12 ">
                    <table  name="slide-fade" is="transition-group">
                               
                             
                        
                                     <tr  v-for="(item, index) in daxtoolcat" :key="item.id" >
                                       
                                       <td  class="tablwidth">{{index +1}}&nbsp {{item.nomi}}</td><td ><a :catdoxid="item.id" class="pencil" href="#" 
v-on:click.stop.prevent="redakt"><font-awesome-icon  :icon = "['fas', 'pencil-alt']"/></a></td><td > <a  :catuid="item.id"class="delete" href="#" 
v-on:click.stop.prevent="udalit"><font-awesome-icon  :icon = "['fas', 'trash']"/></a></td>
                                
                                      </tr>
                                     </transition-group>
                                  
                      </table>
                   </div>
                   
          </div> 
            <load-component v-show="tooldoxload"></load-component>   
            <modal-tool v-show="modaltool"></modal-tool> 
            <div v-show="udalitmod"  class="modalOkna" v-on:click="zakrit">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title">Preduprejdenie</h3>
            <a href="#" title="Close" class="close" v-on:click.stop.prevent="zakritclick">×</a>
          </div>
          <div class="modal-body">
            <h1>Все связанные доходы будет удален</h1><br>
            <button type="button" v-on:click="udalmod" class="btn btn-primary btn-sm">Удалить</button>


          </div>
        </div>
      </div>
    </div>    
                   
       </div>

              </div>
              
         
      
    
</template>

<script>
    import LoadComponent from './LoadComponent'
    import ModalTool from './ModalTool'
 
export default {
      data: function(){
                      return { 
                         
                       udalitmod: false,
                            
            }
                             
                                     
                       },
       
      created() {
           
                },
      mounted(){
               this.$store.dispatch('DaxToolCat')
               },
      watch: {

        
        },
      
      methods: {
                 zakrit: function (event){
             if (!event.target.closest('.modal-dialog')) {
                 this.udalitmod=false;
                 
             }},
              zakritclick:function (){
            
                 
                 this.udalitmod=false;
             },
                 modalcat(){
                         this.$store.commit('INPUTTOOLDAX' , true);
                        

                 },

                udalit: function(event){
                
                       this.udalitmod=true;


                    let id =event.currentTarget.getAttribute("catuid")
                 this.$store.commit('DAXCATID', id);
                   },
                   udalmod(){
                    axios.post('/udaltooldox', {id:this.daxcatid}).then(re => {
                      this.udalitmod=false;
                            this.$store.dispatch('DaxToolCat');
                              

                               })
                   },

               redakt: function(event) {
                      let catdoxid =event.currentTarget.getAttribute("catdoxid");
                      
                       this.$store.commit('CATDOXID', catdoxid);
                       this.$store.commit('CATDOXRED');
                      this.$store.commit('INPUTTOOLDAX' , true);
                    
                       
                      
                  }
                 },

               
 
               
      components: {
                 LoadComponent,
                 ModalTool,
                  },
      computed: { 
                
               daxtoolcat(){
               return this.$store.getters.daxtoolcateg;
               } ,
               tooldoxload(){
                             return this.$store.getters.tooldoxload;

                },
                modaltool(){
                             return this.$store.getters.inputtooldax;

                },
                 daxcatid(){
                             return this.$store.getters.daxcatid;

                },
               
                
                }
              }
</script>
<style scoped>
 .releative{
  position: relative;
  overflow: hidden;
  height: 200px;
  overflow-y: scroll;

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
  
  color:#E9216D;
  
}
.pencil{
  
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
 .modalOkna {
      position: fixed;
      
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      background: rgba(0, 0, 0, 0.5);
      
      z-index: 1;
     
      
      -webkit-transition: opacity 400ms ease-in;
      -moz-transition: opacity 400ms ease-in;
      transition: opacity 400ms ease-in;
      
     
      
    }

    
    .modal-dialog {
      position: relative;
      width: auto;
      margin: 10px;
    }

    @media (min-width: 576px) {
      .modal-dialog {
        max-width: 500px;
        margin: 30px auto;
      }
    }

    
    .modal-content {
      position: relative;
      display: -webkit-box;
      display: -webkit-flex;
      display: -ms-flexbox;
      display: flex;
      -webkit-box-orient: vertical;
      -webkit-box-direction: normal;
      -webkit-flex-direction: column;
      -ms-flex-direction: column;
      flex-direction: column;
      background-color: #fff;
      -webkit-background-clip: padding-box;
      background-clip: padding-box;
      border: 1px solid rgba(0, 0, 0, .2);
      border-radius: .3rem;
      outline: 0;
    }

    @media (min-width: 768px) {
      .modal-content {
        -webkit-box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
        box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
      }
    }

   
    .modal-header {
      display: -webkit-box;
      display: -webkit-flex;
      display: -ms-flexbox;
      display: flex;
      -webkit-box-align: center;
      -webkit-align-items: center;
      -ms-flex-align: center;
      align-items: center;
      -webkit-box-pack: justify;
      -webkit-justify-content: space-between;
      -ms-flex-pack: justify;
      justify-content: space-between;
      padding: 15px;
      border-bottom: 1px solid #eceeef;
    }

    .modal-title {
      margin-top: 0;
      margin-bottom: 0;
      line-height: 1.5;
      font-size: 1.25rem;
      font-weight: 500;
    }

   
    .close {
      float: right;
      font-family: sans-serif;
      font-size: 24px;
      font-weight: 700;
      line-height: 1;
      color: #000;
      text-shadow: 0 1px 0 #fff;
      opacity: .5;
      text-decoration: none;
    }

   
    .close:focus,
    .close:hover {
      color: #000;
      text-decoration: none;
      cursor: pointer;
      opacity: .75;
    }

    
    .modal-body {
      position: relative;
      -webkit-box-flex: 1;
      -webkit-flex: 1 1 auto;
      -ms-flex: 1 1 auto;
      flex: 1 1 auto;
      padding: 15px;
      overflow: auto;
    }
</style>
