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

// 开发环境客户端触发 asyncData；  生产环境经过服务端渲染
if (process.env.NODE_ENV === 'development') {
  Vue.mixin({
    beforeRouteEnter (to, from, next) {
      // 刷新页面触发
      if (!from.name) {
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
      } else {
        next()
      }
    }
  })
}

const { app, router, store } = createApp()

if (window.__INITIAL_STATE__) {
  store.replaceState(window.__INITIAL_STATE__)
}
// console.log('window.__INITIAL_STATE__', window.__INITIAL_STATE__)

router.onReady(() => {
  // 此时异步组件已经加载完成
  router.beforeResolve((to, from, next) => {
    // 返回目标位置或是当前路由匹配的组件数组（是数组的定义/构造类，不是实例）。
    // 通常在服务端渲染的数据预加载时
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
