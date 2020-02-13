<template>
    <div>
      <fixed-menu/>   
<div class="container">
  
  <div class="row justify-content-center aa">
     <div class="col-md-12 ">
        
        <router-view></router-view>
     </div>
     
  </div>
 
</div>
</div>
</template>

<script>

import FixedMenu from './FixedMenu'; 


    export default {
    	
     components: {
                
                 FixedMenu
                 
                  },       
       
        mounted() {
            console.log('Component mounted global')
        },
        methods: {
          


        }


    }
</script>
<style>
  

.aa{
    margin-top: 20px;
}
</style>
