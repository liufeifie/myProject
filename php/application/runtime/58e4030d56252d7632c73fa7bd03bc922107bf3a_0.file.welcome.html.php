<?php
/* Smarty version 3.1.30, created on 2017-02-06 20:46:13
  from "D:\wamp\www\project\application\views\admin\welcome.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58987015df49c8_09883827',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '58e4030d56252d7632c73fa7bd03bc922107bf3a' => 
    array (
      0 => 'D:\\wamp\\www\\project\\application\\views\\admin\\welcome.html',
      1 => 1483945754,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58987015df49c8_09883827 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>welcome</title>
    <link rel="stylesheet" href="public/styles/admin.css">
</head>
<body class="welcome" id="body" style="background: url('public/images/loginBg.jpg');height: 630px;overflow-x:hidden;">
<?php echo '<script'; ?>
>
    var wx = window.innerWidth;
    var hy = window.innerHeight;
    var num=0;
    var body1 = document.getElementById("body");
    var tt=setInterval("creat1()", 1000);
    function creat1() {
        var img = document.createElement("img");
        img.id = "img1";
        img.src = "public/images/star.png";
        var w = Math.floor(Math.random() * 32);
        var widthx = Math.floor(Math.random() * (parseInt(wx)-32));
        var heighty = Math.floor(Math.random() * (parseInt(hy)-32));
        style1 = "position:absolute;left:" + widthx + "px;top:" + heighty + "px;";
        style1+=style1+"width:"+w+"px;height:"+w+"px;";
        img.style = style1;
        body1.appendChild(img);
        img.setAttribute("onclick","removeImg(this)");
        num++;
        if(num==100){
            clearInterval(tt);
        }
    }
    function removeImg(e) {
        body1.removeChild(e);
    }

<?php echo '</script'; ?>
>
<?php if ($_smarty_tpl->tpl_vars['denied']->value) {?>
<div class="denied" style="color:white;width: 300px;height: 200px;position:absolute;
         margin: auto;top: 0;bottom: 0;left: 0;right: 0">
    <h1>您的权限不足</h1>
</div>
<?php }?>

</body>
</html><?php }
}
