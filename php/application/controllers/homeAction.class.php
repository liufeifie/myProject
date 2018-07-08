<?php

class homeAction extends Action
{
    public function main()
    {
        /*横幅广告*/
        $banner = $this->model->getFrontAd(1);
        $num1 = rand(0, count($banner) - 1);
        $this->smarty->assign('num1', $num1);
        $this->smarty->assign('banner', $banner);
        /**滚播图广告*/
        $slider = $this->model->getFrontAd(2);
        $this->smarty->assign('len', count($slider));
        $this->smarty->assign('slider', $slider);
        /**通栏广告*/
        $fullcolum = $this->model->getFrontAd(3);
        $num3 = rand(0, count($fullcolum) - 1);
        $this->smarty->assign('num3', $num3);
        $this->smarty->assign('fullcolum', $fullcolum);
        /**侧边栏广告*/
        $sliderbar = $this->model->getFrontAd(4);
        $num4 = rand(0, count($sliderbar) - 1);
        $this->smarty->assign('num4', $num4);
        //var_dump($sliderbar);
        $this->smarty->assign('sliderbar', $sliderbar);

        //导航排序显示
        $frontNav = $this->model->getNavName();
        //var_dump($data);
        $this->smarty->assign('frontNav', $frontNav);

        /**文章显示*/
        /**最新文章*/
        $newArticle = $this->model->getNewArticle('4');
        foreach ($newArticle as $k=>$v){
            $v->nid=$this->model->getExamNav($v->nid)->name;
        }
        $this->smarty->assign('newArticle', $newArticle);
        /**最热文章*/
        $hottedArticle = $this->model->getHottedArticle('4');
        foreach ($hottedArticle as $k=>$v){
            $v->nid=$this->model->getExamNav($v->nid)->name;
        }
        $this->smarty->assign('hottedArticle', $hottedArticle);
        /*头条*/
        $headline = $this->model->getAllAtricleByAttr('头条', 'limit 0,1');
        // var_dump($headline);
        $this->smarty->assign('headline', $headline);
        /*推荐*/
        $recommend = $this->model->getAllAtricleByAttr('推荐', 'limit 0,1');
        $this->smarty->assign('recommend', $recommend);
        /*专题*/
        $special = $this->model->getAllAtricleByAttr('专题', 'limit 0,1');
        $this->smarty->assign('special', $special);

        /**最新成绩*/
        $total=$this->model->getAllTotalGrade();
        $page=new Page($total,6);
        $grade=$this->model->getAllGrade($page->limit);
        foreach ($grade as $k=>$v){
            $v->nid=$this->model->getExamNav($v->nid)->name;
        }
        $this->smarty->assign('grade', $grade);
        $this->smarty->assign('user', $_SESSION['oneMember']->user);
        $this->smarty->assign('page', $page->display(array(0,1,2,3,4)));
        $this->smarty->display('home/home.html');
    }
    /*登录验证*/
    public function login()
    {
        $user = $_POST['user'];
        $pwd = md5($_POST['pwd']);
        $oneMember = $this->model->loginUser($user, $pwd);
        if ($oneMember) {
           // $_SESSION['registerPic'] = $oneMember->pic;
            $array = array(
                'login_num' => ++$oneMember->login_num,
                'last_time' => date('Y-m-d H:i:s'),
                'last_ip' => $_SERVER['REMOTE_ADDR']
            );
            /**修改登录次数*/
            $this->model->updateMember($array, $oneMember->id);
            /**存储登录信息*/
           $_SESSION['login']='none';
           $_SESSION['logout']='block';
            $_SESSION['oneMember'] = $this->model->loginUser($user, $pwd);
            echo 'login';
        } else {
            echo 'deniedLogin';
        }
    }
    /*注销*/
    public function logout(){
        $_SESSION['login']='block';
        $_SESSION['logout']='none';
        $_SESSION['oneMember'] = '';
        echo 'logout';
    }
    /*显示会员信息*/
    public function showInfo()
    {
        if(!$_SESSION['oneMember']){
            header('location:?a=home');
        }else{
            $nav=new navModel();
            $grade=$this->model->getAllGrade('limit 0,6',"where user='".$_SESSION['oneMember']->user."'");
            foreach ($grade as $k=>$v){
                $v->nid=$nav->getOneNav($v->nid)->name;
            }
          //  var_dump($grade);
            $this->smarty->assign('grade', $grade);
            $this->smarty->assign('showInfo', true);
            $this->smarty->display('home/person.html');
        }
    }

    /*修改会员信息*/
    public function updateInfo()
    {
        /*修改*/
        if(!$_SESSION['oneMember']){
            header('location:?a=home');
        }else{
            if ($_SESSION['oneMember']->id) {
                // var_dump($_POST);
                $transfer = new Transfer(array('path' => 'public/uploads/register'));
                if (isset($_POST['send'])) {
                    if ($transfer->upload()) {
                        $file = $transfer->getNewFile();
                    } else {
                        $file = $_SESSION['oneMember']->pic;
                    }
                    $birth = $_POST['year'] . $_POST['month'] . $_POST['day'];
                    $array = array(
                        'pic' => $file,
                        'sex' => $_POST['sex'],
                        'phone' => $_POST['phone'],
                        'email' => $_POST['email'],
                        'birth' => $birth
                    );
                    // var_dump($this->model->updateMember($array, $newOne->id));
                    if ($this->model->updateMember($array, $_SESSION['oneMember']->id)) {
                        $_SESSION['oneMember'] = $this->model->getOneMember($_SESSION['oneMember']->id);
                        Tools::Progress('修改成功','?a=home&m=showInfo');
                    } else if ($this->model->updateMember($array, $_GET['id']) == 0) {
                        Tools::Progress('没有修改','?a=home&m=showInfo');
                    } else {
                        Tools::Progress('修改失败','?a=home&m=showInfo',0);
                    }
                }
            }
            switch (trim($_SESSION['oneMember']->sex)) {
                case '男':
                    $this->smarty->assign('male', 'checked');
                    break;
                case '女':
                    $this->smarty->assign('female', 'checked');
                    break;
            }
            $birth = $_SESSION['oneMember']->birth;
            $_SESSION['oneMember']->year = mb_substr($birth, 0, 5);
            $_SESSION['oneMember']->month = mb_substr($birth, 5, 3);
            $_SESSION['oneMember']->day = mb_substr($birth, 8, 3);
            $this->smarty->assign('updateInfo', true);
            $this->smarty->display('home/person.html');
        }
    }

}

?>

