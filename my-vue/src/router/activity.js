export default [
  {
    path: '/activity',
    name: 'activity',
    meta: {header: true, isAuth: true, footer: true},
    component: (resolve) => require(['@/view/activity'], resolve)
  }
]
