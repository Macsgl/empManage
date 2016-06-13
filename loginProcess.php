<?php
require_once "AdminService.class.php";
$name = $_POST['name'];
$passwd = $_POST['passwd'];
$checkCode=$_POST['checkCode'];

session_start();
if($checkCode!=$_SESSION['myCheckCode']){
    header("Location:login.php?error=2");
    exit();
}

if(empty($_POST['keep'])){
    if(!empty($_COOKIE['name'])){
        setcookie("name",$name,time()-200);
    }
}else{
    setcookie("name",$name,time()+7*24*3600);
}

$adminService=new AdminService();
$b=$adminService->checkAdmin($name,$passwd);
if ($b!="") {
    session_start();
    $_SESSION['loginuser']=$name;
    header("Location:empManage.php?name=$name");
    exit();
} else {
    header("Location:login.php?error=1");
    exit();
}



?>