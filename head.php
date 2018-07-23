<?php
session_start();
$link = mysqli_connect("localhost","root","","db00");
mysqli_query($link,"SET NAMES UTF8");
$ip = $_SERVER["REMOTE_ADDR"];
$time = strtotime("+6hour");
$real_time = date("Y-m-d H:i:s",$time);

if(empty($_SESSION["person"])){
    $_SESSION["person"] = 1 ;
    $sql = "select * from a_7_total";
    $c1 = mysqli_query($link,$sql);
    $c2 = mysqli_fetch_assoc($c1);
    $now_person = $c2["a_7_total_txt"] + $_SESSION["person"];
    $sql = "update a_7_total set a_7_total_txt = '".$now_person."'";
    mysqli_query($link,$sql);
    }
?>