<?php
/* Smarty version 3.1.30, created on 2017-02-12 09:56:25
  from "D:\wamp\www\project\application\views\admin\ad.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_589fc0c985c362_04229653',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '98226efd8e5235c967de6132062d7ed0085cacc4' => 
    array (
      0 => 'D:\\wamp\\www\\project\\application\\views\\admin\\ad.html',
      1 => 1484043766,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_589fc0c985c362_04229653 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_truncate')) require_once 'D:\\wamp\\www\\project\\libs\\smarty\\plugins\\modifier.truncate.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>广告管理</title>
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
            <li><a href="?a=ad&action=show">广告管理</a></li>
            <li class="active">所有广告</li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered table-striped table-hover text-center">
            <tr>
                <th>广告标题</th>
                <th>广告链接</th>
                <th>广告描述</th>
                <th>广告类型</th>
                <th>广告状态</th>
                <th>创建时间</th>
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
                <td><?php echo smarty_modifier_truncate(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['v']->value->title),'15','...',true);?>
</td>
                <td><?php echo smarty_modifier_truncate(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['v']->value->link),'30','...',true);?>
</td>
                <td><?php echo smarty_modifier_truncate(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['v']->value->description),'15','...',true);?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['v']->value->type;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['v']->value->state;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['v']->value->date;?>
</td>
                <td>
                    <a href="?a=ad&action=update&id=<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
">
                        <img src="public/images/icon_edit.gif" title="修改">
                    </a>
                    <a><!--href="?a=ad&action=delete&id=<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
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
                <td colspan="7"> </td>
                <td>
                    <input type="button" name="send" value="删除选中" class="btn btn-primary send1">
                </td>
            </tr>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="page" style="width:60%;margin: auto">
            <?php echo $_smarty_tpl->tpl_vars['page']->value;?>

            <form action="?a=ad&action=show" method="get">
                <ul>
                    <li>显示广告类型:
                        <input type="hidden" name="a" value="ad">
                        <input type="hidden" name="action" value="show">
                        <select name="kind" class="input-sm">
                            <option value="0" <?php echo $_smarty_tpl->tpl_vars['all']->value;?>
>所有广告</option>
                            <option value="1" <?php echo $_smarty_tpl->tpl_vars['banner']->value;?>
>banner广告</option>
                            <option value="2" <?php echo $_smarty_tpl->tpl_vars['slider']->value;?>
>slider广告</option>
                            <option value="3" <?php echo $_smarty_tpl->tpl_vars['fullcolum']->value;?>
>fullcolum广告</option>
                            <option value="4" <?php echo $_smarty_tpl->tpl_vars['sidebar']->value;?>
>sidebar广告</option>
                        </select>
                    </li>
                    <input type="submit" class="btn btn-success">
                </ul>
            </form>
        </div>
    </div>
</div>
<?php }?>
<!--修改-->
<?php if ($_smarty_tpl->tpl_vars['update']->value) {?>
<div class="row">
    <div class="col-md-12">
        <ul class="breadcrumb">
            <li><a href="?a=admin&m=welcome">后台首页</a></li>
            <li><a href="?a=ad&action=show">广告管理</a></li>
            <li class="active">修改广告</li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <form method="post" enctype="multipart/form-data" action="">
            <table class="table table-bordered table-striped table-hover">
                <tr>
                    <td class="text-right">广告类型</td>
                    <td>
                        <input type="radio" id="banner1" name="type" value="1" <?php echo $_smarty_tpl->tpl_vars['banner']->value;?>
>
                        <label for="banner1">banner广告</label>&nbsp;
                        <input type="radio" id="slider1" name="type" value="2" <?php echo $_smarty_tpl->tpl_vars['slider']->value;?>
>
                        <label for="slider1">slider广告</label>&nbsp;
                        <input type="radio" id="fullcolum1" name="type" value="3" <?php echo $_smarty_tpl->tpl_vars['fullcolum']->value;?>
>
                        <label for="fullcolum1">fullcolum广告</label>&nbsp;
                        <input type="radio" id="sidebar1" name="type" value="4" <?php echo $_smarty_tpl->tpl_vars['sidebar']->value;?>
>
                        <label for="sidebar1">sliderbar广告</label>
                    </td>
                </tr>
                <tr>
                    <td class="text-right">广告标题</td>
                    <td>
                        <input type="text" class="form-control" name="title" value="<?php echo $_smarty_tpl->tpl_vars['oneAd']->value->title;?>
">
                    </td>
                </tr>
                <tr>
                    <td class="text-right">广告链接</td>
                    <td>
                        <input type="text" class="form-control" name="link" value="<?php echo $_smarty_tpl->tpl_vars['oneAd']->value->link;?>
">
                    </td>
                </tr>
                <tr>
                    <td class="text-right">广告描述</td>
                    <td>
                        <input type="text" class="form-control" name="description" value="<?php echo $_smarty_tpl->tpl_vars['oneAd']->value->description;?>
">
                    </td>
                </tr>
                <tr>
                    <td class="text-right">广告图片</td>
                    <td>
                        <label for="pic" class="text-primary" style="cursor: pointer">上传图片</label>
                        <input type="file" class="form-control" id="pic" name="thumbnail" style="display: none">
                    </td>
                </tr>
                <tr>
                    <td class="text-right">图片预览</td>
                    <td>
                        <?php if ($_smarty_tpl->tpl_vars['pic']->value && $_smarty_tpl->tpl_vars['len']->value > 52) {?>
                        <img src="public/images/default.png" class="preview">
                        <?php } else { ?>
                        <img src="public/uploads/ad/<?php echo $_smarty_tpl->tpl_vars['oneAd']->value->thumbnail;?>
" class="preview">&nbsp;&nbsp;
                        <?php }?>
                        <img src="public/images/default.png" id="preview" class="preview">
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
            <li><a href="?a=ad&action=show">广告管理</a></li>
            <li class="active">添加广告</li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <form method="post" enctype="multipart/form-data" action="">
            <table class="table table-bordered table-striped table-hover">
                <tr>
                    <td class="text-right">广告类型</td>
                    <td>
                        <input type="radio" id="banner" name="type" value="1">
                        <label for="banner">banner广告</label>&nbsp;
                        <input type="radio" id="slider" name="type" value="2">
                        <label for="slider">slider广告</label>&nbsp;
                        <input type="radio" id="fullcolum" name="type" value="3">
                        <label for="fullcolum">fullcolum广告</label>&nbsp;
                        <input type="radio" id="sidebar" name="type" value="4">
                        <label for="sidebar">sliderbar广告</label>
                    </td>
                </tr>
                <tr>
                    <td class="text-right">广告标题</td>
                    <td>
                        <input type="text" class="form-control" name="title">
                    </td>
                </tr>
                <tr>
                    <td class="text-right">广告链接</td>
                    <td>
                        <input type="text" class="form-control" name="link">
                    </td>
                </tr>
                <tr>
                    <td class="text-right">广告描述</td>
                    <td>
                        <input type="text" class="form-control" name="description">
                    </td>
                </tr>
                <tr>
                    <td class="text-right">广告图片</td>
                    <td>
                        <label for="pic" class="text-primary" style="cursor: pointer">上传图片</label>
                        <input type="file" class="form-control" id="pic" name="thumbnail" style="display: none">
                    </td>
                </tr>
                <tr>
                    <td class="text-right">图片预览</td>
                    <td>
                        <img src="public/images/default.png" id="preview" class="preview">
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
                        <button class="btn btn-primary confirmAd" data-dismiss="modal">确认</button>
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
