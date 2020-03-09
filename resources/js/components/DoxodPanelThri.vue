<template>
    
         
              <div class="card shadow">
                <div class="card-header">
                   <div class="row">
                   
                            
                            <div class="col-md-4 ">
                             <label class="conta">На 10 дней
                                  <input type="radio" v-model="rad" v-bind:value="10" name="radio">
                                  <span class="checkmark"></span>
                                </label>
                                <label class="conta">На 30 дней
                                  <input type="radio"  v-model="rad" v-bind:value="30"name="radio">
                                  <span class="checkmark"></span>
                                </label>   
                              
                           </div>
                           

                    
                  </div>
              </div>
               <div class="card-body releat">
              <div class="row">
                   <div class="col-md-12 padtop">
                        <bar-chart :chart-data="datachart" :height="500"  :options="options" >
                                      </bar-chart><load-component v-show="threeload"></load-component>
                   </div>
                 
          </div> 
                  
                   
       </div>
          
           
              </div>

             
      
      
    
</template>

<script>
	import BarChart from './BarChart.js'
  import LoadComponent from './LoadComponent'

export default {
      data: function(){
                      return { 
                              rad: 10,
                             
                          
                             chartdata: {
      labels: ['Январь', 'Февраль','Февраль'],
      datasets: [
        {
          label: 'Данные1',
          backgroundColor: 'rgba(255, 99, 132, 0.2)',
          data: [40, 20, 15],
          borderWidth: 1,
          borderColor: 'red'
        }
      ]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      legend: {
            display: false,
            
      
         },
         scales: {
        yAxes: [{ 
            ticks: {
                beginAtZero: true,
                
            }
        }]
    }
      
    }
   
                            
            }
                             
                                     
                       },
       
      created() {
           
                },
      watch:{

            rad: function(newval, oldval){
                          if(newval == 30){
                             this.$store.commit( 'THREELOAD', true);
                             this.$store.commit( 'STATE30');

                             setTimeout(()=> this.$store.dispatch('setDoxMes30'),1000);
                          
                            
         
                          }
                          else{
                          this.$store.commit( 'THREELOAD', true);
                            this.$store.commit( 'STATE10');
                            setTimeout(()=> this.$store.dispatch('setDoxMes'),1000);
                         
                          }
                          
            }

      },
      mounted(){
                this.$store.dispatch('setDoxMes');
                
               },
   
      methods: {
                

               },
      components: {
                
                 BarChart,
                 LoadComponent
                  },
      computed: { 
                doxodmeses(){
                             return this.$store.getters.doxodmeses;


                },
                threeload(){
                             return this.$store.getters.threeload;


                },
               
                chardataone(){
                          let  chadata = [];
                          let i;
                          for (i = 0; i < this.doxodmeses.length; i++) {
                                 chadata.push(this.doxodmeses[i].summa)
                                  }
                          return chadata;
                          },
                chardatatwo(){
                          let  chadata = [];
                          let i;
                          for (i = 0; i < this.doxodmeses.length; i++) {
                                  let meses = this.doxodmeses[i].data;
                                 chadata.push((function (){
                                   let dt = new Date(meses);
                                 return dt.getFullYear() + "/" + (dt.getMonth() + 1) + "/" + dt.getDate(); })())
                                  }
                          return chadata;
                          },
                 datachart() {
                          return {
                                 labels : this.chardatatwo,
                                 datasets: [{
                                            label : 'Kirim',
                                            maxBarThickness: 60,
                                           backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                            data :  this.chardataone
                                           }]
                                  }
                          },

                },
               

              }
</script>
<style scoped>
 .releat{
  position: relative;
 margin-top: -20px;
 margin-bottom: -20px;
 margin-right: -5px;
 margin-left: -5px;
 }
 
 .padtop{
  padding-top: 20px
 }
 .spinner {
  margin: 100px auto 0;
  width: 300px;
  text-align: center;
}


 .conta {
  display: inline;
  position: relative;
  padding-left: 35px;
   margin-right: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 16px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default radio button */
.conta input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}

/* Create a custom radio button */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 20px;
  width: 20px;
  background-color: #eee;
  border-radius: 50%;
}

/* On mouse-over, add a grey background color */
.conta:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.conta input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the indicator (dot/circle) when checked */
.conta input:checked ~ .checkmark:after {
  display: block;
}

/* Style the indicator (dot/circle) */
.conta .checkmark:after {
  top: 6px;
  left: 6px;
  width: 8px;
  height: 8px;
  border-radius: 50%;
  background: white;
}

</style>
