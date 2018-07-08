<?php
class Factory{
    private static $obj=null;
    public static function getAction(){
        if(isset($_GET['a'])&&!empty($_GET['a'])){
            return $_GET['a'];
        }
        return 'home';
    }
    /**
     * 根据地址栏传的a的值，返回相应的Action的对象
     *   */
    public static function setAction(){
        //self::getAction()：自身类的getAction()方法
        $a=self::getAction();
        if(file_exists(ROOT_PATH.'application/controllers/'.$a."Action.class.php")){
            //echo "ok";
            eval('self::$obj=new '.$a.'Action();');
            //var_dump(self::$obj);
            return self::$obj;
        }else{
            exit($a."Action控制器不存在");
        }
    }
    public static function setModel(){
        $a=self::getAction();
        if(file_exists(ROOT_PATH.'application/models/'.$a."Model.class.php")){
            eval('self::$obj=new '.$a.'Model();');
            //var_dump(self::$obj);
            return self::$obj;
        }else{
            exit($a."Model模型不存在");
        }
    }
    
    
    
    
    
    
    
    
    
    
}
?>