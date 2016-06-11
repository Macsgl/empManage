<?php

class sqlHelper
{
    private $conn;
    private $dbname = "employee";
    private $username = "root";
    private $password = "";
    private $host = "localhost";

    public function _connect()
    {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);
        if ($this->conn->connect_error) {
            die("链接失败" . $this->conn->connect_error);
        }
        $this->conn->query("set names utf8");
    }   //链接函数

    public function execute_dql($sql)
    {
        $res = $this->conn->query($sql) or die("查询语句出错" . $this->conn->error);
        return $res;
    }   //数据查询

    public function execute_dml($sql)
    {
        $operate = $this->conn->query($sql) or die("操作语句出错" . $this->conn->error);
        if (!$operate) {
            return 0;
        } else {
            if ($this->conn->affected_rows > 0) {
                return 1;
            } else {
                return 2;    //没有行受到影响
            }
        }
    }   //数据操作

    public function execute_dql2($sql)
    {
        $arr = array();
        $res = $this->conn->query($sql) or die("查询语句出错" . $this->conn->error);
        while ($row = $res->fetch_assoc()) {
            $arr[] = $row;
        }
        $res->free();
        return $arr;
    }   //数据查询并放到数组中

    public function execute_dql_paging($sql1, $sql2, &$paging)
    {
        //$sql1="select * 表名 limit 0,3"
        //$sql2="select count(id) from 表名"
        $arr = array();
        $res = $this->conn->query($sql1) or die("查询语句出错" . $this->conn->error);
        /*var_dump($res);
        exit();*/
        while ($row = $res->fetch_assoc()) {
            $arr[] = $row;
        }
        $res->free();

        $res = $this->conn->query($sql2) or die("查询语句出错" . $this->conn->error);
        if ($row = $res->fetch_row()) {
            $paging->pageCount = ceil($row[0] / $paging->pageSize);
            $paging->rowCount = $row[0];
        }
        $res->free();
        $navigate="";
        $pageWhole=5;
        $start=floor(($paging->pageNow-1)/$pageWhole)*$pageWhole+1;
        if($start<=$paging->pageCount) {
            $index = $start;
            if($start>$pageWhole){
                $navigate= "<a href='empList.php?pageNow=".($start-1)."'><<</a>&nbsp;";
            }

            if($paging->pageNow>1){
                $prePage=$paging->pageNow-1;
                $navigate.= "<a href='empList.php?pageNow=$prePage'>上一页</a>&nbsp;";
            }   //上一页

            for (; $start < $index + $pageWhole; $start++) {
                $navigate.= "<a href='empList.php?pageNow=$start'>[$start]</a>&nbsp;";
            }

            if($paging->pageNow<$paging->pageCount){
                $nextPage=$paging->pageNow+1;
                $navigate.= "<a href='empList.php?pageNow=$nextPage'>下一页</a>&nbsp;";
            }   //下一页


                $navigate.= "<a href='empList.php?pageNow=$start'>>></a>&nbsp;";
           
        }



        $navigate.= "当前在第{$paging->pageNow}页/共{$paging->pageCount}页";

        $paging->res_array = $arr;
        $paging->navigate=$navigate;

    }   //处理分页

    public function close_connect()
    {
        if (!empty($this->conn)) {
            $this->conn->close();
        }
    }   //关闭链接
}

?>