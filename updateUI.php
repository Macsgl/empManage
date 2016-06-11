<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <title>修改雇员信息</title>
</head>
<?php
    require_once "empService.class.php";
    $id=$_GET['id'];
    $empService=new empService();
    $emp=$empService->getEmpById($id);
?>
<body>
<form action="empProcess.php" method="post">
    <table>
        <tr><td>ID号</td><td><input readonly="readonly" type="text" name="id" value="<?php echo $emp->getId(); ?>"/></td></tr>
        <tr><td>姓名</td><td><input type="text" name="name" value="<?php echo $emp->getName(); ?>"/></td></tr>
        <tr><td>级别</td><td><input type="text" name="grade" value="<?php echo $emp->getGrade(); ?>"/></td></tr>
        <tr><td>邮箱</td><td><input type="text" name="email" value="<?php echo $emp->getEmail(); ?>"/></td></tr>
        <tr><td>薪水</td><td><input type="text" name="salary" value="<?php echo $emp->getSalary() ?>"/></td></tr>
        <input type="hidden" name="flag" value="update" />
        <tr>
            <td><input type="submit" value="修改用户" /></td>
        </tr>
    </table>
</form>
</body>
</html>