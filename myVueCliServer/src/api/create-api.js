const axios = require('axios')
const qs = require('querystring')
// console.log('**************************api3', process.env.VUE_ENV, process.env.NODE_ENV)
let baseURL = 'http://www.server.com'
if (process.env.VUE_ENV === 'client') baseURL = '/api'
const instance = axios.create({
  baseURL: baseURL, // /api
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
  return Promise.reject({message: error.message || '网络异常，请刷新重试', code: 500})
})
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
    return new Promise((resolve, reject) => {
      instance.post(urls, qs.stringify(data)).then(res => {
        resolve(res.data)
      }).catch((error) => {
        reject(error)
      })
    })
  }
}
