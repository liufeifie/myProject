<?php

class articleAction extends Action
{
    private $allPermission;
    public function main()
    {
        //检测是否登录
        if (Tools::checkLogin('admin')) {
            header('location:?a=user&m=login');
        }
        //检测登录用户的权限
        $level = new levelModel();
        $oneLevel = $level->getOneLevelByName($_SESSION['admin']->level_id);
        //获取这个等级的权限
        $this->allPermission = explode(',', $oneLevel->pid);
        //var_dump($allPermission);
        /*权限*/
        $this->perm('3',$this->allPermission);
        switch ($_GET['action']) {
            case 'add';
                $this->add();
                break;
            case 'show';
                $this->show();
                break;
            case 'delete';
                $this->delete();
                break;
            case 'update';
                $this->update();
                break;
            case 'state';
                $this->state();
                break;
        }
        $this->smarty->display('admin/article.html');
    }
    /**显示文章*/
    private function show()
    {
        $total = $this->model->getAllTotalArricle();
        $page = new Page($total);
        $allArticle = $this->model->getAllArticle($page->limit);
        $this->stateChange($allArticle,article);
        foreach ($allArticle as $k=>$v){
            $v->nid=$this->model->getOneNav($v->nid)->name;
        }
        $this->smarty->assign('allArticle', $allArticle);
        $this->smarty->assign('list', $page->display(array(0, 1, 2, 3, 4)));
        $this->smarty->assign('show', true);
    }

    /*状态改变*/
    private function state()
    {
        if ($_GET['id']) {
            if ($_GET['flag'] == 'hide') {
                $array = array('state' => 0);
            } else if ($_GET['flag'] == 'show') {
                $array = array('state' => 1);
            }
            $this->model->updateArticle($array, $_GET['id']) ? header('location:' . $_SERVER['HTTP_REFERER'])
                : Tools::Progress('状态更改失败', $_SERVER['HTTP_REFERER'], 0, 1);
        }

    }

    /*删除*/
    private function delete()
    {
        $this->permNo('10',$this->allPermission);
        if($_POST['info']=='ok'){
            //删除文章
            if($_GET['id']){
                if($this->model->deleteArticle(rtrim($_GET['id'],','))){
                    echo 'ok';
                }else{
                    echo 'no';
                }
            }
        }
    }

    /**添加文章*/
    private function add()
    {
        $transfer = new Transfer(array('path' => 'public/uploads/article'));
        // var_dump($_POST);
        if (isset($_POST['send'])) {
            if ($_POST['nid'] != '必须选择一个栏目') {
                $attr = null;
                foreach ($_POST['attr'] as $k => $v) {
                    switch ($v) {
                        case 1:
                            $attr .= '头条,';
                            break;
                        case 2:
                            $attr .= '推荐,';
                            break;
                        case 3:
                            $attr .= '专题,';
                            break;
                    }
                }
                //var_dump($_POST);
                if ($transfer->upload()) {
                    $array = array(
                        'nid' => $_POST['nid'],
                        'title' => $_POST['title'],
                        'author' => $_POST['author'],
                        'tag' => $_POST['tag'],
                        'thumbnail' => $transfer->getNewFile(),
                        'lead' => $_POST['lead'],
                        'source' => $_POST['source'],
                        'content' => $_POST['content'],
                        'state' => 1,
                        'createTime' => date('Y-m-d H:i:s'),
                        'attr' => rtrim($attr, ',')
                    );
                    $this->permNo('10',$this->allPermission);
                    if ($this->model->addArticle($array)) {
                        Tools::Progress('添加成功', '?a=article&action=show');
                    } else {
                        Tools::Progress('添加失败', '?a=article&action=add', 0);
                    }
                } else {
                    Tools::Progress($transfer->getErrorMsg(), '?a=article&action=add', 0, 1);
                    $transfer->getErrorMsg();
                }
            } else {
                Tools::Progress('必须选择文章栏目', '?a=article&action=add', 0);
            }
        }
        $this->nav();
        $this->smarty->assign('add', true);
    }

