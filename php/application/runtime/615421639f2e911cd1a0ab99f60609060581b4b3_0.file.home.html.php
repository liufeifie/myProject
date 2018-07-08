<?php
/* Smarty version 3.1.30, created on 2017-02-10 12:53:10
  from "D:\wamp\www\project\application\views\home\home.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_589d4736239f05_01551253',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '615421639f2e911cd1a0ab99f60609060581b4b3' => 
    array (
      0 => 'D:\\wamp\\www\\project\\application\\views\\home\\home.html',
      1 => 1485091384,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:home/header.html' => 1,
    'file:home/footer.html' => 1,
  ),
),false)) {
function content_589d4736239f05_01551253 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_truncate')) require_once 'D:\\wamp\\www\\project\\libs\\smarty\\plugins\\modifier.truncate.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>我的网站</title>
    <link href="libs/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="libs/bootstrap/css/bootstrap-theme.css" rel="stylesheet">
    <link href="public/styles/home.css" rel="stylesheet">
    <link href="public/styles/page.css" rel="stylesheet">
    <?php echo '<script'; ?>
 src="libs/requireJS/require.js" data-main="public/scripts/home"><?php echo '</script'; ?>
>
</head>
<body class="body" style="overflow-x:hidden;">
<div id="bgImage"></div>
<?php echo '<script'; ?>
>
    var bgImg=document.getElementById('bgImage');
    var w=window.innerWidth;
    var h=window.innerHeight;
    bgImg.style='width:'+w+'px;height:'+h+"px;background-image:url('public/images/home.jpg');" +
            "background-size:"+w+'px '+h+'px;position: fixed;z-index: -1';

<?php echo '</script'; ?>
>
<?php $_smarty_tpl->_subTemplateRender("file:home/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!--<p class="border removeMargin clearfix"></p>&lt;!&ndash;横线&ndash;&gt;-->
<main class="container">
    <!--滚播图-->
    <div class="row">
        <div class="col-md-12 removePadding">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators  底部小圆点-->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);
$_smarty_tpl->tpl_vars['i']->value = 1;
if ($_smarty_tpl->tpl_vars['i']->value < $_smarty_tpl->tpl_vars['len']->value) {
for ($_foo=true;$_smarty_tpl->tpl_vars['i']->value < $_smarty_tpl->tpl_vars['len']->value; $_smarty_tpl->tpl_vars['i']->value++) {
?>
                    <li data-target="#carousel-example-generic" data-slide-to="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"></li>
                    <?php }
}
?>

                </ol>
                <!-- Wrapper for slides  图片-->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['slider']->value[0]->link;?>
">
                            <img src="public/uploads/ad/<?php echo $_smarty_tpl->tpl_vars['slider']->value[0]->thumbnail;?>
" style="width: 100%;height: 360px">
                        </a>
                        <div class="carousel-caption">
                            <?php echo $_smarty_tpl->tpl_vars['slider']->value[0]->title;?>

                        </div>
                    </div>
                    <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);
$_smarty_tpl->tpl_vars['i']->value = 1;
if ($_smarty_tpl->tpl_vars['i']->value < $_smarty_tpl->tpl_vars['len']->value) {
for ($_foo=true;$_smarty_tpl->tpl_vars['i']->value < $_smarty_tpl->tpl_vars['len']->value; $_smarty_tpl->tpl_vars['i']->value++) {
?>
                    <div class="item">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['slider']->value[$_smarty_tpl->tpl_vars['i']->value]->link;?>
">
                            <img src="public/uploads/ad/<?php echo $_smarty_tpl->tpl_vars['slider']->value[$_smarty_tpl->tpl_vars['i']->value]->thumbnail;?>
" alt="..." style="width: 100%;height: 360px">
                        </a>
                        <div class="carousel-caption">
                            <?php echo $_smarty_tpl->tpl_vars['slider']->value[$_smarty_tpl->tpl_vars['i']->value]->title;?>

                        </div>
                    </div>
                    <?php }
}
?>

                </div>

                <!-- Controls  左右控制-->
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
    <!--文章-->
    <main class="row row1 bg" id="art">
        <main class="col-md-8 text-left">
            <p class="h3 pBef"><a href="#">myArticle</a></p>
        </main>
        <main class="col-md-4 text-right more">
            <p class="h3"><a href="?a=article&m=allArticle" target="_blank">更多>></a></p>
        </main>
    </main>
    <main class="row bg row2 articleBox">
        <main class="col-md-8 ">
            <div style="height: 30px;"></div>
            <!--头条-->
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['headline']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
            <div class="box">
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
                               <?php echo smarty_modifier_truncate(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['v']->value->content),'80','...',true);?>

                           </a>
                       </p>
                       <span class="text-center tip"><?php echo $_smarty_tpl->tpl_vars['v']->value->attr;?>
</span>
                   </section>
               </div>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            <!--推荐-->
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['recommend']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
            <div class="box">
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
                            <?php echo smarty_modifier_truncate(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['v']->value->content),'80','...',true);?>

                        </a>
                    </p>
                    <span class="text-center tip"><?php echo $_smarty_tpl->tpl_vars['v']->value->attr;?>
</span>
                </section>
            </div>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            <!--专题-->
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['special']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
            <div class="box">
                <section class="article clearfix">
                    <div>
                        <a href="?a=article&m=detail&id=<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
" target="_blank">
                            <img src="public/uploads/article/<?php echo $_smarty_tpl->tpl_vars['v']->value->thumbnail;?>
" alt="" class="img-circle" height="100"
                                 width="80">
                        </a>
                    </div>
                    <div class="h2">
                        <a href="?a=article&m=detail&id=<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
" target="_blank" class="h2"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['v']->value->title,'15','...');?>
</a><br>
                    </div>
                    <div class="text_ellipsis">
                        <a href="?a=article&m=detail&id=<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
" target="_blank">
                            <?php echo smarty_modifier_truncate(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['v']->value->content),'80','...',true);?>

                        </a>
                    </div>
                    <span class="text-center tip"><?php echo $_smarty_tpl->tpl_vars['v']->value->attr;?>
</span>
                </section>
            </div>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        </main>
        <!--最新 最热文章-->
        <main class="col-md-4 text-center">
            <table class="table table-responsive table-hover table-striped table-bordered">
                <tr>
                    <th class="text-center h4" colspan="3"><b>最新文章</b></th>
                </tr>
                <tr>
                    <th class="text-center">文章标题</th>
                    <th class="text-center">文章栏目</th>
                    <th class="text-center">浏览次数</th>
                </tr>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['newArticle']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
                <tr>
                    <td class="text-left">
                        <a href="?a=article&m=detail&id=<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['v']->value->title,'12','...');?>
</a>
                    </td>
                    <td><?php echo $_smarty_tpl->tpl_vars['v']->value->nid;?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['v']->value->pageview;?>
</td>
                </tr>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                <tr>
                    <th class="text-center h4" colspan="3"><b>最热文章</b></th>
                </tr>
                <tr>
                    <th class="text-center">文章标题</th>
                    <th class="text-center">文章栏目</th>
                    <th class="text-center">浏览次数</th>
                </tr>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['hottedArticle']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
                <tr>
                    <td class="text-left">
                        <a href="?a=article&m=detail&id=<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['v']->value->title,'12','...');?>
</a>
                    </td>
                    <td><?php echo $_smarty_tpl->tpl_vars['v']->value->nid;?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['v']->value->pageview;?>
</td>
                </tr>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            </table>
        </main>
    </main>
    <!--考试-->
    <main class="row row1 bg" id="book">
        <main class="col-md-8 text-left">
            <p class="h3 pBef"><a href="#">myExam</a></p>
        </main>
        <main class="col-md-4 text-right more">
            <p class="h3"><a href="#">更多>></a></p>
        </main>
    </main>
    <main class="row bg row2">
        <main class="col-md-8 book text-center">
            <ul class="list-inline">
                <li>
                    <a href="#"><img src="public/images/bookcss.jpg" alt=""></a>

                    <p class="text-center"><a href="#">php试题</a></p>

                    <p class="text-center">
                        <a  style="color: red;cursor: pointer;" id="testPhp">开始测试</a>
                    </p>
                </li>
                <li>
                    <a href="#"><img src="public/images/bookcss.jpg" alt=""></a>

                    <p class="text-center"><a href="#">js试题</a></p>

                    <p class="text-center">
                        <a  style="color: red;cursor: pointer;" id="testJs">开始测试</a>
                    </p>
                </li>
                <li>
                    <a href="#"><img src="public/images/bookcss.jpg" alt=""></a>

                    <p class="text-center"><a href="#">htmlCss试题</a></p>
                    <p class="text-center">
                        <a  style="color: red;cursor: pointer;" id="testHtmlCss">开始测试</a>
                    </p>

                </li>
            </ul>
        </main>
        <!--成绩-->
        <main class="col-md-4">
            <table class="table table-responsive table-hover table-striped">
                <tr>
                    <th>会员</th>
                    <th>成绩</th>
                    <th>考试类型</th>
                    <th>时间</th>
                </tr>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['grade']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
                <tr>
                    <td>
                        <?php if ($_smarty_tpl->tpl_vars['user']->value == $_smarty_tpl->tpl_vars['v']->value->user) {?>
                        <a href="?a=grade&action=oneExam&id=<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['v']->value->user;?>
</a>
                        <?php } else { ?>
                        <a href="" style="pointer-events: none;cursor: default"><?php echo $_smarty_tpl->tpl_vars['v']->value->user;?>
</a>
                        <?php }?>
                    </td>
                    <td><?php echo $_smarty_tpl->tpl_vars['v']->value->accuracy;?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['v']->value->nid;?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['v']->value->reg_time;?>
</td>
                </tr>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                <tr>
                    <td colspan="4">
                        <div class="page"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</div>
                    </td>
                </tr>
            </table>
        </main>
    </main>
    <!--照片-->
    <main class="row row1 bg" id="photo">
        <main class="col-md-8 text-left">
            <p class="h3 pBef"><a href="#">myPhoto</a></p>
        </main>
        <main class="col-md-4 text-right more">
            <p class="h3"><a href="#">更多>></a></p>
        </main>
    </main>
    <main class="row bg row2">
        <main class="col-md-8 text-center photo">
            <ul class="list-inline">
                <li class="text-center">
                    <a href="#"><img src="public/images/bg45.jpg" alt=""></a>

                    <p>我的照片1</p>
                </li>
                <li class="text-center">
                    <a href="#"> <img src="public/images/bg45.jpg" alt=""></a>

                    <p>我的照片1</p>
                </li>
                <li class="text-center">
                    <a href="#"><img src="public/images/bg45.jpg" alt=""></a>

                    <p>我的照片1</p>
                </li>
                <li class="text-center">
                    <a href="#"><img src="public/images/bg45.jpg" alt=""></a>

                    <p>我的照片1</p>
                </li>
            </ul>
        </main>
        <main class="col-md-4">
           <!-- <h2 class="text-center">侧边栏广告</h2>-->
            <aside class="col-sm-offset-1 col-sm-11 sidebar">
                <a href="<?php ob_start();
echo $_smarty_tpl->tpl_vars['num4']->value;
$_prefixVariable1=ob_get_clean();
echo $_smarty_tpl->tpl_vars['sliderbar']->value[$_prefixVariable1]->link;?>
" target="_blank">
                    <img src="public/uploads/ad/<?php ob_start();
echo $_smarty_tpl->tpl_vars['num4']->value;
$_prefixVariable2=ob_get_clean();
echo $_smarty_tpl->tpl_vars['sliderbar']->value[$_prefixVariable2]->thumbnail;?>
" width="80%" height="250px">
                </a>
                <span>×</span>
            </aside>
        </main>
    </main>
    <aside class="row adv1">
        <a href="<?php ob_start();
echo $_smarty_tpl->tpl_vars['num3']->value;
$_prefixVariable3=ob_get_clean();
echo $_smarty_tpl->tpl_vars['fullcolum']->value[$_prefixVariable3]->link;?>
" target="_blank">
            <img src="public/uploads/ad/<?php ob_start();
echo $_smarty_tpl->tpl_vars['num3']->value;
$_prefixVariable4=ob_get_clean();
echo $_smarty_tpl->tpl_vars['fullcolum']->value[$_prefixVariable4]->thumbnail;?>
">
        </a>
        <span>&times;</span>
    </aside>
    <!--四部分-->
    <?php $_smarty_tpl->_subTemplateRender("file:home/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</main>
<!--php考试弹出框-->
<div class="modal" id="examPhp">
    <div class="modal-dialog modal-sm ext-center">
        <div class="modal-content modals">
            <div class="modal-body text-center">
                <h1 class="infoTip" style="color: red;"></h1>
                <button class="btn btn-success confirmTest" data-dismiss="modal">确认</button>
                <button class="btn btn-danger cancel" data-dismiss="modal">取消</button>
            </div>
        </div>
    </div>
</div>
<!--js考试弹出框-->
<div class="modal" id="examJs">
    <div class="modal-dialog modal-sm ext-center">
        <div class="modal-content modals">
            <div class="modal-body text-center">
                <h1 class="infoTip" style="color: red;"></h1>
                <button class="btn btn-success confirmTestJs" data-dismiss="modal">确认</button>
                <button class="btn btn-danger cancel" data-dismiss="modal">取消</button>
            </div>
        </div>
    </div>
</div>
<!--htmlCss考试弹出框-->
<div class="modal" id="examHtmlCss">
    <div class="modal-dialog modal-sm ext-center">
        <div class="modal-content modals">
            <div class="modal-body text-center">
                <h1 class="infoTip" style="color: red;"></h1>
                <button class="btn btn-success confirmTestHtmlCss" data-dismiss="modal">确认</button>
                <button class="btn btn-danger cancel" data-dismiss="modal">取消</button>
            </div>
        </div>
    </div>
</div>
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
