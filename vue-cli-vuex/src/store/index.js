import Vue from 'vue'
import Vuex from 'vuex'
import state from './state'
import getters from './getters'
import mutations from './mutations'
import actions from './actions'

Vue.use(Vuex)

export default function createStore () {
  return new Vuex.Store({
    modules: {},
    state: state,
    getters: getters,
    mutations: mutations,
    actions: actions
  })
}