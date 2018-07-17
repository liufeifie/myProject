const webpack = require('webpack')
const path = require('path')
const HtmlWebpackPlugin = require('html-webpack-plugin')
const ExtractTextPlugin = require('extract-text-webpack-plugin')

function resolve (dir) {
  return path.resolve(__dirname, '..', dir)
}

module.exports = {
  watch: true,
  watchOptions: {
    ignored: '/node_modules/'
  },
  entry: {
    index: resolve('src/main.js')
  },
  output: {
    path: resolve('dist'),
    filename: '[name].js',
    publicPath: '/'
  },
  module: {
    rules: [
      {
        test: /\.(css)$/,
        use: ExtractTextPlugin.extract({
          use: {loader: 'css-loader', options: {minimize: true}}/*,
          fallback: 'style-loader'*/
        })
      }
    ]
  },
  plugins: [
    new HtmlWebpackPlugin({
      filename: 'index.html',
      template: './src/index.html',
      inject: true
    }),
    new ExtractTextPlugin("[name]-[contenthash:8].css")
  ],
  devServer: {
    clientLogLevel: 'warning',
    /* historyApiFallback: { rewrites: [
         { from: /.*!/, to: './src/index.html'},
       ]
     },*/
    historyApiFallback: true,
    // hot: true,
    contentBase: path.join(__dirname, 'src'),
    compress: true,
    host: '0.0.0.0',
    port: 8088,
    open: false,
    overlay: {
      warnings: true,
      errors: true
    },
    watchOptions: {
      poll: true
    }
  }
}