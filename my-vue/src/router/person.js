export default [
  {
    path: '/person',
    name: 'person',
    meta: {header: true, isAuth: true, footer: true},
    component: (resolve) => require(['@/view/person'], resolve)
  }, {
    path: '/person/flex',
    name: 'flex',
    meta: {header: true, isAuth: true, footer: true},
    component: (resolve) => require(['@/view/person/flex'], resolve)
  }, {
    path: '/person/flex/check',
    name: 'check',
    meta: {header: true, isAuth: true, footer: true},
    component: (resolve) => require(['@/view/person/flex/check'], resolve)
  }, {
    path: '/person/router',
    component: (resolve) => require(['@/view/person/router/index.template'], resolve),
    children: [
      {
        path: '',
        name: 'router',
        meta: {header: true, isAuth: true, footer: true},
        component: (resolve) => require(['@/view/person/router/index'], resolve)
      }, {
        path: 'child',
        component: (resolve) => require(['@/view/person/router/child.template'], resolve),
        children: [
          {
            path: '',
            name: 'child',
            meta: {header: true, isAuth: true, footer: true},
            component: (resolve) => require(['@/view/person/router/child'], resolve)
          }, {
            path: 'grandchild',
            name: 'grandchild',
            meta: {header: true, isAuth: true, footer: true},
            component: (resolve) => require(['@/view/person/router/grandchild'], resolve)
          }
        ]
      }
    ]
  }
]
