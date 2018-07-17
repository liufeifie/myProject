export default [
  {
    path: '/',
    name: 'home',
    meta: {header: true, isAuth: true, footer: true},
    component: (resolve) => require(['@/view/home'], resolve)
  }
]
