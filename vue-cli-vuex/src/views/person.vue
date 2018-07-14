<template>
  <div>
    <h1>person</h1>
    <ul>
      <router-link to="/" tag="li">home</router-link>
      <router-link to="/product" tag="li">product</router-link>
      <router-link to="/activity" tag="li">activity</router-link>
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