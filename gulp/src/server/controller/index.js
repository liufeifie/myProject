const {http} = require('../api/http-server')

function render (cookie) {
  return http(cookie, 'province').then((data) => {
    try {
      let renderHtml = ''
      for (let i = 0; i < data.message.length; i++) {
        renderHtml += '<li>'
        renderHtml += '<span class="wp20 inline-block">' + data.message[i].code + '</span>' +
            '<span class="wp20 inline-block">' + data.message[i].name + '</span>'
        renderHtml += '</li>'
      }
      return {
        code: 200,
        message: renderHtml
      }
    } catch (e){
      return {
        code: 500,
        message: __filename + '控制器拼接字符串错误：' + e.message
      }
    }
  }).catch((err)=>{
    console.error(err)
    return {
      code: err.code,
      message: __filename + '控制器发送请求错误：' + err.message
    }
  })
}

module.exports = {
  name: '{{province}}',
  http: render
}