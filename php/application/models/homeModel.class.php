<?php
class homeModel extends Model{
    /*广告*/
    public function getFrontAd($type,$limit=5){
        return parent::getAll('ad',"where state=1 and type=".$type." order by id desc limit 0,".$limit."");
    }
    /**以排序号获取导航数据*/
    public function getNavName(){
        return $this->getAll('nav','where state=1 and pid=0 order by sort asc');
    }
    /*会员登录名核对*/
    public function loginuser($user,$pwd){
        return parent::getOne('member',"where user='".$user."' and pwd='".$pwd."'");
    }
    /*更新会员登录次数*/
    public function updateMember($array,$id){
        return parent::update('member',$array,'where id='.$id);
    }
    /*获取会员信息*/
    public function getOneMember($id){
        return parent::getOne('member','where id='.$id);
    }
    /*文章显示*/
    public function getAllAtricleByAttr($attr,$limit){
        return parent::getAll('article',"where state=1 and attr='".$attr."' order by id desc ",$limit);
    }
    /**获取最新文章*/
    public function getNewArticle($limit){
        return parent::getAll('article','order by id desc ','limit '.$limit);
    }
    /**获取最热文章*/
    public function getHottedArticle($limit){
        return parent::getAll('article','order by pageview desc ','limit '.$limit);
    }
    /**获取成绩总数*/
    public function getAllTotalGrade()
    {
        return parent::getAllTotal('grade');
    }

    /**获取考试成绩*/
    public function getAllGrade($limit=null,$where=null){
        return parent::getAll('grade',$where.' order by id desc ',$limit);
    }
    /**考试成绩类型*/
    public function getExamNav($id){
        return parent::getOne('nav','where id='.$id.' order by id desc');
    }

}
?>

