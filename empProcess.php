<?php
require_once "empService.class.php";
$empService = new empService();
if (!empty($_REQUEST['flag'])) {
    $flag = $_REQUEST['flag'];
    if ($flag == "del") {
        $id = $_REQUEST['id'];
        if ($empService->delEmpById($id) == 1) {
            header("Location:ok.php");
            exit();
        } else {
            header("Location:error.php");
            exit();
        }
    }   //删除
    else if ($flag == "update") {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $grade = $_POST['grade'];
        $email = $_POST['email'];
        $salary = $_POST['salary'];
        $res = $empService->updateEmp($id, $name, $grade, $email, $salary);
        if ($res == 1) {
            header("Location:ok.php");
            exit();
        } else {
            header("Location:error.php");
            exit();
        }
    }   //修改
    else if($flag=="addemp"){
        $name=$_POST['name'];
        $age=$_POST['age'];
        $grade=$_POST['grade'];
        $email=$_POST['email'];
        $salary=$_POST['salary'];
        $res=$empService->addEmp($name,$age,$grade,$email,$salary);
        if($res==1){
            header("Location:ok.php");
            exit();
        }else{
            header("Location:error.php");
            exit();
        }
    }
}
?>