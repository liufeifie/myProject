<?php
class articleModel extends Model{
    /**添加文章*/
     public function addArticle($array){
         return parent::add('article',$array);
     }
     /*获取所有文章*/
     public function getAllArticle($limit){
         return parent::getAll('article','order by id desc',$limit);
     }
     /*获取文章总数*/
     public function getAllTotalArricle(){
         return parent::getAllTotal('article');
     }
    /**获取显示状态的文章*/
    public function getShowArticle($limit){
        return parent::getAll('article','where state=1 order by id desc',$limit);
    }
    /*获取显示状态文章总数*/
    public function getShowTotalArricle(){
        return parent::getAllTotal('article','where state=1');
    }
     /*删除*/
     public function deleteArticle($id){
         return parent::delete('article','where id in ('.$id.')');
     }
     /*修改*/
     public function updateArticle($array,$id){
         return parent::update('article',$array,'where id='.$id);
     }
     /*获取一篇文章*/
    public function getOneArticle($id){
        return parent::getOne('article','where id='.$id);
    }
     /*获取一条子导航*/
     public function getOneNav($id){
         return parent::getOne('nav','where id='.$id);
     }
     /**获取子导航下的文章内容*/
     public function getTargetArticle($name){
         return parent::getAll('article',"where state=1 and nid='".$name."'");
     }
     /**搜索文章*/
     public function searchArticle($title,$limit){
         return parent::search('article',"where title like '%".$title."%'",$limit);
     }
     public function searchTotalArticle($title){
         return parent::searchTotal('article',"where title like '%".$title."%'");
     }
}
?>

