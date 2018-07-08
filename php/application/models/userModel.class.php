<?php
class userModel extends Model{
    /**后台登录验证*/
     public function verifyUser($_username,$_pwd){
         return parent::getOne('user',"where username='".$_username."' and pwd='".$_pwd."'");
     }
     /**每次登录更新数据*/
     public function updateLogin($array,$id){
         return parent::update('user',$array,"where id=".$id);
     }
     /**获取所有数据*/
     public function getAllUser($limit){
         return parent::getAll('user','order by id desc',$limit);
     }
     /**总数据数*/
     public function getAllTotalUser(){
         return parent::getAllTotal('user');
     }
     /**添加管理员*/
     public function addUser($array){
         return parent::add('user',$array);
     }
     /**删除管理员*/
     public function deleteUser($id){
         return parent::delete('user',"where id in (".$id.')');
     }
     /**获取一条数据*/
     public function getOneUser($id){
         return parent::getOne('user','where id='.$id);
     }
     public function updateUser($array,$id){
         return parent::update('user',$array,'where id='.$id);
     }

}
?>

