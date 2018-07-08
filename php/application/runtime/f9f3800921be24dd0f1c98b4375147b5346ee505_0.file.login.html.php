<?php
/* Smarty version 3.1.30, created on 2017-02-10 12:56:14
  from "D:\wamp\www\project\application\views\admin\login.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_589d47ee209733_26661326',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f9f3800921be24dd0f1c98b4375147b5346ee505' => 
    array (
      0 => 'D:\\wamp\\www\\project\\application\\views\\admin\\login.html',
      1 => 1483836868,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_589d47ee209733_26661326 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>管理中心</title>
    <link href="libs/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="libs/bootstrap/css/bootstrap-theme.css" rel="stylesheet">
    <link href="public/styles/admin.css" rel="stylesheet">
    <link href="public/styles/Tools.css" rel="stylesheet">
    <?php echo '<script'; ?>
 src="libs/requireJS/require.js" data-main="public/scripts/main"><?php echo '</script'; ?>
>
</head>
<body class="loginBg">
<div class="login">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1><b>后台管理</b></h1>
        </div>
    </div>
    <form action="?a=user&m=login" method="post">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 ">
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-user"></i>
                        </span>
                        <input class="form-control" placeholder="用户名" id="login_username" name="username" type="text"
                               autofocus="">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"> <i class="glyphicon glyphicon-lock"></i>
                        </span> <input class="form-control" placeholder="密码" id="login_pwd" name="pwd"
                           type="password" value="">
                    </div>
                </div>
                <div class="form-group loginBtn">
                    <input type="submit" class="btn btn-lg btn-primary btn-block" id="loginBtn" value="登 录" name="send">
                </div>
            </div>
        </div>
    </form>
</div>
</body>
</html><?php }
}
