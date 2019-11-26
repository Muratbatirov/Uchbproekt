<template>

   <div> 

<nav  class="navbar navbar-expand-md navbar-light shadow">
            <div class="container">
                <a class="navbar-brand" href="#">
                    Dommoney
                </a>
 <tasty-burger-button  :type="buttonType" 
        :active="isActive" 
        :size="size" 
        :color="color" 
        :active-color="activeColor"
         @toggle="funct"

         />
                </div>
</nav>
       




     
   <transition name="v-slide">
   <div v-show="isActive" class="aa">
   <button type="button" class="btn btn-success shadow  btn-circle"><font-awesome-icon  :icon = "['fas', 'arrow-right']"/></button>
   
   <button type="button" class="btn  btn-danger btn-circle"><font-awesome-icon  :icon = "['fas', 'arrow-left']"/></button>
   
   <button type="button" class="btn btn-primary shadow btn-circle"><font-awesome-icon  :icon = "['fas', 'money-bill']"/></button>
   
   <button type="button" class="btn btn-primary shadow  btn-circle"><font-awesome-icon  :icon = "['fas', 'tools']"/></button>
   <button type="button" class="btn btn-primary shadow-lg btn-circle"><font-awesome-icon  :icon = "['fas', 'sign-out-alt']"/></button>
</div>
 </transition>
   </div>

</template>

<script>
	
import {TastyBurgerButton} from 'vue-tasty-burgers';
import 'vue-tasty-burgers/dist/vue-tasty-burgers.css';
import "vue-essential-transitions";
 

    export default {
    
       data() {
    return {
        buttonType: 'elastic',
      isActive: false,
      size: 's',
      color: 'green',
      activeColor: 'orange',
      expanded:false
     
    }
  },
  components: {
    'tasty-burger-button': TastyBurgerButton
  },
        mounted() {
            
        },
        methods: {

        funct(){
            this.isActive=!this.isActive;
        }

        }


    }
</script>
<style>
/* CSS */
.btn-circle {
    width: 38px;
    height: 38px;
    border-radius: 19px;
    text-align: center;
     padding-left: 0;
    margin-top: .3em;
    padding-right: 0;
    font-size: 16px;
}
 
.aa {
    display: flex;
    flex-direction:  column;
    position: fixed;
    top: 20%;
    right: 0;
    left: 80%;
    right: 10%;
    z-index: 10;
   
}
@media (max-width: 330px) {
 .aa {
     right: 5%;
 }
}

</style>