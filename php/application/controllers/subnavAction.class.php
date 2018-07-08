<?php
class subnavAction extends Action{
    public function main(){
        /*横幅广告*/
        $home=new homeModel();
        $banner=$home->getFrontAd(1);
        $num1=rand(0,count($banner)-1);
        $this->smarty->assign('num1',$num1);
        $this->smarty->assign('banner',$banner);

        switch ($_GET['action']){
            case 'show':$this->show();break;
        }
        $this->smarty->display('home/subnav.html');
    }
    /**显示子导航*/
    private function show(){
        $frontNav=$this->model->getSubnav($_GET['id']);
        $nav=new navModel();
        $article=new articleModel();
        /*有子导航*/
        if($frontNav){
            $this->smarty->assign('frontNav',$frontNav);
            /**子导航下的内容*/
            foreach ($frontNav as $k=>$v){
                $allTargetNav[]=$article->getTargetArticle($v->id);
                foreach ($allTargetNav[$k] as $k=>$v){
                    $v->nid=$nav->getOneNav($v->nid)->name;
                }
            }
            $this->smarty->assign('allTargetNav',$allTargetNav);
            $this->smarty->assign('one',true);
        }else{/*没有子导航*/
            $name=$nav->getOneNav($_GET['id']);
            $targetArticle=$article->getTargetArticle($name->id);
            $this->smarty->assign('name',$name->name);
            foreach ($targetArticle as $k=>$v){
                $v->nid=$nav->getOneNav($v->nid)->name;
            }
            $this->smarty->assign('targetArticle',$targetArticle);
            $this->smarty->assign('two',true);
        }
    }


}
?>

