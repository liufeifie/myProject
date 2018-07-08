<?php
class Template extends Smarty{
    private static $instance;
    /**
     * 单例模式
     * @return Template*/
    public static function getInstance(){
        //instance如果不是类的实例的话
        //就实例化自身，赋给instance；
        if(!self::$instance instanceof self){
            self::$instance=new self();
        }
        return self::$instance;
    }
    public function __construct(){
        parent::__construct();
        $this->setConfig();
    }
    private function setConfig(){
        //设置模板目录（静态页面）
        $this->template_dir=ROOT_PATH.'application/views';
        //设置编译目录
        $this->compile_dir=ROOT_PATH.'application/runtime';
    }
    
    
    
    
    
    
    
}
?>