import MintUI from 'mint-ui'

export default {
  /* 消息提示 */
  setNotice: (status, config) => {
    let defaultConfig = {
      message: '提示',
      position: 'middle',
      duration: 2500
    }
    if (typeof config === 'object') {
      defaultConfig = Object.assign({}, defaultConfig, config)
    } else {
      defaultConfig.message = config
    }
    if (status) {
      MintUI.Toast(defaultConfig)
    }
  },
  /* 加载 */
  setLoading: (status, config) => {
    let defaultConfig = {
      text: '加载中...',
      spinnerType: 'fading-circle'
    }
    if (typeof config === 'object') {
      defaultConfig = Object.assign({}, defaultConfig, config)
    } else {
      defaultConfig.text = config || '加载中...'
    }
    if (status) {
      MintUI.Indicator.open(defaultConfig)
    } else {
      MintUI.Indicator.close()
    }
  }
}
