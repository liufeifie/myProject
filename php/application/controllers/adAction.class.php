<?php

class  adAction extends Action
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
        /*权限*/
        $this->perm('1',$this->allPermission);
        //var_dump($allPermission);
       /* if (!in_array('1', $this->allPermission)) {
            $this->smarty->assign('denied',true);
            $this->smarty->display('admin/welcome.html');
            exit();
        }*/
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
            case 'state':
                $this->state();
                break;
        }
        $this->smarty->display('admin/ad.html');
    }

    /**修改数据*/
    private function update()
    {
        if ($_GET['id']) {
            $oneAd = $this->model->getOneAd($_GET['id']);
            $value = 'checked';
            switch ($oneAd->type) {
                case 1:
                    $this->smarty->assign('banner', $value);
                    break;
                case 2:
                    $this->smarty->assign('slider', $value);
                    break;
                case 3:
                    $this->smarty->assign('fullcolum', $value);
                    break;
                case 4:
                    $this->smarty->assign('sidebar', $value);
                    break;
            }
            $path = substr(__FILE__, 0, 33);
            /**判断本地是否存在照片*/
            $pic = !file_exists($path . '/public/uploads/ad/' . $oneAd->thumbnail);
            $len = strlen($path . '/public/uploads/ad/');
            $this->smarty->assign('pic', $pic);
            $this->smarty->assign('len', $len);
            $this->smarty->assign('oneAd', $oneAd);
        }
        $transfer = new Transfer(array('fieldName' => 'thumbnail', 'path' => 'public/uploads/ad'));
        if (isset($_POST['send'])) {
            if ($transfer->upload()) {
                $file = $transfer->getNewFile();
            } else {
                $file = $oneAd->thumbnail;
            }
            $array = array(
                'title' => $_POST['title'],
                'link' => $_POST['link'],
                'thumbnail' => $file,
                'description' => $_POST['description'],
                'type' => $_POST['type']
            );
            $this->permNo('10',$this->allPermission);
            if ($this->model->updateAd($array, $_GET['id'])) {
                Tools::Progress('修改成功', '?a=ad&action=show');
            } else if ($this->model->updateAd($array, $_GET['id']) == 0) {
                Tools::Progress('没有修改', $_SERVER['HTTP_REFERER']);
            } else {
                Tools::Progress('修改失败', $_SERVER['HTTP_REFERER'], 0, 5);
            }
        }
        $this->smarty->assign('update', true);
    }

    /**删除数据*/
    private function delete()
    {
        $this->permNo('10',$this->allPermission);
        if ($_POST['info'] == 'ok') {
            //删除广告
            if ($_GET['id']) {
                if ($this->model->deleteAd(rtrim($_GET['id'], ','))) {
                    echo 'ok';
                } else {
                    echo 'no';
                }
            }
        }
        //删除多条
        /*  if($_POST['send']){
             $id=implode(',',$_POST['check']);
             echo $id;
            if($this->model->deleteAd($id)){
                Tools::Progress('删除成功',$_SERVER['HTTP_REFERER']);
            }else{
                Tools::Progress('删除失败',$_SERVER['HTTP_REFERER'],0,2);
            }
         }*/
    }
    /**添加数据*/
    private function add()
    {
        if (isset($_POST['send'])) {
            $transfer = new Transfer(array('fieldName' => 'thumbnail', 'path' => 'public/uploads/ad'));
            if ($transfer->upload()) {
                $array = array(
                    'title' => $_POST['title'],
                    'type' => $_POST['type'],
                    'link' => $_POST['link'],
                    'description' => $_POST['description'],
                    'thumbnail' => $transfer->getNewFile(),
                    'state' => 1,
                    'date' => date('Y-m-d H:i:s')
                );
                /*权限不足*/
                $this->permNo('10',$this->allPermission);
                if ($this->model->addAd($array)) {
                    //Tools::Redirect('添加成功','?a=ad&action=add',1);
                    Tools::Progress('添加成功', '?a=ad&action=show');
                } else {
                    //Tools::Redirect('添加失败','?a=ad&action=add',0);
                    Tools::Progress('添加失败', '?a=ad&action=add', 0, 5);
                }
            } else {
                echo $transfer->getErrorMsg();
            }
        }
        $this->smarty->assign('add', true);
    }
    /**显示数据*/
    private function show()
    {
        $value = 'selected=selected';
        if (empty($_GET['kind'])) {
            $kind = '1,2,3,4';
            $this->smarty->assign('all', $value);
        } else {
            $kind = $_GET['kind'];
            switch ($kind) {
                case 1:
                    $this->smarty->assign('banner', $value);
                    break;
                case 2:
                    $this->smarty->assign('slider', $value);
                    break;
                case 3:
                    $this->smarty->assign('fullcolum', $value);
                    break;
                case 4:
                    $this->smarty->assign('sidebar', $value);
                    break;
            }
        }
        $page = new Page($this->model->getAdTotal($kind));
        $data = $this->model->getAllAd($kind, $page->limit);
        foreach ($data as $k => $v) {
            switch ($v->type) {
                case 1;
                    $v->type = 'banner广告';
                    break;
                case 2;
                    $v->type = 'slider广告';
                    break;
                case 3;
                    $v->type = 'fullcolum广告';
                    break;
                case 4;
                    $v->type = 'sidebar广告';
                    break;
            }
            switch ($v->state) {
                case 1:
                    $v->state = "<span style='color:green;'>[显示]</span>
                              <a href='?a=ad&action=state&flag=hide&id=" . $v->id . "'>[隐藏]</a>";
                    break;
                case 0:
                    $v->state = "<span style='color:red;'>[隐藏]</span>
                              <a href='?a=ad&action=state&flag=show&id=" . $v->id . "'>[显示]</a>";
                    break;
            }
        }
        $this->smarty->assign('data', $data);
        $this->smarty->assign('page', $page->display());
        $this->smarty->assign('show', true);
    }

    /**修改广告状态*/
    private function state()
    {
        if ($_GET['id']) {
            if ($_GET['flag'] == 'hide') {
                $array = array('state' => 0);
            } else if ($_GET['flag'] == 'show') {
                $array = array('state' => 1);
            }
            $this->model->updateAd($array, $_GET['id']) ? header('location:' . $_SERVER['HTTP_REFERER'])
                : Tools::Progress('状态更改失败', $_SERVER['HTTP_REFERER'], 0, 1);
        }

    }


}

?>

