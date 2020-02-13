<template>
    
         
              <div class="card shadow">
                <div class="card-header">
                   <div class="row">
                   
                            
                            <div class="col-md-4 ">
                                
                              
                           </div>
                           

                    
                  </div>
              </div>
               <div class="card-body">
              <div class="row">
                   <div class="col-md-12">
                        <bar-chart :chart-data="datachart" :height="500"  :options="options" >
                                      </bar-chart> 
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
                                           backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                            data :  this.chardataone
                                           }]
                                  }
                          },

                },
               

              }
</script>
<style scoped>
 

</style>
