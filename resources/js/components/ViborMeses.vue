<template>
    <div class="col-md-10 ">
      <div class="flexcompon">
      <a class="slider__control slider__control_left slider__control_show" href="#"  role="button" v-on:click.stop.prevent="left"></a>
         <div class="slider">
              <div class="slider__wrapper ">
                   <div v-for="item in mesesi" class="slider__item">
                     <div class="mesfon" >{{item[0]}}</div><div class="godfon">{{item[1]}}</div>
                   </div>
                   
                   
                   
             </div>
            
         </div>
           
             <a class="slider__control slider__control_right slider__control_show" href="#" role="button" v-on:click.stop.prevent="right"></a>  
             </div>    
     </div>
</template>

<script>
	
import {multiItemSlider}  from './slider.js'
 
export default {
      data: function(){
                      return { 
                              slider: null,
                              mesesi: [
                                    ['Январь' , '2019'],
                                   ['Февраль' ,'2019'],
                                  [ 'Март', '2019',],
                                   ['Апрель', '2019'],
                                   ['Май', '2019'],
                                  [ 'Июнь', '2019'],
                                  [ 'Июль', '2019'],
                                  [ 'Август', '2019'],
                                   ['Сентябрь', '2019'],
                                   ['Октябрь', '2019'],
                                   ['Ноябрь', '2019'],
                                  [ 'Декабрь', '2019'],
                                   ['Январь' ,'2020'],
                                   ['Февраль' ,'2020'],
                                   ['Март', '2020'],
                                   ['Апрель', '2020'],
                                   ['Май', '2020'],
                                   ['Июнь', '2020'],
                                   ['Июль', '2020'],
                                   ['Август', '2020'],
                                   ['Сентябрь', '2020'],
                                   ['Октябрь', '2020'],
                                  [ 'Ноябрь','2020'],
                                  [ 'Декабрь', '2020'],
                                  ] ,
                               
                             }
                             
                                     
                       },
       
     
      mounted(){  
               
     this.slider = multiItemSlider('.slider');
     
               },
      methods: {
                currentMonth() {
                                var d = new Date();
                                var n = d.getMonth();
                              
                               this.god = d.getFullYear();
                                },
                left(){
                       this.slider.left();
                       this.$store.commit('MINUS_RAZNITSA');
                       this.$store.dispatch('setDax');
                      },
                right(){
                       this.slider.right();
                       this.$store.commit('PLUS_RAZNITSA');
                       this.$store.dispatch('setDax');
                      }                    
               },
      components: {
                
                  },
      computed: {    

                }
              }
</script>
<style scoped>
 
.flexcompon{
  display: flex;
}
.slider {
      position: relative;
      overflow: hidden;

    }

    .slider__wrapper {
      display: flex;
      
    }
    .perexod{
transition: transform 0.4s ease-in;
    }

    .slider__item {
      flex: 0 0 100%;
      display: flex;
      max-width: 100%;
      justify-content: space-around;
    }

    .slider__control {
     
     
      display: none;
      align-items: center;
      justify-content: center;
      width: 20px;
      color: #fff;
      text-align: center;
      opacity: 0.5;
     
      
      background: rgba(0, 0, 0, .5);
    }

    .slider__control_show {
      display: flex;
    }
 
    .slider__control:hover,
    .slider__control:focus {
      color: #fff;
      text-decoration: none;
      outline: 0;
      opacity: .9;
    }

    .slider__control_left {
       
      
    }

    .slider__control_right {
     
    }
    .mesfon{
     
       display: inline-block;
      border-style: solid;
      border-color: #0E696D;
      border-width: 1px;
      border-right: none;
      flex: 0 0 60%;
    }

    .slider__control::before {
      content: '';
      display: inline-block;
      width: 15px;
      height: 15px;
      background: transparent no-repeat center center;
      background-size: 100% 100%;
    }
    .godfon{
      display: inline-block;
      background-color: #0E696D;
      flex: 0 0 40%;
      border-style: solid;
      border-color: #0E696D;
      border-width: 1px;
      border-left: none;
      color: white;
    }
    .slider__control_left::before {
      background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23fff' viewBox='0 0 8 8'%3E%3Cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3E%3C/svg%3E");
    }

    .slider__control_right::before {
      background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23fff' viewBox='0 0 8 8'%3E%3Cpath d='M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3E%3C/svg%3E");
    }

    .slider__item>div {
      line-height: 20px;
      font-size: 14px;
      text-align: center;
    }
</style>
