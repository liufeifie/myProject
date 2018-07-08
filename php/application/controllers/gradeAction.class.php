<?php

class gradeAction extends Action
{
    public function main()
    {
        if(!$_SESSION['oneMember']){
            header('location:?a=home');
        }else{
            switch ($_GET['action']) {
                case 'php':$this->php();break;
                case 'js':$this->js();break;
                case 'html':$this->html();break;
                case 'htmlCss':$this->htmlCss();break;
                case 'oneExam':$this->oneExam();break;
            }
            $this->smarty->display('home/grade.html');
        }
    }
    /**获取做过的题目*/
    private function oneExam(){
        //var_dump($_GET);
        $exam=new examModel();
        $nav=new navModel();
        if($_GET['id']){
           $oneGrde=$this->model->getOneGrade($_GET['id']);
            $ids=explode(',',$oneGrde->eid);
            foreach ($ids as $k=>$v){
                $Exams[]=$exam->getOneExam($v);
            }
            $test=explode(',',$oneGrde->test);
            for ($i = 0; $i < count($test); $i++) {
                if ($test[$i] == $Exams[$i]->answer) {
                    $colors[]='green';
                }else{
                    $colors[]='red';
                }
            }
            $type=$nav->getOneNav($oneGrde->nid)->name;
            $this->smarty->assign('type',$type);
            $this->smarty->assign('Exams',$Exams);
            $this->smarty->assign('test',$test);
            $this->smarty->assign('oneGrde',$oneGrde);
            $this->smarty->assign('colors',$colors);
        }
        $this->smarty->assign('oneTest',true);
    }

                          //试题类型 获取题目数量
    private function common($nid,$_num){
        if (isset($_POST['send'])) {
            array_pop($_POST);
            if (count($_POST) == $_num) {
                $exam = new examModel();
                //                 id   answer
                foreach ($_POST as $k => $v) {
                    $test[] = $v;//获取做题答案
                    $eid[]=$k;//获取题目id
                    $Data[] = $exam->getOneExam($k);//获取选择的是哪几条题目
                }
                foreach ($Data as $k => $v) {
                    $answer[] = array('id' => $v->id, 'answer' => $v->answer);//正确答案
                    $test_num = array('test_num' => ++$v->test_num);
                    $exam->updateExam($test_num, $v->id);//修改题目出现的次数
                }
                $score = 0;
                for ($i = 0; $i < count($answer); $i++) {
                    if ($test[$i] == $answer[$i]['answer']) {
                        $score++;//获取分数
                        $colors[]='green';
                        $oneExam = $exam->getOneExam($answer[$i]['id']);//获取试题id
                        $true_num = array('true_num' => ++$oneExam->true_num);//最对次数加1
                        $exam->updateExam($true_num, $oneExam->id);//修改题目正确的次数
                    }else{
                        $colors[]='red';
                    }
                }
                $this->smarty->assign('colors',$colors);//正确错误颜色
               // var_dump($answer);
                //var_dump($test);
                $this->smarty->assign('answer', $answer);//正确答案
                $this->smarty->assign('test', $test);//做题结果
                $accuracy=sprintf("%.0f", ($score/$_num*100));
                $this->smarty->assign('score', '你的正确率:'.$accuracy);//正确率
                $array = array(
                    'user' => $_SESSION['oneMember']->user,
                    'accuracy' => $accuracy.'%',
                    'nid' => $nid,
                    'eid' => implode(',',$eid),
                    'test' =>implode(',',$test),
                    'reg_time' => date('Y-m-d H:i:s')
                );
                //加入成绩
                $this->model->addGrade($array);
                sleep(1);
                $this->smarty->assign('tip', '提交成功');
                $this->smarty->assign('none', 'none');

            } else {
                Tools::Progress('请答完题目', $_SERVER['HTTP_REFERER'], 0);
            }
        } else {
            $AllData = $this->model->getAllRandExam($nid);
            $rand = array();
            $flag = $_num;
            for ($i = 0; $i < $flag; $i++) {
                $num = rand(0, count($AllData) - 1);
                if (!in_array($num, $rand)) {
                    $rand[] = $num;
                } else {
                    $flag++;
                }
            }
            /*获取随机题目*/
            foreach ($rand as $k => $v) {
                $Data[] = $AllData[$v];
            }
        }
        $this->smarty->assign('Data', $Data);
        $this->smarty->assign('exam', true);
    }
    /*前端考试页面*/
    private function php(){
        $this->common('49',10);
        $this->smarty->assign('type','php测试');
    }

    private function js()
    {
        $this->common('50',10);
        $this->smarty->assign('type', 'js测试');
    }
    private function htmlCss()
    {
        $this->common('51',10);
        $this->smarty->assign('type', 'htmlCss测试');
    }

}

?>