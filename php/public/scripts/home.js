/**
 * 后台js入口文件
 *
 //配置requireJS
 //不符合amd格式的文件需要配置*/
require.config({
    paths: {
        'jquery': '../../libs/jquery/jquery-3.1.1',
        'bootstrap': '../../libs/bootstrap/js/bootstrap',
        'Tools': 'Tools'
      //  'echarts': '../../libs/chart/echarts'
    },
    shim: {
        bootstrap: {
            deps: ['jquery'],
            exports: 'bootstrap'
        }
    }
});
//加载demo模块，模块名就是文件名
/** preview上传预览
 * Redirect  跳转
 * page 分页
 * update 修改页面*/
require(['jquery', 'bootstrap'],function () {

});
require(['adv','login','register','birth','exam'], function (adv,login,register,b,e) {
    e.run();
    register.run();
    adv.run();
    login.run();
    b.birth();
});
require(['Redirect'], function (r) {
    r.run();
});




