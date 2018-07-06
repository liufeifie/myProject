const gulp = require('gulp');
const express = require('gulp-express');
const fs = require('fs');
const buf = new Buffer(1024);
//静态服务器初始化 https://browsersync.io/docs/options
// const browserSync = require('browser-sync').create();


//压缩css文件  开发版=》客户版
const cleanCss = require('gulp-clean-css');
//压缩js文件  开发版=》客户版
const uglify = require('gulp-uglify');
//less===》css
const less = require('gulp-less');
//重命名
const rename = require('gulp-rename');
//合并文件，把也就是多个文件合并到一个文件中
const concat = require('gulp-concat');
// 同步操作
const sequence = require('gulp-sequence');

// 清除 目录
deleteFolder('./dist/')

//复制html文件
gulp.task('html', function () {
  gulp.src('./src/views/**/*.html')
      .pipe(gulp.dest('./dist/views/'));
});
//复制css文件
/*gulp.task('css', function () {
 gulp.src('./src/static/css/!**!/!*.css')
 .pipe(gulp.dest('./dist/static/css/'));
 });*/
//复制js文件
/*gulp.task('css', function () {
 gulp.src('./src/static/js/!**!/!*.js')
 .pipe(gulp.dest('./dist/static/js/'));
 });*/

let date = new Date()
let newName = '' + date.getFullYear() + addZero(date.getMonth()) + addZero(date.getDate())
newName = ''

// 合并 重置样式 css
gulp.task('concat-css', function () {
  // 合并css 文件
  gulp.src(["src/static/css/common/reset.css", "src/static/css/common/theme.css"])
      .pipe(cleanCss({compatibility: "ie7"}))
      .pipe(concat("reset.min.css"))
      .pipe(gulp.dest('./dist/static/css/'));
})
// less 编译
gulp.task('less-css', function () {
  // 编译less文件 多个文件以数组形式传入
  gulp.src('src/static/css/common/*.less')
      .pipe(concat("common.less"))
      .pipe(less())
      .pipe(cleanCss({compatibility: "ie7"}))
      .pipe(rename({prefix: newName, suffix: ".min"}))
      .pipe(gulp.dest('./dist/static/css/'));
});

// 复制文件 模板 js  css 文件
gulp.task('copy', function () {
  // 合并 plugin js文件
  gulp.src("src/static/plugin/**/*.js")
      .pipe(concat("plugin.js"))
      /*.pipe(uglify())*/
      //重命名    suffix:命名规则  后缀
      .pipe(rename({prefix: newName, suffix: ".min"}))
      .pipe(gulp.dest('./dist/static/js/'));
  // 合并 plugin css文件
  gulp.src("src/static/plugin/**/*.css")
      .pipe(concat("plugin.css"))
      .pipe(cleanCss({compatibility: "ie7"}))
      //重命名    suffix:命名规则  后缀
      .pipe(rename({prefix: newName, suffix: ".min"}))
      .pipe(gulp.dest('./dist/static/css/'));
  gulp.src("src/static/json/**/*.*")
      .pipe(gulp.dest("./dist/static/json/"))
})
//压缩样式表  输出
gulp.task('minify-css', function () {
  gulp.src(['./src/static/css/**/*.css', '!./src/static/css/common/*.css'])
  //兼容性
      .pipe(cleanCss({compatibility: "ie7"}))
      //重命名    suffix:命名规则  后缀
      .pipe(rename({prefix: newName, suffix: ".min"}))
      .pipe(gulp.dest('./dist/static/css/'));
});
gulp.task('concat-js', function () {
  // 合并js 文件
  gulp.src(["src/static/js/common/tool.js", "src/static/js/common/common.js"])
      .pipe(concat("reset.min.js"))
      .pipe(uglify())
      .pipe(gulp.dest('./dist/static/js/'));
})
//压缩脚本  输出
gulp.task('minify-js', function () {
  gulp.src(['./src/static/js/**/*.js', '!./src/static/js/common/*.js'])
      .pipe(uglify())
      //重命名    suffix:命名规则  后缀
      .pipe(rename({prefix: newName, suffix: ".min"}))
      .pipe(gulp.dest('./dist/static/js/'));
});
// 服务js文件变动
gulp.task('server-start', function () {
  express.run(['./server']);
  console.log('启动服务')
})
//监控事件
gulp.task('watch', function () {
  //监控文件            加载事件   **/*.*所有文件
  gulp.watch('src/views/**/*.html', ['html']); // 静态 文件
  gulp.watch('src/static/css/common/*.less', ['less-css']); // 编译less 合并公共 css
  gulp.watch('src/static/css/common/*.css', ['concat-css']); // 编译less 合并公共 css
  gulp.watch(['./src/static/css/**/*.css', '!./src/static/css/common/*.css'], ['minify-css']);// 压缩css
  gulp.watch('src/static/js/common/*.js', ['concat-js']); // 压缩js
  gulp.watch(['src/static/js/**/*.js', '!src/static/js/common/*.js'], ['minify-js']); // 压缩js
  gulp.watch('./src/server/**/*.js', ['server-start'])
});
gulp.task('default', sequence('concat-css', 'concat-js',  'less-css', ['copy', 'html', 'minify-css', 'minify-js', 'server-start', 'watch']));


// 方法
/**
 *  删除 目录 文件
 * */
function deleteFolder (path) {
  let files = []
  if (fs.existsSync(path)) {
    files = fs.readdirSync(path)
    if (files.length) {
      files.forEach(function (file, key) {
        let curPath = path.replace(/\/$/, '') + '/' + file
        if (fs.statSync(curPath).isDirectory()) {
          deleteFolder(curPath)
        } else {
          fs.unlinkSync(curPath)
        }
      })
    } else {
      fs.rmdirSync(path)
    }
  } else {
    console.log(path + '不存在,不需要删除')
  }
}

/**
 *  小于10  前面加 0
 * */
function addZero (val) {
  if (!val) return val
  if (val < 10) return '0' + val
  return val
}


/**
 * 文件 写入方法
 * */
function fsFun (req) {
  let d = new Date()
  let dirName = './log/'
  let fileDir = dirName + d.getFullYear() + addZero(d.getMonth() + 1) + addZero(d.getDate()) + '.log'
  fs.exists(dirName, function (dir) {
    if (!dir) {
      fs.mkdirSync(dirName, function (err) {
        if (err) return console.error(err);
        console.log(dirName + "目录创建成功。");
      });
    }
    fs.open(fileDir, 'a+', function (err, fd) {
      if (err) return console.error(fileDir + '文件打开失败', err);
      // 读取文件内容
      // let content = fs.readFileSync(fileDir, 'utf-8');
      // console.log('req的内容');
      fs.writeFile(fileDir, req + '\n', {encoding: 'utf8', mode: '0666 ', flag: 'a'}, function (err) {
        if (err) {
          return console.error('数据写入失败', err)
        }
        console.log("数据写入成功！");
        // 关闭文件
        fs.close(fd, function (err) {
          if (err) {
            console.log(fileDir + '文件关闭失败', err);
          }
          console.log(fileDir + "文件关闭成功");
        });
      });
    });
  })
}
