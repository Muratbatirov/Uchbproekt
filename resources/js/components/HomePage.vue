<template>
<div class="container">
  <div class="row justify-content-center">
     <div class="col-md-4 ">
         <home-balans/>
     </div>
     <div class="col-md-4 ">
         <home-daxod/>
     </div>
  </div>
  <div class="row justify-content-center">
     <div class="col-md-4 ">
         <home-rasxod/>
     </div>
     <div class="col-md-4 ">
         <home-otchet/>
     </div>
  </div> 
</div>
</template>

<script>
import HomeBalans from './HomeBalans';	
import HomeDaxod from './HomeDaxod'; 
import HomeRasxod from './HomeRasxod'; 
import HomeOtchet from './HomeOtchet';  


    export default {
    	
     components: {
                 HomeBalans,
                 HomeDaxod,
                 HomeRasxod,
                 HomeOtchet
              
                  },       
       
        mounted() {
            console.log('Component mounted global')
        },
        methods: {
          


        }


    }
</script>
