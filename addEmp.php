<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
</head>
<body>
<form action="empProcess.php" method="post">
    <table>
        <tr><td>姓名</td><td><input type="text" name="name"/></td></tr>
        <tr><td>年龄</td><td><input type="text" name="age"/></td></tr>
        <tr><td>级别</td><td><input type="text" name="grade"/></td></tr>
        <tr><td>邮箱</td><td><input type="text" name="email"/></td></tr>
        <tr><td>薪水</td><td><input type="text" name="salary"/></td></tr>
        <input type="hidden" name="flag" value="addemp"/>
        <tr>
            <td><input type="submit" value="添加用户"/></td>
        </tr>
    </table>
</form>
</body>
</html>