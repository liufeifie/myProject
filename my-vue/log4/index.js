function saveInfo (type, data) {
  let len = 0
  for (let i in window.sessionStorage) {
    if (i.indexOf('susInfo') !== -1 || i.indexOf('errInfo') !== -1) {
      len++
    }
  }
  try {
    if (len > 50) {
      for (let i in window.sessionStorage) {
        if (i.indexOf('susInfo') !== -1 || i.indexOf('errInfo') !== -1) {
          window.sessionStorage.removeItem(i)
        }
      }
      window.sessionStorage.setItem(type + '0', JSON.stringify(data))
    } else {
      window.sessionStorage.setItem(type + len, JSON.stringify(data))
    }
  } catch (oException) {
    if (oException.name === 'QuotaExceededError') {
      // 如果历史信息不重要了，可清空后再设置
      if (window.confirm('sessionStorage超出本地存储限额,清除后再存储!')) {
        for (let i in window.sessionStorage) {
          if (i.indexOf('susInfo') !== -1 || i.indexOf('errInfo')) {
            window.sessionStorage.removeItem(i)
          }
        }
        window.sessionStorage.setItem(type + len, JSON.stringify(data))
      }
    }
  }
}
module.exports = {
  logErr (key, rout, reqTime, options, resData) {
    // console.error('err', key, rout, reqTime, options, resData)
    if (typeof window !== 'undefined' && window._devtools) {
      let errInfo = {
        key: key, rout: rout, reqTime: reqTime, options: options, resData: resData
      }
      saveInfo('errInfo', errInfo)
    }
  },
  logInfo (key, rout, reqTime, options, resData) {
    // console.info('info', key, rout, reqTime, options, resData)
    if (typeof window !== 'undefined' && window._devtools) {
      let susInfo = {
        key: key, rout: rout, reqTime: reqTime, options: options, resData: resData
      }
      saveInfo('susInfo', susInfo)
    }
  }
}