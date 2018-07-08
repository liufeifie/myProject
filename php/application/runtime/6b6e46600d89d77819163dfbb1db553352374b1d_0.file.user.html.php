<?php
/* Smarty version 3.1.30, created on 2017-02-12 09:57:36
  from "D:\wamp\www\project\application\views\admin\user.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_589fc110df53a8_63075808',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6b6e46600d89d77819163dfbb1db553352374b1d' => 
    array (
      0 => 'D:\\wamp\\www\\project\\application\\views\\admin\\user.html',
      1 => 1484131846,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_589fc110df53a8_63075808 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="libs/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="libs/bootstrap/css/bootstrap-theme.css" rel="stylesheet">
    <link href="public/styles/admin.css" rel="stylesheet">
    <link href="public/styles/Tools.css" rel="stylesheet">
    <link href="public/styles/page.css" rel="stylesheet">
    <?php echo '<script'; ?>
 src="libs/requireJS/require.js" data-main="public/scripts/main"><?php echo '</script'; ?>
>
</head>
<body style="overflow-x:hidden;">
<?php if ($_smarty_tpl->tpl_vars['show']->value) {?>
<div class="row">
    <div class="col-md-12">
        <ul class="breadcrumb">
            <li><a href="?a=admin&m=welcome">后台首页</a></li>
            <li><a href="?a=user&action=show">管理员设置</a></li>
            <li><a href="?a=user&action=add">
                <span class="glyphicon glyphicon-plus"></span>
            </a></li>
            <li class="active">所有管理员</li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered table-striped table-hover text-center">
            <tr>
                <th>用户名</th>
                <th>服务器</th>
                <th>登录次数</th>
                <th>等级</th>
                <th>最后登录时间</th>
                <th>注册时间</th>
                <th>操作</th>
                <th>
                    <label for="allCheck">全选:</label>
                    <input type="checkbox" class="allCheck" id="allCheck">
                </th>
            </tr>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['v']->value->username;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['v']->value->last_ip;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['v']->value->login_num;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['v']->value->level_id;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['v']->value->last_time;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['v']->value->reg_time;?>
</td>
                <td>
                    <a href="?a=user&action=update&id=<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
">
                        <img src="public/images/icon_edit.gif" title="修改">
                    </a>&nbsp;
                    <a><!--href="?a=user&action=delete&id=<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
"-->
                        <img src="public/images/icon_drop.gif" title="删除" class="delete" name="<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
">
                    </a>
                </td>
                <td>
                    <label for="<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
">单选: </label>
                    <input id="<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
" type="checkbox" name="check[]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
" class="choice">
                </td>
            </tr>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            <tr>
                <td colspan="7" class="page">
                    <?php echo $_smarty_tpl->tpl_vars['list']->value;?>

                </td>
                <td><input type="submit" name="send" value="删除选中" class="send1 btn btn-primary"></td>
            </tr>
        </table>
    </div>
</div>
<?php }
if ($_smarty_tpl->tpl_vars['update']->value) {?>
<div class="row">
    <div class="col-md-12">
        <ul class="breadcrumb">
            <li><a href="?a=admin&m=welcome">后台首页</a></li>
            <li><a href="?a=user&action=show">管理员设置</a></li>
            <li class="active">修改管理员</li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <form method="post" enctype="multipart/form-data" action="">
            <table class="table table-bordered table-striped table-hover">
                <tr>
                    <td class="text-right" width="150">管理员等级</td>
                    <td>
                        <select name="level_id" class="col-sm-2" style="padding: 5px 0">
                            <option value="" class="form-control">选择等级</option>
                            <?php echo $_smarty_tpl->tpl_vars['level']->value;?>

                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="text-right">管理员姓名</td>
                    <td>
                        <input type="text" class="form-control" name="username" value="<?php echo $_smarty_tpl->tpl_vars['oneUser']->value->username;?>
">
                    </td>
                </tr>
                <tr>
                    <td class="text-right">密码</td>
                    <td>
                        <input type="text" class="form-control" name="pwd" value="<?php echo $_smarty_tpl->tpl_vars['oneUser']->value->pwd;?>
">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="提交" name="send" class="btn btn-success"></td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php }
if ($_smarty_tpl->tpl_vars['add']->value) {?>
<div class="row">
    <div class="col-md-12">
        <ul class="breadcrumb">
            <li><a href="?a=admin&m=welcome">后台首页</a></li>
            <li><a href="?a=user&action=add">管理员设置</a></li>
            <li class="active">添加管理员</li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <form method="post" enctype="multipart/form-data" action="">
            <table class="table table-bordered table-striped table-hover">
                <tr>
                    <td class="text-right" width="150">管理员等级</td>
                    <td>
                        <select name="level_id" class="col-sm-2" style="padding: 5px 0">
                            <option value="" class="form-control">选择等级</option>
                            <?php echo $_smarty_tpl->tpl_vars['level']->value;?>

                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="text-right">用户名</td>
                    <td>
                        <input type="text" class="form-control" name="username">
                    </td>
                </tr>
                <tr>
                    <td class="text-right">密码</td>
                    <td>
                        <input type="text" class="form-control" name="pwd">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="提交" name="send" class="btn btn-success"></td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php }?>
<!--弹出框-->
<div class="row">
    <div class="col-md-12">
        <div id="Msg" class="modal">
            <div class="modal-dialog modal-sm ext-center">
                <div class="modal-content">
                    <!--<div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <span class="h3">模态框</span>
                    </div>-->
                    <div class="modal-body text-center">
                        <p class="h2 infoTip">是否确认删除</p>
                        <button class="btn btn-primary confirmUser" data-dismiss="modal">确认</button>
                        <button class="btn btn-primary cancel" data-dismiss="modal">取消</button>
                    </div>
                    <!-- <div class="modal-footer">
                         <button class="btn btn-primary" data-dismiss="modal">确认</button>
                         <button class="btn btn-primary" data-dismiss="modal">取消</button>
                     </div-->
                </div>
            </div>
        </div>
    </div>
</div>
<!--进度条-->
<div id='progressBox' style="display: none">
    <div class='progress'>
        <div id='progress-bar' class='progress-bar progress-bar-striped active'
             style='width: 0%;'><span id='num1'>0%</span>
            <span id='num' style="display: none">0%</span>
        </div>
    </div>
</div>
</body>
</html><?php }
}
