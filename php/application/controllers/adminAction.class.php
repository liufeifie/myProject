<?php

/**后台首页*/
class adminAction extends Action
{
    public function main()
    {
        if (Tools::checkLogin('admin')) {
            header('location:?a=user&m=login');
        }
        $this->smarty->display('admin/admin.html');
    }

    public function welcome()
    {
        $this->smarty->display('admin/welcome.html');
    }

    public function deleteCache()
    {
        //本地smarty模板缓存文件
        function space($_path)
        {
            $path = substr(dirname(__FILE__), 0, -23) . $_path;
            $open = openDir($path);
            while ($file = readdir($open)) {
                if ($file == '.' || $file == '..') {
                    continue;
                }
                $spaceFile[] = $file;
            }
            if(count($spaceFile)>0){
                for ($i=0;$i<count($spaceFile);$i++){
                    unlink($path.'/'.$spaceFile[$i]);
                }
              return true;
            }
        }
        //删除函数
      /*  function deletePic($arr,$_path){
            foreach ($arr as $k=>$v){
                $diffFile[]=$v;
            }
            for ($i=0;$i<count($arr);$i++){
                unlink($_path.'/'.$arr[$i]);
            }
            return true;
        }*/
        /**删除samrty缓存文件*/
        $smarty=space('application/runtime/');

        $ad = $this->delete('ad', 'thumbnail', 'public/uploads/ad');
        $article = $this->delete('article', 'thumbnail', 'public/uploads/article');
        $register = $this->delete('member', 'pic', 'public/uploads/register');
        if($ad||$article||$register||$smarty){
            Tools::Progress('缓存删除成功','?a=admin' ,1,2);
        }else{
            Tools::Progress('没有缓存','?a=admin' ,1,2);
        }
        $this->smarty->display('admin/admin.html');
    }
    /**删除*/
    private function delete($_table, $_field, $_path)
    {
        /**数据库文件*/
        $sqlPic = $this->model->getPic($_table, $_field);
        foreach ($sqlPic as $k => $v) {
            $sqlFile[] = $v[0];
        }
        /**空间文件名*/
        $path = substr(dirname(__FILE__), 0, -23) . $_path;
        $open = opendir($path);
        while ($file = readdir($open)) {
            if (strlen($file) > 20) {
                $spaceFile[] = $file;
            }
        }
        /**取差集*/
        $diff0 = array_diff($spaceFile, $sqlFile);
        foreach ($diff0 as $k=>$v){
            $diff[]=$v;
        }
        foreach ($diff as $k=>$v){
            $diffFile[]=$v;
        }
        for ($i=0;$i<count($diff);$i++){
            unlink(substr(dirname(__FILE__), 0, -23).$_path.'/'.$diff[$i]);
        }
        closedir($open);
        return true;
    }
}

?>

