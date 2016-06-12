<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
</head>
<title>主界面</title>
<?php
require_once "common.php";

checkUserValidate();


echo "欢迎".$_GET['name']."<br/>";

getLastTime();
?>
<a href="empList.php">管理用户</a><br/>
<a href="addEmp.php">添加用户</a><br/>
<a href="">删除用户</a><br/>
<a href="">退出系统</a><br/>

</html>