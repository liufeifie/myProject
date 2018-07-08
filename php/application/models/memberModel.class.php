<?php
class memberModel extends Model{
    /*会员数据*/
    public function getAllMember($limit=null){
        return parent::getAll('member','order by last_time desc',$limit);
    }
    /**会员总数据数*/
    public function getAllTotalMember(){
        return parent::getAllTotal('member');
    }
    /*获取会员*/
    public function getOneMember($id){
        return parent::getOne('member','where id='.$id);
    }
    /*修改会员*/
    public function updateMember($array,$id){
        return parent::update('member',$array,'where id='.$id);
    }
    /*删除会员*/
    public function deleteMember($id){
        return parent::delete('member','where id in ('.$id.')');
    }
}
?>

