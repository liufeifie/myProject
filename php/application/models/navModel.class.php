<?php
class navModel extends Model{
    /**添加导航*/
    public function addNav($array){
        return parent::add('nav',$array);
    }
    /**获取下一个id*/
    public function getNextId(){
        return parent::nextId('nav');
    }
    /**获取导航数目*/
    public function getAllTotalNav(){
        return parent::getAllTotal('nav','where pid=0');
    }
    /**获取单条导航*/
    public function getOneNav($id){
        return parent::getOne('nav','where id='.$id);
    }
    public function getAllNavByPid($pid){
        return parent::getAll('nav',"where pid='".$pid."'");
    }
    /**获取所有主导航内容*/
    public function getAllMainNav($limit){
       return parent::getAll('nav','where pid=0 order by sort asc ',$limit);
    }
    /**删除导航*/
    public function deleteNav($id){
        return parent::delete('nav','where id in ('.$id.')');
    }
    /**修改数据*/
    public function updateNav($array,$id){
        return parent::update('nav',$array,'where id='.$id);
    }
    /**排序修改*/
   /* public function updateNavSort($array,$id){
        return parent::update('nav',$array,'where id='.$id);
    }*/
    public function setSortNav($sorts){
       return parent::setSort('nav',$sorts);
    }
    /**查看子导航*/
    public function getSubNav($id,$limit=null){
        return parent::getAll('nav','where pid<>0 and pid='."$id".' order by sort asc ',$limit);
    }
    /*获取子导航数目*/
    public function getSubNavTotal($id){
        return parent::getAllTotal('nav','where pid<>0 and pid='."$id".' order by sort asc ');
    }
    /**获取所有子导航数目*/
    public function getAllSubNavTotal(){
        return parent::getAllTotal('nav','where pid<>0 order by sort asc');
    }
    /**获取所有子导航*/
    public function getAllSubNav($limit){
        return parent::getAll('nav','where pid<>0 order by id',$limit);
    }

}
?>

