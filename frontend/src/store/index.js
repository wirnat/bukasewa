import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    dialog: false
  },
  mutations: {
    aksidialog(state){
      state.dialog="true"
    }
  },
  actions: {

  },
  modules: {
  }
})
