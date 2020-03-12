import Vue from 'vue';
import Vuex from 'vuex';
import kirim from './modules/kirim';
import rasxod from './modules/rasxod';
import balans from './modules/balans';
import tool from './modules/tool';

Vue.use(Vuex);


export const store = new Vuex.Store({
  modules: {
    kirim,
    rasxod,
    balans,
    tool
  },
  state: {
   
    compshow: false,
    categorya: {},
    modaldoxod:false,
    modaltool:false
  },
  getters: {
   
    componshow: state => {
      return state.compshow;},
    kategorya: state => {
     return state.categorya;},
     modaldoxod: state => {
     return state.modaldoxod;},
    
    modaltool: state => {
     return state.modaltool;},
    },
  mutations: {
   
    'COMP_SHOW' (state) {
      state.compshow = !state.compshow;
    },
    'CAT_SHOW' (state, categorya) {
      state.categorya = categorya;
    },
    'MODAL_DOXOD' (state) {
      state.modaldoxod = ! state.modaldoxod;
    },
    'MODAL_TOOL' (state) {
      state.modaltool = ! state.modaltool;
    },
  },
  actions: {
  initStore: ({commit}) => {
  	 axios.get('/json').then((response) =>{
      
      commit('SET_STORE', response.data )
    });
  },
  catStore: ({commit}) => {
  	 axios.get('/categorya').then((response) =>{
      
      commit('CAT_SHOW', response.data );
      console.log(response.data);
    });
  }
}
  });