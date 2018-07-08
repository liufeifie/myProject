<?php
class memberAction extends Action{
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
        if (!in_array('9', $allPermission)) {
            $this->smarty->assign('denied',true);
            $this->smarty->display('admin/welcome.html');
            exit();
        }
        switch ($_GET['action']){
            case 'show':$this->show();break;
            case 'update':$this->update();break;
            case 'delete':$this->delete();break;
        }
        $this->smarty->display('admin/member.html');
    }
    /**显示会员信息*/
    private function show(){
        $total=$this->model->getAllTotalMember();
        $page=new Page($total,6);
        $memberData=$this->model->getAllMember($page->limit);
        $this->smarty->assign('page',$page->display(array(0,1,2,3,4)));
        $this->smarty->assign('memberData',$memberData);
        $this->smarty->assign('show',true);
    }
    /**修改信息*/
    private function update(){
        /*默认*/
        if($_GET['id']){
            $oneMember=$this->model->getOneMember($_GET['id']);
            //var_dump($oneMember->sex);
            switch (trim($oneMember->sex)){
                case '男': $this->smarty->assign('male','checked');break;
                case '女': $this->smarty->assign('female','checked');break;
            }
            $birth=$oneMember->birth;
            //var_dump($birth);
            $oneMember->year = mb_substr($birth, 0, 5);
            $oneMember->month = mb_substr($birth, 5, 3);
            $oneMember->day = mb_substr($birth, 8, 3);
            $this->smarty->assign('oneMember',$oneMember);
        }
        /*提交修改*/
        $transfer = new Transfer(array('path' => 'public/uploads/register'));
        if(isset($_POST['send'])){
            if ($transfer->upload()) {
                $file = $transfer->getNewFile();
            } else {
                $file = $oneMember->pic;
            }
            if(trim($_POST['pwd'])!=null){
                $pwd=md5($_POST['pwd']);
            }else{
                $pwd=$_POST['pwd0'];
            }
            $birth=$_POST['year'].$_POST['month'].$_POST['day'];
            $array = array(
                'user' =>$_POST['user'],
                'pic' =>$file,
                'pwd' => $pwd,
                'sex' =>$_POST['sex'],
                'phone' => $_POST['phone'],
                'email' => $_POST['email'],
                'birth' => $birth
            );
           if($this->model->updateMember($array,$_GET['id'])){
               Tools::Progress('修改成功', '?a=member&action=show');
           } else if ($this->model->updateMember($array, $_GET['id']) == 0) {
               Tools::Progress('没有修改', $_SERVER['HTTP_REFERER']);
           } else {
               Tools::Progress('修改失败', $_SERVER['HTTP_REFERER'], 0, 5);
           }
        }
        $this->smarty->assign('update',true);
    }
    private function delete()
    {
        if ($_POST['info'] == 'ok') {
            if ($_GET['id']) {
                if ($this->model->deleteMember(rtrim($_GET['id'], ','))) {
                    echo 'ok';
                } else {
                    echo 'no';
                }
            }
        }
    }
}
?>

