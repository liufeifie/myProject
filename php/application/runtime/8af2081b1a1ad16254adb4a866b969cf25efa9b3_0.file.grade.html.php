<?php
/* Smarty version 3.1.30, created on 2017-02-12 09:53:58
  from "D:\wamp\www\project\application\views\home\grade.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_589fc0361700c3_13023250',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8af2081b1a1ad16254adb4a866b969cf25efa9b3' => 
    array (
      0 => 'D:\\wamp\\www\\project\\application\\views\\home\\grade.html',
      1 => 1485078241,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:home/header.html' => 1,
    'file:home/footer.html' => 1,
  ),
),false)) {
function content_589fc0361700c3_13023250 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>测试</title>
    <link href="libs/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="libs/bootstrap/css/bootstrap-theme.css" rel="stylesheet">
    <link href="public/styles/home.css" rel="stylesheet">
    <link href="public/styles/Tools.css" rel="stylesheet">
    <?php echo '<script'; ?>
 src="libs/requireJS/require.js" data-main="public/scripts/home"><?php echo '</script'; ?>
>
</head>
<body>
<?php $_smarty_tpl->_subTemplateRender("file:home/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container">
    <?php if ($_smarty_tpl->tpl_vars['exam']->value) {?>
    <div class="row">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="?a=home">首页</a></li>
                <li><a href="?a=home">所有考试</a></li>
                <li class="active"><?php echo $_smarty_tpl->tpl_vars['type']->value;?>
</li>
            </ul>
        </div>
    </div>
    <div class="row text-center">
        <h3 style="color:red;"><?php echo $_smarty_tpl->tpl_vars['tip']->value;
echo $_smarty_tpl->tpl_vars['score']->value;?>
</h3>
    </div>
    <form action="" method="post"><!--?a=grade&action=php-->
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Data']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
        <div class="row">
            <p class="col-sm-12 h3">
                <b><?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
:<?php echo $_smarty_tpl->tpl_vars['v']->value->title;?>
</b>
                <span  style="color:<?php echo $_smarty_tpl->tpl_vars['colors']->value[$_smarty_tpl->tpl_vars['k']->value];?>
;"><?php echo $_smarty_tpl->tpl_vars['test']->value[$_smarty_tpl->tpl_vars['k']->value];?>
</span>
                <b style="color: blue"><?php echo $_smarty_tpl->tpl_vars['answer']->value[$_smarty_tpl->tpl_vars['k']->value]['answer'];?>
</b>
            </p>
            <p class="col-sm-6">
                <input type="radio" name="<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
" value="A" id="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
A">
                <label for="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
A"> A:<?php echo $_smarty_tpl->tpl_vars['v']->value->A;?>
</label>
            </p>
            <p class="col-sm-6">
                <input type="radio" name="<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
" value="B" id="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
B">
                <label for="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
B"> B:<?php echo $_smarty_tpl->tpl_vars['v']->value->B;?>
</label>
            </p>
            <p class="col-sm-6">
                <input type="radio" name="<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
" value="C" id="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
C">
                <label for="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
C">C:<?php echo $_smarty_tpl->tpl_vars['v']->value->C;?>
</label>
            </p>
            <p class="col-sm-6">
                <input type="radio" name="<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
" value="D" id="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
D">
                <label for="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
D">D:<?php echo $_smarty_tpl->tpl_vars['v']->value->D;?>
</label>
            </p>
        </div>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        <div class="row">
            <p class="col-sm-offset-5 col-sm-2">
                <input type="submit" class="btn btn-success" name="send" style="display:<?php echo $_smarty_tpl->tpl_vars['none']->value;?>
;">
            </p>
        </div>
    </form>
    <?php }?>
    <!--自己的成绩-->
    <?php if ($_smarty_tpl->tpl_vars['oneTest']->value) {?>
    <div class="row">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="?a=home">首页</a></li>
                <li><a href="?a=home">所有考试</a></li>
                <li class="active"><?php echo $_smarty_tpl->tpl_vars['type']->value;?>
</li>
            </ul>
        </div>
    </div>
    <div class="row text-center">
        <h3 style="color:green;">你的正确率:<?php echo $_smarty_tpl->tpl_vars['oneGrde']->value->accuracy;?>
</h3>
    </div>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Exams']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
        <div class="row">
            <p class="col-sm-12 h3">
                <b><?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
:<?php echo $_smarty_tpl->tpl_vars['v']->value->title;?>
</b>
                <span  style="color:<?php echo $_smarty_tpl->tpl_vars['colors']->value[$_smarty_tpl->tpl_vars['k']->value];?>
;"><?php echo $_smarty_tpl->tpl_vars['test']->value[$_smarty_tpl->tpl_vars['k']->value];?>
</span>
                <b style="color: blue"><?php echo $_smarty_tpl->tpl_vars['v']->value->answer;?>
</b>
            </p>
            <p class="col-sm-6">
                <input type="radio" name="<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
" value="A" id="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
A0">
                <label for="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
A0"> A:<?php echo $_smarty_tpl->tpl_vars['v']->value->A;?>
</label>
            </p>
            <p class="col-sm-6">
                <input type="radio" name="<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
" value="B" id="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
B0">
                <label for="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
B0"> B:<?php echo $_smarty_tpl->tpl_vars['v']->value->B;?>
</label>
            </p>
            <p class="col-sm-6">
                <input type="radio" name="<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
" value="C" id="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
C0">
                <label for="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
C0">C:<?php echo $_smarty_tpl->tpl_vars['v']->value->C;?>
</label>
            </p>
            <p class="col-sm-6">
                <input type="radio" name="<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
" value="D" id="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
D0">
                <label for="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
D0">D:<?php echo $_smarty_tpl->tpl_vars['v']->value->D;?>
</label>
            </p>
        </div>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    <!--查看别人的-->
    <?php }?>

    <?php $_smarty_tpl->_subTemplateRender("file:home/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</div>
<!--弹出框-->
<div class="modal" id="exam">
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
