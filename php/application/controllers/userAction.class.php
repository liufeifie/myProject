<?php
/**管理员操作类*/
class userAction extends Action{
    public function main(){
        if (Tools::checkLogin('admin')) {
            header('location:?a=user&m=login');
        }
        //检测登录用户的权限
        $level = new levelModel();
        $oneLevel = $level->getOneLevelByName($_SESSION['admin']->level_id);
        //获取这个等级的权限
        $allPermission = explode(',', $oneLevel->pid);
        //var_dump($allPermission);
        if (!in_array('6', $allPermission)) {
            $this->smarty->assign('denied',true);
            $this->smarty->display('admin/welcome.html');
            exit();
        }
        switch ($_GET['action']){
            case 'show': $this->show();break;
            case 'add': $this->add();break;
            case 'delete': $this->delete();break;
            case 'update': $this->update();break;
        }
        $this->smarty->display('admin/user.html');
    }
    /**显示管理员数据*/
    private function show(){
        $toatl=$this->model->getAllTotalUser();
        $page=new Page($toatl);
        $allUser=$this->model->getAllUser($page->limit);
        $level=new levelModel();
        $allLevel=$level->getAllLevel();
        foreach ($allUser as $k=>$v){
            foreach ($allLevel as $key=>$value){
                if($v->level_id==$value->id){
                    $v->level_id=$value->name;
                }
            }
        }
        $this->smarty->assign('data',$allUser);
        $this->smarty->assign('list',$page->display(array(0,1,2,3,4)));
        $this->smarty->assign('show',true);
    }
    /**添加管理员*/
    private function add(){
        if(isset($_POST['send'])){
            $array=array(
                'username'=>$_POST['username'],
                'pwd'=>$_POST['pwd'],
                'level_id'=>$_POST['level_id'],
                'reg_time'=>date('Y-m-d H:i:s')
            );
           if($this->model->addUser($array)){
                Tools::Progress('添加成功','?a=user&action=show',1,0.2);
            }else{
                Tools::Progress('添加失败','?a=user&action=add',0);
            };
        }
        $this->level();
        $this->smarty->assign('add',true);
    }
    /*获取level表等级*/
    private function level($level_id=null){
        $level=new levelModel();
        $allLevel=$level->getAllLevel();
        $str=null;
        foreach ($allLevel as $k=>$v){
            if($v->id==$level_id){
                $selected='selected';
            }else{
                $selected='';
            }
            $str.="<option value='".$v->id."' $selected>".$v->name."</option>";
        }
        $this->smarty->assign('level',$str);
    }
    /**修改管理员*/
    private function update(){
        /**修改数据*/
        if($_POST['send']){
            $array=array(
                'level_id'=>$_POST['level_id'],
                'username'=>$_POST['username'],
                'pwd'=>$_POST['pwd']
            );
            if($this->model->updateUser($array,$_GET['id'])){
                Tools::Progress('修改成功','?a=user&action=show');
            }else  if($this->model->updateUser($array,$_GET['id'])==0){
                Tools::Progress('没有修改','?a=user&action=show');
            }else{
                Tools::Progress('修改失败',$_SERVER['HTTP_REFERER'],0);
            }
        }
        $oneUser=$this->model->getOneUser($_GET['id']);
        /**user表的level_id等于level表的id*/
        $this->level($oneUser->level_id);
        $this->smarty->assign('oneUser',$oneUser);
        $this->smarty->assign('update',true);
    }
    /**删除管理员*/
    private function delete(){
        if($_POST['info']=='ok'){
            //删除广告
            if($_GET['id']){
                if($this->model->deleteUser(rtrim($_GET['id'],','))){
                    echo 'ok';
                }else{
                    echo 'no';
                }
            }
        }
        /**删除单条*/
        /*if($_GET['id']){
            if($this->model->deleteUser($_GET['id'])){
                Tools::Progress('删除成功',$_SERVER['HTTP_REFERER'],1,0.5);
            }else{
                Tools::Progress('删除失败',$_SERVER['HTTP_REFERER'],0);
            }
        }*/
         /**删除多条*/
        /*if(isset($_POST['send'])){
            $kind=implode(',',$_POST['check']);
            //var_dump($kind);
            if($this->model->deleteUser($kind)){
                Tools::Progress('删除成功',$_SERVER['HTTP_REFERER'],1,0.5);
            }else{
                Tools::Progress('删除失败',$_SERVER['HTTP_REFERER'],0,1);
            }
        }*/
    }
    /**后台登录  m方法*/
    public function login(){
        if(isset($_POST['send'])){
            $oneUser=$this->model->verifyUser($_POST['username'],$_POST['pwd']);
            if($oneUser){
                $level=new levelModel();
                $oneLevel=$level->getOneLevel($oneUser->level_id);
                $oneUser->level_id=$oneLevel->name;
                $_SESSION['admin']=$oneUser;
                $array=array(
                    'last_ip'=>$_SERVER['REMOTE_ADDR'],
                    'last_time'=>date('Y-m-d H:i:s'),
                    'login_num'=>++$oneUser->login_num
                );
                $this->model->updateLogin($array,$oneUser->id);
                Tools::Progress('登录成功','?a=admin',1,0.2);
            }else{
                Tools::Progress('用户名/密码错误','?a=admin',0);
            }
        }
        $this->smarty->display('admin/login.html');
    }
    /**注销后台登录*/
    public function logout(){
        if(Tools::getLogout('admin')){
            header('location:?a=user&m=login');
        }
    }
}
?>

