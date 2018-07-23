<?php
$link = mysqli_connect("localhost","root","","db00");
mysqli_query($link,'SET NAMES UTF8');

$sql = "select * from a_9_news where a_9_news_display = '1'";
$c1 = mysqli_query($link,$sql);
$c2 = mysqli_fetch_assoc($c1);
$row = mysqli_num_rows($c1);

$now_page = 1;//第幾頁
$page_add = 5;//每一頁有幾筆資料

 // if(!empty($_GET["page"])){ $now_page = $_GET["page"]; } 

$open_page = ($now_page-1) * $page_add ; //計算起始資料位置

$sql = "select * from a_9_news where a_9_news_display = '1' limit $open_page,$page_add" ;// limit a,b 從第a筆之後(不含它) 開始抓數量b筆資料
$c1 = mysqli_query($link,$sql);
$c2 = mysqli_fetch_assoc($c1);

$all_page = ceil($row/$page_add) ;  //全部有幾頁

/*
if($_GET["page"] == 1){
	$front_page = 1 ;
	$next_page = $now_page + 1;
}else if ($_GET["page"] == $all_page){ 
	$front_page = $now_page - 1;
	$next_page = $all_page; 
}else{ 
	$front_page = $now_page - 1;
	$next_page = $now_page + 1;
}*/

do{
	echo "<li>".mb_substr($c2["a_9_news_txt"],0,10,"utf-8")."...<div class = 'all' style='display:none;'>".$c2["a_9_news_txt"]."</div></li>";  //抓幾個字  mb_substr(字元,從第幾個字開始,顯示幾個字,"字元編碼")

}while($c2 = mysqli_fetch_assoc($c1));

/*
echo "<a href='?page=".$front_page."'>＜</a>" ;  //上一頁

for($i=1;$i<=$all_page;$i++){
	if($now_page == $i){
		echo "<span style='font-size:80px;color:#f00;'>".$i."</span>"  ;
	}else{ echo "<span style='font-size:44px'><a href='?page=".$i."'>".$i."</a></span>"  ; }
	
}

echo "<a href='?page=".$next_page."'>＞</a>" ;   //下一頁
*/
?>
