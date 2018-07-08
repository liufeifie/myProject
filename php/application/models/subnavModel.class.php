<?php
class subnavModel extends Model{
   /**获取子导航*/
    public function getSubnav($id){
        return parent::getAll('nav',"where state=1 and pid=".$id." order by sort asc");
    }
}
?>

