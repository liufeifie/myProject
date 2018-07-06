<template>
  <div class="bgcolor03 ml15 mr15" style="height: 80rem;">
    <router-link to="/">网站首页</router-link>
  </div>
</template>
<script>
export default {
  data: () => {
    return {}
  },
  pageConfig () {
    return {
      title: '账户首页',
      bodyStyle: 'background-color: #f3f3f3;',
      bodyClass: 'personClass'
    }
  },
  mounted () {
    // this.$mintUi.setNotice(true, '账户首页')
    this.$store.commit('HEADER_LEFT', {
      html: '测试1',
      even: () => {
        console.log('测试')
      }
    })
    /* MY_FUND_LIST */
    this.$store.dispatch('POST', [
      {
        urlKey: 'TEST',
        key: 'test1',
        data: {
          id: 'test1'
        }
      }, {
        urlKey: 'MY_FUND_LIST',
        key: 'test2'
      }
    ]).then(data => {
      console.log(data)
      if (data.status === '200') {}
    }).catch(err => {
      this.$mintUi.setNotice(true, err.message || '网络异常，请刷新重试！')
    })
  }
}
</script>

<style type="text/css">
  .personClass header{
    background-color: transparent;
  }
  .personClass, .personClass header {
    background-image: url('../assets/image/bg.png');
    background-size: 100% auto;
    background-repeat: no-repeat;
  }
</style>