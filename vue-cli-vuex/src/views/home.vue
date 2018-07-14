<template>
  <div>
    <h1>home</h1>
    <ul>
      <router-link to="/person" tag="li">person</router-link>
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
        title: 'home',
        bodyStyle: 'background-color:  #fff;'
      }
    },
    beforeCreate () {
      console.log(document)
    },
    created () {
      this.$store.dispatch('FETCH', {
        urlKey: 'index',
        key: 'index'
      }).then(data => {
        console.log(data)
      })
    },
    mounted () {
      console.log(this.$store.getters['test'])
    },
    methods: {},
    components: {}
  }
</script>

<style type="text/css">

</style>