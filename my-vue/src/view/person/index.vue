<template>
  <div>
    <ul class="flex flex-grow_1 f18">
      <li class="p10 bgcolor07">
        <router-link to="/person/flex" class="col01">flex布局</router-link>
      </li>
      <li class="p10 bgcolor07">
        <router-link to="/person/router" class="col01">嵌套路由</router-link>
      </li>
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
        title: 'index',
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