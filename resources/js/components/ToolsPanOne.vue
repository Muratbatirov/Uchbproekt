<template>
    
         
              <div class="card ">
                <div class="card-header">
                   <div class="row">
                   
                            
                            <div class="col-md-5 ">
                               <h3>Категори  <b> доходов</b></h3>
                              
                           </div>
                            <div class="col-md-7  ">
                             
                             <button type="button" v-on:click="modalcat" class="btn btn-success btn-sm float-right"><span><font-awesome-icon  :icon = "['fas', 'plus-circle']"/></span>&nbsp Добавить категорию</button>
                             <button type="button" v-on:click="modalcat" class="btn btn-danger btn-sm float-right"><span><font-awesome-icon  :icon = "['fas', 'minus-circle']"/></span>&nbsp Удалить</button>
                              
                           </div>
                           
                           

                    
                  </div>
              </div>
               <div class="card-body releative">

              <div class="row">
                   <div class="col-md-12 ">
                    <table class="table table-striped table-hover">
                             <thead>
                            <tr>
                               <th>
                                 <span class="custom-checkbox">
                                   <input type="checkbox" id="selectAll">
                                   <label for="selectAll"></label>
                                 </span>
                               </th>
                               <th>Nazvanie</th>
                              
                               <th>Actions</th>
                              </tr>
                            </thead>  
                            <tbody name="slide-fade" is="transition-group">
                        
                                     <tr  v-for="(item, index) in daxtoolcat" :key="item.id" >
                                       <td>
                                        <span class="custom-checkbox">
                                          <input type="checkbox" :id="index" name="options[]" :value="index+1">
                                            <label :for="index"></label>
                                        </span>
                                      </td>
                                       <td >{{index +1}}&nbsp {{item.nomi}}</td><td ><a :catdoxid="item.id" class="pencil" href="#" 
v-on:click.stop.prevent="redakt"><font-awesome-icon  :icon = "['fas', 'pencil-alt']"/></a>&nbsp &nbsp<a  :catuid="item.id"class="delete" href="#" 
v-on:click.stop.prevent="udalit"><font-awesome-icon  :icon = "['fas', 'trash']"/></a></td>
                                
                                      </tr>
                           </tbody>
                                     </transition-group>
                                  
                      </table>
                      <div class="clearfix">
                           <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                           <ul class="pagination">
                               <li class="page-item disabled"><a href="#">Previous</a></li>
                               <li v-for="item in massiv" :key="item[index]" class="page-item"><a href="#" class="page-link">{{item+1}}</a></li>
                               
                               <li class="page-item"><a href="#" class="page-link">Next</a></li>
                           </ul>
                     </div>
        </div>
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
                massiv(){
                          let massiv= [];
                  for (let i = 0; i < Object.keys( this.daxtoolcat ).length/5; i++) {
                     massiv.push(i);
                                              }
                           return  massiv; 

                },
               
                
                }
              }
</script>
<style scoped>
 .releative{
  position: relative;
 
 
 }
.card-header{
  background-color:#435d7d;
}


h3 {
    
    font-size: 18px;
    color: #fff;
  }


 table.table tr th{
  border:none;
 }


 table.table tr th, table.table tr td {

        
    padding: 5px 15px;
    vertical-align: middle;
    }
  table.table tr th:first-child {
    width: 60px;
  }
  table.table tr th:last-child {
    width: 100px;
  }

table.table-striped tbody tr:nth-of-type(odd) {
      background-color: #fcfcfc;
  }
table.table-striped.table-hover tbody tr:hover {
    background: #f5f5f5;
  }


.delete{
  
  color:#E9216D;
  
}
.pencil{
  
  color:green;

}


.btn {
    color: #fff;
    float: right;
    font-size: 13px;
    border: none;
    min-width: 50px;
    border-radius: 2px;
    border: none;
    outline: none !important;
    margin-left: 10px;
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
  /* Custom checkbox */
  .custom-checkbox {
    position: relative;
  }
  .custom-checkbox input[type="checkbox"] {    
    opacity: 0;
    position: absolute;
    margin: 8px 0 0 3px;
    z-index: 9;
  }
  .custom-checkbox label:before{
    width: 18px;
    height: 18px;
  }
  .custom-checkbox label:before {
    content: '';
    margin-right: 10px;
    display: inline-block;
    vertical-align: bottom;
    background: white;
    border: 1px solid #bbb;
    border-radius: 2px;
    box-sizing: border-box;
    z-index: 2;
  }
  .custom-checkbox input[type="checkbox"]:checked + label:after {
    content: '';
    position: absolute;
    left: 6px;
    top: 6px;
    width: 6px;
    height: 11px;
    border: solid #000;
    border-width: 0 3px 3px 0;
    transform: inherit;
    z-index: 3;
    transform: rotateZ(45deg);
  }
  .custom-checkbox input[type="checkbox"]:checked + label:before {
    border-color: #03A9F4;
    background: #03A9F4;
  }
  .custom-checkbox input[type="checkbox"]:checked + label:after {
    border-color: #fff;
  }
  .custom-checkbox input[type="checkbox"]:disabled + label:before {
    color: #b8b8b8;
    cursor: auto;
    box-shadow: none;
    background: #ddd;
  }

/*pagination*/
.pagination {
        float: right;
        margin: 0 0 5px;
    }
    .pagination li a {
        border: none;
        font-size: 13px;
        min-width: 30px;
        min-height: 30px;
        color: #999;
        margin: 0 2px;
        line-height: 30px;
        border-radius: 2px !important;
        text-align: center;
        padding: 0 6px;
    }
    .pagination li a:hover {
        color: #666;
    } 
    .pagination li.active a, .pagination li.active a.page-link {
        background: #03A9F4;
    }
    .pagination li.active a:hover {        
        background: #0397d6;
    }
  .pagination li.disabled i {
        color: #ccc;
    }
    .pagination li i {
        font-size: 16px;
        padding-top: 6px
    }
    .hint-text {
        float: left;
        margin-top: 10px;
        font-size: 13px;
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
