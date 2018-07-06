export default [
  {
    path: '/',
    name: 'home',
    meta: {header: true, isAuth: true, footer: true},
    component: (resolve) => require(['@/view/home'], resolve)
  }, {
    path: '/person',
    name: 'person',
    meta: {header: true, isAuth: true, footer: true},
    component: (resolve) => require(['@/view/person'], resolve)
  }, {
    path: '/test',
    name: 'test',
    component: (resolve) => require(['@/view/test'], resolve)
  }
]
