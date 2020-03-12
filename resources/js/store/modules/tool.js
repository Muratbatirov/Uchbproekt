const state = {
    
   daxtoolcateg : [],
   catdoxid:[],
   catdoxred:false,
   tooldoxload:false,
   daxcatid:0,
   rastoolcateg : [],
   plastikcat : [],
    
    
    

};

const getters = {
   
    daxtoolcateg: state => {return state.daxtoolcateg;},
    catdoxid: state => {return state.catdoxid;},
     catdoxred: state => {return state.catdoxred;},
     tooldoxload:state => {return state.tooldoxload;},
     daxcatid:state => {return state.daxcatid;},
   
};



const mutations = {
   
    'DAX_TOOL_CAT' (state, daxtoolcateg) {
      state.daxtoolcateg = daxtoolcateg;
    },
    'CATDOXID' (state, catdoxid) {
      state.catdoxid = catdoxid;
    },
    'CATDOXRED' (state) {
      state.catdoxred = true;
    },
    'NOTCATDOXRED' (state) {
      state.catdoxred = false;
    },
    'TOOLLOAD' (state, bool) {
      state.tooldoxload= bool;
    },
    'DAXCATID' (state, daxcatid) {
      state.daxcatid= daxcatid;
    },

};

const actions = {
   
    DaxToolCat: ({commit}) => {commit('TOOLLOAD', true );
      axios.get('/daxtoolcat')
      .then((response) =>{commit('TOOLLOAD', false);
        commit('DAX_TOOL_CAT', response.data )
      });
    },
   
};

export default {
    state,
    getters,
    actions,
    mutations,
}
