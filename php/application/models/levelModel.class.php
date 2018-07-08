<?php
class levelModel extends Model{
    /**添加等级*/
   public function addLevel($array){
       return parent::add('level',$array);
   }
    /**删除等级*/
    public function deleteLevel($id){
        return parent::delete('level','where id in ('.$id.')');
    }
    /**修改等级*/
    public function updateLevel($array,$id){
        return parent::update('level',$array,'where id='.$id);
    }
    /**显示等级*/
    public function getAllLevel($limit=null){
        return parent::getAll('level','order by id desc',$limit);
    }
    /**总数据数*/
    public function getAllTotalLevel(){
        return parent::getAllTotal('level');
    }
    /**查询一条数据*/
    public function getOneLevel($id){
        return parent::getOne('level','where id='.$id);
    }
    /*根据level表的name值获取一条数据*/
    public function getOneLevelByName($name){
        return parent::getOne('level',"where name='".$name."'");
    }
}
?>

