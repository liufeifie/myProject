<?php
class adminmodel extends Model{
    /**指定字段*/
    public function getPic($table,$field){
        return parent::getField($table,$field);
    }
}
?>

