<template>
    
         <div class="load">

           <div class="spinner">
                 <div class="bounce1"></div>
                 <div class="bounce2"></div>
                 <div class="bounce3"></div>
          </div>
              </div>
    
</template>

<script>
	

export default {
      data: function(){
                      return { 
                              
                             
                          
                           
   
                            
            }
                             
                                     
                       },
       
      created() {
           
                },
    
      mounted(){
                
                
               },
   
      methods: {
                

               },
      components: {
                
                  },
      computed: { 
                

                },
               

              }
</script>
<style scoped>

 .load{
  width: 100%;
  height: 100%;
  z-index: 10;
  
  background-color: #c5c7c5;
  opacity: 0.7;
  overflow: auto;
  margin: auto;
  position: absolute;
  top: 0; left: 0; bottom: 0; right: 0;
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
 

</style>
