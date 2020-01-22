import Vue from 'vue';
import Vuex from 'vuex';
import kirim from './modules/kirim';
Vue.use(Vuex);


export const store = new Vuex.Store({
  modules: {
    kirim
  },
  state: {
    balans: 0,
    compshow: false,
    categorya: {}
  },
  getters: {
    summa: state => {
      return state.balans;},
    componshow: state => {
      return state.compshow;},
    kategorya: state => {
     return state.categorya;}
    
    },
  mutations: {
    'SET_STORE' (state, balans) {
      state.balans = balans;
    },
    'COMP_SHOW' (state) {
      state.compshow = !state.compshow;
    },
    'CAT_SHOW' (state, categorya) {
      state.categorya = categorya;
    }
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