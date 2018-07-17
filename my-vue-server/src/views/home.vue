<template>
  <div>
    <h1>首页</h1>
    <h1>首页11</h1>
    <h1>首页11</h1>
    <h1>首页11</h1>
    <h1>首页11</h1>
    <router-link to="/person">个人</router-link>
    <p v-text="message"></p>
    <div>{{SERVER_DATA}}</div>
  </div>
</template>
<script>
export default {
  data: () => {
    return {
      message: new Date().getTime()
    }
  },
  pageConfig () {
    return {
      title: 'home',
      bodyStyle: 'background-color:  #fff;',
      SERVER_DATA: {}
    }
  },
  asyncData ({store, route}) {
    return store.dispatch('FETCH', [
      {
        urlKey: 'test',
        key: 'test'
      }, {
        urlKey: 'pcx',
        key: 'pcx'
      }
    ])
  },
  created () {
    console.log('home SERVER_DATA', this.$store.getters['SERVER_DATA']())
    this.SERVER_DATA = this.$store.getters['SERVER_DATA']()
  },
  mounted () {
    /* this.$store.dispatch('FETCH', [
      {
        urlKey: 'test',
        key: 'test'
      }, {
        urlKey: 'pcx',
        key: 'pcx'
      }
    ]).then(data => {
      console.log('测试', data)
    }) */
  },
  methods: {},
  components: {}
}
</script>

<style type="text/css">

</style>
