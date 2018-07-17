'use strict'
const utils = require('./utils')
const webpack = require('webpack')
const config = require('../config')
const merge = require('webpack-merge')
const path = require('path')
const baseWebpackConfig = require('./webpack.base.conf')
const CopyWebpackPlugin = require('copy-webpack-plugin')
const HtmlWebpackPlugin = require('html-webpack-plugin')
const FriendlyErrorsPlugin = require('friendly-errors-webpack-plugin')
const portfinder = require('portfinder')

const HOST = process.env.HOST
const PORT = process.env.PORT && Number(process.env.PORT)

const devWebpackConfig = merge(baseWebpackConfig, {
  module: {
    rules: utils.styleLoaders({ sourceMap: config.dev.cssSourceMap, usePostCSS: true })
  },
  // cheap-module-eval-source-map is faster for development
  devtool: config.dev.devtool,

  // these devServer options should be customized in /config/index1.js
  devServer: {
    /* before(app){
      console.log('服务开启前:', app)
    }, */
    clientLogLevel: 'warning',
    historyApiFallback: { // 如果为 true ，页面出错不会弹出 404 页面。
                          // 如果为 {...} , 看看一般里面有什么。
      rewrites: [
        { from: /.*/, to: path.posix.join(config.dev.assetsPublicPath, 'index.html') },
      ],
    },
    hot: true, // 热模块更新作用。即修改或模块后，保存会自动更新，页面不用刷新呈现最新的效果。
    contentBase: false, // since we use CopyWebpackPlugin.
    compress: true, // 如果为 true ，开启虚拟服务器时，为你的代码进行压缩。加快开发流程和优化的作用。
    host: HOST || config.dev.host,
    port: PORT || config.dev.port,
    open: config.dev.autoOpenBrowser, // true，则自动打开浏览器。
    overlay: config.dev.errorOverlay // 如果为 true ，在浏览器上全屏显示编译的errors或warnings。默认 false （关闭）
                                    // 如果你只想看 error ，不想看 warning。
      ? { warnings: false, errors: true }
      : false,
    // 配置了 publicPath后， url = '主机名' + 'publicPath配置的' +'原来的url.path'。这个其实与 output.publicPath 用法大同小异。
    // output.publicPath 是作用于 js, css, img 。而 devServer.publicPath 则作用于请求路径上的。
    publicPath: config.dev.assetsPublicPath,
    // 当您有一个单独的API后端开发服务器，并且想要在同一个域上发送API请求时，则代理这些 url 。
    proxy: config.dev.proxyTable,
    quiet: true, // necessary for FriendlyErrorsPlugin true，则终端输出的只有初始启动信息。 webpack 的警告和错误是不输出到终端的。
    watchOptions: { // 一组自定义的监听模式，用来监听文件是否被改动过。
      poll: config.dev.poll,
      /*
        // 一旦第一个文件改变，在重建之前添加一个延迟。填以毫秒为单位的数字。
        aggregateTimeout: 300,
        // 填以毫秒为单位的数字。每隔（你设定的）多少时间查一下有没有文件改动过。不想启用也可以填false。
        poll: 1000，
        // 观察许多文件系统会导致大量的CPU或内存使用量。可以排除一个巨大的文件夹。
        ignored: /node_modules/
      * */
    }
  },
  plugins: [
    new webpack.DefinePlugin({
      'process.env': require('../config/dev.env')
    }),
    new webpack.HotModuleReplacementPlugin(), // 热更新
    new webpack.NamedModulesPlugin(), // HMR shows correct file names in console on update. 当开启 HMR 的时候使用该插件会显示模块的相对路径，建议用于开发环境
    new webpack.NoEmitOnErrorsPlugin(), // 在编译出现错误时，使用 NoEmitOnErrorsPlugin 来跳过输出阶段。这样可以确保输出资源不会包含错误。对于所有资源，统计资料(stat)的 emitted 标识都是 false。
    // https://github.com/ampedandwired/html-webpack-plugin
    new HtmlWebpackPlugin({
      filename: 'index.html',
      template: 'index.html',
      // favicon: path.resolve('logo.ico'), // 引入图片地址
      inject: true
    }),
    // copy custom static assets
    new CopyWebpackPlugin([
      {
        from: path.resolve(__dirname, '../static'),
        to: config.dev.assetsSubDirectory,
        ignore: ['.*']
      }
    ])
  ]
})

module.exports = new Promise((resolve, reject) => {
  portfinder.basePort = process.env.PORT || config.dev.port
  portfinder.getPort((err, port) => {
    if (err) {
      reject(err)
    } else {
      // publish the new Port, necessary for e2e tests
      process.env.PORT = port
      // add port to devServer config
      devWebpackConfig.devServer.port = port

      // Add FriendlyErrorsPlugin
      devWebpackConfig.plugins.push(new FriendlyErrorsPlugin({
        compilationSuccessInfo: {
          // messages: [`Your application is running here: http://${devWebpackConfig.devServer.host}:${port}`],
          messages: [`Your application is running here: http://localhost:${port}`],
        },
        onErrors: config.dev.notifyOnErrors
        ? utils.createNotifierCallback()
        : undefined
      }))

      resolve(devWebpackConfig)
    }
  })
})
