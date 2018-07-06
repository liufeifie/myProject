const http = require('http');
const querystring = require('querystring');
const api = require('./api-config');
function webhttp (cookie, key) {
  //发送 http Post 请求
  console.log('cookie************',typeof cookie)
  let postData = querystring.stringify({
    key: 'value'
  });

  let options = {
    // hostname: 'http://10.12.8.62',
    port: 8088,
    path: api[key].url,
    method: 'get',
    // agent: false,
    /**
     * 如下特别的消息头应当注意：
     * 发送'Connection: keep-alive'头部将通知Node此连接将保持到下一次请求。
     * 发送'Content-length'头将使默认的分块编码无效。
     * 发送'Expect'头部将引起请求头部立即被发送。
     * 通常情况，当发送'Expect: 100-continue'时，你需要监听continue事件的同时设置超时。参见RFC2616 8.2.3章节以获得更多的信息。
     */
    headers: {
      //'Content-Type':'application/x-www-form-urlencoded',
      'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8',
      'Content-Length': Buffer.byteLength(postData)
    }
  }
  let requestData = ''
  let requestDataJson = null
  return new Promise((resolve, reject) => {
    let req = http.request(options, function (req) {
      console.log('Status:', req.statusCode);
      console.log('headers:', JSON.stringify(req.headers));
      req.setEncoding('utf-8');
      req.on('data', function (data) {
        requestData = data
      });
      req.on('end', function () {
        try {
          if (req.statusCode === 200) {
            // console.log('requestData', requestData)
            requestDataJson = JSON.parse(requestData)
            // console.info('requestDataJson', typeof requestDataJson)
            resolve({
              code: 200,
              message: requestDataJson
            })
          } else if (req.statusCode === 404) {
            reject({
              code: 404,
              message: '请求路径： ' + options.path + '; 不存在'
            })
          } else {
            reject({
              code: req.statusCode,
              message: 'http编码：' + req.statusCode
            })
          }
        } catch (e) {
          reject({
            code: req.statusCode,
            message: '请求结束后报错：' + e.message
          })
        }
        console.log('response 请求完毕');
      });
    });
    req.on('error', function (err) {
      reject({
        code: req.statusCode,
        message: '请求报错：' + err.message
      })
      console.error('error：错误提示：', err.message);
    });
    req.write(postData); // 发送请求参数
    req.end();
  })
}

module.exports = {
  http: webhttp
}

