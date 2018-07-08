<?php
/* Smarty version 3.1.30, created on 2017-02-10 12:56:08
  from "D:\wamp\www\project\application\views\home\register.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_589d47e85ddfc0_98628473',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '244c170b57c1bbf913f46aa93336de4a52ac43ad' => 
    array (
      0 => 'D:\\wamp\\www\\project\\application\\views\\home\\register.html',
      1 => 1484530608,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:home/footer.html' => 1,
  ),
),false)) {
function content_589d47e85ddfc0_98628473 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>注册</title>
    <!--<link href="libs/font-icon/css/font-awesome.css" rel="stylesheet">-->
    <link href="libs/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="libs/bootstrap/css/bootstrap-theme.css" rel="stylesheet">
    <link href="public/styles/register.css" rel="stylesheet">
    <link href="public/styles/home.css" rel="stylesheet">
    <?php echo '<script'; ?>
 src="libs/requireJS/require.js" data-main="public/scripts/home"><?php echo '</script'; ?>
>
</head>
<body>
<div class="container-fluid">
    <header class="row rowHeader">
        <header class="col-md-3">
            <img src="public/images/logo01.png" title="高不大于60px">
        </header>
        <header class="col-md-7">
            <?php if ($_smarty_tpl->tpl_vars['banner']->value) {?>
            <img src="public/uploads/ad/<?php echo $_smarty_tpl->tpl_vars['banner']->value[0]->thumbnail;?>
" width="100%" height="60px">
            <?php } else { ?>
            <img src="public/images/adv.jpg" width="100%">
            <?php }?>
        </header>
        <header class="col-md-2">
            <ul class="list-unstyled list-inline">
                <li class="h3"><a href="?a=home">返回首页</a></li>
            </ul>
        </header>
    </header>
    <!--导航-->
    <nav class="row rowNav">
        <nav class="col-md-12 removePadding">
            <ul class="nav nav-tabs nav-justified navUL">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['frontNav']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
                <li style="background: deepskyblue">
                    <a href="?a=subnav&action=show&id=<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['v']->value->name;?>
</a>
                </li>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            </ul>
        </nav>
        <nav class="col-md-3"></nav>
    </nav>
    <p class="border removeMargin clearfix"></p><!--横线-->
    <!--注册-->
    <?php if ($_smarty_tpl->tpl_vars['register']->value) {?>
    <div class="row main">
        <div class="col-md-offset-2 col-md-3 text-center">
           <div class="leftBg">
               <h1 class="titleH1">欢迎注册会员</h1>
               <img src="public/images/show.png" width="100%" height="">
           </div>
        </div>
        <div class="col-md-offset-1 col-md-4 text-center formReg">
            <!--预览-->
            <div class="col-sm-8" style="height: 100px;margin-bottom: 10px">
                <img src="public/images/default.png" class="previewPic img-circle" alt="" width="100" height="100">
            </div>
            <div class="col-sm-4">
            </div>
            <!--用户名-->
            <div class="col-sm-8 text-right">
                <div class="form-group has-feedback has-success">
                    <div class="input-group ">
                        <div class="input-group-addon">
                            <label for="user" class="glyphicon glyphicon-user"></label>
                        </div>
                        <input type="text" class="form-control" id="user" name="user" placeholder="设置用户名8个字符内">
                        <!-- <span class="glyphicon form-control-feedback" id="removeUser"></span>-->
                    </div>
                </div>
            </div>
            <div class="col-sm-4 padding text-left">
                <div class="form-group">
                    <span class="user"></span>
                    <span class="glyphicon form-control-feedback"></span>
                </div>
            </div>
            <!--密码-->
            <div class="col-sm-8">
                <div class="form-group has-feedback has-success">
                    <div class="input-group ">
                        <div class="input-group-addon">
                            <label for="pwd" class="glyphicon glyphicon-lock"></label>
                        </div>
                        <input type="password" class="form-control" id="pwd" name="pwd" placeholder="设置密码">
                    </div>
                </div>
            </div>
            <div class="col-sm-4 padding text-left">
                <div class="form-group">
                    <span class="pwd"></span>
                    <span class="glyphicon form-control-feedback"></span>
                </div>
            </div>
            <!--确认密码-->
            <div class="col-sm-8">
                <div class="form-group has-feedback has-success">
                    <div class="input-group ">
                        <div class="input-group-addon">
                            <label for="repwd" class="glyphicon glyphicon-lock"></label>
                        </div>
                        <input type="password" class="form-control" id="repwd" placeholder="确认密码">
                    </div>
                </div>
            </div>
            <div class="col-sm-4 padding text-left">
                <div class="form-group">
                    <span class="repwd"></span>
                    <span class="glyphicon form-control-feedback"></span>
                </div>
            </div>
            <!--手机号-->
            <div class="col-sm-8">
                <div class="form-group has-feedback has-success">
                    <div class="input-group ">
                        <div class="input-group-addon">
                            <label for="phone" class="glyphicon glyphicon-phone">
                                <!-- <span class="fa fa-mobile" style="padding: 0 4px;font-weight: 800"></span>-->
                            </label>
                        </div>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="设置手机号">
                    </div>
                </div>
            </div>
            <div class="col-sm-4 padding text-left">
                <div class="form-group">
                    <span class="phone"></span>
                    <span class="glyphicon form-control-feedback"></span>
                </div>
            </div>
            <!--邮箱-->
            <div class="col-sm-8">
                <div class="form-group has-feedback has-success">
                    <div class="input-group ">
                        <div class="input-group-addon">
                            <label for="email">
                                <span>@</span>
                            </label>
                        </div>
                        <input type="text" class="form-control" id="email" name="email" placeholder="设置邮箱">
                    </div>
                </div>
            </div>
            <div class="col-sm-4 padding text-left">
                <div class="form-group">
                    <span class="email"></span>
                    <span class="glyphicon form-control-feedback"></span>
                </div>
            </div>
            <!--验证码-->
            <div class="col-sm-8" style="height: 49px">
                <div class="form-group has-feedback has-success">
                    <div class="col-sm-8 padding">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <label for="code">
                                    <span>验证码</span>
                                </label>
                            </div>
                            <input type="text" class="form-control" id="code" placeholder="验证码" maxlength="4">
                        </div>
                    </div>
                    <div class="col-sm-4 padding">
                        <img src="application/includes/code.php" class="inline-block" id="codeImg" width="100%"
                             height="34px">
                    </div>
                </div>
            </div>
            <div class="col-sm-4 padding text-left">
                <div class="form-group">
                    <span class="code"></span>
                    <span class="glyphicon form-control-feedback"></span>
                </div>
            </div>
            <!--头像-->
            <div class="col-sm-8">
                <div class="form-group has-feedback has-success">
                    <div class="input-group " style="position: relative">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-file"></span>
                        </div>
                        <label for="pic" class="picLabel">上传头像</label>
                        <input type="file" class="form-control" id="pic">
                    </div>
                </div>
            </div>
            <div class="col-sm-4 padding text-left">
                <div class="form-group">
                    <span class="pic"></span>
                    <span class="glyphicon form-control-feedback"></span>
                </div>
            </div>
            <!--提交-->
            <div class="col-sm-8">
                <div class="form-group has-feedback has-success">
                    <input type="submit" class="form-control btn btn-success" value="注册" id="send">
                </div>
            </div>
            <div class="col-sm-4 padding text-left">
                <div class="form-group">
                    <span class="send"></span>
                    <span class="glyphicon form-control-feedback"></span>
                </div>
            </div>
            <div class="col-sm-8">
                <a href="?a=home" style="color:red;font-weight: 600;cursor:pointer">已有帐号请登录</a>
            </div>
        </div>
    </div>
    <?php }?>
    <!--验证信息-->
    <?php if ($_smarty_tpl->tpl_vars['forget']->value) {?>
    <div class="row main">
        <div class="col-md-offset-4 col-md-4 text-center formReg">
            <h1>验证用户</h1>
            <!--用户名-->
            <div class="col-sm-offset-2 col-sm-7 text-right">
                <div class="form-group has-feedback has-success">
                    <div class="input-group ">
                        <div class="input-group-addon">
                            <label for="reuser" class="glyphicon glyphicon-user"></label>
                        </div>
                        <input type="text" class="form-control" id="reuser" name="reuser" placeholder="输入账号">
                        <!-- <span class="glyphicon form-control-feedback" id="removeUser"></span>-->
                    </div>
                </div>
            </div>
            <!--手机号-->
            <div class="col-sm-offset-2 col-sm-7 text-right">
                <div class="form-group has-feedback has-success">
                    <div class="input-group ">
                        <div class="input-group-addon">
                            <label for="rephone" class="glyphicon glyphicon-phone">
                                <!-- <span class="fa fa-mobile" style="padding: 0 4px;font-weight: 800"></span>-->
                            </label>
                        </div>
                        <input type="text" class="form-control" id="rephone" name="rephone" placeholder="输入注册手机号">
                        <!-- <span class="glyphicon form-control-feedback" id="removeUser"></span>-->
                    </div>
                </div>
            </div>
            <!--邮箱-->
            <div class="col-sm-offset-2 col-sm-7 text-right">
                <div class="form-group has-feedback has-success">
                    <div class="input-group ">
                        <div class="input-group-addon">
                            <label for="remail">
                                <span>@</span>
                            </label>
                        </div>
                        <input type="text" class="form-control" id="remail" name="remail" placeholder="输入注册邮箱">
                        <!-- <span class="glyphicon form-control-feedback" id="removeUser"></span>-->
                    </div>
                </div>
            </div>
            <!--验证-->
            <div class="col-sm-offset-2 col-sm-7">
                <div class="form-group has-feedback has-success">
                    <input type="submit" class="form-control btn btn-success" value="验证" id="resend">
                </div>
            </div>
            <div class="col-sm-3 padding text-left">
                <div class="form-group">
                    <span class="resend"></span>
                    <span class="glyphicon form-control-feedback"></span>
                </div>
            </div>
        </div>
    </div>
    <?php }?>
    <!--重置密码-->
    <!--coursor:pa;-->
    <?php if ($_smarty_tpl->tpl_vars['reset']->value) {?>
    <div class="row main">
        <div class="col-md-offset-4 col-md-4 text-center formReg">
            <h1>重置密码</h1>
            <!--密码-->
            <div class="col-sm-offset-2 col-sm-7">
                <div class="form-group has-feedback has-success">
                    <div class="input-group ">
                        <div class="input-group-addon">
                            <label for="pwd" class="glyphicon glyphicon-lock"></label>
                        </div>
                        <input type="password" class="form-control" id="pwd" name="pwd" placeholder="设置密码">
                    </div>
                </div>
            </div>
            <div class="col-sm-3 padding text-left">
                <div class="form-group">
                    <span class="pwd"></span>
                    <span class="glyphicon form-control-feedback"></span>
                </div>
            </div>
            <!--确认密码-->
            <div class="col-sm-offset-2 col-sm-7">
                <div class="form-group has-feedback has-success">
                    <div class="input-group ">
                        <div class="input-group-addon">
                            <label for="repwd" class="glyphicon glyphicon-lock"></label>
                        </div>
                        <input type="password" class="form-control" id="repwd" placeholder="确认密码">
                    </div>
                </div>
            </div>
            <div class="col-sm-3 padding text-left">
                <div class="form-group">
                    <span class="repwd"></span>
                    <span class="glyphicon form-control-feedback"></span>
                </div>
            </div>
            <!--验证码-->
            <div class="col-sm-offset-2 col-sm-7" style="height: 49px">
                <div class="form-group has-feedback has-success">
                    <div class="col-sm-8 padding">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <label for="code">
                                    <span>验证码</span>
                                </label>
                            </div>
                            <input type="text" class="form-control" id="code" placeholder="验证码" maxlength="4">
                        </div>
                    </div>
                    <div class="col-sm-4 padding">
                        <img src="application/includes/code.php" class="inline-block" id="codeImg" width="100%"
                             height="34px">
                    </div>
                </div>
            </div>
            <div class="col-sm-3 padding text-left">
                <div class="form-group">
                    <span class="code"></span>
                    <span class="glyphicon form-control-feedback"></span>
                </div>
            </div>
            <!--验证-->
            <div class="col-sm-offset-2 col-sm-7">
                <div class="form-group has-feedback has-success">
                    <input type="submit" class="form-control btn btn-success" value="验证" id="resetSend">
                </div>
            </div>
            <div class="col-sm-3 padding text-left">
                <div class="form-group">
                    <span class="send"></span>
                    <span class="glyphicon form-control-feedback"></span>
                </div>
            </div>
        </div>
    </div>
    <?php }?>

    <?php $_smarty_tpl->_subTemplateRender("file:home/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</div>
<!--进度条-->
<div id='progressBox' style="display: none;">
    <div class='progress'>
        <div id='progress-bar' class='progress-bar progress-bar-striped active'
             style='width: 0%;'><span id='num1'>0%</span></div>
    </div>
</div>
</body>
</html><?php }
}
