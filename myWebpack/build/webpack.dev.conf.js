const webpack = require('webpack')
const path = require('path')
const htmlWebpackPlugin = require('html-webpack-plugin')

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
    filename: '[name].js'
  },
  plugins: [
    new htmlWebpackPlugin({
      filename: './index.html',
      template: './src/index.html',
      inject: true
    })
  ],
  devServer: {
    clientLogLevel: 'warning',
   /* historyApiFallback: { rewrites: [
        { from: /.*!/, to: './src/index.html'},
      ]
    },*/
    historyApiFallback: true,
    // hot: true,
    contentBase:  path.join(__dirname, "src"),
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