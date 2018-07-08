<?php
//删除多余的图片
error_reporting(E_ALL^E_NOTICE);
$pdo=new PDO("mysql:host=localhost;dbname=mpms", 'root', '');
$pdo->query('set names utf8');
$sql='select thumbnail from ad';
$result=$pdo->query($sql);
$picArr=$result->fetchAll(PDO::FETCH_NUM);
foreach ($picArr as $k=>$v){
    $sqlFile[]=$v[0];
}
$path=dirname(__FILE__);
$openDir=opendir($path);
while ($file=readdir($openDir)){
  if(strlen($file)>20){
       $localFile[]=$file;
   }
}

$diff=array_diff($localFile, $sqlFile);
if($diff){
    foreach ($diff as $k=>$v){
        $diffFile[]=$v;
    }
    for ($i=0;$i<count($diffFile);$i++){
        unlink($path.'/'.$diffFile[$i]);
    }
    echo '删除成功';
}else {
    echo '比对成功';
}

?>