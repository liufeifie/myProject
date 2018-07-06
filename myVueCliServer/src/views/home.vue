<template>
  <div>
    <h1>首页</h1>
    <h1>首页11</h1>
    <h1>首页11</h1>
    <h1>首页11</h1>
    <h1>首页11</h1>
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
      title: 'home',
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
