<template>
  <div class="container"> 
      <div class="row">
           <div class="col-md-4">
            <form id="rasqosh" @submit.prevent="rasqosh">
          
              <div class="form-group">
                      <label for="rasbalan" >Summa</label>
                       <span v-if="errors.has('rassumma')" class="block text-sm text-red mt-2">{{ errors.get('rassumma') }}</span>   
                      <input id="rasbalan" type="number" class="form-control" name="balans" v-model="rassumma" required autofocus>        
                     
             </div>
             <div class="form-group">
                    <label for="dataras">Example select</label>
                    <select class="form-control" id="datadras" v-model="datarascateg">
                           <option disabled value="">Источник</option>
                           <option v-for="state in dataras" v-bind:value="state.nomi">
                               {{state.nomi}}</option>
                              
                    </select>
             </div>
             <div class="form-group">
                    <label for="rasmesto">Example select</label>
                     <span v-if="errors.has('rasmesto')" class="block text-sm text-red mt-2">{{ errors.get('rasmesto') }}</span>
                    <select class="form-control" id="rasmesto" v-model="rasmesto">
                           <option disabled value="">Mesto xranenie</option>
                           <option v-for="state in datarasmesto" v-bind:value="state.vid">
                               {{state.vid}}</option>
                              
                    </select>
             </div>
            <span v-if="errors.has('time')" class="block text-sm text-red mt-2">{{ errors.get('time') }}</span>
             <div class="datapadding">
             <date-picker v-model="time2" type="datetime" lang="ru" ></date-picker>
             </div>
          
                           
                                <button :disabled="load"  type="submit" class="form-control btn btn-primary">
                                    Junatish  <font-awesome-icon v-show="spinner" icon="spinner" class="fa-spin"  />
                                </button>

                   
              
                        
            
 
          </form>
           </div>
           <div class="col-md-8">
                   <div class="card shadow">
                       <div class="row">
                            <div class="col-md-6">
                                  <div class="grafik">
                                       <line-chart :chart-data="dax" :height="400" :options="{responsive: true, maintainAspectRation: true}">
                                       </line-chart>
                                  </div>     
                            </div>
                            <div class="col-md-6">
                              <ul>
                                 <li class="disblok" v-for="(item, index) in sumrasxod">  
                                 <span class="span"> <svg width="15" height="15" >
                                            <rect x="5" y="5"  width="220" height="130" 
                                              :fill="rang[index]"  />
                                           </svg> </span>              
                                    {{item.nomi}} &nbsp&nbsp&nbsp <span class="number"><animated-number  :value="item.count"  :formatValue="formatToPrice"
                                     :duration="600" /></span>
          
                                 </li>
                                 </ul>
                            </div>
       
                       </div>
                  </div>
          </div>
     </div>
  </div>
</template>

<script>
    
import LineChart from './LineChart.js'
import AnimatedNumber from "animated-number-vue";
import { library } from '@fortawesome/fontawesome-svg-core'
import { faSpinner, faAlignLeft } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
library.add(faSpinner, faAlignLeft)
import { dom } from '@fortawesome/fontawesome-svg-core'
import DatePicker from 'vue2-datepicker';
import 'vue2-datepicker/index.css';
import { Errors } from '../errors.js';


dom.watch()
 
export default {
      data: function(){
                      return {
                              rassumma: 0,
                              errors: new Errors(),
                              kuting: "",
                              load: false,
                              spinner: false,
                              probel: " ",
                              datarascateg: "",
                              rasmesto:"",
                              error:"",
                              rang:[
                                       '#11f24d',
                                       '#11f2ee',
                                       '#ba11f2',
                                       '#dff211',
                                       '#f28911',
                                       '#f2d811',
                                       '#f211eb',
                                       '#3e8743'
                                   ],
                              time1: null,
                              time2: null,
                              time3: null,

                             }         
                       },
       
      created() {
           
                },
      mounted(){
               this.$store.dispatch('setRas');
               this.$store.dispatch('setDataRas');
               this.$store.dispatch('setDataRasMesto');
               },
      methods: {
                formatToPrice(value) {
                return `$${value.toFixed(2)}`;
                },
                rasqosh: function() {  this.errors=new Errors(); this.load=true; this.spinner=true;
                                  axios.post('/rasqoshish', {rassumma:this.rassumma, rasnomi:this.datarascateg, time: this.time2, rasmesto:this.rasmesto}).then(re => {
                                this.$store.dispatch('setRas');    this.spinner=false;    this.load=false; }).catch((error) => {
                    this.errors.record(error.response.data.errors);  this.spinner=false;    this.load=false; 
                })},
 
               },
      components: {
                  AnimatedNumber,
                  LineChart,
                  DatePicker
                  },
      computed: {
                arr(){
                   
                         if ('time' in this.error) {
                          return true;
                      } else {
                           return false;
                        }
                },
                sumrasxod () {
                            return this.$store.getters.rasxod;
                            },
                dataras () {
                           return this.$store.getters.dataras;
                           },  
                datarasmesto () {
                           return this.$store.getters.datarasmesto;
                           },         
                chardata(){
                          let  chadata = [];
                          let i;
                          for (i = 0; i < this.$store.getters.rasxod.length; i++) {
                                 chadata.push(this.$store.getters.rasxod[i].count)
                                  }
                          return chadata;
                          },
                labeldata(){
                          let  label = [];
                          let i;
                          for (i = 0; i < this.$store.getters.rasxod.length; i++) {
                                 label.push(this.$store.getters.rasxod[i].nomi)
                                  }
                          return label;
                          },           
                   dax () {
                          return {
                                 labels : this.labeldata,
                                 datasets: [{
                                            label : 'Rasxod',
                                            backgroundColor: this.rang,
                                            data :  this.chardata
                                           }]
                                  }
                          }

                }
              }
</script>
<style scoped>
 .row{
  padding-top: 2em;
 } 
.grafik{
  margin-left: 1em;
}
li {
  list-style: none;
}
svg {
  margin-bottom: 5px;
}
.number{
  font-size: 20;
  font-weight: 1000;

}
.datapadding{
  padding-bottom: 10px;
}

</style>