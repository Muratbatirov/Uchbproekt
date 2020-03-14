const state = {
    
   daxtoolcateg : [],
   rastoolcateg : [],
   catdoxid:[],
   catdoxred:false,
   tooldoxload:false,
   daxcatid:0,
   inputtooldax:false,
   inputtoolras:false,
   rastoolcateg : [],
   plastikcat : [],
    
    
    

};

const getters = {
   
    daxtoolcateg: state => {return state.daxtoolcateg;},
     rastoolcateg: state => {return state.rastoolcateg;},
    catdoxid: state => {return state.catdoxid;},
     catdoxred: state => {return state.catdoxred;},
     tooldoxload:state => {return state.tooldoxload;},
     daxcatid:state => {return state.daxcatid;},
     inputtooldax:state => {return state.inputtooldax;},
     inputtoolras:state => {return state.inputtoolras;},
};



const mutations = {
   
    'DAX_TOOL_CAT' (state, daxtoolcateg) {
      state.daxtoolcateg = daxtoolcateg;
    },
    'RAS_TOOL_CAT' (state, rastoolcateg) {
      state.rastoolcateg = rastoolcateg;
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
    'INPUTTOOLDAX' (state, bool) {
      state.inputtooldax= bool;
    },
     'INPUTTOOLRAS' (state, bool) {
      state.inputtoolras= bool;
    },

};

const actions = {
   
    DaxToolCat: ({commit}) => {commit('TOOLLOAD', true );
      axios.get('/daxtoolcat')
      .then((response) =>{commit('TOOLLOAD', false);
        commit('DAX_TOOL_CAT', response.data )
      });
    },
     RasToolCat: ({commit}) => {commit('TOOLLOAD', true );
      axios.get('/rastoolcat')
      .then((response) =>{commit('TOOLLOAD', false);
        commit('RAS_TOOL_CAT', response.data )
      });
    },
   
};

export default {
    state,
    getters,
    actions,
    mutations,
}
