let {logErr, logInfo} = require('../../log4')
const axios = require('axios')
const qs = require('querystring')
const methods = require('../util/methods').default.methods
const config = require('../../config/config')

/* Content-Type: application/json;charset=UTF-8
Content-Type': 'application/x-www-form-urlencoded */


const instance = axios.create({
  baseURL: config.hostApi,
  timeout: 50000,
  // headers: {'Content-Type': 'application/json;charset=UTF-8'}
  headers: {'Content-Type': 'application/x-www-form-urlencoded'}
})

// 拦截器
instance.interceptors.response.use((res) => {
  if (res.status >= 200 && res.status < 300) {
    return res
  }
  return Promise.reject(res)
}, (error) => {
  return Promise.reject({message: error.message || '网络异常，请刷新重试', code: 404})
})

let token = ''
if (typeof document !== 'undefined') {
  token = methods.getCookie('token') || ''
}
const option = {
  netNo: 'wechat',
  token: token,
  appversion: 'v1.0'
}

export default {
  get: (urls, params) => {
    return new Promise((resolve, reject) => {
      instance.get(urls, params).then(res => {
        resolve(res.data)
      }).catch((error) => {
        reject(error)
      })
    })
  },
  post: (urls, data) => {
    data = Object.assign({}, option, data)
    let date = new Date()
    let y = date.getFullYear()
    let m = date.getMonth() + 1
    m = m < 10 ? '0' + m : m
    let d = date.getDate()
    d = d < 10 ? '0' + d : d
    let h = date.getHours()
    h = h < 10 ? '0' + h : h
    let min = date.getMinutes()
    min = min < 10 ? '0' + min : min
    let s = date.getSeconds()
    s = s < 10 ? '0' + s : s
    let reqTime = y + '-' + m + '-' + d + ' ' + h + ':' + min + ':' + s
    return new Promise((resolve, reject) => {
      instance.post(urls, qs.stringify(data)).then(res => {
        if (res.data.code === '0000') {
          logInfo('SEND_START', urls, reqTime, data, res.data)
        } else {
          logErr('SEND_END', urls, reqTime, data, res.data.message)
        }
        resolve(res.data)
      }).catch((error) => {
        logErr('SEND_END', urls, reqTime, data, error)
        reject(error)
      })
    })
  }
}
/*,
  all: (reqdata) => {
    let postArr = []
    for (let i in reqdata) {
      reqdata[i].data = Object.assign({}, option, reqdata[i].data)
      postArr.push = instance.post(reqdata[i].url, qs.stringify(reqdata[i].data))
    }
    return new Promise((resolve, reject) => {
      instance.all(postArr).then((res) => {
        resolve(res.data)
      }).catch(error => {
        reject(error)
      })
    })
  } */