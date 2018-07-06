<template>
  <div>
    <router-link to="/person">账户首页</router-link>
    <div>
      <!--capture表示的是系统所捕获的默认设备，camera：照相机；camcorder：摄像机；
      microphone：录音; 没有这个属性，默认调用照相机和相册-->
      <!--runat="server"直接回交服务器,处理数据,又以数据加密后的hidden属性的input控件插入回去,
      实现表单的状态保存-->
      <input runat="server" type="file" accept="image/*" capture="camcorder" style="width:100%">
    </div>
    <p>{{filterDate | dateFormat('Y-M-D')}}</p>
  </div>
</template>
<script>
  export default {
    data () {
      return {
        filterDate: new Date().getTime()
      }
    },
    pageConfig () {
      return {
        title: '首页',
        bodyStyle: 'background-color: #f3f3f3;'
      }
    },
    mounted () {
      // this.$mintUi.setNotice(true, '账户首页')
      console.log('userInfo', this.$store.getters['USER_INFO'])

    }
  }
</script>

<style type="text/css">

</style>
