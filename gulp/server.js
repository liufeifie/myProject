const express = require('express');
const nodehttp = require('http')
const fs = require('fs');
const path = require('path');
const app = express();
const router = require('./src/server/router/');
const config = require('./config');

// res.render() 渲染 HTML
/*URL跳转方法res.location()和res.redirect()*/
app.set('port', process.env.port || config.port)
// 设置视图文件 目录
app.set('views', path.join(__dirname, config.baseDir))
// 设置静态资源 目录
app.use(express.static(path.join(__dirname, config.staticDir)))
/*使用 默认使用的是jade模板引擎，ejs使用html自身做为模板语言。*/
app.engine('.html', require('ejs').__express);
app.set('view engine', 'html');

//module.exports = function server() {
let routers = []
let date = new Date()
let nowTime = '' + date.getFullYear() + '-' + addZero(date.getMonth()) + '-' + addZero(date.getDate()) +
    ' ' + addZero(date.getHours()) + ':' + addZero(date.getMinutes()) + ':' + addZero(date.getSeconds())
// 设置跨域访问
/*app.all('*', function (req, res, next) {
 res.header("Access-Control-Allow-Origin", "*");
 res.header("Access-Control-Allow-Headers", "X-Requested-With");
 res.header("Access-Control-Allow-Methods", "PUT,POST,GET,DELETE,OPTIONS");
 res.header("X-Powered-By", ' 3.2.1');
 res.header("Content-Type", "application/json;charset=utf-8");
 next();
 });*/
const util = require('util');
const cookieParser = require('cookie-parser');
app.use(cookieParser())
app.get('*', function (req, res) {
  let cookie = util.inspect(req.cookies)
  routers = router.filter(function (item, key) {
    return req.path === item.path
  })
  let template = ''
  if (routers.length > 1) {
    template = routers[0].template
    console.error('路由重复', routers)
  } else if (routers.length === 1) {
    template = routers[0].template
    console.log('当前访问路径：', routers[0])
  } else {
    template = '404'
    /*if (req.path.indexOf('static') === -1) {
     template = '404'
     console.error(req.path, '当前页面不存在')
     }*/
  }
  console.info('当前页面访问的路由', req.path, template, routers[0])
  res.render(template, function (err, html) {
    if (err) {
      serverErr({code: 500, message: '服务端错误提示：' + err.message})
    } else {
      if (template === '404') {
        html += ''
        html = html.replace('{{server_error}}', '当前路径：' + req.path + ' 不存在')
        html = html.replace('{{server_time}}', nowTime)
        res.status(404).send(html);
      } else {
        // 控制器 服务端 渲染
        if (routers[0].controller) {
          // serverErr({code: 500, message: '网络延迟，请稍后刷新！'})
          let controller = require(`./src/server/controller/${routers[0].controller}`);
          controller.http(cookie).then((data) => {
            if (data.code === 200) {
              html = html.replace(controller.name, data.message)
              sendHtmlStr(html, routers)
            } else {
              serverErr(data)
            }
          }).catch((err)=>{
            serverErr({code: 500, message: err.message})
          })
        } else {
          sendHtmlStr(html, routers)
        }
      }
    }
  });

  // 渲染 html
  function sendHtmlStr (html, routers) {
    // head 里面引入公共的 css  js 文件
    let head = '' +
        '<link rel="stylesheet" href="/css/reset.min.css" type="text/css">' +
        '<link rel="stylesheet" href="/css/common.min.css" type="text/css">' +
        '<script src="/js/plugin.min.js"></script>' +
        '<script src="/js/reset.min.js"></script>'
    let headIndex = html.lastIndexOf('</head>')
    html = html.substring(0, headIndex) + head + html.substring(headIndex)
    // 头部公用部分
    let header = '<div id="mainContent"><div class="boxContent">'
    // 尾部公用
    let footer = '</div></div>'
    if (typeof routers[0].meta === 'object') {
      // 是否引用头部
      if (routers[0].meta.header) {
        res.render('public/header', function (err, htmlHeader) {
          header = htmlHeader + header
          //html = html.replace(/\{\{header\}\}/g, htmlHeader)
        })
      }
      // 是否引用尾部
      if (routers[0].meta.footer) {
        res.render('public/footer', function (err, htmlFooter) {
          footer += htmlFooter
          //html = html.replace(/\{\{footer\}\}/g, htmlFooter)
        })
      }
    }
    html.replace(/<body.*?>/, function ($0, $1) {
      html = html.substring(0, $1 + $0.length) + header + html.substring($1 + $0.length)
    })
    let footerIndex = html.lastIndexOf('</body>')
    html = html.substring(0, footerIndex) + footer + html.substring(footerIndex)
    res.send(html)
  }
  // 服务器 错误提示
  function serverErr (err) {
    res.render('500', function (errInfo, errHtml) {
      errHtml += ''
      errHtml = errHtml.replace('{{server_error}}', err.message)
      errHtml = errHtml.replace('{{server_time}}', nowTime)
      res.status(500).send(errHtml);
    });
  }
})


/* let server = app.listen(app.get('port'), function () {
 let port = server.address().port
 console.log("应用实例，访问地址为 http://localhost:" + port)
 })*/
nodehttp.createServer(app).listen(app.get('port'), () => {
  console.log("project start！访问地址为 http://localhost:" + app.get('port'))
})


/**
 *  小于10  前面加 0
 * */
function addZero (val) {
  if (!val && parseInt(val) !== 0) return val
  if (val < 10) return '0' + val
  return val
}
