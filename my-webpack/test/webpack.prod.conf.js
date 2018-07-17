const path = require('path')
const HtmlWebpackPlugin = require('html-webpack-plugin')
const ExtractTextPlugin = require('extract-text-webpack-plugin')
const CleanWebpackPlugin = require('clean-webpack-plugin')


function resolve(dir) {
  return path.resolve(__dirname, '..', dir)
}
module.exports = {
  // context: resolve('./'),
  entry: {
    index: resolve('./test/test.js')
  },
  output: {
    path: resolve('./test/dist'),
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
        include: resolve('./test')
      }
    ]
  },
  plugins: [
    new ExtractTextPlugin("./css/[name]-[contenthash:8].css"),
    new HtmlWebpackPlugin({
      filename: './index.html',
      template: './test/index.html',
      inject: true,
      hash: true
    }),
    new CleanWebpackPlugin(resolve('./test/dist'), {
      root: resolve('./'),
      verbose: true,
      dry: false
    })
  ]
}