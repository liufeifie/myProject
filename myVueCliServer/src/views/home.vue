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
import axios from 'axios'
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
    console.log(axios)
    const instance = axios.create({
      /* baseURL: 'http://www.server.com', */
      timeout: 50000,
      // headers: {'Content-Type': 'application/json;charset=UTF-8'}
      headers: {'Content-Type': 'application/x-www-form-urlencoded'}
    })
    instance.interceptors.response.use((res) => {
      if (res.status >= 200 && res.status < 300) {
        return res
      }
      return Promise.reject(res)
    }, (error) => {
      return Promise.reject({message: error.message || '网络异常，请刷新重试', code: 404})
    })
    instance.get('api/index.php').then(res => {
      console.log(res)
    }).catch((error) => {
      console.log(error)
    })
  },
  methods: {},
  components: {}
}
</script>

<style type="text/css">

</style>
