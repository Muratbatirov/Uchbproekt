<template>
  <div class="container"> 
      <div class="row">
           <div class="col-md-6">
            <form id="qo" @submit.prevent="qosh">
          
              <div class="form-group">
                      <label for="balan" >Summa</label>   
                      <input id="balan" type="number" class="form-control" name="balans" v-model="balans" required autofocus>        
                     
             </div>
             <div class="form-group">
                    <label for="datadaxcateg">Example select</label>
                    <select class="form-control" id="datadaxcateg" v-model="datadaxcateg">
                           <option disabled value="">State</option>
                           <option v-for="state in datadax" v-bind:value="state.nomi">
                               {{state.nomi}}</option>
                              
                    </select>
             </div>


          
                           
                                <button :disabled="load"  type="submit" class="form-control btn btn-primary">
                                    Junatish  <font-awesome-icon v-show="spinner" icon="spinner" class="fa-spin"  />
                                </button>

                   
              
                        
            
 
          </form>
           </div>
           <div class="col-md-6">
                   <div class="card shadow">
                       <div class="row">
                            <div class="col-md-6">
                                  <div class="grafik">
                                       <line-chart :chart-data="dax" :height="400" :options="{responsive: true, maintainAspectRation: true}">
                                       </line-chart>
                                  </div>     
                            </div>
                            <div class="col-md-6">
                                 <p v-for="item in sumdaxod">                
                                    {{item.nomi}}  <animated-number  :value="item.count"  :formatValue="formatToPrice"
                                     :duration="600" />
    
   
                               
                                 </p>
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

dom.watch()
 
export default {
      data: function(){
                      return {
                              balans: 0,
                              kuting: "",
                              load: false,
                              spinner: false,
                              probel: " ",
                              datadaxcateg: ""

                             }         
                       },
       
      created() {
           
                },
      mounted(){
               this.$store.dispatch('setDax');
               this.$store.dispatch('setDataDax');
               },
      methods: {
                formatToPrice(value) {
                return `$${value.toFixed(2)}`;
                },
                qosh: function() { this.load=true; this.spinner=true;
                                  axios.post('/qoshish', {balans:this.balans, nomi:this.datadaxcateg}).then(re => {
                                  this.spinner=false;    this.load=false; })},
 
               },
      components: {
                  AnimatedNumber,
                  LineChart
                  },
      computed: {
            
                sumdaxod () {
                            return this.$store.getters.daxod;
                            },
                datadax () {
                           return this.$store.getters.datadax;
                           },          
                chardata(){
                          let  chadata = [];
                          let i;
                          for (i = 0; i < this.$store.getters.daxod.length; i++) {
                                 chadata.push(this.$store.getters.daxod[i].count)
                                  }
                          return chadata;
                          },
                labeldata(){
                          let  label = [];
                          let i;
                          for (i = 0; i < this.$store.getters.daxod.length; i++) {
                                 label.push(this.$store.getters.daxod[i].nomi)
                                  }
                          return label;
                          },           
                   dax () {
                          return {
                                 labels : this.labeldata,
                                 datasets: [{
                                            label : 'Kirim',
                                            backgroundColor: [
                                                 '#41B883',
                                                 '#E46651',
                                                 '#00D8FF',
                                                 '#00D8FF',
                                                 '#00D8FF',
                                                 '#00D8FF',
                                                 'red',
                                                 'blue'
                                            ],
                                            data :  this.chardata
                                           }]
                                  }
                          }

                }
              }
</script>
<style >
 .row{
  padding-top: 2em;
 } 
.grafik{
  margin-left: 1em;
}

</style>
