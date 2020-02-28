const state = {
   
    daxod: [],
    datadax: [],
    datamesto: [],
    raznitsa: 24,
    deystviy:[],
    redakt:false,
    doxid:0,
    doxodmeses:[],
    mestoxr:[],
    state30: false

};

const getters = {
    
    daxod: state => {return state.daxod;},
    datadax: state => {return state.datadax;},
    datamesto: state => {return state.datamesto;},
    deystviy: state => {return state.deystviy},
    redakt: state => {return state.redakt},
    doxid: state => {return state.doxid},
    doxodmeses: state => {return state.doxodmeses},
    mestoxr: state => {return state.mestoxr},
    state30: state => {return state.state30},
};



const mutations = {
    
    'SET_DAXOD' (state, resdaxod) {
      state.daxod = resdaxod;
    },
    'SET_DATADAX' (state, datadax) {
      state.datadax = datadax;
    },
    'SET_DATAMESTO' (state, datamesto) {
      state.datamesto = datamesto;
    },
    'PLUS_RAZNITSA' (state, ) {
      state.raznitsa +=1;
    },
    'MINUS_RAZNITSA' (state, ) {
      state.raznitsa -=1;
    },
    'SET_DEYSTVIY' (state, deystviy) {
      state.deystviy = deystviy;
    },
    'REDAKT' (state) {
      state.redakt = true;
    },
    'NOTREDAKT' (state) {
      state.redakt = false;
    },
    'DOXID' (state, dox_id) {
      state.doxid = dox_id;
    },
     'DOXODMESES' (state, dox_mes) {
      state.doxodmeses = dox_mes;
    },
    'MESTOXR' (state, mes_xr) {
      state.mestoxr = mes_xr;
    },
    'STATE30' (state) {
      state.state30 =true;
    },
    'STATE10' (state) {
      state.state30 =false;
    }

};

const actions = {
    
    setDax: ({commit}) => {
      axios.post('/resdaxod' , {raznitsa:state.raznitsa})
      .then((response) =>{
        commit('SET_DAXOD', response.data )
      });
    },
    setDataDax: ({commit}) => {
      axios.get('/datadax')
      .then((response) =>{
        commit('SET_DATADAX', response.data )
      });
    },
    setDataMesto: ({commit}) => {
      axios.get('/mesto')
      .then((response) =>{
        commit('SET_DATAMESTO', response.data )
      });
    },
    setDeystviy: ({commit}) => {
      axios.get('/deystviy')
      .then((response) =>{
        commit('SET_DEYSTVIY', response.data )
      });
    },
    setDeystviyper: ({commit}) => {
      axios.get('/deystviyper')
      .then((response) =>{
        commit('SET_DEYSTVIY', response.data )
      });
    },
    setDoxMes: ({commit}) => {
      axios.get('/doxodmeses')
      .then((response) =>{
        commit('DOXODMESES', response.data )
      });
    },
    setDoxMes30: ({commit}) => {
      axios.get('/doxodmeses30')
      .then((response) =>{
        commit('DOXODMESES', response.data )
      });
    },
    setMesXr: ({commit}) => {
      axios.post('/mestoxr', {raznitsa:state.raznitsa})
      .then((response) =>{
        commit('MESTOXR', response.data )
      });
    },


};

export default {
    state,
    getters,
    actions,
    mutations,
}
