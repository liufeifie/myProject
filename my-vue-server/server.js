const express = require('express')
const fs = require('fs')
const path = require('path')
const proxy = require('http-proxy-middleware')
const cookie = require('cookie-parser')
const config = require('./config')
const { createBundleRenderer } = require('vue-server-renderer')
// html-minifier来实现HTML文件压缩
const { minify } = require('html-minifier')
const app = express()
const resolve = file => path.resolve(__dirname, file)

const renderer = createBundleRenderer(require('./dist/vue-ssr-server-bundle.json'), {
  runInNewContext: false,
  template: fs.readFileSync(resolve('./index.template.html'), 'utf-8'),
  clientManifest: require('./dist/vue-ssr-client-manifest.json'),
  basedir: resolve('./dist')
})
app.use(express.static(path.join(__dirname, 'dist')))
app.use(cookie())

// 跨域代理
let proxyKey = Object.keys(config.dev.proxyTable)
if (proxyKey.length) {
  proxyKey.forEach((item) => {
    app.use(item, proxy(config.dev.proxyTable[item]))
  })
}

app.get('*', (req, res) => {
  res.setHeader('Content-Type', 'text/html')
  const handleError = err => {
    if (err.url) {
      res.redirect(err.url)
    } else if (err.code === 404) {
      res.status(404).send('404 | Page Not Found')
    } else {
      res.status(500).send('500 | Internal Server Error')
      console.error(`error during render : ${req.url}`)
      console.error('err.stack: ', err.stack)
    }
  }

  // 设置cookie
  res.cookie('token', '15555977387', { expires: new Date(Date.now() + 900000), httpOnly: true });
  const context = {
    title: '小火柴的前端小站',
    url: req.url,
    cookie: req.cookies
  }
  renderer.renderToString(context, (err, html) => {
    if (err) {
      return handleError(err)
    }
    res.send(minify(html, { collapseWhitespace: true, minifyCSS: true}))
  })
})

app.on('error', err => console.log(err))
app.listen(config.dev.port, () => {
  console.log(`vue ssr started at localhost: ${config.dev.port}`)
})
