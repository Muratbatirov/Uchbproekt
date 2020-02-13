<template>
    
         
              <div class="card shadow">
                <div class="card-header">
                   <div class="row">
                   
                            
                            <div class="col-md-4 ">
                                <vibor-meses/>
                              
                           </div>
                           <div class="col-md-3 offset-md-5 ">
                             <button type="button" v-on:click="modal" class="btn btn-primary btn-sm float-right">Дабавит доход</button>
                              
                           </div>
                           

                    
                  </div>
              </div>
               <div class="card-body">
              <div class="row">
                   <div class="col-md-4">
                         <div class="row">
                          <div class="col-md-12 text-center number">
                        <b class="shrift">Всего <br> <animated-number  :value="sumdaxodsum"  :formatValue="formatToPrice"
                                     :duration="600" /></b>
                                   </div>
                                   <div class="col-md-12 ">
                                    
                                   </div>
                                   </div>
                   </div>
                   <div class="col-md-8">
                   
                       <div class="row">
                            <div class="col-md-6">
                                  <div class="grafik">
                                       <line-chart :chart-data="dax" :height="500" :options="{responsive: true, maintainAspectRation: true , legend: {display: false,}, cutoutPercentage: 70}">
                                       </line-chart>
                                  </div>     
                            </div>
                            <div class="col-md-6">
                              <table>
                                     <tr v-for="(item, index) in sumdaxod">
                                       <td ><svg width="15" height="15" >
                                            <rect x="5" y="5"  width="200" height="130" 
                                              :fill="rang[index]"  />
                                           </svg><br>&nbsp</td><td><span class="number"><animated-number  :value="item.count"  :formatValue="formatToPrice"
                                     :duration="600" /></span><br>{{item.nomi}}</td>
                                     </tr>
                                   </table>
                              
                            </div>
       
                       </div>
                  </div>
          </div> 
                  
                   
       </div>
           <doxod-modal v-show="modaldoxod"></doxod-modal>
          
           
              </div>

             
      
      
    
</template>

<script>
	import AnimatedNumber from "animated-number-vue";
  import ViborMeses from './ViborMeses'
  import LineChart from './LineChart.js'
  
  import InputDoxod from './InputDoxod'
  import DoxodModal from './DoxodModal'
 
export default {
      data: function(){
                      return { 
                          
                          time2: null ,
                          god:null,
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
                           
   
                            
            }
                             
                                     
                       },
       
      created() {
           
                },
      mounted(){
               this.currentMonth();
              
               },
   
      methods: {
                formatToPrice(value) {
                                     return `$${value.toFixed(2)}`;
                },
                
               
               meses(nmonth){
                  if (nmonth == 1){
                    return "Январь"
                  }
                 else if (nmonth == 2){
                    return "Февраль"
                  }
                  else if (nmonth == 3){
                    return "Март"
                  }
                  else if (nmonth == 4){
                    return "Апрель "
                  }
                  else if (nmonth == 5){
                    return "Май "
                  }
                  else if (nmonth == 6){
                    return "Июнь"
                  }
                  else if (nmonth == 7){
                    return "Июль"
                  }
                  else if (nmonth == 8){
                    return "Август"
                  }
                  else if (nmonth== 9){
                    return "Сентябрь"
                  }
                  else if (nmonth == 10){
                    return "Октябрь"
                  }
                  else if (nmonth == 11){
                    return "Ноябрь"
                  }
                  else {
                    return "Декабрь"
                  }
                },
                currentMonth() {
                                var d = new Date();
                                var n = d.getMonth();
                               this.time2= this.meses(n+1) ;
                               this.god = d.getFullYear();
                                },
                modal(){
                  this.$store.commit('NOTREDAKT');
                  this.$store.commit('MODAL_DOXOD');

                }                
 
               },
      components: {
                 AnimatedNumber,
                  LineChart,
                 ViborMeses,
                 InputDoxod,
                 DoxodModal,
                
                  },
      computed: { 
                sumdaxod () {
                            return this.$store.getters.daxod;
                            },
                sumdaxodsum() {
                               var sum = Number(0);
                               for(var i = 0; i < this.sumdaxod.length; i++){
                                       sum +=  Number(this.sumdaxod[i].count)
                               }
                                    
                               return sum;
                           } ,           

                month(){
                        var month= new Date(this.time2);
                        return month.getMonth() + 1
                },
                 dax () {
                          return {
                                 labels : this.labeldata,
                                 datasets: [{
                                            label : 'Kirim',
                                            backgroundColor: this.rang,
                                            data :  this.chardata
                                           }]
                                  }
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
               
                modaldoxod(){
                  return this.$store.getters.modaldoxod;
                } 
                
                }
              }
</script>
<style scoped>
 
.marg{
  padding: 20px;
}

.shrift{
  font-size: 200%;
  
  
}
.card{
  height: 100%;
}
.number{
  margin-top: auto;
margin-bottom: auto;
}
svg {
  margin-bottom: 5px;
  margin-right: 10px;
}

@media (max-width: 500px) {
 .shrift{
     font-size: 150%;
   }
 
 }
</style>
