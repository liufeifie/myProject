<?php
class permissionModel extends Model{
    /**添加权限*/
   public function addPermission($array){
       return parent::add('permission',$array);
   }
   /**删除权限*/
    public function deletePermission($id){
        return parent::delete('permission','where id in ('.$id.')');
    }
   /**修改权限*/
    public function updatePermission($array,$id){
        return parent::update('permission',$array,'where id='.$id);
    }
    /**显示权限*/
    public function getAllPermission($limit=null){
        return parent::getAll('permission','order by id desc',$limit);
    }
    /**总数据数*/
    public function getAllTotalPermission(){
        return parent::getAllTotal('permission');
    }
    /**查询一条数据*/
    public function getOnePermission($id){
        return parent::getOne('permission','where id='.$id);
    }
}
?>

