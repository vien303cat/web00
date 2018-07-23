<?php
$link = mysqli_connect("localhost","root","","db00");
mysqli_query($link,'SET NAMES UTF8');

$sql = "select * from a_4_marquee";
$c1 = mysqli_query($link,$sql);
$row = mysqli_num_rows($c1);

$now_page = 1;//第幾頁
$page_add = 2;//每一頁有幾筆資料

if(!empty($_GET["page"])){ $now_page = $_GET["page"]; } //利用GET來改變換頁的連結

$open_page = ($now_page-1) * $page_add ; //計算起始資料位置

$sql = "select * from a_4_marquee limit $open_page,$page_add" ;// limit a,b 從第a筆之後(不含它) 開始抓數量b筆資料
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




echo $row."<br>";
do{
	echo $c2["a_4_marquee_txt"]."<br>";
}while($c2 = mysqli_fetch_assoc($c1));

echo "全部有".$row."筆資料<br>";
echo "這是第".$now_page."頁<br>";
echo "全部有".$all_page."頁<br>";

echo "<a href='?page=".$front_page."'>＜</a>" ;  //上一頁

for($i=1;$i<=$all_page;$i++){
	if($now_page == $i){
		echo "<span style='font-size:80px;color:#f00;'>".$i."</span>"  ;
	}else{ echo "<span style='font-size:44px'><a href='?page=".$i."'>".$i."</a></span>"  ; }
	
}

echo "<a href='?page=".$next_page."'>＞</a>" ;   //下一頁

?>
