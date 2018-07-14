import Vue from 'vue'
import Router from 'vue-router'
import home from './home'
import person from './person'
import product from './product'
import activity from './activity'

Vue.use(Router)

export default function createRouter () {
  let router = new Router({
    mode: 'history',
    routes: [].concat(home, person, product, activity)
  })
  router.beforeEach((to, from, next) => {
    console.log('111111111111')
    next()
  })
  router.onReady(() => {
    router.beforeResolve((to, from, next) => {
      console.log('2222222222222')
      next()
    })
  })
  router.afterEach((to, from) => {
    console.log('3333333333333')
  })
  return router
}
