<?php
$link = mysqli_connect("localhost","root","","db00");
mysqli_query($link,'SET NAMES UTF8');

$sql = "select * from a_9_news where a_9_news_display = '1'";
$c1 = mysqli_query($link,$sql);
$c2 = mysqli_fetch_assoc($c1);
$row = mysqli_num_rows($c1);

$now_page = 1;//第幾頁
$page_add = 5;//每一頁有幾筆資料

  if(!empty($_GET["page"])){ $now_page = $_GET["page"]; }else{$_GET["page"] = 1;} 

$open_page = ($now_page-1) * $page_add ; //計算起始資料位置

$sql = "select * from a_9_news where a_9_news_display = '1' limit $open_page,$page_add" ;// limit a,b 從第a筆之後(不含它) 開始抓數量b筆資料
$c1 = mysqli_query($link,$sql);
$c2 = mysqli_fetch_assoc($c1);

$all_page = ceil($row/$page_add) ;  //全部有幾頁


if($_GET["page"] == 1){
	$front_page = 1 ;
	$next_page = $now_page + 1;
}else if ($_GET["page"] == $all_page){ 
	$front_page = $now_page - 1;
	$next_page = $all_page; 
}else{ 
	$front_page = $now_page - 1;
	$next_page = $now_page + 1;
}
$data_list = $open_page +1 ;
do{
	echo "<div>".$data_list.".".mb_substr($c2["a_9_news_txt"],0,10,"utf-8")."...<div class = 'all' style='display:none;'>".$c2["a_9_news_txt"]."</div></div>";  //抓幾個字  mb_substr(字元,從第幾個字開始,顯示幾個字,"字元編碼")
	$data_list = $data_list +1 ;
}while($c2 = mysqli_fetch_assoc($c1));




?>
