<?php
/* Smarty version 3.1.30, created on 2017-02-06 20:46:13
  from "D:\wamp\www\project\application\views\admin\admin.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58987015b50ca1_91049872',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5de13fe9ac7a196ece3de98f0255c0c223db7357' => 
    array (
      0 => 'D:\\wamp\\www\\project\\application\\views\\admin\\admin.html',
      1 => 1484288898,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:home/footer.html' => 1,
  ),
),false)) {
function content_58987015b50ca1_91049872 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台首页</title>
    <link href="libs/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="libs/bootstrap/css/bootstrap-theme.css" rel="stylesheet">
    <link href="public/styles/admin.css" rel="stylesheet">
    <link href="public/styles/Tools.css" rel="stylesheet">
    <?php echo '<script'; ?>
 src="libs/requireJS/require.js" data-main="public/scripts/main"><?php echo '</script'; ?>
>
    <!--<link rel="stylesheet" href="../../../libs/bootstrap/css/bootstrap.css">-->
</head>
<body>
<div class="container-fluid">
    <div class="row top">
        <div class="col-md-2 text-center">
            <span class="glyphicon glyphicon-th-list" id="list" title="隐藏菜单栏"></span>
        </div>
        <div class="col-md-2 text-center">
            <img src="public/images/logo01.png" title="210*60" class="imgLogo">
        </div>
        <div class="col-md-8 text-right">
                <a href="?a=admin" class="btn btn-primary">后台首页</a>
                <a href="?a=home" target="_blank" class="btn btn-primary">商城首页</a>
                <a href="?a=admin&m=deleteCache" class="btn btn-primary">删除缓存</a>
            <div class="dropdown" style="display:inline;">
                <button class="btn btn-primary" id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                    <span class="username">用户名: </span>
                    <span>
                        <?php echo $_SESSION['admin']->username;?>
<span class="caret"></span>
                    </span>
                </button>
                <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                    <li><a href=""><b>等级:</b><?php echo $_SESSION['admin']->level_id;?>
</a></li>
                    <li><a href="?a=user&m=logout"><b>注销账户</b></a></li>
                    <li><a href=""><b>登录ip:</b><?php echo $_SESSION['admin']->last_ip;?>
</a></li>
                    <li><a href=""><b>登录时间:</b><?php echo $_SESSION['admin']->last_time;?>
</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row middle">
        <div class="col-md-2 middleLeft" style=" width: 16.6%;">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <!--广告-->
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false"
                               aria-controls="collapseOne" class="collapsed">
                                广告设置
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel"
                         aria-labelledby="headingOne">               <!--in-->
                        <div class="panel-body">
                            <ul class="list-unstyled">
                                <li><a href="?a=ad&action=show" target="main">广告管理</a></li>
                                <li><a href="?a=ad&action=add" target="main">添加广告</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--导航-->
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingThree">
                        <h4 class="panel-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree"
                               aria-expanded="false" aria-controls="collapseThree">
                                导航设置
                            </a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel"
                         aria-labelledby="headingThree">
                        <div class="panel-body">
                            <ul class="list-unstyled">
                                <li><a href="?a=nav&action=show" target="main">管理导航</a></li>
                                <li><a href="?a=nav&action=showAllSubNav" target="main">所有子导航</a></li>
                                <li><a href="?a=nav&action=add" target="main">主导航
                                    <span class="glyphicon glyphicon-plus" title="添加主导航"></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--文章-->
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingFour">
                        <h4 class="panel-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour"
                               aria-expanded="false" aria-controls="collapseFour">
                                文章设置
                            </a>
                        </h4>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel"
                         aria-labelledby="headingFour">
                        <div class="panel-body">
                            <ul class="list-unstyled">
                                <li><a href="?a=article&action=show" target="main">管理文章</a></li>
                                <li><a href="?a=article&action=add" target="main">添加文章</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--试题-->
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingFive">
                        <h4 class="panel-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive"
                               aria-expanded="false" aria-controls="collapseFive">
                                试题设置
                            </a>
                        </h4>
                    </div>
                    <div id="collapseFive" class="panel-collapse collapse in" role="tabpanel"
                         aria-labelledby="headingFive">
                        <div class="panel-body">
                            <ul class="list-unstyled">
                                <li><a href="?a=exam&action=show" target="main">管理试题</a></li>
                                <li><a href="?a=exam&action=add" target="main">添加试题</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--成员-->
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingTwo">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true"
                               aria-controls="collapseTwo" class="collapsed">
                                管理员设置
                            </a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel"
                         aria-labelledby="headingTwo">
                        <div class="panel-body">
                            <ul class="list-unstyled">
                                <li><a href="?a=permission&action=show" target="main">管理权限</a></li>
                                <li><a href="?a=level&action=show" target="main">等级管理</a></li>
                                <li><a href="?a=user&action=show" target="main">管理管理员</a></li>
                                <li><a href="?a=member&action=show" target="main">会员管理</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-10 middleRight">
            <iframe name="main" src="?a=admin&m=welcome"></iframe>
        </div>
    </div>
    <?php $_smarty_tpl->_subTemplateRender("file:home/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</div>
</body>
</html><?php }
}
