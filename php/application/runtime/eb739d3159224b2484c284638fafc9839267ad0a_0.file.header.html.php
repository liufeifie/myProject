<?php
/* Smarty version 3.1.30, created on 2017-02-10 12:53:10
  from "D:\wamp\www\project\application\views\home\header.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_589d473644d389_31397797',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'eb739d3159224b2484c284638fafc9839267ad0a' => 
    array (
      0 => 'D:\\wamp\\www\\project\\application\\views\\home\\header.html',
      1 => 1485155231,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_589d473644d389_31397797 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>header</title>
</head>
<body>
<main class="container bg">
    <div class="row">
        <div class="col-md-12 rowHeader adv1">
            <?php if ($_smarty_tpl->tpl_vars['banner']->value) {?>
            <a href="<?php ob_start();
echo $_smarty_tpl->tpl_vars['num1']->value;
$_prefixVariable5=ob_get_clean();
echo $_smarty_tpl->tpl_vars['banner']->value[$_prefixVariable5]->link;?>
" target="_blank">
                <img src="public/uploads/ad/<?php ob_start();
echo $_smarty_tpl->tpl_vars['num1']->value;
$_prefixVariable6=ob_get_clean();
echo $_smarty_tpl->tpl_vars['banner']->value[$_prefixVariable6]->thumbnail;?>
" width="100%" height="60px">
            </a>
            <?php } else { ?>
            <img src="public/images/adv.jpg" width="100%">
            <?php }?>
            <span>&times;</span>
        </div>
    </div>
    <header class="row rowHeader">
        <header class="col-md-3">
            <img src="public/images/logo01.png" title="高不大于60px">
        </header>
        <header class="col-md-5 text-right">
            <form action="?a=article&m=search" class="searchForm" method="post">
                <input type="search" class="form-control" name="search" value="<?php echo $_smarty_tpl->tpl_vars['searchContent']->value;?>
">
                <input type="submit" value="搜索一下" name="send" class="btn btn-primary searchBtn">
            </form>
        </header>
        <header class="col-md-4 log">
            <ul style="display:<?php echo $_SESSION['login'];?>
" class="list-inline text-center login">
                <li><a href="?a=home">首页</a></li>
                <li><a href="?a=admin">后台管理</a></li>
                <li>
                    <button class="btn btn-success" data-toggle="modal" data-target="#login" id="login1">登录</button>
                    <div id="login" class="modal fade text-center">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-body form-group form">
                                    <span class="h3 text-center"><b>欢迎登录</b></span>
                                    <button type="button" class="btn btn-danger close" data-dismiss="modal">
                                        &times;
                                    </button>
                                    <div class="input-group has-success">
                                        <div class="input-group-addon">
                                            <label for="loginUser" class="glyphicon glyphicon-user"></label>
                                        </div>
                                        <input type="text" class="form-control" id="loginUser" name="user">
                                    </div>
                                    <p id="userTip"></p>
                                    <div class="input-group has-success input">
                                        <div class="input-group-addon">
                                            <label for="loginPwd" class="glyphicon glyphicon-lock"></label>
                                        </div>
                                        <input type="password" class="form-control" id="loginPwd" name="pwd">
                                    </div>
                                    <p id="pwdTip"></p>
                                    <input type="submit" value="登录" id="sendLogin" class="btn btn-block btn-success">
                                    <p id="btnTip"></p>
                                    <p class="forget"><a href="?a=register&action=forget">忘记密码</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li><button class="btn btn-success">
                    <a href="?a=register&action=register" target="_blank" style="color: white;">注册</a>
                </button></li>
            </ul>
            <ul style="display:<?php echo $_SESSION['logout'];?>
" class="list-inline text-center logout">
                <li><a href="?a=home">首页</a></li>
                <li>
                    <img src="public/uploads/register/<?php echo $_SESSION['oneMember']->pic;?>
"
                         width="50" height="50" class="img-circle">
                </li>
                <!--  <li class="userName"></li>-->
                <li class="dropdown" style="display:inline;">
                    <button class="btn btn-success" id="dLabel" type="button" data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false">
                        <span>用户名:</span>
                        <span class="userName" style="color: blue;"><?php echo $_SESSION['oneMember']->user;?>
</span>
                    </button>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                        <li><a ><b>登录次数:</b>&nbsp;<?php echo $_SESSION['oneMember']->login_num;?>
</a></li>
                        <li><a ><b>登录ip:</b><?php echo $_SESSION['oneMember']->last_ip;?>
</a></li>
                        <li><a ><b>登录时间:</b><?php echo $_SESSION['oneMember']->last_time;?>
</a></li>
                        <li><a href="?a=home&m=showInfo"><b>个人资料</b></a></li>
                    </ul>
                </li>
                <li class="userLogout btn btn-success">注销</li>
            </ul>
        </header>
    </header>
    <!--导航-->
    <nav class="row">
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
</main>
<!--弹出框-->
<div id="Msg" class="modal">
    <div class="modal-dialog modal-sm ext-center">
        <div class="modal-content modals">
            <div class="modal-body text-center">
                <h1 class="infoTip" style="color: red;">是否注销账户</h1>
                <button class="btn btn-success confirmUserLogout" data-dismiss="modal">确认</button>
                <button class="btn btn-danger cancel" data-dismiss="modal">取消</button>
            </div>
        </div>
    </div>
</div>
</body>
</html><?php }
}
