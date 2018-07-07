/* eslint-disable */
import Vue from 'vue'
import createApp from './main'
console.log('**************************api3', process.env.VUE_ENV, process.env.NODE_ENV)

Vue.mixin({
  beforeRouteUpdate (to, from, next) {
    const { asyncData } = this.$options
    if (asyncData) {
      asyncData({
        store: this.$store,
        route: to
      }).then(next).catch(next)
    } else {
      next()
    }
  }
})

const { app, router, store } = createApp()

if (process.env.NODE_ENV === 'development') {
  Vue.mixin({
    beforeCreate () {
      const { asyncData } = this.$options
      if (asyncData) {
        asyncData({
          store: this.$store,
          route: this.$route
        }).then(data => {
          console.log('刷新页面', data)
        }).catch(error => {
          console.log('错误信息：', error.message)
        })
      }
    }
  })
}

/* if (window.__INITIAL_STATE__) {
  store.replaceState(window.__INITIAL_STATE__)
} */



router.onReady(() => {
  router.beforeResolve((to, from, next) => {
    const matched = router.getMatchedComponents(to)
    const prevMatched = router.getMatchedComponents(from)
    let diffed = false
    const activated = matched.filter((c, i) => {
      return diffed || (diffed = (prevMatched[i] !== c))
    })
    if (!activated.length) {
      return next()
    }
    Promise.all(activated.map(c => {
      if (c.asyncData) {
        return c.asyncData({ store, route: to })
      }
    })).then(() => {
      next()
    }).catch(next)
  })
  app.$mount('#root')
})
