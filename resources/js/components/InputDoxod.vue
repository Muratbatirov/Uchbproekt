<template>
  <div class="container"> 
    <div class="releativ">
            <form id="qo" @submit.prevent="qosh">
               <div class="row border">
                
                <div class="col-md-12">
              <div class="form-group">
                      <label for="balan" >Summa</label>   
                      <input id="balan" type="number" class="form-control" name="balans" v-model="balans" required autofocus>        
                     
             </div>
           </div>
           <div class="col-md-12">
             <div class="form-group">
                    <label for="datadaxcateg">Example select</label>
                    <select class="form-control" id="datadaxcateg" v-model="datadaxcateg">
                           <option disabled value="">Источник</option>
                           <option v-for="state in datadax" v-bind:value="state.nomi">
                               {{state.nomi}}</option>
                              
                    </select>
             </div>
            </div>
            
           
           <div class="col-md-12">
           <div class="form-group">
                    <label for="rasmesto">Example select</label>
                   
                    <select class="form-control" id="rasmesto" v-model="mesto">
                           <option disabled value="">Mesto xranenie</option>
                           <option v-for="state in datamesto" v-bind:value="state.vid">
                               {{state.vid}}</option>
                              
                    </select>
             </div>
           </div>
           <div class="col-md-12">
             <label for="data" >Vremya</label>  
             <div id="data"  clas="form-group datapadding" >
             <date-picker v-model="time2"  type="datetime" :open="open" :lang="lang" ></date-picker><a class="picker" v-on:click.stop.prevent="openpicker" href="#">x</a>
             </div>
           </div>
            
          <div class="col-md-6 form-group">
                                 <label for="submit" >&nbsp</label>  
                                <button :disabled="load"  type="submit" id="submit" class="  form-control btn btn-primary">
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
                              balans: 0,
                              kuting: "",
                              load: false,
                              spinner: false,
                              probel: " ",
                              datadaxcateg: "",
                              mesto:"",
                              time2: null,
                              loadmodal: false,
                              open:null,
                               lang: {
                                       formatLocale: {
                                        months: ['Январь', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
    
                                            monthsShort: ['Янв', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
  
                                            weekdays: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
  
                                            weekdaysShort: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
  
                                            weekdaysMin: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                                                      },
                                        monthBeforeYear: false,
                                   },
                             
                             }         
                       },
       
      created() {
           
                },
    
            

             
      mounted(){
              
               
               },
      methods: {
                qosh: function() { 
                                  if(!this.redakt){

                              this.load=true; this.spinner=true;
                                  axios.post('/qoshish', {balans:this.balans, nomi:this.datadaxcateg, time: this.time2, mesto:this.mesto}).then(re => {
                               this.spinner=false;    
                               this.load=false;
                               alert('yozildi');

                                })} 
                                else {
                                  this.load=true; this.spinner=true;
                                  axios.post('/qoshishred', {balans:this.balans, nomi:this.datadaxcateg, time: this.time2, mesto:this.mesto, id:this.doxid}).then(re => {
                               this.spinner=false;    
                               this.load=false; alert('yozildi'); })}

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
                redakt(){
                          if(this.redakt){
                 this.loadmodal=true;
               
                 axios.post('/redakt', {doxid: this.doxid}).then(re => {
                               this.loadmodal=false;    
                               this.balans = re.data.summa;
                               this.datadaxcateg =re.data.nomi;
                               this.mesto = re.data.mesto;
                             

                                })}
               },


                modalwatch(){
                  if(!this.redakt){
                               this.balans=0;
                               this.datadaxcateg=null;
                               this.time2=null;
                               this.mesto = null;
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
                modalwatch(){
                    return this.$store.getters.modaldoxod;
                },
                redakt(){
                return  this.$store.getters.redakt;
                },
                doxid(){
                  return this.$store.getters.doxid;
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
