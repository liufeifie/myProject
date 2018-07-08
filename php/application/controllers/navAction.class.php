<?php

class navAction extends Action
{
    public $allPermission;
    public function main()
    {
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
        $this->perm('2',$this->allPermission);

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
            case 'addSubNav':
                $this->addSubNav();
                break;
            case 'showSubNav':
                $this->showSubNav();
                break;
            case 'showAllSubNav':
                $this->showAllSubNav();
                break;
        }
        $this->smarty->display('admin/nav.html');
    }
    /**
     * 子导航
     */
    /**查看子导航*/
    private function showSubNav()
    {
        $total = $this->model->getSubNavTotal($_GET['id']);
        $page = new Page($total);
        $data = $this->model->getSubNav($_GET['id'], $page->limit);
        /**状态*/
        $this->stateChange($data,'nav');
        $this->smarty->assign('list', $page->display(array(0, 1, 2, 3, 4)));
        $this->smarty->assign('data', $data);
        $this->smarty->assign('pid', $_GET['id']);
        /*父导航*/
        $data1 = $this->model->getOneNav($_GET['id']);
        $this->smarty->assign('data1', $data1);

        $this->smarty->assign('showSubNav', true);

        /**排序*/
        if (isset($_POST['send'])) {
            for ($i = 0; $i < count($data); $i++) {
                $sorts[$data[$i]->id] = $_POST['sort'][$i];
            }
            if ($this->model->setSortNav($sorts) > 0) {
                Tools::Progress('排序成功', $_SERVER['HTTP_REFERER'], 1, 0.5);
            } else if ($this->model->setSortNav($sorts) == 0) {
                Tools::Progress('排序无变化', $_SERVER['HTTP_REFERER'], 1, 0.5);
            } else {
                Tools::Progress('排序失败', $_SERVER['HTTP_REFERER'], 0, 0.5);
            };
        }
    }
    /**所有子导航*/
    private function showAllSubNav(){
        $total=$this->model->getAllSubNavTotal();
       // var_dump($total);
        $page=new Page($total);
        $allSubNav=$this->model->getAllSubNav($page->limit);
        foreach ($allSubNav as $k=>$v){
            $v->pid=$this->model->getOneNav($v->pid)->name;
        }
        $this->stateChange($allSubNav,'nav');
        $this->smarty->assign('page',$page->display(array(0,1,2,3,4)));
        $this->smarty->assign('allSubNav',$allSubNav);
        $this->smarty->assign('showAllSubNav',true);
    }
    /**增加子导航*/
    private function addSubNav()
    {
        if ($_POST['send']) {
            $array = array(
                'name' => $_POST['name'],
                'description' => $_POST['description'],
                'pid' => $_GET['id'],
                'sort' => $this->model->getNextId(),
                'date' => date('Y-m-d H:i:s'),
                'state' => 1
            );
            /*权限不足*/
            $this->permNo('10',$this->allPermission);
            if ($this->model->addNav($array)) {
                Tools::Progress('添加成功', '?a=nav&action=show');
            } else {
                Tools::Progress('添加失败', $_SERVER['HTTP_REFERER'], 0);
            }
        }
        $this->smarty->assign('pid', $_GET['id']);
        $data = $this->model->getOneNav($_GET['id']);
        $this->smarty->assign('data1', $data);
        $this->smarty->assign('addSubNav', true);
    }

    /**父导航*/
    private function show()
    {
        /**显示数据 分页*/
        $total = $this->model->getAllTotalNav();
        $page = new Page($total);
        $data = $this->model->getAllMainNav($page->limit);
        /**状态*/
        $this->stateChange($data,'nav');
        $this->smarty->assign('data', $data);
        $list = $page->display(array(0, 1, 2, 3, 4));
        $this->smarty->assign('list', $list);
        /**排序*/
        if (isset($_POST['send'])) {
            for ($i = 0; $i < count($data); $i++) {
                $sorts[$data[$i]->id] = $_POST['sort'][$i];
            }
            if ($this->model->setSortNav($sorts) > 0) {
                Tools::Progress('排序成功', $_SERVER['HTTP_REFERER'], 1, 0.5);
            } else if ($this->model->setSortNav($sorts) == 0) {
                Tools::Progress('排序无变化', $_SERVER['HTTP_REFERER'], 1, 0.5);
            } else {
                Tools::Progress('排序失败', $_SERVER['HTTP_REFERER'], 0, 0.5);
            };
        }
        $this->smarty->assign('show', true);
    }

    /**状态改变*/
    private function state()
    {
        if (isset($_GET['id'])) {
            if ($_GET['flag'] == 'show') {
                $array = array('state' => 1);
            } else if ($_GET['flag'] == 'hide') {
                $array = array('state' => 0);
            }
            if ($this->model->updateNav($array, $_GET['id'])) {
                header('location:' . $_SERVER['HTTP_REFERER']);
            } else {
                Tools::Progress('状态更改失败', $_SERVER['HTTP_REFERER'], 0, 1);
            }
        }
    }

    /**删除导航数据*/
    private function delete()
    {
        /*权限不足*/
        $this->permNo('10',$this->allPermission);
        if($_POST['info']=='ok'){
            //删除广告
            if($_GET['id']){
                if($this->model->deleteNav(rtrim($_GET['id'],','))){
                    echo 'ok';
                }else{
                    echo 'no';
                }
            }
        }
      /*  if ($_GET['id']) {
            if ($this->model->deleteNav($_GET['id'])) {
                Tools::Progress('删除成功', $_SERVER['HTTP_REFERER'], 1, 0.5);
            } else {
                Tools::Progress('删除失败', $_SERVER['HTTP_REFERER'], 0, 0.5);
            }
        }*/
        /**删除选中*/
      /*  if (isset($_POST['delete'])) {
            $kind = implode(',', $_POST['check']);
            if ($this->model->deleteNav($kind)) {
                Tools::Progress('删除成功', $_SERVER['HTTP_REFERER'], 1, 0.5);
            } else {
                Tools::Progress('删除失败', $_SERVER['HTTP_REFERER'], 0, 0.5);
            }
        }*/

    }

    /**修改导航数据*/
    private function update()
    {
        $data = $this->model->getOneNav($_GET['id']);
        if (isset($_POST['send'])) {
            $array = array(
                'name' => $_POST['name'],
                'description' => trim($_POST['description'])
            );
            // var_dump($this->model->updateNav($array,$_GET['id']));
            /*权限不足*/
            $this->permNo('10',$this->allPermission);
            if ($this->model->updateNav($array, $_GET['id']) == 1) {
                Tools::Progress('修改成功', $_SERVER['HTTP_REFERER'], 1, 1);
            } else if ($this->model->updateNav($array, $_GET['id']) == 0) {
                Tools::Progress('没有修改', $_SERVER['HTTP_REFERER'], 1, 1);
            } else {
                Tools::Progress('修改失败',$_SERVER['HTTP_REFERER'], 0);
            }
        }
        $this->smarty->assign('data', $data);
        $this->smarty->assign('update', true);
    }

    /**添加导航数据*/
    private function add()
    {
        if ($_POST['send']) {
            $array = array(
                'name' => $_POST['name'],
                'description' => $_POST['description'],
                'pid' => 0,
                'state' => 1,
                'picked' => 1,
                'sort' => $this->model->getNextId(),
                'date' => date('Y-m-d H:i:s')
            );
            /*权限不足*/
            $this->permNo('10',$this->allPermission);
            /**添加主导航*/
            if ($this->model->addNav($array)) {
                Tools::Progress('添加成功','?a=nav&action=show');
            } else {
                Tools::Progress('添加失败',$_SERVER['HTTP_REFERER'], 0);
            }
        }
        $this->smarty->assign('add', true);
    }
}

?>

