<?php
class adModel extends Model{
    /**获取数据分页显示*/
    public function getAllAd($kind,$limit){
        return parent::getAll('ad',"where type in (".$kind.") order by id desc ",$limit);
    }
    /**获取所有数据*/
    public function getAdTotal($kind){
        return parent::getAllTotal('ad',"where type in (".$kind.")");
    }
    /**添加数据*/
    public function addAd($_array){
        return parent::add('ad',$_array);
    }
    /**删除数据*/
    public function deleteAd($id){
        return parent::delete('ad','where id in ('.$id.')');
    }
    /**查询数据*/
    public function getOneAd($id){
        return parent::getOne('ad','where id='.$id);
    }
    /**修改数据*/
    public function updateAd($array,$id){
        return parent::update('ad',$array,'where id='.$id);
    }
}
?>

