export default [
  {
    path: '/product',
    name: 'product',
    meta: {header: true, isAuth: true, footer: true},
    component: (resolve) => require(['@/view/product'], resolve)
  }
]
