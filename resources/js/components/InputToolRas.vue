<template>
  <div class="container"> 
    <div class="releativ">
            <form id="qosh" @submit.prevent="catdox">
               <div class="row border">
                
                <div class="col-md-12">
              <div class="form-group">
                      <label for="nomi" >Nomi rasxod</label>   
                      <input id="nomi"  class="form-control" name="nomi" v-model="nomi" required autofocus>        
                     
             </div>
           </div>
           
            
           
           
           
            
          <div class="col-md-6 form-group">
                                 <label for="submitbut" >&nbsp</label>  
                                <button :disabled="load"  type="submit" id="submitbut" class="  form-control btn btn-primary">
                                    Junatish <div class="inlineblo"><font-awesome-icon v-show="spinner" icon="spinner" class="fa-spin"  /></div>
                                </button>

                   
              
                        
           
            </div>

          </div>
          </form>
         <div class="ogrspinner" v-show="loadmodal" ><font-awesome-icon  icon="circle-notch" class="fa-spin"  /></div>
         </div>
  </div>
</template>

<script>
import { library } from '@fortawesome/fontawesome-svg-core'
import { faSpinner, faAlignLeft } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
library.add(faSpinner, faAlignLeft)
import { dom } from '@fortawesome/fontawesome-svg-core'
import DatePicker from 'vue2-datepicker';
import 'vue2-datepicker/index.css';

dom.watch()	




 
export default {
      data: function(){
                      return {
                              nomi: "",
                              kuting: "",
                              load: false,
                              spinner: false,
                              probel: " ",
                              
                              loadmodal: false,
                              open:null,
                               
                             
                             }         
                       },
       
      created() {
           
                },
    
            

             
      mounted(){
              
               
               },
      methods: {
                catdox: function() { 
                                  if(!this.catdoxred){

                              this.load=true; this.spinner=true;
                                  axios.post('/catrasxod', {nomi:this.nomi}).then(re => {
                               this.spinner=false;    
                               this.load=false;
                               

                                })} 
                                else {
                                  this.load=true; this.spinner=true;
                                  axios.post('/catrasred', {nomi:this.nomi, id:this.catdoxid}).then(re => {
                               this.spinner=false;    
                               this.load=false;  })}

                                },

                                
                openpicker(){
                  this.open =false;
                  setTimeout(() =>  this.open = null, 500);

                }                  
               
              
              },
      components: {
                  DatePicker,
                  },
                  watch: { 
                catdoxred(){
                          if(this.catdoxred){
                 this.loadmodal=true;
               
                 axios.post('/catredmatras', {catdoxid: this.catdoxid}).then(re => {
                                this.loadmodal=false; 
                               this.nomi = re.data.nomi;

                                })}
                  else{
                 this.nomi = "";
               
                }
               },


                toolmodwatcht(){
                  if(!this.catdoxred){
                               this.nomi="";
                              
                                this.spinner=false; 
                                this.load=false;}
                }
      },
     
      computed: {
                datadax () {
                           return this.$store.getters.datadax;
                           },  
                datamesto () {
                           return this.$store.getters.datamesto;
                           }, 
                toolmodwatch(){
                    return this.$store.getters.modaltool;
                },
                catdoxred(){
                return   this.$store.getters.catdoxred;
                },
                catdoxid(){
                  return this.$store.getters.catdoxid;
                },
               

                }
              }
</script>
<style scoped>
 .spinmargin{
  padding-top: 10px;
}

.border{
  border-style: solid;
  border-width: 1px;
  padding: 10px;
}
.inlineblo{
  display: inline-block;
}
.releative{
  position: relative;
}
.picker{
  margin-left: 1em;
  font-size: 1.5em;
  text-decoration: none;
}
.ogrspinner{
  position: absolute;
  display: block;
  font-size: 1000%;
  text-align: center;
  color: blue;
  opacity: 0.5;
  top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      background: #e4ebeb;

}
</style>
