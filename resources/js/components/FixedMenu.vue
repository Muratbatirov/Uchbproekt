<template>

   <div> 
        <nav  class="navbar  navbar-light shadow">

            <div class="container">
                <a class="navbar-brand" href="#">
                    Dommoneyy
                </a>
              </div>
           </nav>

            <div class="container">
              <div class="row navmen">
                <div class="col-xl-4 col-md-3 col-sm-2">Dommoney
                  </div>
              <div class="col-xl-5 col-md-9  offset-md-1 offset-xl-3">
                <nav  >
                <ul class="shirmenu">
      <li id="lin1" class="li"><a href="" @click.prevent="balans">Баланс</a></li>
      <li id="lin2"  class="li"><a href="" @click.prevent="daxod">Доходы</a></li>
      <li id="lin3" class="li"><a href="" @click.prevent="rasxod">Расходы</a></li>
      <li id="lin4" class="li"><a href="" @click.prevent="otchet">Отчеты</a></li>
      <li id="lin5"  class="liposled nastr" ><a href="" @click.prevent="otchet">Настройки</a></li>
     
      <li id="linya"  class="li linya" ><a >&nbsp</a></li>
    </ul>
<div class="gamburger">
 <tasty-burger-button  :type="buttonType" 
        :active="isActive" 
        :size="size" 
        :color="color" 
        :active-color="activeColor"
         @toggle="funct"

         />
         </div>
         </nav>
         </div>
       </div>
                </div>

       




     
   <transition name="v-slide">
     
   
     <div v-show="isActive" v-bind:class="menucard" >
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
      isShirokiy: false,
      step_1: false

     
    }
  },
  components: {
    'tasty-burger-button': TastyBurgerButton
  },
        mounted() {
            
            let chiz = document.getElementById("linya");
           this.dlinalinii(chiz, "lin1", "lin2");
        },
        watch:{
    $route (to, from){
        this.linya();
    }
    
} ,

        methods: {
          daxod(){
            this.$router.push({ name: 'daxod' });
           

          },
          rasxod(){
            this.$router.push({ name: 'rasxod' });
            
          },
          balans(){
            this.$router.push({ name: 'balans' });
            
          },
          otchet(){
            this.$router.push({ name: 'otchet' })
          },
          dlinalinii(linya, linId1, linId2){
            let linya_1 = document.getElementById(linId1);
            let linya_2 = document.getElementById(linId2);  
            let dlina = linya_2.getBoundingClientRect().left-linya_1.getBoundingClientRect().left; 
            linya.style.width =dlina +"px";
          },
          linya(){
          
         
         
        if (this.$route.name == 'balans') {
          
          let chiziq = document.getElementById("linya");
          
          
          chiziq.style.left = 0 + "px";
          

          }
          else if(this.$route.name == 'daxod') {
           let navmenyu = document.getElementById("lin2");
          let chiziq = document.getElementById("linya");
           let coords = navmenyu.getBoundingClientRect();
           chiziq.style.left =  coords.left - document.getElementById("lin1").getBoundingClientRect().left  + "px" ;
          }
          else {
            let navmenyu = document.getElementById("lin3");
          let chiziq = document.getElementById("linya");
           let coords = navmenyu.getBoundingClientRect();
            chiziq.style.left =  coords.left - document.getElementById("lin1").getBoundingClientRect().left  + "px" ;
          }
        },

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
         },
        

        }


    }
</script>
<style scoped>
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
button {
  margin-top: 10px;
}
.li {
  display: inline-block;
  width: 15%;
  margin-left: 1em;
 padding-right: 1em;

}

.liposled{
  display: inline-block;
    margin-left: 1em;
    width: 15%;
}
.gamburger{
  display: none;
}

ul {
  list-style: none;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  padding: 5px 0 5px;
  background-color: #F7F7F7;
  border-radius: 4px;
 
}
.linya {
position: absolute;
left: 0;
top: 2.5em;
border-top: solid;
border-color: #a3c2c2;
border-width: 3px; 

transition: all 0.5s ease-out;
}

.navmen{
  padding-top: 5px;
}



.shirmenu a {display: block;
  text-decoration: none;
 

  color:green;
 
  
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
@media (max-width: 650px) {
.shirmenu{
  display: none;
 }
 .gamburger{
  display: block;
 }
}
 @media (max-width: 250px) {
 .uzkiy {
     left: 75%;
     right: 2%;
   }
 
 }

</style>