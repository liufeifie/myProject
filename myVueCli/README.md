# my-vue-cli
vue-cli脚手架结合vue-store, vue-router, axios, Minut-ui封装的项目
> study vue-cli

## 安装依赖

``` bash
# install dependencies
npm install 
安装依赖或者解压目录下的node-modules压缩包

# serve with hot reload at localhost:8084

npm run dev
运行项目

# build for production with minification
npm run build
打包项目
```
## 项目简介
```
当前目录下的文件
    config 此目录下新加一个config.json文件
             "hostApi": "http://10.12.5.102:8084/", // 请求接口地址
             "port": 8084, // 本地运行的端口号
    log4 此目录是请求接口打印日志，日志保存在window.sessionStorage里面
```
For a detailed explanation on how things work, check out the [guide](http://vuejs-templates.github.io/webpack/) and [docs for vue-loader](http://vuejs.github.io/vue-loader).
