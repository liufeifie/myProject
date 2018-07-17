import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

export default function createRouter () {
  return new Router({
    mode: 'history',
    routes: [
      {
        path: '/',
        name: 'home',
        component: () => import('@/views/home')
      }, {
        path: '/person',
        name: 'person',
        component: () => import('@/views/person')
      }
    ]
  })
}
