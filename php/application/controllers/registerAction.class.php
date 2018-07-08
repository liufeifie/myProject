<?php

class registerAction extends Action
{
    public function main()
    {
        switch ($_GET['action']){
            /*注册页面*/
            case 'register':
                /*横幅广告*/
                $home=new homeModel();
                $banner=$home->getFrontAd(1);
                $num1=rand(0,count($banner)-1);
                $this->smarty->assign('num1',$num1);
                $this->smarty->assign('banner',$banner);

                $this->smarty->assign('register',true);
                $this->smarty->display('home/register.html');
                break;
            /**注册*/
            case 'user':
                $this->user();
                break;
            case 'pic':
                $this->pic();
                break;
            case 'code':
                $this->code();
                break;
            case 'add':
                $this->add();
                break;
            /*忘记密码页面*/
            case 'forget':
                $this->smarty->assign('forget',true);
                $this->smarty->display('home/register.html');
                break;
            /**验证用户*/
            case 'verifyInfo':
                $this->verifyInfo();
                break;
            /*重置密码页面*/
            case 'reset':
                $this->smarty->assign('reset',true);
                $this->smarty->display('home/register.html');
                break;
            /*重置密码*/
            case 'resetPwd':
                $this->resetPwd();
                break;

        }
    }
   /**验证用户*/
    private function user()
    {
        $user = $_POST['user'];
        $result = $this->model->userReg($user);
        if (!$result) {
            echo 'ok';
        } else {
            echo 'no';
        }
    }
   /**处理头像*/
   private function pic(){
      $transfer=new Transfer(array('path' => 'public/uploads/register'));
     if($transfer->upload()){
           echo 'okPic';
         $_SESSION['registerPic']=$transfer->getNewFile();
       }else{
           echo $transfer->getErrorMsg();
       }
   }
    /**验证码*/
    private function code()
    {
        echo $_SESSION['captcha'];
    }

    /**提交注册用户*/
    private function add()
    {
        //var_dump($_POST['user']);
       $array = array(
            'user' => $_POST['user'],
            'pwd' => md5($_POST['pwd']),
            'phone' => $_POST['phone'],
            'email' => $_POST['email'],
            'level_id' => 1,
            'reg_time' => date('Y-m-d H:I:s'),
            'pic' => $_SESSION['registerPic']
        );
        if ($this->model->addUser($array)) {
            echo 'register';
            $_SESSION['login']='none';
            $_SESSION['logout']='block';
            $_SESSION['oneMember']=$this->model->userReg($_POST['user']);
        } else {
            echo 'deniedRegister';
        }
    }
    /**验证信息*/
    private function verifyInfo(){
        if ($this->model->verifyInfo($_POST['user'],$_POST['phone'],$_POST['email'])) {
            echo 'pass';
            $_SESSION['oneMember']=$this->model->userReg($_POST['user']);
        } else {
            echo 'noPass';
        }
    }
    private function resetPwd(){
        $array=array('pwd'=>md5($_POST['pwd']));
        if ($this->model->resPwd($array,$_POST['user'])) {
            $_SESSION['login']='none';
            $_SESSION['logout']='block';
            echo 'rePwd';
        } else {
            echo 'noRePwd';
        }
    }


}

?>
