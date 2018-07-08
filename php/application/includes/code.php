<?php
session_start();
include 'Captcha.class.php';
$captcha=new Captcha(120,30);
$captcha->setConfig(array('simple'=>false,'isNoise'=>true));
$_SESSION['captcha']=$captcha->getCaptcha();
$captcha->showCaptcha();
?>
