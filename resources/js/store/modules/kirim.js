const state = {
    naqd: 0,
    plastik_1: 0,
    plastik_2: 0,
    daxod: [],
    datadax: []
    

};

const getters = {
    naqd: state => {return state.naqd;},
    plastik_1: state => {return state.plastik_1;},
    plastik_2: state =>{return state.plastik_2;},
    daxod: state => {return state.daxod;},
    datadax: state => {return state.datadax;}

};



const mutations = {
    'SET_NAQD' (state, summa) {
      state.naqd = summa;
    },
    'SET_PLASTIK_1' (state, summa) {
      state.plastik_1 = summa;
    },
    'SET_PLASTIK_2' (state, summa) {
      state.plastik_2 = summa;
    },
    'SET_DAXOD' (state, resdaxod) {
      state.daxod = resdaxod;
    },
    'SET_DATADAX' (state, datadax) {
      state.datadax = datadax;
    },

};

const actions = {
    setNaqd: ({commit}) => {
      axios.get('/kirimqosh')
      .then((response) =>{
        commit('SET_NAQD', response.data.naqd )
      });
    },
    setDax: ({commit}) => {
      axios.get('/resdaxod')
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

};

export default {
    state,
    getters,
    actions,
    mutations,
}
