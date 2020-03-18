const state = {
    
   daxtoolcateg : [],
   rastoolcateg : [],
   catdoxid:[],
   catdoxred:false,
   tooldoxload:false,
   toolrasload:false,
   daxcatid:0,
   inputtooldax:false,
   inputtoolras:false,
   rastoolcateg : [],
   daxtoolcatpag : [],
   plastikcat : [],
   daxskip:0,
    
    
    

};

const getters = {
   
    daxtoolcateg: state => {return state.daxtoolcateg;},
     rastoolcateg: state => {return state.rastoolcateg;},
      daxtoolcatpag: state => {return state.daxtoolcatpag;},
    catdoxid: state => {return state.catdoxid;},
     catdoxred: state => {return state.catdoxred;},
     tooldoxload:state => {return state.tooldoxload;},
     toolrasload:state => {return state.toolrasload;},
     daxcatid:state => {return state.daxcatid;},
     inputtooldax:state => {return state.inputtooldax;},
     inputtoolras:state => {return state.inputtoolras;},
     daxskip:state => {return state.daxskip;},
};



const mutations = {
   
    'DAX_TOOL_CAT' (state, daxtoolcateg) {
      state.daxtoolcateg = daxtoolcateg;
    },
    'RAS_TOOL_CAT' (state, rastoolcateg) {
      state.rastoolcateg = rastoolcateg;
    },
     'DAX_TOOL_CAT_PAG' (state, daxtoolcatpag) {
      state.daxtoolcatpag = daxtoolcatpag;
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
    'TOOLRASLOAD' (state, bool) {
      state.toolrasload= bool;
    },
    'DAXCATID' (state, daxcatid) {
      state.daxcatid= daxcatid;
    },
    'DAXSKIP' (state, skip) {
      state.daxskip= skip;
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
     RasToolCat: ({commit}) => {commit('TOOLRASLOAD', true );
      axios.get('/rastoolcat')
      .then((response) =>{commit('TOOLRASLOAD', false);
        commit('RAS_TOOL_CAT', response.data )
      });
    },
     DaxToolCatPag: ({commit}) => {commit('TOOLLOAD', true );
      axios.post('/daxtoolcatpag',{daxskip:state.daxskip})
      .then((response) =>{commit('TOOLLOAD', false);
        commit('DAX_TOOL_CAT_PAG', response.data )
      });
    },
   
};

export default {
    state,
    getters,
    actions,
    mutations,
}
