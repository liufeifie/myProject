<?php
class levelAction extends Action{
    public function main(){
        //检测是否登录
        if (Tools::checkLogin('admin')) {
            header('location:?a=user&m=login');
        }
        //检测登录用户的权限
        $level = new levelModel();
        $oneLevel = $level->getOneLevelByName($_SESSION['admin']->level_id);
        //获取这个等级的权限
        $allPermission = explode(',', $oneLevel->pid);
        //var_dump($allPermission);
        if (!in_array('12', $allPermission)) {
            $this->smarty->assign('denied',true);
            $this->smarty->display('admin/welcome.html');
            exit();
        }
        switch ($_GET['action']){
            case 'show':$this->show();break;
            case 'add':$this->add();break;
            case 'update':$this->update();break;
            case 'delete':$this->delete();break;
        }
        $this->smarty->display('admin/level.html');
    }
    /**等级显示*/
    private function show(){
        $permission=new permissionModel();
        $total=$this->model->getAllTotalLevel();
        $page=new Page($total);
        $allLevel=$this->model->getAllLevel($page->limit);
        foreach ($allLevel as $k=>$v){
            $pid=explode(',',$v->pid);
            $str=null;
            foreach ($pid as $key){
                if($key){
                    $pemissionLevel=$permission->getOnePermission($key);
                    $str.=$pemissionLevel->name.',';
                }
            }
            $v->pid=rtrim($str,',');
        }

        $this->smarty->assign('allLevel',$allLevel);
        $this->smarty->assign('list',$page->display(array(0,1,2,3,4)));
        $this->smarty->assign('show',true);
    }
    /**删除等级*/
    private function delete(){
        if($_POST['info']=='ok'){
            //删除等级
            if($_GET['id']){
                if($this->model->deleteLevel(rtrim($_GET['id'],','))){
                    echo 'ok';
                }else{
                    echo 'no';
                }
            }
        }
       /* if($_GET['id']){
            if($this->model->deleteLevel($_GET['id'])){
                Tools::Progress('删除成功',$_SERVER['HTTP_REFERER']);
            }else{
                Tools::Progress('删除失败',$_SERVER['HTTP_REFERER']);
            }
        }
        if($_POST['send']){
            $ids=implode(',',$_POST['choice']);
            if($this->model->deleteLevel($ids)){
                Tools::Progress('删除成功',$_SERVER['HTTP_REFERER']);
            }else{
                Tools::Progress('删除失败',$_SERVER['HTTP_REFERER']);
            }
        }*/
    }
    /*等级修改*/
    private function update(){
        if(isset($_POST['send'])){
            $array=array(
                'name'=>$_POST['name'],
                'pid'=>implode(',',$_POST['pid']),
                'description'=>$_POST['description']
            );
            if($this->model->updateLevel($array,$_GET['id'])){
                Tools::Progress('修改成功','?a=level&action=show');
            }else if($this->model->updateLevel($array,$_GET['id'])==0){
                Tools::Progress('没有修改','?a=level&action=show');
            }else{
                Tools::Progress('修改失败',$_SERVER['HTTP_REFERER'],0);
            }
        }
        if($_GET['id']){
            $oneLevel=$this->model->getOneLevel($_GET['id']);
            $this->smarty->assign('oneLevel',$oneLevel);
        }
        $this->permission($oneLevel->pid);
        $this->smarty->assign('update',true);
    }
    /**添加等级*/
    private function add(){
        if(isset($_POST['send'])){
            //var_dump($_POST);
            $array=array(
                'name'=>$_POST['name'],
                'description'=>$_POST['description'],
                'pid'=>implode(',',$_POST['pid']),
                'date'=>date('Y-m-d H:i:s')
            );
           if($this->model->addLevel($array)){
                Tools::Progress('添加成功','?a=level&action=show');
            }else if($this->model->addLevel($array)==0){
               Tools::Progress('没有成功','?a=level&action=show');
           }else{
                Tools::Progress('添加失败',$_SERVER['HTTP_REFERER']);
            }
        }
        $this->permission();
        $this->smarty->assign('add',true);
    }
    /**获取权限*/
    private function permission($pid=null){
        $permission=new permissionModel();
        $allPermission=$permission->getAllPermission();
        //var_dump($allPermission);
        $str=null;
        foreach ($allPermission as $k=>$v){
            $ids=explode(',',$pid);
            if(in_array($v->id,$ids)){
                $checked='checked';
            }else{
                $checked='';
            }
            $str.="<input type='checkbox' name='pid[]' value='$v->id' id='$v->id' $checked>" ;
            $str.="&nbsp;<label for='$v->id'>".$v->name."<label>&nbsp;&nbsp;&nbsp;";
        }
        $this->smarty->assign('permission',$str);
    }
}
?>

