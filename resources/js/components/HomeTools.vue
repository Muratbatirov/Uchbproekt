<template>
    <div class= "container">
        
        <div class="row">
            <div class="col-md-6">
                 <tools-pan-one/>
            </div>
            <div class="col-md-6">
                 <tools-pan-two/>
            </div>
            
        </div>
        <div class="row">
            <div class="col-md-12">
                <tools-pan-three/>
            </div>
            
        </div>
         
   
   

    </div>
   
  
</template>

<script>
	


 import ToolsPanOne from './ToolsPanOne'
 import ToolsPanTwo from './ToolsPanTwo'
 import ToolsPanThree from './ToolsPanThree'

    export default {
    
       
        mounted() {
           this.$store.dispatch('setBalans');
        },
        methods: {
          


        },
        components:{
           ToolsPanOne,
           ToolsPanTwo,
           ToolsPanThree,

        }


    }
</script>
