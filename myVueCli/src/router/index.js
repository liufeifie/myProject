import Vue from 'vue'
import Router from 'vue-router'
import home from './home'

Vue.use(Router)

let routerPaths = [].concat(home)
// console.log(home)

export function createRouter () {
  let router = new Router({
    mode: 'history',
    fallback: false,
    scrollBehavior (to, form, savePostion) {
      if (savePostion) {
        return savePostion
      } else {
        return {
          x: 0,
          y: 0
        }
      }
    },
    routes: routerPaths
  })
  router.beforeEach((to, from, next) => {
    if (!to.name) return router.push('/')
    router.app.$mintUi.setLoading(true)
    let store = router.app.$store
    store.dispatch('USER_INFO')
    let meta = to.meta || {}
    store.commit('SET_HEADER', meta.header)
    store.commit('SET_FOOTER', meta.footer)
    store.commit('PAGE_TITLE', '...')
    store.commit('HEADER_LEFT', {})
    store.commit('HEADER_RIGHT', {})
    next()
  })

  router.afterEach((to, from) => {
    // Indicator.close()
  })
  return router
}
