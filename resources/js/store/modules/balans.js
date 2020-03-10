const state = {
    
    balans: [],
   
    
    

};

const getters = {
   
    balans: state => {return state.balans;},
   
};



const mutations = {
   
    'SET_BALANS' (state, balans) {
      state.balans = balans;
    },
   

};

const actions = {
   
    setBalans: ({commit}) => {
      axios.get('/balans')
      .then((response) =>{
        commit('SET_BALANS', response.data )
      });
    },
   

};

export default {
    state,
    getters,
    actions,
    mutations,
}
