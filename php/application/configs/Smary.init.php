<?php
/*初始化smarty  */
session_start();
header("Content-Type:text/html;charset=utf-8");
//echo __FILE__."<br>";
//echo dirname(__FILE__)."<br>";
//echo substr(dirname(__FILE__),0,-20)."/";
//网站根目录
define("ROOT_PATH",substr(dirname(__FILE__),0,-20)."/");
include ROOT_PATH."application/configs/config.php";
//echo DBNAME."<BR>";
//echo ROOT_PATH;
//spl:second programme load
spl_autoload_register("myload");
/**
 * 后面的代码实例化类时，自动加载就加载这个指定的类;
 * 
 * @param string $_className  */
function myload($_className){
    //echo $_className."<br>";
    //adAction
    if(substr($_className,-6)=='Action'){
        include ROOT_PATH."application/controllers/".$_className.".class.php";
    }else if(substr($_className,-5)=='Model'){
        include ROOT_PATH."application/models/".$_className.".class.php";
    }else{
        include ROOT_PATH."application/includes/".$_className.".class.php";
    }
}
/*设置时区 */
date_default_timezone_set("PRC");
error_reporting(E_ALL^E_STRICT^E_NOTICE^E_WARNING);
//error_reporting(E_ALL);
include ROOT_PATH.'libs/smarty/Smarty.class.php';
Factory::setAction()->run();



?>