<?php
    require_once "common.php";
?>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
</head>
<title>登录界面</title>
<h1>雇员管理系统</h1>
<form action="loginProcess.php" method="post">
    <table>
        <tr><td>用户名：</td><td><input type="text" name="name" value="<?php echo getCookieVal("name")?>"/></td></tr>
        <tr><td>密 &nbsp;码</td><td><input type="password" name="passwd" /></td></tr>
        <tr><td colspan="2">7天内直接登录<input type="checkbox" name="keep" value="yes" /></td> </tr>
        <tr>
            <td><input type="submit" value="用户登录" /></td>
        </tr>
    </table>
</form>
<?php
    if(!empty($_GET['error']))
    {
        $error=$_GET['error'];
        if($error==1)
        {
            echo "用户名或密码错误";
        }
    }
?>
</html>