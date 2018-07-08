<?php

/*permissionAction*/

class permissionAction extends Action
{
    public function main()
    {
        if (Tools::checkLogin('admin')) {
            header('location:?a=user&m=login');
        }
        //检测登录用户的权限
        $level = new levelModel();
        $oneLevel = $level->getOneLevelByName($_SESSION['admin']->level_id);
        //获取这个等级的权限
        $allPermission = explode(',', $oneLevel->pid);
        //var_dump($allPermission);
        if (!in_array('11', $allPermission)) {
            $this->smarty->assign('denied',true);
            $this->smarty->display('admin/welcome.html');
            exit();
        }
        switch ($_GET['action']) {
            case 'add':
                $this->add();
                break;
            case 'show':
                $this->show();
                break;
            case 'delete':
                $this->delete();
                break;
            case 'update':
                $this->update();
                break;
        }
        $this->smarty->display('admin/permission.html');
    }
    /**删除权限*/
    private function delete(){
        if($_POST['info']=='ok'){
            //删除广告
            if($_GET['id']){
                if($this->model->deletePermission(rtrim($_GET['id'],','))){
                    echo 'ok';
                }else{
                    echo 'no';
                }
            }
        }
        /*if($_GET['id']){
            if($this->model->deletePermission($_GET['id'])){
                Tools::Progress('删除成功',$_SERVER['HTTP_REFERER']);
            }else{
                Tools::Progress('删除失败',$_SERVER['HTTP_REFERER'],0);
            }
        }
        if($_POST['send']){
            $ids=implode(',',$_POST['choice']);
            if($this->model->deletePermission($ids)){
                Tools::Progress('删除成功',$_SERVER['HTTP_REFERER']);
            }else{
                Tools::Progress('删除失败',$_SERVER['HTTP_REFERER'],0);
            }
        }*/
    }
    /**修改权限*/
    private function update(){
        if(isset($_POST['send'])){
            $array=array(
                'name'=>$_POST['name'],
                'description'=>$_POST['description']
            );
            if($this->model->updatePermission($array,$_GET['id'])){
                Tools::Progress('修改成功','?a=permission&action=show');
            }else if($this->model->updatePermission($array,$_GET['id'])==0){
                Tools::Progress('没有成功','?a=permission&action=show');
            }else{
                Tools::Progress('删除失败',$_SERVER['HTTP_REFERER'],0);
            }
        }
        if($_GET['id']){
             $onePermission=$this->model->getOnePermission($_GET['id']);
             $this->smarty->assign('onePermission',$onePermission);
        }
       $this->smarty->assign('update',true);
    }
    /**显示权限*/
    private function show(){
        $total=$this->model->getAllTotalPermission();
        $page=new Page($total);
        $allPermission=$this->model->getAllPermission($page->limit);
        //var_dump($allPermission);
        $this->smarty->assign('allPermission',$allPermission);
        $this->smarty->assign('list',$page->display(array(0,1,2,3,4)));
        $this->smarty->assign('show',true);
    }
    /**添加权限*/
    private function add()
    {
        if(isset($_POST['send'])){
            $array=array(
               'name'=>$_POST['name'],
               'description'=>$_POST['description'],
               'date'=>date('Y-m-d H:i:s')
            );
            if($this->model->addPermission($array)){
                Tools::Progress('添加成功',$_SERVER['HTTP_REFERER']);
            }else{
                Tools::Progress('添加失败',$_SERVER['HTTP_REFERER'],0);
            }
        }
        $this->smarty->assign('add', true);
    }
}

?>

