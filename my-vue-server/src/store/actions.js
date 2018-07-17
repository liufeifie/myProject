import { post, apiArr } from '../api'

export default {
  'FETCH': ({commit, state, dispatch}, reqData) => {
    console.log('请求参数', reqData)
    if (reqData instanceof Array) {
      let postArr = []
      reqData.forEach(({urlKey, key, msgState = true, data = {}}) => {
        postArr.push(post(apiArr[urlKey].url, data))
      })
      return Promise.all(postArr).then(data => {
        console.log('请求成功响应数据', data)
        data.forEach((item, key) => {
          if (item.code !== '0000' && reqData[key].msgState) {
            console.log(apiArr[reqData[key].urlKey] + '返回的错误:' + item.message)
          }
          if (reqData[key].key && item) commit('SERVER_DATA', { key: reqData[key].key, data: item })
        })
        return data
      }).catch(error => {
        console.log('请求失败错误信息', error, error.message)
        return {
          code: '9999',
          message: error.message
        }
      })
    } else {
      reqData = Object.assign({}, {data: {}, msgState: true}, reqData)
      return new Promise((resolve, reject) => {
        post(apiArr[reqData.urlKey].url, reqData.data).then(data => {
          console.log('请求成功响应数据', data)
          resolve(data)
        }).catch(error => {
          console.log('请求失败错误信息', error, error.message)
          reject({code: '9999', message: error.message})
        })
      })
    }
  }
}
