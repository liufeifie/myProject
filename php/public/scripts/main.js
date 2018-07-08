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
require(['admin','birth','jquery', 'bootstrap'], function (a,b) {
    b.birth();
    a.run();
    a.checkll();
    a.page();
    a.hide();
});
/*预览*/
require(['preview'], function (p) {
    p.run();
});
/*进度条*/
require(['Redirect'], function (r) {
    r.run();
});
/*require(['preview','page','allCheck','jquery', 'bootstrap'], function (p,page,c) {
    p.run();
    page.run();
    c.run();

});*/
/*require(['preview'], function (p) {
 p.run();
 });*/
/* require(['page'], function (page) {
 page.run();
 });*/
/* require(['allCheck'], function (c) {
 c.run();
 });*/


