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
     
   
     <div v-show="isActive" v-bind:class="menucard" class="card shadow-lg">
   <button type="button" v-bind:class="menuitem"  class="btn-success "><span v-show="isShirokiy">Даход &nbsp</span> <font-awesome-icon  :icon = "['fas', 'arrow-right']"/></button>
   
   <button type="button" v-bind:class="menuitem" class=" btn-danger "><span v-show="isShirokiy">Расход &nbsp</span><font-awesome-icon  :icon = "['fas', 'arrow-left']"/></button>
   
   <button type="button" v-bind:class="menuitem" class=" btn-primary "><span v-show="isShirokiy">Баланс &nbsp</span><font-awesome-icon  :icon = "['fas', 'money-bill']"/></button>
   
   <button type="button" v-bind:class="menuitem" class=" btn-primary "><span v-show="isShirokiy">Настройки &nbsp</span><font-awesome-icon  :icon = "['fas', 'tools']"/></button>
   <button type="button" v-bind:class="menuitem" class=" btn-primary "><span v-show="isShirokiy">Выход &nbsp</span><font-awesome-icon  :icon = "['fas', 'sign-out-alt']"/></button>


   <button type="button" v-on:click="shirokiymenu" v-bind:class="menuitem"  class=" btn-primary pad "><font-awesome-icon  :icon = "['fas', 'arrows-alt-h']"/></button>

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
      expanded:false,
      isShirokiy: false
     
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
        },
        shirokiymenu(){
          this.isShirokiy=!this.isShirokiy;
        }

        },
        computed:{
        menuitem: function (){
            if (this.isShirokiy) {
              return "btn  shadow btn-shirokiy" }
              else{
              return "btn  shadow btn-circle"
              }
         },
        menucard: function (){
        if (this.isShirokiy) {
              return "shirokiy" }
              else{
              return "uzkiy"
              }
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
.btn-shirokiy{
  width: 95%;
    height: 38px;
    border-radius: 19px;
    text-align: center;
     padding-left: 0;
    margin-top: .3em;
    padding-right: 0;
    font-size: 16px;
}
 
.uzkiy {
    display: flex;
    flex-direction:  column;
    align-items: center;
    position: fixed;
    top: 20%;
    right: 0;
    left: 80%;
    right: 10%;
    z-index: 10;
    border-radius: 2em;
   
}
.shirokiy{
  display: flex;
    flex-direction:  column;
    align-items: center;
    position: fixed;
    top: 20%;
    right: 0;
    left: 10%;
    right: 10%;
    z-index: 10;
    border-radius: 2em;
}
.pad{
  margin: 0.2em;
}
@media (max-width: 370px) {
 .uzkiy {
     left: 78%;
     right: 5%;
 }

}
 @media (max-width: 250px) {
 .uzkiy {
     left: 75%;
     right: 2%;
   }
 }
</style>