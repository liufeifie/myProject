const titleConfig = {
  title: '...',
  description: '',
  keywords: '',
  bodyStyle: '',
  bodyClass: ''
}

function getPageConfig (vm) {
  const { pageConfig } = vm.$options
  if (pageConfig) {
    return typeof pageConfig === 'function'
       ? Object.assign({}, titleConfig, pageConfig.call(vm))
       : Object.assign({}, titleConfig, pageConfig)
  }
}

function setTitle (that) {
  const pageConfig = getPageConfig(that)
  if (pageConfig) {
    document.title = `${pageConfig.title}`
    document.querySelector('meta[name="description"]').setAttribute('content', `${pageConfig.description}`)
    document.querySelector('meta[name="keywords"]').setAttribute('content', `${pageConfig.keywords}`)
    document.getElementsByTagName('body')[0].setAttribute('style', pageConfig.bodyStyle)
    if (pageConfig.bodyClass) {
      document.getElementsByTagName('body')[0].setAttribute('class', `${pageConfig.bodyClass}`)
    } else {
      document.getElementsByTagName('body')[0].removeAttribute('class')
    }
  }
}

export default {
  beforeCreate () {
    if (typeof window !== 'undefined') {
      setTitle(this)
    }
  }
}
