<template>
  <div id="app">
    <header style="height: 44px;background-color: cornflowerblue;"></header>
    <main style="height: 500px;">
      <router-view></router-view>
    </main>
    <footer style="height: 44px;background-color: #000;"></footer>
  </div>
</template>

<script>
export default {
  name: 'App'
}
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}
</style>
