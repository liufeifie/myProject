<?php
class examModel extends Model{
    /*添加试题*/
    public function addExam($array){
        return parent::add('exam',$array);
    }
    /*试题总数目*/
    public function getAllExamTotal(){
        return parent::getAllTotal('exam');
    }
    /*试题数据*/
    public function getAllExam($limit){
        return parent::getAll('exam','order by id desc',$limit);
    }
    /*删除试题*/
    public function deleteExam($id){
        return parent::delete('exam','where id in ('.$id.')');
    }
    /*修改试题*/
    public function updateExam($array,$id){
        return parent::update('exam',$array,'where id='.$id);
    }
    /**获取一条试题*/
    public function getOneExam($id){
        return parent::getOne('exam','where id in('.$id.')');
    }
    /**获取多条数据*/
    public function getMultExam($id){
        return parent::getMult('exam','where id in('.$id.')');
    }
    /**考试类型*/
    public function getExamNav($id){
        return parent::getOne('nav','where id='.$id.' order by id desc');
    }

}
?>

