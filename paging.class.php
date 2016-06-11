<?php

class paging
{
    public $pageSize=5; //每页显示的行数
    public $res_array;
    public $rowCount;   //共有几行数据
    public $pageNow;    //当前显示第几页
    public $pageCount;  //总页数
    public $navigate;   //分页导航
    public $gotoURL;    //跳转页面
}
?>