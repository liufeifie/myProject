<?php

class examAction extends Action
{
    public function main()
    {
        switch ($_GET['action']) {
            case 'show':
                $this->show();
                break;
            case 'add':
                $this->add();
                break;
            case 'update':
                $this->update();
                break;
            case 'delete':
                $this->delete();
                break;
            case 'state':
                $this->state();
                break;

        }
        $this->smarty->display('admin/exam.html');
    }

    /**显示*/
    private function show()
    {
        $total = $this->model->getAllExamTotal();
        $page = new Page($total, 10);
        $allExam = $this->model->getAllExam($page->limit);
        $this->stateChange($allExam, 'exam');
        foreach ($allExam as $k => $v) {
            $v->accuracy = sprintf('%.2f', ($v->true_num / $v->test_num * 100)) . '%';
            $v->nid = $this->model->getExamNav($v->nid)->name;
        }
        $this->smarty->assign('allExam', $allExam);
        $this->smarty->assign('page', $page->display(array(0, 1, 2, 3, 4)));
        $this->smarty->assign('show', true);
    }

    /**添加试题*/
    private function add()
    {
        if (isset($_POST['send'])) {
            if ($_POST['nid'] != 0) {
                $array = array(
                    'nid' => $_POST['nid'],
                    'title' => $_POST['title'],
                    'A' => $_POST['A'],
                    'B' => $_POST['B'],
                    'C' => $_POST['C'],
                    'D' => $_POST['D'],
                    'state' => 1,
                    'answer' => $_POST['answer'],
                    'reg_time' => date('Y-m-d H:i:s')
                );
                if ($this->model->addExam($array)) {
                    Tools::Progress('添加成功', '?a=exam&action=show');
                } else {
                    Tools::Progress('添加失败', '', 0);
                }
            } else {
                Tools::Progress('请选择栏目', $_SERVER['HTTP_REFERER'], 0);
            }
        }
        $this->nav();
        $this->smarty->assign('add', true);
    }

    /**修改试题*/
    private function update()
    {
        if ($_GET['id']) {
            $oneExam = $this->model->getOneExam($_GET['id']);
            switch ($oneExam->answer) {
                case "A":
                    $this->smarty->assign('A', 'checked');
                    break;
                case "B":
                    $this->smarty->assign('B', 'checked');
                    break;
                case "C":
                    $this->smarty->assign('C', 'checked');
                    break;
                case "D":
                    $this->smarty->assign('D', 'checked');
                    break;
            }
            $this->smarty->assign('oneExam', $oneExam);
        }
        if (isset($_POST['send'])) {
            if ($_POST['nid'] != 0) {
                $array = array(
                    'nid' => $_POST['nid'],
                    'title' => $_POST['title'],
                    'A' => $_POST['A'],
                    'B' => $_POST['B'],
                    'C' => $_POST['C'],
                    'D' => $_POST['D'],
                    'answer' => $_POST['answer']
                );
                if ($this->model->updateExam($array, $_GET['id'])) {
                    Tools::Progress('修改成功', '?a=exam&action=show');
                } else if ($this->model->updateExam($array, $_GET['id']) == 0) {
                    Tools::Progress('没有成功', '?a=exam&action=show');
                } else {
                    Tools::Progress('修改失败', $_SERVER['HTTP_REFERER']);
                }
            } else {
                Tools::Progress('请选择栏目', $_SERVER['HTTP_REFERER'], 0);
            }
        }
        $this->nav($oneExam->nid);
        $this->smarty->assign('update', true);
    }

    /*删除*/
    private function delete()
    {
        if ($_POST['info'] == 'ok') {
            //删除试题
            if ($_GET['id']) {
                if ($this->model->deleteExam(rtrim($_GET['id'], ','))) {
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

    /**修改试题状态*/
    private function state()
    {
        if ($_GET['id']) {
            if ($_GET['flag'] == 'hide') {
                $array = array('state' => 0);
            } else if ($_GET['flag'] == 'show') {
                $array = array('state' => 1);
            }
            $this->model->updateExam($array, $_GET['id']) ? header('location:' . $_SERVER['HTTP_REFERER'])
                : Tools::Progress('状态更改失败', $_SERVER['HTTP_REFERER'], 0, 1);
        }

    }

    /*试题类型*/
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

}

?>

