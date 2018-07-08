<?php
/* Smarty version 3.1.30, created on 2017-02-10 12:56:27
  from "D:\wamp\www\project\application\views\admin\exam.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_589d47fb2c9d75_90738982',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f979e8f189bbff47cbd9d13abac57b096ddcaec7' => 
    array (
      0 => 'D:\\wamp\\www\\project\\application\\views\\admin\\exam.html',
      1 => 1486373315,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_589d47fb2c9d75_90738982 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_truncate')) require_once 'D:\\wamp\\www\\project\\libs\\smarty\\plugins\\modifier.truncate.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>exam</title>
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

<?php if ($_smarty_tpl->tpl_vars['show']->value) {?>
<div class="row">
    <div class="col-md-12">
        <ul class="breadcrumb">
            <li><a href="?a=admin&m=welcome">后台首页</a></li>
            <li><a href="?a=exam&action=show">试题管理</a></li>
            <li class="active">所有试题</li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered table-striped table-hover text-center">
            <tr><!--truncate:'10':'...'-->
                <th width="30%">试题题目</th>
                <th>试题栏目</th>
                <th>试题状态</th>
                <th>正确率</th>
                <th>添加时间</th>
                <th>试题操作</th>
                <th width="80">批量删除<input type="checkbox" class="allCheck" id="allCheck"></th>
            </tr>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['allExam']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
            <tr>
                <td class="text-left"><?php echo smarty_modifier_truncate(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['v']->value->title),20,'...',true);?>
</td>
                <td><?php echo smarty_modifier_truncate(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['v']->value->nid),'10','...',true);?>
</td>
                <td width="110"><?php echo $_smarty_tpl->tpl_vars['v']->value->state;?>
</td>
                <?php if ($_smarty_tpl->tpl_vars['v']->value->test_num != 0) {?>
                <td><?php echo $_smarty_tpl->tpl_vars['v']->value->true_num;?>
/<?php echo $_smarty_tpl->tpl_vars['v']->value->test_num;?>
=<b><?php echo $_smarty_tpl->tpl_vars['v']->value->accuracy;?>
</b></td>
                <?php } else { ?>
                <td>未出现</td>
                <?php }?>

                <td><?php echo $_smarty_tpl->tpl_vars['v']->value->reg_time;?>
</td>
                <td width="100">
                    <a href="?a=exam&action=update&id=<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
">
                        <img src="public/images/icon_edit.gif" title="修改">
                    </a>
                    <a><!--href="?a=ad&action=delete&id=<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
"-->
                        <img src="public/images/icon_drop.gif" title="删除" class="delete" name="<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
">
                    </a>
                </td>
                <td class="text-center">单选:
                    <input type="checkbox" name="check[]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
" class="choice">
                </td>
            </tr>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            <tr>
                <td colspan="6" class="page">
                    <?php echo $_smarty_tpl->tpl_vars['page']->value;?>

                </td>
                <td>
                    <input type="button" name="send" value="删除选中" class="btn btn-primary send1">
                </td>
            </tr>
        </table>
    </div>
</div>
<?php }
if ($_smarty_tpl->tpl_vars['add']->value) {?>
<div class="row">
    <div class="col-md-12">
        <ul class="breadcrumb">
            <li><a href="?a=admin">后台首页</a></li>
            <li><a href="?a=exam&action=show">试题管理</a></li>
            <li class="active">添加试题</li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <form action="" method="post">
            <table class="table table-bordered table-striped table-hover article">
                <tr>
                    <th width="150">试题类型</th>
                    <td>
                        <select name="nid" class="form-control" style="width: 200px">
                            <option value="">选择试题类型</option>
                            <?php echo $_smarty_tpl->tpl_vars['nav']->value;?>

                        </select>
                    </td>
                </tr>
                <tr>
                    <th width="150">试题标题</th>
                    <td><textarea class="form-control" name="title"></textarea></td>
                </tr>
                <tr>
                    <th>
                        选项A:
                    </th>
                    <td>
                        <textarea type="text" class="form-control" name="A"></textarea>
                    </td>
                </tr>
                <tr>
                    <th>
                        选项B:
                    </th>
                    <td>
                        <textarea type="text" class="form-control" name="B"></textarea>
                    </td>
                </tr>
                <tr>
                    <th>
                        选项C:
                    </th>
                    <td>
                        <textarea type="text" class="form-control" name="C"></textarea>
                    </td>
                </tr>
                <tr>
                    <th>
                        选项D:
                    </th>
                    <td>
                        <textarea type="text" class="form-control" name="D"></textarea>
                    </td>
                </tr>
                <tr>
                    <th>正确答案</th>
                    <td>
                        <label for="A">A:</label><input type="radio" id="A" name="answer" value="A">&nbsp;&nbsp;&nbsp;
                        <label for="B">B:</label><input type="radio" id="B" name="answer" value="B">&nbsp;&nbsp;&nbsp;
                        <label for="C">C:</label><input type="radio" id="C" name="answer" value="C">&nbsp;&nbsp;&nbsp;
                        <label for="D">D:</label><input type="radio" id="D" name="answer" value="D">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" class="btn btn-success" name="send"></td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php }
if ($_smarty_tpl->tpl_vars['update']->value) {?>
<div class="row">
    <div class="col-md-12">
        <ul class="breadcrumb">
            <li><a href="?a=admin">后台首页</a></li>
            <li><a href="?a=exam&action=show">试题管理</a></li>
            <li class="active">修改试题</li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <form action="" method="post">
            <table class="table table-bordered table-striped table-hover article">
                <tr>
                    <th width="150">试题类型</th>
                    <td>
                        <select name="nid" class="form-control" style="width: 200px">
                            <option value="0">选择试题类型</option>
                            <?php echo $_smarty_tpl->tpl_vars['nav']->value;?>

                        </select>
                    </td>
                </tr>
                <tr>
                    <th width="150">试题标题</th>
                    <td><textarea class="form-control" name="title"><?php echo $_smarty_tpl->tpl_vars['oneExam']->value->title;?>
</textarea></td>
                </tr>
                <tr>
                    <th>
                        选项A:
                    </th>
                    <td>
                        <textarea type="text" class="form-control" name="A"><?php echo $_smarty_tpl->tpl_vars['oneExam']->value->A;?>
</textarea>
                    </td>
                </tr>
                <tr>
                    <th>
                        选项B:
                    </th>
                    <td>
                        <textarea type="text" class="form-control" name="B"><?php echo $_smarty_tpl->tpl_vars['oneExam']->value->B;?>
</textarea>
                    </td>
                </tr>
                <tr>
                    <th>
                        选项C:
                    </th>
                    <td>
                        <textarea type="text" class="form-control" name="C"><?php echo $_smarty_tpl->tpl_vars['oneExam']->value->C;?>
</textarea>
                    </td>
                </tr>
                <tr>
                    <th>
                        选项D:
                    </th>
                    <td>
                        <textarea type="text" class="form-control" name="D"><?php echo $_smarty_tpl->tpl_vars['oneExam']->value->D;?>
</textarea>
                    </td>
                </tr>
                <tr>
                    <th>正确答案</th>
                    <td>
                        <label for="A1">A:</label><input type="radio" id="A1" name="answer" value="A" <?php echo $_smarty_tpl->tpl_vars['A']->value;?>
>&nbsp;&nbsp;&nbsp;
                        <label for="B1">B:</label><input type="radio" id="B1" name="answer" value="B" <?php echo $_smarty_tpl->tpl_vars['B']->value;?>
>&nbsp;&nbsp;&nbsp;
                        <label for="C1">C:</label><input type="radio" id="C1" name="answer" value="C" <?php echo $_smarty_tpl->tpl_vars['C']->value;?>
>&nbsp;&nbsp;&nbsp;
                        <label for="D1">D:</label><input type="radio" id="D1" name="answer" value="D" <?php echo $_smarty_tpl->tpl_vars['D']->value;?>
>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" class="btn btn-success" name="send"></td>
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
                    <div class="modal-body text-center">
                        <p class="h2 infoTip">是否确认删除</p>
                        <button class="btn btn-primary confirmExam" data-dismiss="modal">确认</button>
                        <button class="btn btn-primary cancel" data-dismiss="modal">取消</button>
                    </div>
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
