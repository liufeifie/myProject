<?php
/* Smarty version 3.1.30, created on 2017-02-12 09:51:39
  from "D:\wamp\www\project\application\views\home\detail.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_589fbfabc378d6_82528811',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '161272e5746ad08a770641b801eccea44ac2eb98' => 
    array (
      0 => 'D:\\wamp\\www\\project\\application\\views\\home\\detail.html',
      1 => 1485093638,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:home/header.html' => 1,
    'file:home/footer.html' => 1,
  ),
),false)) {
function content_589fbfabc378d6_82528811 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_truncate')) require_once 'D:\\wamp\\www\\project\\libs\\smarty\\plugins\\modifier.truncate.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>detail</title>
    <link href="libs/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="libs/bootstrap/css/bootstrap-theme.css" rel="stylesheet">
    <link href="public/styles/home.css" rel="stylesheet">
    <link href="public/styles/page.css" rel="stylesheet">
    <?php echo '<script'; ?>
 src="libs/requireJS/require.js" data-main="public/scripts/home"><?php echo '</script'; ?>
>
</head>
<body style="background: #F5F5F5" class="detail">
<?php $_smarty_tpl->_subTemplateRender("file:home/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container">
    <!--一篇文章-->
    <?php if ($_smarty_tpl->tpl_vars['one']->value) {?>
    <div class="row">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="?a=home">首页</a></li>
                <li><a href="?a=article&m=allArticle">文章显示</a></li>
                <li class="active"><?php echo $_smarty_tpl->tpl_vars['oneArticle']->value->title;?>
</li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class=" col-md-12">
            <table class="table table-responsive table-hover table-striped">
                <tr>
                    <th colspan="4" style="text-align: center"><h2><?php echo $_smarty_tpl->tpl_vars['oneArticle']->value->title;?>
</h2></th>
                </tr>
                <tr>
                    <td><b>发表时间:</b> <?php echo $_smarty_tpl->tpl_vars['oneArticle']->value->createTime;?>
</td>
                    <td><b>阅读量:</b> <?php echo $_smarty_tpl->tpl_vars['oneArticle']->value->pageview;?>
</td>
                    <td><b>来源:</b> <?php echo $_smarty_tpl->tpl_vars['oneArticle']->value->source;?>
</td>
                    <td><b>作者:</b> <?php echo $_smarty_tpl->tpl_vars['oneArticle']->value->author;?>
</td>
                </tr>
                <tr>
                    <td colspan="4" class="text-right">
                        <b>分享到: </b>
                        <div class="bshare-custom" style="display: inline">
                            <a title="分享到QQ空间" class="bshare-qzone"></a>
                            <a title="分享到新浪微博" class="bshare-sinaminiblog"></a>
                            <a title="分享到人人网" class="bshare-renren"></a>
                            <a title="分享到腾讯微博" class="bshare-qqmb"></a>
                            <a title="分享到网易微博" class="bshare-neteasemb"></a>
                            <a title="更多平台" class="bshare-more bshare-more-icon more-style-addthis"></a>
                            <span class="BSHARE_COUNT bshare-share-count">0</span>
                        </div>
                        <?php echo '<script'; ?>
 type="text/javascript" charset="utf-8"
                                src="http://static.bshare.cn/b/button.js#style=-1&amp;
                              uuid=&amp;pophcol=2&amp;lang=zh"><?php echo '</script'; ?>
>
                        <a class="bshareDiv" onclick="javascript:return false;"></a>
                        <?php echo '<script'; ?>
 type="text/javascript" charset="utf-8"
                                src="http://static.bshare.cn/b/bshareC0.js"><?php echo '</script'; ?>
>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" class="content">
                        <?php echo $_smarty_tpl->tpl_vars['oneArticle']->value->lead;?>

                    </td>
                </tr>
                <tr>
                    <td colspan="4" style="text-align: center">
                        <img src="public/uploads/article/<?php echo $_smarty_tpl->tpl_vars['oneArticle']->value->thumbnail;?>
" height="200">
                    </td>
                </tr>
                <tr>
                    <td colspan="4" class="content">
                        <?php echo $_smarty_tpl->tpl_vars['oneArticle']->value->content;?>

                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
<?php }?>
<!--所有文章-->
<?php if ($_smarty_tpl->tpl_vars['all']->value) {?>
<div class="row">
    <div class="col-md-12">
        <ul class="breadcrumb">
            <li><a href="?a=home">首页</a></li>
            <li>所有文章</li>
        </ul>
    </div>
</div>
<div class="row allArticle">
    <div class="col-md-12">
        <table class="table table-hover ">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['allArticle']->value, 'v', false, 'k');
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

            <tr>
                <td class="page" colspan="3">
                    <?php echo $_smarty_tpl->tpl_vars['list']->value;?>

                </td>
            </tr>
        </table>
        <!-- <div class="box">
             <section class="article clearfix">
                 <p>
                     <a href="?a=article&m=detail&id=<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
" target="_blank">
                         <img src="public/uploads/article/<?php echo $_smarty_tpl->tpl_vars['v']->value->thumbnail;?>
" alt="" class="img-circle" height="100"
                              width="80">
                     </a>
                 </p>
                 <p class="h2">
                     <a href="?a=article&m=detail&id=<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
" target="_blank" class="h2"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['v']->value->title,'15','...');?>
</a><br>
                 </p>
                 <p class="text_ellipsis">
                     <a href="?a=article&m=detail&id=<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
" target="_blank">
                         <?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['v']->value->content,'70','...');?>

                     </a>
                 </p>
                 <span class="text-center tip"><?php echo $_smarty_tpl->tpl_vars['v']->value->attr;?>
</span>
             </section>
         </div>-->
    </div>
</div>
<?php }?>
<!--搜索文章-->
<?php if ($_smarty_tpl->tpl_vars['search']->value) {?>
<div class="row">
    <div class="col-md-12">
        <ul class="breadcrumb">
            <li><a href="?a=home">首页</a></li>
            <li><a href="?a=article&m=allArticle">所有文章</a></li>
            <li>搜索的文章</li>
        </ul>
    </div>
</div>
<div class="row allArticle">
    <div class="col-md-12">
        <table class="table table-hover ">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['searchArticle']->value, 'v', false, 'k');
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

            <tr>
                <td class="page" colspan="3">
                    <?php echo $_smarty_tpl->tpl_vars['page']->value;?>

                </td>
            </tr>
        </table>
        <!-- <div class="box">
             <section class="article clearfix">
                 <p>
                     <a href="?a=article&m=detail&id=<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
" target="_blank">
                         <img src="public/uploads/article/<?php echo $_smarty_tpl->tpl_vars['v']->value->thumbnail;?>
" alt="" class="img-circle" height="100"
                              width="80">
                     </a>
                 </p>
                 <p class="h2">
                     <a href="?a=article&m=detail&id=<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
" target="_blank" class="h2"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['v']->value->title,'15','...');?>
</a><br>
                 </p>
                 <p class="text_ellipsis">
                     <a href="?a=article&m=detail&id=<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
" target="_blank">
                         <?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['v']->value->content,'70','...');?>

                     </a>
                 </p>
                 <span class="text-center tip"><?php echo $_smarty_tpl->tpl_vars['v']->value->attr;?>
</span>
             </section>
         </div>-->
    </div>
</div>
<?php }
$_smarty_tpl->_subTemplateRender("file:home/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!--进度条-->
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
