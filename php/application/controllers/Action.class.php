<?php
class Action{
    protected $smarty=null;//smarty的实例
    protected $model=null;//保存的模型类的实例
    public function __construct(){
        //Template::getInstance()：new Smarty;
        $this->smarty=Template::getInstance();
        $this->model=Factory::setModel();
    }
    /**
     * 根据地址栏传的m值，如果没值m就等于main,
     * 判断m的值是否是action的方法，如果是就调用这个方法
     * 如果不是就调用main()方法
     *   */
    public function run(){
        //如果地址栏m有值就取它的值
        //没值就等于main
        $method=isset($_GET['m'])?$_GET['m']:"main";
        //echo $method;
        //echo $method;
        //判断类中是否有m的值的方法，如果有就调用，没有就调用main;
        method_exists($this, $method)?eval('$this->'.$method."();"):$this->main();
    }
    /*状态变化*/
    public function stateChange($data,$control,$state='state'){
        foreach ($data as $k => $v) {
            switch ($v->$state) {
                case 1:
                    $v->state = "<span style='color:green;'>[显示]</span>
                              <a href='?a=".$control."&action=state&flag=hide&id=" . $v->id . "'>[隐藏]</a>";
                    break;
                case 0:
                    $v->state = "<span style='color:red;'>[隐藏]</span>
                              <a href='?a=".$control."&action=state&flag=show&id=" . $v->id . "'>[显示]</a>";
                    break;
            }
        }
    }
    /*权限*/
    public function perm($id,$allPermission){
        if (!in_array($id, $allPermission)){
            $this->smarty->assign('denied',true);
            $this->smarty->display('admin/welcome.html');
            exit();
        }
    }
    public function permNo($id,$allPermission){
        if (in_array($id,$allPermission)) {
            $this->smarty->assign('denied',true);
            $this->smarty->display('admin/welcome.html');
            exit();
        }
    }

}
?>