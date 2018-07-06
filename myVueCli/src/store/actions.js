import * as api from '@/api/config-api-vue'
import app from '@/api/create-api'
// let myApp = this._vm
export default {
  GET ({commit, state, dispatch}, reqdata) {
    return new Promise((resolve, reject) => {
      app.get(api[reqdata.urlKey].url, {params: reqdata.data || {}}).then((data) => {
        resolve(data)
      }).catch((err) => {
        reject(err)
      })
    })
  },
  POST ({commit, state, dispatch}, reqdata) {
    if (reqdata instanceof Array) {
      let postArray = []
      let keyArray = []
      let response = {}
      reqdata.map(({urlKey = '', data = null, key = '', msgState = true}, index) => {
        reqdata[index].msgState = msgState
        postArray.push(app.post(api[urlKey].url, data || null))
        keyArray.push(key || urlKey || `pagedata${index}`)
      })
      return Promise.all(postArray).then(data => {
        let errState = true
        let errIndex = null
        data.forEach((item, key) => {
          response[keyArray[key]] = item
          if (item.code !== '0000' && errState) {
            errIndex = key
            errState = false
            response.message = item.message || '网络异常，请刷新重试！'
            response.status = '500'
          }
        })
        if (errState) {
          response.status = '200'
          response.message = 'OK'
        } else if (reqdata[errIndex].msgState) {
          this._vm.$mintUi.setNotice(true, response.message)
        }
        return response
      }).catch(error => {
        let message = (error && error.message) ? error.message : (typeof error === 'string' ? error : JSON.stringify(error))
        let status = (error && error.response) ? error.response.status : '500'
        this._vm.$mintUi.setNotice(true, error.message || '网络异常，请刷新重试！')
        return {status: status || '500', message: message}
      })
    } else {
      reqdata = Object.assign({}, {data: {}, msgState: true}, reqdata)
      return new Promise((resolve, reject) => {
        app.post(api[reqdata.urlKey].url, reqdata.data).then((data) => {
          if (data.code !== '0000' && reqdata.data.msgState) {
            this._vm.$mintUi.setNotice(true, data.message || '网络异常，请刷新重试！')
          }
          resolve(data)
        }).catch((error) => {
          this._vm.$mintUi.setNotice(true, error.message || '网络异常，请刷新重试！')
          reject(error)
        })
      })
    }
  },
  USER_INFO ({commit, state, dispatch}) {
    dispatch('POST', {urlKey: 'USER_INFO'}).then((data) => {
      if (data.code === '0000') {
        commit('SET_USER_INFO', data.data)
      } else {
        commit('SET_USER_INFO', null)
      }
    }).catch((err) => {
      if (err && err.message) {
        this._vm.$mintUi.setNotice(true, err.message || '网络异常，请刷新重试！')
      }
      commit('SET_USER_INFO', null)
    })
  }
}
/* ALL ({commit, state, dispatch}, reqdata) {
  if (reqdata instanceof Array) {
    let postArray = []
    let keyArray = []
    let response = {}
    reqdata.forEach((item, index) => {
      item.url = api[item.urlKey].url
      postArray.push(item)
      keyArray.push(item.key || item.urlKey || `pagedata${index}`)
    })
    return new Promise((resolve, reject) => {
      app.all(reqdata).then((data) => {
        let errState = false
        let errIndex = null
        for (let i in data) {
          if (data[i].code !== '0000' && reqdata[i].data.msgState) {
            errState = true
            errIndex = i
          }
          response[keyArray[i]] = data[i]
        }
        if (errState) {
          this._vm.$mintUi.setNotice(true, data[errIndex].message || '网络异常，请刷新重试！')
        }
        resolve(response)
      }).catch((error) => {
        this._vm.$mintUi.setNotice(true, error.message || '网络异常，请刷新重试！')
        reject(error)
      })
    })
  } else {
    dispatch('POST', reqdata)
  }
}, */