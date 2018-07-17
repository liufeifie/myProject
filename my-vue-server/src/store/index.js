import Vue from 'vue'
import Vuex from 'vuex'
import actions from './actions'
import mutations from './mutations'
import getters from './getters'

Vue.use(Vuex)
export default function createStore () {
  return new Vuex.Store({
    modules: {},
    state: {
      serverData: {}
    },
    actions: actions,
    mutations: mutations,
    getters: getters
  })
}
