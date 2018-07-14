<template>
  <div>
    <h1>activity</h1>
    <ul>
      <router-link to="/" tag="li">home</router-link>
      <router-link to="/person" tag="li">person</router-link>
      <router-link to="/product" tag="li">product</router-link>
    </ul>
  </div>
</template>
<script>
  export default {
    data: () => {
      return {}
    },
    pageConfig () {
      return {
        title: 'activity',
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