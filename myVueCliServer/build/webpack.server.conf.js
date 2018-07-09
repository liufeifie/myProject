const webpack = require('webpack')
const merge = require('webpack-merge')
const nodeExternals = require('webpack-node-externals')
const baseConfig = require('./webpack.base.conf.js')
const VueSSRServerPlugin = require('vue-server-renderer/server-plugin')

module.exports = merge(baseConfig, {
  entry: './src/entry-server.js',
  // 为了不把nodejs内置模块打包进输出文件中，例如： fs net模块等；
  target: 'node',
  devtool: 'source-map',
  output: {
    libraryTarget: 'commonjs2'
  },
  // 为了不把node_modeuls目录下的第三方模块打包进输出文件中
  externals: nodeExternals({
    whitelist: /\.css$/
  }),
  module: {
    rules: [
      /*{
        test: /\.js$/,
        use: ['babel-loader'],
        exclude: path.resolve(__dirname, 'node_modules')
      }, {
        //css代码不能被打包进用于服务端的代码中去，忽略掉css文件
        test: /\.css/,
        use: ["ignore-loader"]
      }*/
    ]
  },
  plugins: [
    new webpack.DefinePlugin({
      'process.env.NODE_ENV': JSON.stringify(process.env.NODE_ENV || 'development'),
      'process.env.VUE_ENV': '"server"'
    }),
    new VueSSRServerPlugin()
  ]
})