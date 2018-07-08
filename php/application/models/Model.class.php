<?php

/**
 * 模型：操作数据库
 * @author OracleOAEC
 *  */
class Model
{
    /**链接数据库*/
    private $db;

    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=' . HOST . ";dbname=" . DBNAME, USER, PWD);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
        //echo 'mysql:host='.HOST.";dbname=".DBNAME;
        $this->db->query("set names utf8");
    }

    /**随机数据*/
    protected function getAllRand($_table, $field, $_limit)
    {
        $_sql = "select * from " . $_table . " where " . $field . " >= (floor (rand()*(select max(" . $field . ") from " . $_table . ")-(select min(" . $field . ")
         from " . $_table . "))) + (select min(" . $field . ") from " . $_table . ") " . $_limit;
        //echo $_sql;
        $result = $this->db->query($_sql);
        $data = $result->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }

    /**
     * 获取所有的数据
     * @param string $_table :表名
     * @param string $_where ：sql条件
     * @param string $_limit ：sql limit
     * @return object:
     */
    protected function getAll($_table, $_where = null, $_limit = null)
    {
        $_sql = "select * from " . $_table . " " . $_where . " " . $_limit;
      //  echo $_sql;
        $result = $this->db->query($_sql);
        $data = $result->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }

    /**
     * 获取总记录数
     * @param string $_table :表名
     * @return int  $total:总记录数
     *   */
    protected function getAllTotal($_table, $where = null)
    {
        $_sql = "select * from " . $_table . " " . $where;
        $result = $this->db->query($_sql);
        $total = $result->rowCount();
        return $total;
    }

    /**查询数据*/
    protected function getOne($_table, $_where)
    {
        //设置sql语句
        $_sql = "select * from " . $_table . " " . $_where;
        //echo $_sql;
        //pdo执行sql,返回结果集对象
        $result = $this->db->query($_sql);
        //fetchObject()：从结果集对象中取得数据，
        $data = $result->fetchObject();
        return $data;
    }

    protected function getMult($_table, $_where)
    {
        //设置sql语句
        $_sql = "select * from " . $_table . " " . $_where;
        // echo $_sql;
        //pdo执行sql,返回结果集对象
        $result = $this->db->query($_sql);
        //fetchObject()：从结果集对象中取得数据，
        $data = $result->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }

    /**添加数据*/
    protected function add($_table, $array)
    {
        $_key = null;//空字符串
        $_value = null;//空字符串
        foreach ($array as $key => $value) {
            $_key .= $key . ",";
            if (is_int($value)) {
                $_value .= "" . $value . ",";
            } else {
                $_value .= "'" . $value . "',";
            }
        }
        $_key = rtrim($_key, ",");
        $_value = rtrim($_value, ",");
        // var_dump($_key);
        //  var_dump($_value);
        //return $_key.":::".$_value;
        //insert into user()values()
        $sql = "insert into " . $_table . "(" . $_key . ")values(" . $_value . ")";
        //echo $sql;
        $result = $this->db->exec($sql);
        return $result;
        //echo $sql;
    }

    /**
     * 根据条件删除
     * @param string $_table
     * @param string $_where
     */
    protected function delete($_table, $_where)
    {
        $_sql = "delete from " . $_table . " " . $_where;
        //  echo $_sql;
        $result = $this->db->exec($_sql);
        return $result;
    }

    /**修改数据*/
    protected function update($_table, $array, $_where)
    {
        $_sql = "update " . $_table . " set ";
        foreach ($array as $key => $value) {
            if (is_int($value)) {
                $_sql .= $key . "=" . $value . ",";
            } else {
                $_sql .= $key . "='" . $value . "',";
            }
        }
        $_sql = rtrim($_sql, ",");
        $_sql .= " " . $_where;
        //echo $_sql;
        $result = $this->db->exec($_sql);
        return $result;
    }

    /**获取下一个id*/
    protected function nextId($_table)
    {
        $_sql = "show table status like '" . $_table . "'";
        $result = $this->db->query($_sql);
        $data = $result->fetchObject();
        return $data->Auto_increment;
    }

    /**获取指定字段的数据*/
    protected function getField($_table, $_field)
    {
        $_sql = "select " . $_field . " from " . $_table . "";
        //echo $_sql;
        $result = $this->db->query($_sql);
        $arr = $result->fetchAll(PDO::FETCH_NUM);
        return $arr;
    }

    /**排序*/
    public function setSort($table, $sorts)
    {
        $bool = 0;
        foreach ($sorts as $k => $v) {
            $sql = "update " . $table . " set sort=" . $v . " where id=" . $k;
            // var_dump($sql);
            $result = $this->db->exec($sql);
            $bool += $result;
            // var_dump($result);
        }
        return $bool;
    }

    /**搜索文章*/
    public function search($_table, $where = null, $limit = null)
    {
        $_sql = "select * from " . $_table . " " . $where . " " . $limit;
        // echo $_sql;
        $result = $this->db->query($_sql);
        $data = $result->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }
    public function searchTotal($_table,$where=null){
        $_sql="select * from ".$_table." ".$where;
        // echo $_sql;
        $result=$this->db->query($_sql);
        $total=$result->rowCount();
        return $total;
    }
}

?>