<?php
require_once "sqlHelper.class.php";
require_once "emp.class.php";
class empService
{
    public function getPageCount($pageSize){  //获取共有多少页
        $sql="select count(id) from emp";
        $sqlHelper=new sqlHelper();
        $sqlHelper->_connect();
        $res=$sqlHelper->execute_dql($sql);
        if($row=$res->fetch_row()){
            $pageCount=ceil($row[0]/$pageSize);
        }
        $res->free();
        $sqlHelper->close_connect();
        return $pageCount;
    }

    public function getempList($pageNow,$pageSize){  //获取数据
        $sql="select * from emp limit ".($pageNow-1)*$pageSize.",$pageSize";
        $sqlHelper=new sqlHelper();
        $sqlHelper->_connect();
        $res=$sqlHelper->execute_dql2($sql);
        $sqlHelper->close_connect();
        return $res;
    }

    public function getPaging($paging){
        $sql1="select * from emp limit ".($paging->pageNow-1)*$paging->pageSize.",".$paging->pageSize;
        $sql2="select count(id) from emp";
        $sqlHelper=new sqlHelper();
        $sqlHelper->_connect();
        $sqlHelper->execute_dql_paging($sql1,$sql2,$paging);
        $sqlHelper->close_connect();
    }   //分页函数

    public function delEmpById($id){
        $sql="delete from emp where id=$id";
        $sqlHelper=new sqlHelper();
        $sqlHelper->_connect();
        $no=$sqlHelper->execute_dml($sql);
        $sqlHelper->close_connect();
        return $no;
    }   //根据ID删除用户

    public function updateEmp($id,$name,$grade,$email,$salary){
        $sql="update emp set name='$name',grade=$grade,email='$email',salary=$salary where id=$id";
        $sqlHelper=new sqlHelper();
        $sqlHelper->_connect();
        $res=$sqlHelper->execute_dml($sql);
        $sqlHelper->close_connect();
        return $res;
    }   //修改信息

    public function getEmpById($id){
        $sql="select * from emp where id=$id";
        $sqlHelper=new sqlHelper();
        $sqlHelper->_connect();
        $arr=$sqlHelper->execute_dql2($sql);
        $sqlHelper->close_connect();
        $emp=new emp();
        $emp->setId($arr[0]['id']);
        $emp->setName($arr[0]['name']);
        $emp->setGrade($arr[0]['grade']);
        $emp->setEmail($arr[0]['email']);
        $emp->setSalary($arr[0]['salary']);
        return $emp;
    }   //获取信息

    public function addEmp($name,$age,$grade,$email,$salary){
        $sql="insert into emp (name,age,grade,email,salary) values ('$name',$age,$grade,'$email',$salary)";
        $sqlHelper=new sqlHelper();
        $sqlHelper->_connect();
        $res=$sqlHelper->execute_dml($sql);
        $sqlHelper->close_connect();
        return $res;
    }   //增加雇员信息
}
?>