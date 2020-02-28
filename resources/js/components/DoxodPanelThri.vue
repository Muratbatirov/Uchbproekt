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
                                      </bar-chart><div v-show="load" class="load"><div class="spinner">
                                              <div class="bounce1"></div>
                                              <div class="bounce2"></div>
                                              <div class="bounce3"></div>
                                            </div></div></div>
                   </div>
                 
          </div> 
                  
                   
       </div>
          
           
              </div>

             
      
      
    
</template>

<script>
	import BarChart from './BarChart.js'

export default {
      data: function(){
                      return { 
                              rad: 10,
                              load: false,
                          
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
                             this.load =true;
                             this.$store.commit( 'STATE30');

                             setTimeout(()=> this.$store.dispatch('setDoxMes30'),1000);
                             setTimeout(()=> this.load =false,1000);
                            
         
                          }
                          else{
                            this.load =true;
                            this.$store.commit( 'STATE10');
                            setTimeout(()=> this.$store.dispatch('setDoxMes'),1000);
                           setTimeout(()=> this.load =false,1000);
                          }
                          
            }

      },
      mounted(){
                this.$store.dispatch('setDoxMes');
                
               },
   
      methods: {
                

               },
      components: {
                
                 BarChart
                  },
      computed: { 
                doxodmeses(){
                             return this.$store.getters.doxodmeses;


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
 .load{
  width: 100%;
  height: 100%;
  z-index: 10;
  
  background-color: #c5c7c5;
  opacity: 0.5;
  overflow: auto;
  margin: auto;
  position: absolute;
  top: 0; left: 0; bottom: 0; right: 0;
 }
 .padtop{
  padding-top: 20px
 }
 .spinner {
  margin: 100px auto 0;
  width: 300px;
  text-align: center;
}

.spinner > div {
  width: 50px;
  height: 50px;
  background-color: #333;

  border-radius: 100%;
  display: inline-block;
  -webkit-animation: sk-bouncedelay 1.4s infinite ease-in-out both;
  animation: sk-bouncedelay 1.4s infinite ease-in-out both;
}

.spinner .bounce1 {
  -webkit-animation-delay: -0.32s;
  animation-delay: -0.32s;
}

.spinner .bounce2 {
  -webkit-animation-delay: -0.16s;
  animation-delay: -0.16s;
}

@-webkit-keyframes sk-bouncedelay {
  0%, 80%, 100% { -webkit-transform: scale(0) }
  40% { -webkit-transform: scale(1.0) }
}

@keyframes sk-bouncedelay {
  0%, 80%, 100% { 
    -webkit-transform: scale(0);
    transform: scale(0);
  } 40% { 
    -webkit-transform: scale(1.0);
    transform: scale(1.0);
  }
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
