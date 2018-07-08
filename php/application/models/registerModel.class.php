<?php
class registerModel extends Model{
    /*注册用户名验证*/
    public function userReg($user){
        return parent::getOne('member',"where user='".$user."'");
    }
    /*注册信息提交*/
    public function addUser($array){
        return parent::add('member',$array);
    }
    /*验证信息*/
    public function verifyInfo($user,$phone,$email){
        return parent::getOne('member',"where user='".$user."' and phone='".$phone."' and email='".$email."'");
    }
    /*重置密码*/
    public function resPwd($array,$user){
        return parent::update('member',$array,"where user='".$user."'");
    }
}
?>