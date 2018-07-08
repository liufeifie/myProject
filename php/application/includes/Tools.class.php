<?php
final class Tools{
    /**
     * 修剪字符串
     * @param string $str
     * @param int $length
     * @param string $suffix
     * @return string  */
    public static function truncate($str,$length,$suffix="..."){
        //如果字符串的长度小于指定的长度，整个字符串输出
        if($length>mb_strlen($str,"utf8")){
            $str=$str;
        }else{
            //如果字符串的长度大于指定的长度，字符串修剪到
            //指定的长度，后面添加省略号
            $str=mb_substr($str,0,$length,"utf8").$suffix;
        }
        return $str;
    }
    /**
     * 跳转
     * @param string $_msg
     * @param string $_url
     * @param number $_flag:1是green,0是red
     * @param number $_t  */
  // public static function Redirect($_msg,$_url,$_flag=1,$_t=5){
   public static function Redirect($_msg,$_url,$_flag=1,$_t=5){
        if($_flag==1){
            $color="green";
        }else if($_flag==0){
            $color="red";
        }
        echo "<div id='Redirect' data-countdown=".$_t." data-url=".$_url.">";
        echo "<span style='color:".$color.";'>".$_msg."</span>";
        echo "&nbsp;&nbsp;<span id='timer'>".$_t."</span>";
        echo "</div>";
    }
    /**跳转进度条*/
    public static function Progress($_msg, $_url, $_flag = 1, $_t = 2)
    {
        if($_flag==1){
            $color="green";
        }else if($_flag==0){
            $color="red";
        }
        echo "<div id='progressBox1'><div class='progress'>";
        echo "<div id='progress-bar' class='progress-bar progress_bar progress-bar-striped active' style='width: 0;background-color:".$color."'
             data-url=".$_url." data-time=".$_t." data-msg=".$_msg."><span id='num'>0%</span>";
        echo " </div></div></div>";
    }
    /**检测登录状态*/
    public static function checkLogin($_data){
        if(!isset($_SESSION[$_data])){
            return true;
        }
        return false;
    }
    /**注销*/
    public static function getLogout($_data){
        unset($_SESSION[$_data]);
        return true;
    }
}
?>