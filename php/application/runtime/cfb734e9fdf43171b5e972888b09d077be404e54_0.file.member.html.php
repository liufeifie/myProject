<?php
/* Smarty version 3.1.30, created on 2017-02-12 09:57:42
  from "D:\wamp\www\project\application\views\admin\member.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_589fc116c12958_29168762',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cfb734e9fdf43171b5e972888b09d077be404e54' => 
    array (
      0 => 'D:\\wamp\\www\\project\\application\\views\\admin\\member.html',
      1 => 1484134140,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_589fc116c12958_29168762 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>会员管理</title>
    <link href="libs/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="libs/bootstrap/css/bootstrap-theme.css" rel="stylesheet">
    <link href="public/styles/admin.css" rel="stylesheet">
    <link href="public/styles/Tools.css" rel="stylesheet">
    <link href="public/styles/page.css" rel="stylesheet">
    <?php echo '<script'; ?>
 src="libs/requireJS/require.js" data-main="public/scripts/main"><?php echo '</script'; ?>
>
</head>
<body style="overflow-x: hidden">
<!--显示-->
<?php if ($_smarty_tpl->tpl_vars['show']->value) {?>
<div class="row">
    <div class="col-md-12">
        <ul class="breadcrumb">
            <li><a href="?a=admin&m=welcome">后台首页</a></li>
            <li><a href="?a=member&action=show">会员管理</a></li>
            <li class="active">所有会员</li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered table-striped table-hover text-center">
            <tr>
                <th>头像</th>
                <th>用户名</th>
                <th>手机号</th>
                <th>邮箱</th>
                <th>登录次数</th>
                <th>最后登录时间</th>
                <th>注册时间</th>
                <th>操作</th>
                <th>
                    <label for="allCheck">全选:</label>
                    <input type="checkbox" class="allCheck" id="allCheck">
                </th>
            </tr>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['memberData']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
            <tr>
                <td><img src="public/uploads/register/<?php echo $_smarty_tpl->tpl_vars['v']->value->pic;?>
" width="50" height="50"></td>
                <td><?php echo $_smarty_tpl->tpl_vars['v']->value->user;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['v']->value->phone;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['v']->value->email;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['v']->value->login_num;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['v']->value->last_time;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['v']->value->reg_time;?>
</td>
                <td>
                    <a href="?a=member&action=update&id=<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
">
                        <img src="public/images/icon_edit.gif" title="修改">
                    </a>
                    <a><!--href="?a=ad&action=delete&id=<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
"-->
                        <img src="public/images/icon_drop.gif" title="删除" class="delete" name="<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
">
                    </a>
                   <!-- <a href="?a=member&action=delete&id=<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
">删除</a>-->
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
                <td colspan="8">
                    <div class="page" style="width:400px;margin: auto"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</div>
                </td>
                <td>
                    <input type="button" name="send" value="删除选中" class="btn btn-primary send1">
                </td>
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
            <li><a href="?a=member&action=show">会员管理</a></li>
            <li class="active">会员修改</li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <form method="post" enctype="multipart/form-data" action="">
            <table class="table table-bordered table-striped table-hover article">
                <tr>
                    <th width="120">会员头像</th>
                    <td>
                        <img src="public/uploads/register/<?php echo $_smarty_tpl->tpl_vars['oneMember']->value->pic;?>
" width="50" height="50" id="preview">
                        <label for="pic" style="position: relative;top: 15px;">修改头像</label>
                        <input type="file" name="pic" id="pic" style="display: none">
                    </td>
                </tr>
                <tr>
                    <th width="120">会员名称</th>
                    <td><input type="text" class="form-control" name="user" value="<?php echo $_smarty_tpl->tpl_vars['oneMember']->value->user;?>
" ></td>
                </tr>
                <tr>
                    <th width="120">新密码</th>
                    <td>
                        <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['oneMember']->value->pwd;?>
" name="pwd0" >
                        <input type="text" class="form-control" name="pwd">
                    </td>
                </tr>
                <tr>
                    <th width="120">性别</th>
                    <td>
                       <input type="radio" name="sex" id="male" value="男" <?php echo $_smarty_tpl->tpl_vars['male']->value;?>
><label for="male">：男</label>
                        &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="sex" id="female" value="女" <?php echo $_smarty_tpl->tpl_vars['female']->value;?>
><label for="female">：女</label>
                    </td>
                </tr>
                <tr>
                    <th width="120">手机号</th>
                    <td>
                        <input type="text" class="form-control" name="phone" value="<?php echo $_smarty_tpl->tpl_vars['oneMember']->value->phone;?>
">
                    </td>
                </tr>
                <tr>
                    <th width="120">邮箱</th>
                    <td>
                        <input type="text" class="form-control" name="email" value="<?php echo $_smarty_tpl->tpl_vars['oneMember']->value->email;?>
">
                    </td>
                </tr>
                <tr>
                    <th>出生日期</th>
                    <td>
                        <select class="year" name="year">
                            <?php if ($_smarty_tpl->tpl_vars['oneMember']->value->birth) {?>
                            <option><?php echo $_smarty_tpl->tpl_vars['oneMember']->value->year;?>
</option>
                            <?php } else { ?>
                            <option>请选择年份</option>
                            <?php }?>
                        </select>
                        <select class="month" name="month">
                            <?php if ($_smarty_tpl->tpl_vars['oneMember']->value->birth) {?>
                            <option><?php echo $_smarty_tpl->tpl_vars['oneMember']->value->month;?>
</option>
                            <?php } else { ?>
                            <option>请选择月份</option>
                            <?php }?>
                        </select>
                        <select class="day" name="day">
                            <?php if ($_smarty_tpl->tpl_vars['oneMember']->value->birth) {?>
                            <option><?php echo $_smarty_tpl->tpl_vars['oneMember']->value->day;?>
</option>
                            <?php } else { ?>
                            <option>请选择天数</option>
                            <?php }?>
                        </select>
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
                        <button class="btn btn-primary confirmMember" data-dismiss="modal">确认</button>
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
