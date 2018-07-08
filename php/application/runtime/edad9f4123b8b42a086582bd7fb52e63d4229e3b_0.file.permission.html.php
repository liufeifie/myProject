<?php
/* Smarty version 3.1.30, created on 2017-02-12 09:57:33
  from "D:\wamp\www\project\application\views\admin\permission.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_589fc10d7598b0_10419379',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'edad9f4123b8b42a086582bd7fb52e63d4229e3b' => 
    array (
      0 => 'D:\\wamp\\www\\project\\application\\views\\admin\\permission.html',
      1 => 1483860678,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_589fc10d7598b0_10419379 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>permission</title>
    <link href="libs/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="libs/bootstrap/css/bootstrap-theme.css" rel="stylesheet">
    <link href="public/styles/admin.css" rel="stylesheet">
    <link href="public/styles/page.css" rel="stylesheet">
    <link href="public/styles/Tools.css" rel="stylesheet">
    <?php echo '<script'; ?>
 src="libs/requireJS/require.js" data-main="public/scripts/main"><?php echo '</script'; ?>
>
</head>
<body style="overflow-x:hidden;">
<!--添加权限-->
<?php if ($_smarty_tpl->tpl_vars['add']->value) {?>
<div class="row">
    <div class="col-md-12">
        <ul class="breadcrumb">
            <li><a href="?a=admin&m=welcome">后台首页</a></li>
            <li><a href="?a=permission&action=show">权限管理</a></li>
            <!-- <li><a href="?a=permission&action=show">
                 <span class="glyphicon glyphicon-plus"></span>
             </a></li>-->
            <li class="active">添加权限</li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <form action="" method="post">
            <table class="table table-striped table-hover article">
                <tr>
                    <th class="text-right" width="120">权限名称</th>
                    <td><input type="text" name="name" class="form-control"></td>
                </tr>
                <tr>
                    <th class="text-right">权限描叙</th>
                    <td><textarea name="description" class="form-control"></textarea></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="send" class="btn btn-primary" value="提交"></td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php }?>
<!--修改权限-->
<?php if ($_smarty_tpl->tpl_vars['update']->value) {?>
<div class="row">
    <div class="col-md-12">
        <ul class="breadcrumb">
            <li><a href="?a=admin&m=welcome">后台首页</a></li>
            <li><a href="?a=permission&action=show">权限管理</a></li>
            <li><a href="?a=permission&action=add">
                <span class="glyphicon glyphicon-plus"></span>
            </a></li>
            <li class="active">修改权限</li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <form action="" method="post">
            <table class="table table-striped table-hover article">
                <tr>
                    <th class="text-right" width="120">权限名称</th>
                    <td><input type="text" name="name" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['onePermission']->value->name;?>
"></td>
                </tr>
                <tr>
                    <th class="text-right">权限描叙</th>
                    <td>
                        <textarea name="description" class="form-control"><?php echo $_smarty_tpl->tpl_vars['onePermission']->value->description;?>

                        </textarea>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="send" class="btn btn-primary" value="提交"></td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php }?>
<!--显示权限-->
<?php if ($_smarty_tpl->tpl_vars['show']->value) {?>
<div class="row">
    <div class="col-md-12">
        <ul class="breadcrumb">
            <li><a href="?a=admin&m=welcome">后台首页</a></li>
            <li><a href="?a=permission&action=show">权限管理</a></li>
            <li><a href="?a=permission&action=add">
                <span class="glyphicon glyphicon-plus"></span>
            </a></li>
            <li class="active">所有权限</li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table table-hover table-striped text-center table-bordered">
            <tr>
                <td>权限名字
                </th>
                <td>权限描述
                </th>
                <td>操作
                </th>
                <th>批量删除:<input type="checkbox" class="allCheck"></th>
            </tr>
            <?php if ($_smarty_tpl->tpl_vars['allPermission']->value) {?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['allPermission']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['v']->value->name;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['v']->value->description;?>
</td>
                <td>
                    <a href="?a=permission&action=update&id=<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
">
                        <img src="public/images/icon_edit.gif" title="修改">
                    </a>
                    <a><!--href="?a=permission&action=delete&id=<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
"-->
                        <img src="public/images/icon_drop.gif" title="删除" class="delete" name="<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
">
                    </a>
                </td>
                <td>选择:<input type="checkbox" class="choice" name="choice[]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
"></td>
            </tr>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            <tr>
                <td colspan="3" class="page"><?php echo $_smarty_tpl->tpl_vars['list']->value;?>
</td>
                <td><input type="submit" name="send" class="btn btn-primary send1" value="删除选中"></td>
            </tr>
            <?php }?>
        </table>
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
                        <button class="btn btn-primary confirmPermission" data-dismiss="modal">确认</button>
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
