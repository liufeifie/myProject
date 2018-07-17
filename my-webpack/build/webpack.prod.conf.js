const webpack = require('webpack')
const path = require('path')
const HtmlWebpackPlugin = require('html-webpack-plugin')
const ExtractTextPlugin = require('extract-text-webpack-plugin')
const CleanWebpackPlugin = require('clean-webpack-plugin')
const OptimizeCSSPlugin = require('optimize-css-assets-webpack-plugin')
const UglifyJsPlugin = require('uglifyjs-webpack-plugin')


function resolve(dir) {
  return path.resolve(__dirname, '..', dir)
}
module.exports = {
  // context: resolve('./'),
  entry: {
    index: resolve('src/main.js')
  },
  output: {
    path: resolve('dist'),
    filename: '[name]-[chunkhash:8].js',
    publicPath: '',
    chunkFilename: '[name]-[chunkhash:8].js'
  },
  module: {
    rules: [
      {
        test: /\.(css)$/,
        exclude: /(node_modules)/,
        use: ExtractTextPlugin.extract({
          fallback: 'style-loader',
          use: [{
            loader: 'css-loader',
            options : {
              importLoaders: 1 // @import 引入的样式添加前缀
            }
          }, 'postcss-loader']
        })
      }, {
        test: /\.js$/,
        loader: 'babel-loader',
        include: resolve('src')
      }
    ]
  },
  plugins: [
    new OptimizeCSSPlugin(),
    new UglifyJsPlugin({
      uglifyOptions: {
        compress: {
          warnings: false,
          drop_debugger: true,
          drop_console: true
        }
      },
      sourceMap: true,
      parallel: true
    }),
    new ExtractTextPlugin("[name]-[contenthash:8].css"),
    new HtmlWebpackPlugin({
      filename: './index.html',
      template: './src/index.html',
      inject: true,
      hash: true
    }),
    new CleanWebpackPlugin(resolve('./dist'), {
      root: resolve('./'),
      verbose: true,
      dry: false
    })
  ]
}