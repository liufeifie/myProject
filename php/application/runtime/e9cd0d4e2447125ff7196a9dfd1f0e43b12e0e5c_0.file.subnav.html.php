<?php
/* Smarty version 3.1.30, created on 2017-03-06 21:43:00
  from "D:\wamp\www\project\application\views\home\subnav.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58bd6764684a46_47275472',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e9cd0d4e2447125ff7196a9dfd1f0e43b12e0e5c' => 
    array (
      0 => 'D:\\wamp\\www\\project\\application\\views\\home\\subnav.html',
      1 => 1485001052,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:home/header.html' => 1,
    'file:home/footer.html' => 1,
  ),
),false)) {
function content_58bd6764684a46_47275472 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_truncate')) require_once 'D:\\wamp\\www\\project\\libs\\smarty\\plugins\\modifier.truncate.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>subnav</title>
    <link href="libs/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="libs/bootstrap/css/bootstrap-theme.css" rel="stylesheet">
    <link href="public/styles/home.css" rel="stylesheet">
    <!-- <?php echo '<script'; ?>
 src="libs/requireJS/require.js" data-main="public/scripts/admin"><?php echo '</script'; ?>
>-->
    <?php echo '<script'; ?>
 src="libs/requireJS/require.js" data-main="public/scripts/home"><?php echo '</script'; ?>
>
</head>
<body class="body">
<?php $_smarty_tpl->_subTemplateRender("file:home/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container">
    <!--有子导航-->
    <?php if ($_smarty_tpl->tpl_vars['one']->value) {?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['frontNav']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
    <div class="row">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="?a=home">首页</a></li>
                <li><?php echo $_smarty_tpl->tpl_vars['v']->value->name;?>
</li>
            </ul>
        </div>
    </div>
    <div class="row allArticle">
        <div class="col-md-12">
            <table class="table table-hover ">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['allTargetNav']->value[$_smarty_tpl->tpl_vars['k']->value], 'vs1', false, 'ks1');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['ks1']->value => $_smarty_tpl->tpl_vars['vs1']->value) {
?>
                <tr class="article">
                    <td>
                        <a href="?a=article&m=detail&id=<?php echo $_smarty_tpl->tpl_vars['vs1']->value->id;?>
" target="_blank">
                            <img src="public/uploads/article/<?php echo $_smarty_tpl->tpl_vars['vs1']->value->thumbnail;?>
" alt="" class="img-circle" height="100"
                                 width="80">
                        </a>
                    </td>
                    <td class="infoArticle">
                        <a href="?a=article&m=detail&id=<?php echo $_smarty_tpl->tpl_vars['vs1']->value->id;?>
" target="_blank" class="h2">
                            <?php echo smarty_modifier_truncate(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['vs1']->value->title),'15','...',true);?>

                        </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span>
                            <b>栏目:</b> <?php echo $_smarty_tpl->tpl_vars['vs1']->value->nid;?>

                            <b>作者:</b> <?php echo $_smarty_tpl->tpl_vars['vs1']->value->author;?>

                            <b>来源:</b> <?php echo $_smarty_tpl->tpl_vars['vs1']->value->source;?>

                            <b>浏览次数:</b> <?php echo $_smarty_tpl->tpl_vars['vs1']->value->pageview;?>

                        </span>
                    </td>
                    <td>
                        <a href="?a=article&m=detail&id=<?php echo $_smarty_tpl->tpl_vars['vs1']->value->id;?>
" target="_blank">
                            <?php echo smarty_modifier_truncate(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['vs1']->value->content),'120','...',true);?>

                        </a>
                    </td>
                </tr>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            </table>
        </div>
    </div>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    <?php }?>
    <!--没有子导航-->
    <?php if ($_smarty_tpl->tpl_vars['two']->value) {?>
    <div class="row">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="?a=home">首页</a></li>
                <li><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</li>
            </ul>
        </div>
    </div>
    <div class="row allArticle">
        <div class="col-md-12">
            <table class="table table-hover ">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['targetArticle']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
                <tr class="article">
                    <td>
                        <a href="?a=article&m=detail&id=<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
" target="_blank">
                            <img src="public/uploads/article/<?php echo $_smarty_tpl->tpl_vars['v']->value->thumbnail;?>
" alt="" class="img-circle" height="100"
                                 width="80">
                        </a>
                    </td>
                    <td class="infoArticle">
                        <a href="?a=article&m=detail&id=<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
" target="_blank" class="h2">
                            <?php echo smarty_modifier_truncate(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['v']->value->title),'15','...',true);?>

                        </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span>
                            <b>栏目:</b> <?php echo $_smarty_tpl->tpl_vars['v']->value->nid;?>

                            <b>作者:</b> <?php echo $_smarty_tpl->tpl_vars['v']->value->author;?>

                            <b>来源:</b> <?php echo $_smarty_tpl->tpl_vars['v']->value->source;?>

                            <b>浏览次数:</b> <?php echo $_smarty_tpl->tpl_vars['v']->value->pageview;?>

                        </span>
                    </td>
                    <td>
                        <a href="?a=article&m=detail&id=<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
" target="_blank">
                            <?php echo smarty_modifier_truncate(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['v']->value->content),'120','...',true);?>

                        </a>
                    </td>
                </tr>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            </table>
        </div>
    </div>
    <?php }?>
    <?php $_smarty_tpl->_subTemplateRender("file:home/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</div>
<div id='progressBox'>
    <div class='progress'>
        <div id='progress-bar' class='progress-bar progress-bar-striped active' style='width: 0%;'>
            <span id='num1'>0%</span>
            <span id='num' style="display: none">0%</span>
        </div>
    </div>
</div>
</body>
</html><?php }
}
