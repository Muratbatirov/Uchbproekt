<template>
	<div>
<fixed-menu/>

 <router-view></router-view>
    </div>
</template>

<script>
	
import FixedMenu from './FixedMenu'; 

 

    export default {
   
       
        mounted() {
            console.log('Component mounted global')
        },
        components: {
                 
                 FixedMenu
              
                  }, 
        methods: {
          


        }


    }
</script>
