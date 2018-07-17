let info = {
  title: 'vue项目',
  description: '',
  keywords: '',
  bodyStyle: '',
  bodyClass: ''
}
function getPageConfig (vm) {
  const {pageConfig} = vm.$options
  if (pageConfig) {
    return typeof pageConfig === 'function'
      ? Object.assign({}, info, pageConfig.call(vm))
      : Object.assign({}, info, pageConfig)
  }
}

const serverTitleMixin = {
  created () {
    const pageConfig = getPageConfig(this)
    if (pageConfig) {
      this.$ssrContext.title = `${pageConfig.title || '...'}`
      this.$ssrContext.keywords = `${pageConfig.keywords}`
      this.$ssrContext.description = `${pageConfig.description}`
      this.$ssrContext.bodyStyle = `${pageConfig.bodyStyle}`
      this.$ssrContext.bodyClass = `${pageConfig.bodyClass}`
      // this.$ssrContext.pageTitle = `${pageConfig.title}`
      this.$store.commit('PAGE_TITLE', pageConfig.pageTitle || pageConfig.title)
      // console.log('this.$store.state.useragent_________________',this.$store.state.useragent)
      this.$store.commit('BROSWER_TYPE', this.checkBrowser(this.$store.state.useragent))
    }
  }
}
function csetTitie (that) {
  const pageConfig = getPageConfig(that)
  if (pageConfig) {
    document.title = `${pageConfig.title}`
    document.querySelector('meta[name="description"]').setAttribute('content', `${pageConfig.description}`)
    document.querySelector('meta[name="keywords"]').setAttribute('content', `${pageConfig.keywords}`)
    that.$store.commit('PAGE_TITLE', pageConfig.title)
    document.getElementsByTagName('body')[0].setAttribute('style', pageConfig.bodyStyle)
    document.getElementsByTagName('body')[0].setAttribute('class', `${pageConfig.bodyClass}`)
  }
}

const clientTitleMixin = {
  created () {
    if (typeof window !== 'undefined') {
      csetTitie(this)
    }
  }
}

export default clientTitleMixin