    /*修改*/
    private function update()
    {
        $oneArticle = $this->model->getOneArticle($_GET['id']);
        /**修改*/
        if (isset($_POST['send'])) {
           // var_dump($_FILES);
            $transfer = new Transfer(array('path' => 'public/uploads/article'));
            $attr = null;
            foreach ($_POST['attr'] as $k => $v) {
                switch ($v) {
                    case 1:
                        $attr .= '头条,';
                        break;
                    case 2:
                        $attr .= '推荐,';
                        break;
                    case 3:
                        $attr .= '专题,';
                        break;
                }
            }
            if ($transfer->upload()) {
                $file = $transfer->getNewFile();

            } else {
                $file = $oneArticle->thumbnail;
            }
            $array = array(
                'nid' => $_POST['nid'],
                'title' => $_POST['title'],
                'author' => $_POST['author'],
                'tag' => $_POST['tag'],
                'thumbnail' => $file,
                'lead' => $_POST['lead'],
                'source' => $_POST['source'],
                'content' => $_POST['content'],
                'createTime' => date('Y-m-d H:i:s'),
                'attr' => rtrim($attr, ',')
            );
            if ($_POST['nid'] != '必须选择一个栏目') {
                $this->permNo('10',$this->allPermission);
                if ($this->model->updateArticle($array, $_GET['id'])) {
                    Tools::Progress('修改成功','?a=article&action=show');
                } else {
                    Tools::Progress('修改失败',$_SERVER['HTTP_REFERER'], 0);
                }
            } else {
                Tools::Progress('必须选择一个栏目',$_SERVER['HTTP_REFERER'], 0);
            }
        }
        /**显示默认*/
        $chk = 'checked';
        $arr = explode(',', $oneArticle->attr);
        foreach ($arr as $k => $v) {
            switch ($v) {
                case "头条";
                    $this->smarty->assign('headline', $chk);
                    break;
                case '专题';
                    $this->smarty->assign('dissertation', $chk);
                    break;
                case '推荐';
                    $this->smarty->assign('recommend', $chk);
                    break;
            }
        }
        $this->nav($oneArticle->nid);
        $this->smarty->assign('oneArticle', $oneArticle);
        $this->smarty->assign('update', true);
    }

    /*文章栏目*/
    private function nav($nid = null)
    {
        $nav = new navModel();
        $str = null;
        $mainNav = $nav->getAllMainNav($limit = null);
        foreach ($mainNav as $k => $v) {
            $str .= "<optgroup label='" . $v->name . "'>";
            $sonNav = $nav->getSubNav($v->id);
            foreach ($sonNav as $k => $v) {
                if ($v->id == $nid) {
                    $selecte = 'selected';
                } else {
                    $selecte = '';
                }
                $str .= "<option value='" . $v->id . "' $selecte>$v->name</option>";
            }
            $str .= "</optgroup>";
        }
        $this->smarty->assign('nav', $str);
    }
    /*所有文章*/
    public function allArticle()
    {
        /*横幅广告*/
        $home = new homeModel();
        $banner = $home->getFrontAd(1);
        $num1 = rand(0, count($banner) - 1);
        $this->smarty->assign('num1', $num1);
        $this->smarty->assign('banner', $banner);

        $total = $this->model->getShowTotalArricle();
        $page = new Page($total);
        $allArticle = $this->model->getShowArticle($page->limit);
        foreach ($allArticle as $k=>$v){
            $v->nid=$this->model->getOneNav($v->nid)->name;
        }
        $this->smarty->assign('list', $page->display(array(0, 1, 2, 3, 4)));
        $this->smarty->assign('allArticle', $allArticle);
        $this->smarty->assign('all', true);
        $this->smarty->display('home/detail.html');
    }
    /*文章显示*/
    public function detail()
    {
        //var_dump($_GET);
        if ($_GET['id']) {
            $oneArticle = $this->model->getOneArticle($_GET['id']);
            $array = array(
                'pageview' => ++$oneArticle->pageview
            );
            $this->model->updateArticle($array, $_GET['id']);
            $oneArticle = $this->model->getOneArticle($_GET['id']);
            $this->smarty->assign('oneArticle', $oneArticle);
        }
        /*横幅广告*/
        $home = new homeModel();
        $banner = $home->getFrontAd(1);
        $num1 = rand(0, count($banner) - 1);
        $this->smarty->assign('num1', $num1);
        $this->smarty->assign('banner', $banner);

        $this->smarty->assign('one', true);
        $this->smarty->display('home/detail.html');
    }
    /**搜索文章*/
    public function search(){
       // var_dump($_POST);
        sleep(1);
       if(isset($_POST['send'])){
           $total=$this->model->searchTotalArticle($_POST['search']);
           $page=new Page($total);
           $searchArticle=$this->model->searchArticle($_POST['search'],$page->limit);
           $this->smarty->assign('searchArticle',$searchArticle);
           $this->smarty->assign('searchContent',$_POST['search']);
           $this->smarty->assign('page',$page->display(array(0,1,2,3,4)));
           $this->smarty->assign('search',true);
       }
        $this->smarty->display('home/detail.html');
    }
}

?>

