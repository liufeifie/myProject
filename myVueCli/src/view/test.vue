<template>
  <div>
     <iframe :src="pdfPath1" frameborder="0"></iframe>
    <pdf v-show="pdfShow"
         :page="numPages"
         @page-loaded="currentPage"
         :src="pdfPath"></pdf>
    <div class="f12 text-center pdf-container" v-show="btnShow">
      <span @click="up" class="bgcolor07 wb30 inline-block h2_8 line2_9">上一页</span>
      <span @click="down" class="bgcolor07 wb30 inline-block h2_8 line2_9">下一页</span>
    </div>
  </div>
</template>
<script>
  import pdf from 'vue-pdf'

  export default {
    data: () => {
      return {
        pdfShow: true,
        btnShow: false,
        numPages: 1,
        timer: {},
        pdfPath: '',
        pdfPath1: '',
        ios: false,
        android: false
      }
    },
    pageConfig () {
      return {
        title: '资料查看',
        bodyStyle: 'background-color: #f3f3f3;'
      }
    },
    created () {},
    mounted () {
      this.pdfPath = '//cdn.mozilla.net/pdfjs/tracemonkey.pdf' // encodeURIComponent /attach/attach/201806/fund_attach20180625.pdf
      // this.pdfPath = '/api/attach/attach/201806/fund_attach20180625.pdf' // encodeURIComponent /attach/attach/201806/fund_attach20180625.pdf
      this.pdfPath1 = 'http://10.12.5.102:8082/attach/attach/201806/fund_attach20180625.pdf' // encodeURIComponent /attach/attach/201806/fund_attach20180625.pdf
      this.$mintUi.setLoading(true)
    },
    methods: {
      currentPage (a) {
        this.btnShow = true
        this.$mintUi.setLoading(false)
      },
      up () {
        this.numPages--
        if (this.numPages <= 1) {
          this.numPages = 1
        }
        console.log(this.numPages)
      },
      down () {
        this.numPages++
        if (this.numPages >= 5) {
          this.numPages = 5
        }
        console.log(this.numPages)
      }
    },
    components: {pdf}
  }
</script>

<style type="text/css">

</style>