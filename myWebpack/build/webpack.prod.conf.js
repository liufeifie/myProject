const webpack = require('webpack')
const path = require('path')
const HtmlWebpackPlugin = require('html-webpack-plugin')

function resolve(dir) {
  return path.resolve(__dirname, '..', dir)
}
module.exports = {
  watch: true,
  watchOptions: {
    ignored: '/node_modules/'
  },
  entry: {
    main: resolve('main.js')
  },
  output: {
    path: resolve('dist'),
    filename: '[name]-[chunkhash:8].js'
  },
  plugins: [
    new HtmlWebpackPlugin({
      filename: './index.html',
      template: './src/index.html',
      inject: true
    })
  ]
}