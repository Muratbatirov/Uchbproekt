<template>
    <div class= "container">
        <div class="row">
            <div class="col-md-12">
                <balans-pan-one/>
            </div>
            
        </div>
        <div class="row">
            <div class="col-md-8">
                 <balans-pan-two/>
            </div>
            <div class="col-md-4">
                 <balans-pan-three/>
            </div>
            
        </div>
         
   
   

    </div>
   
  
</template>

<script>
	


 import BalansPanOne from './BalansPanOne'
 import BalansPanTwo from './BalansPanTwo'
 import BalansPanThree from './BalansPanThree'

    export default {
    
       
        mounted() {
           this.$store.dispatch('setBalans');
        },
        methods: {
          


        },
        components:{
           BalansPanOne,
           BalansPanTwo,
           BalansPanThree,

        }


    }
</script>
