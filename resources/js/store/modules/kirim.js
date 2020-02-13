const state = {
   
    daxod: [],
    datadax: [],
    datamesto: [],
    raznitsa: 24,
    deystviy:[],
    redakt:false,
    doxid:0,
    doxodmeses:[]

};

const getters = {
    
    daxod: state => {return state.daxod;},
    datadax: state => {return state.datadax;},
    datamesto: state => {return state.datamesto;},
    deystviy: state => {return state.deystviy},
    redakt: state => {return state.redakt},
    doxid: state => {return state.doxid},
    doxodmeses: state => {return state.doxodmeses},
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


};

export default {
    state,
    getters,
    actions,
    mutations,
}
