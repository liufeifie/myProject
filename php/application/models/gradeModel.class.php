<?php
class gradeModel extends Model{
    /**添加数据*/
    public function addGrade($array){
        return parent::add('grade',$array);
    }
    /**获取做过的试题*/
    public function getOneGrade($id){
        return parent::getOne('grade','where id='.$id);
    }
    /*前端页面显示*/
    /*随机获取试题数据*/
    public function getAllRandExam($nid){
        return parent::getAll('exam',"where nid='".$nid."' and state=1");
    }



}
?>