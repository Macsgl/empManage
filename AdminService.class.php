<?php
require_once "sqlHelper.class.php";
class AdminService
{
    public function checkAdmin($name,$password){
        $sql="select password from admin WHERE name=$name";
        $sqlHelper=new sqlHelper();
        $sqlHelper->_connect();
        $res=$sqlHelper->execute_dql($sql);
        if($row=$res->fetch_assoc()){
            if($row['password']==md5($password))
                return true;
        }
        $res->free();
        $sqlHelper->close_connect();
        return false;
    }
}