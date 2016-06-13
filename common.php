<?php

function getCookieVal($key)
{
    if (empty($_COOKIE['$key'])) {
        return "";
    } else {
        return $_COOKIE[$key];
    }
}

function getLastTime(){
    if(!empty($_COOKIE['lastTime'])){
        echo "你上次登录的时间是：".$_COOKIE['lastTime']."<br/>";
        setcookie("lastTime",date("Y-m-d H:i:s"),time()+24*3600*30);
    }else{
        echo "你是第一次登录<br/>";
        setcookie("lastTime",date("Y-m-d H:i:s"),time()+24*3600*30);
    }
}

function checkUserValidate(){
    session_start();
    if(empty($_SESSION['loginuser'])){
        header("Location:login.php?error=1");
       
    }
}

?>