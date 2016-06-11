<?php
require_once "AdminService.class.php";
$name = $_POST['name'];
$passwd = $_POST['passwd'];
$adminService=new AdminService();
$b=$adminService->checkAdmin($name,$passwd);
if ($b!="") {
    header("Location:empManage.php");
    exit();
} else {
    header("Location:login.php?error=1");
    exit();
}
?>