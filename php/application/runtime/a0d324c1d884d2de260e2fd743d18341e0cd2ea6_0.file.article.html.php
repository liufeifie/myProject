<?php
/* Smarty version 3.1.30, created on 2017-02-12 09:56:44
  from "D:\wamp\www\project\application\views\admin\article.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_589fc0dcdefbb6_13220092',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a0d324c1d884d2de260e2fd743d18341e0cd2ea6' => 
    array (
      0 => 'D:\\wamp\\www\\project\\application\\views\\admin\\article.html',
      1 => 1483860678,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_589fc0dcdefbb6_13220092 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_truncate')) require_once 'D:\\wamp\\www\\project\\libs\\smarty\\plugins\\modifier.truncate.php';
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
 src='libs/requireJS/require.js' data-main="public/scripts/main"><?php echo '</script'; ?>
>
</head>
<body style="overflow-x:hidden;">
<!--显示文章-->
<?php if ($_smarty_tpl->tpl_vars['show']->value) {?>
<div class="row">
    <div class="col-md-12">
        <ul class="breadcrumb">
            <li><a href="?a=admin&m=welcome">后台首页</a></li>
            <li><a href="?a=article&action=show">文章管理</a></li>
            <li class="active">所有文章</li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered table-striped table-hover text-center">
            <tr><!--truncate:'10':'...'-->
                <th>文章标题</th>
                <th>文章属性</th>
                <th>文章栏目</th>
                <th>文章Tag</th>
                <th>文章作者</th>
                <th>文章来源</th>
                <th>文章状态</th>
                <th>文章导语</th>
                <th>文章内容</th>
                <th>文章操作</th>
                <th width="80">批量删除<input type="checkbox" class="allCheck" id="allCheck"></th>
            </tr>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['allArticle']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
            <tr>
                <td>
                    <a href="?a=article&m=detail&id=<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
" target="_blank">
                        <?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['v']->value->title,'10','...');?>

                    </a>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['v']->value->attr;?>
</td>
                <td><?php echo smarty_modifier_truncate(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['v']->value->nid),'10','...',true);?>
</td>
                <td><?php echo smarty_modifier_truncate(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['v']->value->tag),'10','...',true);?>
</td>
                <td><?php echo smarty_modifier_truncate(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['v']->value->author),'10','...',true);?>
</td>
                <td><?php echo smarty_modifier_truncate(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['v']->value->source),'10','...',true);?>
</td>
                <td width="110"><?php echo $_smarty_tpl->tpl_vars['v']->value->state;?>
</td>
                <td><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['v']->value->lead,'10','...');?>
</td>
                <td><?php echo smarty_modifier_truncate(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['v']->value->content),'20','...',true);?>
</td>
                <td width="100">
                    <a href="?a=article&action=update&id=<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
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
                <td colspan="10" class="page">
                    <?php echo $_smarty_tpl->tpl_vars['list']->value;?>

                </td>
                <td>
                    <input type="button" name="send" value="删除选中" class="btn btn-primary send1">
                </td>
            </tr>
        </table>
    </div>
</div>
<?php }?>
<!--添加文章-->
<?php if ($_smarty_tpl->tpl_vars['add']->value) {?>
<div class="row">
    <div class="col-md-12">
        <ul class="breadcrumb">
            <li><a href="?a=admin&m=welcome">后台首页</a></li>
            <li><a href="?a=article&action=show">文章管理</a></li>
            <li class="active">添加文章</li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <form method="post" action="" enctype="multipart/form-data">
            <table class="table table-bordered table-striped table-hover article">
                <tr>
                    <th>文章栏目 :</th>
                    <td>
                        <select name="nid" class="form-control input-sm" style="width: 20%;appearance:none">
                            <option>必须选择一个栏目</option>
                            <?php echo $_smarty_tpl->tpl_vars['nav']->value;?>

                        </select>
                    </td>
                </tr>
                <tr>
                    <th>文章属性 :</th>
                    <td>
                        <input type="checkbox" name="attr[]" value="1" id="headline">
                        <label for="headline">头条</label>
                        <input type="checkbox" name="attr[]" value="2" id="recommend">
                        <label for="recommend">推荐</label>
                        <input type="checkbox" name="attr[]" value="3" id="dissertation">
                        <label for="dissertation">专题</label>
                    </td>
                </tr>
                <tr>
                    <th>文章标题 :</th>
                    <td><input type="text" name="title" class="form-control"></td>
                </tr>
                <tr>
                    <th>文章作者 :</th>
                    <td><input type="text" name="author" class="form-control"></td>
                </tr>
                <tr>
                    <th>文章Tag:</th>
                    <td><input type="text" name="tag" class="form-control"></td>
                </tr>
                <tr>
                    <th>缩略图 :</th>
                    <td>
                        <label for="pic" style="cursor: pointer">上传文件</label>
                        <input type="file" name="pic" id="pic" style="display: none">
                    </td>
                </tr>
                <tr>
                    <th>缩略图预览 :</th>
                    <td><img src="public/images/default.png" width="100" id="preview"></td>
                </tr>
                <tr>
                    <th>文章来源 :</th>
                    <td><input type="text" name="source" class="form-control"></td>
                </tr>
                <tr>
                    <th>文章导语 :</th>
                    <td><input type="text" name="lead" class="form-control"></td>
                </tr>
                <tr>
                    <th>文章内容 :</th>
                    <td width="85%">
                        <textarea id="commentEditor" name="content" type="width:100%">

                        </textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center">
                        <input type="submit" name="send" class="btn btn-primary">
                    </td>
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
            <li><a href="?a=admin&m=welcome">后台首页</a></li>
            <li><a href="?a=article&action=show">文章管理</a></li>
            <li class="active">修改文章</li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <form method="post" action="" enctype="multipart/form-data">
            <table class="table table-bordered table-striped table-hover article">
                <tr>
                    <th>文章栏目 :</th>
                    <td>
                        <select name="nid" class="form-control input-sm" style="width: 20%;appearance:none">
                            <option>必须选择一个栏目</option>
                            <?php echo $_smarty_tpl->tpl_vars['nav']->value;?>

                        </select>
                    </td>
                </tr>
                <tr>
                    <th>文章属性 :</th>
                    <td>
                        <input type="checkbox" name="attr[]" value="1" id="headline1" <?php echo $_smarty_tpl->tpl_vars['headline']->value;?>
>
                        <label for="headline1">头条</label>
                        <input type="checkbox" name="attr[]" value="2" id="recommend1" <?php echo $_smarty_tpl->tpl_vars['recommend']->value;?>
>
                        <label for="recommend1">推荐</label>
                        <input type="checkbox" name="attr[]" value="3" id="dissertation1" <?php echo $_smarty_tpl->tpl_vars['dissertation']->value;?>
>
                        <label for="dissertation1">专题</label>
                    </td>
                </tr>
                <tr>
                    <th>文章标题 :</th>
                    <td><input type="text" name="title" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['oneArticle']->value->title;?>
"></td>
                </tr>
                <tr>
                    <th>文章作者 :</th>
                    <td><input type="text" name="author" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['oneArticle']->value->author;?>
"></td>
                </tr>
                <tr>
                    <th>文章Tag:</th>
                    <td><input type="text" name="tag" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['oneArticle']->value->tag;?>
"></td>
                </tr>
                <tr>
                    <th>缩略图 :</th>
                    <td>
                        <label for="pic" style="cursor: pointer">上传文件</label>
                        <input type="file" name="pic" id="pic" style="display: none">
                    </td>
                </tr>
                <tr>
                    <th>缩略图预览 :</th>
                    <td>
                        <img src="public/uploads/article/<?php echo $_smarty_tpl->tpl_vars['oneArticle']->value->thumbnail;?>
" width="100">
                        <img src="public/images/default.png" width="100" id="preview">
                    </td>
                </tr>
                <tr>
                    <th>文章来源 :</th>
                    <td><input type="text" name="source" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['oneArticle']->value->source;?>
"></td>
                </tr>
                <tr>
                    <th>文章导语 :</th>
                    <td><input type="text" name="lead" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['oneArticle']->value->lead;?>
"></td>
                </tr>
                <tr>
                    <th>文章内容 :</th>
                    <td width="85%">
                        <textarea id="commentEditor" name="content" type="width:100%">
                         <?php echo $_smarty_tpl->tpl_vars['oneArticle']->value->content;?>

                        </textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center">
                        <input type="submit" name="send" class="btn btn-primary">
                    </td>
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
                        <button class="btn btn-primary confirmArticle" data-dismiss="modal">确认</button>
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
<!--编辑-->
<?php echo '<script'; ?>
 src="libs/ueditor/utf8-php/ueditor.config.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="libs/ueditor/utf8-php/ueditor.all.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    var ue = UE.getEditor('commentEditor');
<?php echo '</script'; ?>
>

</body>
</html><?php }
}
