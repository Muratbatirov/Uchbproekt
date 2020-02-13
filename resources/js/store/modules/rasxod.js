const state = {
    
    rasxod: [],
    dataras: [],
    datarasmesto: [],
    
    

};

const getters = {
   
    rasxod: state => {return state.rasxod;},
    dataras: state => {return state.dataras;},
    datarasmesto: state => {return state.datarasmesto;}
};



const mutations = {
   
    'SET_RASXOD' (state, daxod) {
      state.rasxod = daxod;
    },
    'SET_DATARAS' (state, dataras) {
      state.dataras = dataras;
    },
    'SET_DATARASMESTO' (state, datarasmesto) {
      state.datarasmesto = datarasmesto;
    },

};

const actions = {
   
    setRas: ({commit}) => {
      axios.get('/rasxod')
      .then((response) =>{
        commit('SET_RASXOD', response.data )
      });
    },
    setDataRas: ({commit}) => {
      axios.get('/dataras')
      .then((response) =>{
        commit('SET_DATARAS', response.data )
      });
    },
    setDataRasMesto: ({commit}) => {
      axios.get('/rasmesto')
      .then((response) =>{
        commit('SET_DATARASMESTO', response.data )
      });
    },

};

export default {
    state,
    getters,
    actions,
    mutations,
}
