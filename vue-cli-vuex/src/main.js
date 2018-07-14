// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import createRouter from './router'
import createStore from './store'
import pageConfig from './util/pageConfig'

Vue.config.productionTip = false
Vue.mixin(pageConfig)

/* eslint-disable no-new */

export default function createApp () {
  const router = createRouter()
  const store = createStore()
  const app = new Vue({
    el: '#app',
    router,
    store,
    render: h => h(App)
  })
  return {app, router, store}
}

createApp()
