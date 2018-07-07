<template>
  <div>
    <h1>个人</h1>
    <h1>个人11</h1>
    <h1>个人11</h1>
    <h1>个人11</h1>
    <h1>个人11</h1>
    <router-link to="/">首页</router-link>
    <p v-text="message"></p>
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
      title: 'person',
      bodyStyle: 'background-color:  #fff;'
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
