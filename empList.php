<!doctype html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <title>雇员信息列表</title>
    <script type="text/javascript">
        function confirmDele(val){
            return window.confirm("是否要删除id="+val+"的用户");
        }
    </script>
</head>
<body>
<?php
require_once "empService.class.php";
require_once "paging.class.php";
$empService = new empService();
$paging = new paging();

$paging->pageSize = 3;  //每页显示的行数
$paging->pageNow = 1;  //显示第几页

if (!empty($_GET['pageNow'])) {
    $paging->pageNow = $_GET['pageNow'];
}

$empService->getPaging($paging);

echo "<table border='1px' width='700px'>";
echo "<tr><th>ID</th><th>Name</th><th>Age</th><th>Email</th><th>Actions</th></tr>";

for ($i = 0; $i < count($paging->res_array); $i++) {
    $row = $paging->res_array[$i];
    echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['age']}</td><td>{$row['email']}</td>".
        "<td><a href='updateUI.php?id={$row['id']}'><img src='image/edit.png'/>edit</a>&nbsp;".
        "<a onclick='return confirmDele({$row['id']})' href='empProcess.php?flag=del&id={$row['id']}'><img src='image/trash.png'/>delete</a></td></tr>";
}   //显示数据
echo "</table>";

echo $paging->navigate;

echo "<br/><br/>";
?>

<form action="empList.php">
    跳转到：<input type="text" name="pageNow"/>
    <input type="submit" value="GO"/>
</form>

</body>
</html>