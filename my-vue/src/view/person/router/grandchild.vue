<template>
  <div>
    <h1>孙路由</h1>
    <router-link to="/person/router">路由首页</router-link>
    <router-link to="/person/router/child">子路由</router-link>
  </div>
</template>
<script>
  export default {
    data: () => {
      return {}
    },
    pageConfig () {
      return {
        title: '孙路由',
        bodyStyle: 'background-color: #fff;'
      }
    },
    created () {
    },
    mounted () {

    },
    methods: {},
    components: {}
  }
</script>

<style type="text/css">

</style>