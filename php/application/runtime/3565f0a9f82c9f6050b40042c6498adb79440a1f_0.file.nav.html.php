<?php
/* Smarty version 3.1.30, created on 2017-02-12 09:56:32
  from "D:\wamp\www\project\application\views\admin\nav.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_589fc0d0558bf0_36543387',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3565f0a9f82c9f6050b40042c6498adb79440a1f' => 
    array (
      0 => 'D:\\wamp\\www\\project\\application\\views\\admin\\nav.html',
      1 => 1484289982,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_589fc0d0558bf0_36543387 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>nav</title>
    <link href="libs/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="libs/bootstrap/css/bootstrap-theme.css" rel="stylesheet">
    <link href="public/styles/admin.css" rel="stylesheet">
    <link href="public/styles/Tools.css" rel="stylesheet">
    <link href="public/styles/page.css" rel="stylesheet">
    <?php echo '<script'; ?>
 src="libs/requireJS/require.js" data-main="public/scripts/main"><?php echo '</script'; ?>
>
    <style>
        table th{
            text-align: center;
        }
    </style>
</head>
<body style="overflow-x:hidden;">
<?php if ($_smarty_tpl->tpl_vars['show']->value) {?>
<!--显示父导航-->
<div class="row">
    <div class="col-md-12">
        <ul class="breadcrumb">
            <li><a href="?a=admin&m=welcome">后台首页</a></li>
            <li><a href="?a=nav&action=show">导航管理</a></li>
            <li class="active">所有导航</li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <form method="post" action="" enctype="multipart/form-data">
            <table class="table table-bordered table-striped table-hover text-center">
                <tr>
                    <th>标题</th>
                    <th>描述</th>
                    <th>状态</th>
                    <th>操作</th>
                    <th>排序</th>
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
                    <td><?php echo $_smarty_tpl->tpl_vars['v']->value->name;?>
</td>
                    <td  class="text-left"><?php echo $_smarty_tpl->tpl_vars['v']->value->description;?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['v']->value->state;?>
</td>
                    <td>
                        <a href="?a=nav&action=update&id=<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
">[修改]
                            <!--<img src="public/images/icon_edit.gif" title="修改">-->
                        </a>
                       <!-- <a href="?a=nav&action=delete&id=<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
">[删除]
                           &lt;!&ndash; <img src="public/images/icon_drop.gif" title="删除">&ndash;&gt;
                        </a>-->
                        <a title="删除" class="delete" name="<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
">
                            [删除]
                        </a>
                        <a href="?a=nav&action=showSubNav&id=<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
">查看子导航</a>
                        <a href="?a=nav&action=addSubNav&id=<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
">增加子导航</a>
                    </td>
                    <td>
                        <input type="number" name="sort[]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value->sort;?>
" style="width:50px;text-align: center">
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
                    <td colspan="4"><div class="page"><?php echo $_smarty_tpl->tpl_vars['list']->value;?>
</div></td>
                    <td><input type="submit" name="send" value="排序" class="btn btn-primary"></td>
                    <td><input type="button" name="delete" value="删除选中" class="send1 btn btn-danger"></td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php }?>
<!--修改导航-->
<?php if ($_smarty_tpl->tpl_vars['update']->value) {?>
<div class="row">
    <div class="col-md-12">
        <ul class="breadcrumb">
            <li><a href="?a=admin&m=welcome">后台首页</a></li>
            <li><a href="?a=nav&action=show">导航设置</a></li>
            <li class="active">修改导航</li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <form method="post" enctype="multipart/form-data" action="">
            <table class="table table-bordered table-striped table-hover">
                <tr>
                    <td class="text-right" width="120">导航名称</td>
                    <td>
                        <input type="text" class="form-control" name="name" value="<?php echo $_smarty_tpl->tpl_vars['data']->value->name;?>
">
                    </td>
                </tr>
                <tr>
                    <td class="text-right">导航描述</td>
                    <td>
                        <textarea type="text" class="form-control" name="description"><?php echo $_smarty_tpl->tpl_vars['data']->value->description;?>

                        </textarea>
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
<!--增加导航-->
<?php if ($_smarty_tpl->tpl_vars['add']->value) {?>
<div class="row">
    <div class="col-md-12">
        <ul class="breadcrumb">
            <li><a href="?a=admin&m=welcome">后台首页</a></li>
            <li><a href="?a=nav&action=show">导航设置</a></li>
            <li class="active">添加导航</li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <form method="post" enctype="multipart/form-data" action="">
            <table class="table table-bordered table-striped table-hover">
                <tr>
                    <td class="text-right" width="120">导航名称</td>
                    <td>
                        <input type="text" class="form-control" name="name">
                    </td>
                </tr>
                <tr>
                    <td class="text-right">导航描述</td>
                    <td>
                        <textarea type="text" class="form-control" name="description"></textarea>
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
<!--显示子导航-->
<?php if ($_smarty_tpl->tpl_vars['showSubNav']->value) {?>
<div class="row">
    <div class="col-md-12">
        <ul class="breadcrumb">
            <li><a href="?a=admin&m=welcome">后台首页</a></li>
            <li><a href="?a=nav&action=show">导航管理</a></li>
            <li class="active">查看<b style="color: green;font-size: 20px"><?php echo $_smarty_tpl->tpl_vars['data1']->value->name;?>
</b>子导航</li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <form method="post" action="" enctype="multipart/form-data">
            <table class="table table-bordered table-striped table-hover text-center">
                <tr>
                    <th style="color:blue;position: relative" colspan="6">
                        <a href="?a=nav&action=addSubNav&id=<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
" style="position: absolute;left:5%">添加子导航</a>
                        <h3 style="display: inline">【<?php echo $_smarty_tpl->tpl_vars['data1']->value->name;?>
】</h3>
                    </th>
                </tr>
                <tr>
                    <th>标题</th>
                    <th>描述</th>
                    <th>状态</th>
                    <th>操作</th>
                    <th>排序</th>
                    <th>
                        <label for="allCheck1">全选:</label>
                        <input type="checkbox" class="allCheck" id="allCheck1">
                    </th>
                </tr>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['v']->value->name;?>
</td>
                    <td  class="text-left"><?php echo $_smarty_tpl->tpl_vars['v']->value->description;?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['v']->value->state;?>
</td>
                    <td>
                        <a href="?a=nav&action=update&id=<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
">
                            <img src="public/images/icon_edit.gif" title="修改">
                        </a>
                        <a>
                            <img src="public/images/icon_drop.gif" title="删除" class="delete" name="<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
">
                        </a>
                    </td>
                    <td>
                        <input type="number" name="sort[]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value->sort;?>
" style="width:50px;text-align: center">
                    </td>
                    <td>
                        <label for="<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
1">单选: </label>
                        <input id="<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
1" type="checkbox" name="check[]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
" class="choice">
                    </td>
                </tr>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                <tr>
                    <td colspan="4"><div class="page"><?php echo $_smarty_tpl->tpl_vars['list']->value;?>
</div></td>
                    <td><input type="submit" name="send" value="排序" class="btn btn-primary"></td>
                    <td><input type="button" name="send" value="删除选中" class="btn btn-primary send1"></td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php }?>
<!--显示所有子导航-->
<?php if ($_smarty_tpl->tpl_vars['showAllSubNav']->value) {?>
<div class="row">
    <div class="col-md-12">
        <ul class="breadcrumb">
            <li><a href="?a=admin&m=welcome">后台首页</a></li>
            <li><a href="?a=nav&action=show">导航管理</a></li>
            <li class="active">查看所有子导航</li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <form method="post" action="" enctype="multipart/form-data">
            <table class="table table-bordered table-striped table-hover text-center">
                <tr>
                    <th>父导航</th>
                    <th>子导航</th>
                    <th>描述</th>
                    <th>状态</th>
                    <th>操作</th>
                    <th>排序</th>
                    <th>
                        <label for="allCheck1">全选:</label>
                        <input type="checkbox" class="allCheck" id="allCheck1">
                    </th>
                </tr>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['allSubNav']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['v']->value->pid;?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['v']->value->name;?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['v']->value->description;?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['v']->value->state;?>
</td>
                    <td>
                        <a href="?a=nav&action=update&id=<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
">
                            <img src="public/images/icon_edit.gif" title="修改">
                        </a>
                        <a>
                            <img src="public/images/icon_drop.gif" title="删除" class="delete" name="<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
">
                        </a>
                    </td>
                    <td>
                        <input type="number" name="sort[]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value->sort;?>
" style="width:50px;text-align: center">
                    </td>
                    <td>
                        <label for="<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
2">单选: </label>
                        <input id="<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
2" type="checkbox" name="check[]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
" class="choice">
                    </td>
                </tr>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                <tr>
                    <td colspan="5"><div class="page"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</div></td>
                    <td><input type="submit" name="send" value="排序" class="btn btn-primary"></td>
                    <td><input type="button" name="send" value="删除选中" class="btn btn-primary send1"></td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php }?>
<!--增加子导航-->
<?php if ($_smarty_tpl->tpl_vars['addSubNav']->value) {?>
<div class="row">
    <div class="col-md-12">
        <ul class="breadcrumb">
            <li><a href="?a=admin&m=welcome">后台首页</a></li>
            <li><a href="?a=nav&action=show">导航设置</a></li>
            <li class="active">添加<b><?php echo $_smarty_tpl->tpl_vars['data1']->value->name;?>
</b>子导航</li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <form method="post" enctype="multipart/form-data" action="">
            <table class="table table-bordered table-striped table-hover">
                <tr style="height: 44px">
                    <th colspan="2" style="color:blue;position: relative">
                        <a href="?a=nav&action=showSubNav&id=<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
" style="position: absolute;left:5%">查看导航</a>
                        <h3 style="display: inline">【<?php echo $_smarty_tpl->tpl_vars['data1']->value->name;?>
】</h3>
                    </th>
                </tr>
                <tr>
                    <td class="text-right" width="120">导航名称</td>
                    <td>
                        <input type="text" class="form-control" name="name">
                    </td>
                </tr>
                <tr>
                    <td class="text-right">导航描述</td>
                    <td>
                        <textarea type="text" class="form-control" name="description"></textarea>
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
                        <button class="btn btn-primary confirmNav" data-dismiss="modal">确认</button>
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
