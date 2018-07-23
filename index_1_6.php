<?php
$link = mysqli_connect("localhost","root","","db00");
mysqli_query($link,'SET NAMES UTF8');

$sql = "select * from a_6_pic";
$c1 = mysqli_query($link,$sql);
$row = mysqli_num_rows($c1);

$now_page = 1;//第幾頁
$page_add = 3;//每一頁有幾筆資料

if(!empty($_GET["page"])){ $now_page = $_GET["page"]; } //利用GET來改變換頁的連結

$open_page = ($now_page-1) * $page_add ; //計算起始資料位置

$sql = "select * from a_6_pic limit $open_page,$page_add" ;// limit a,b 從第a筆之後(不含它) 開始抓數量b筆資料
$c1 = mysqli_query($link,$sql);
$c2 = mysqli_fetch_assoc($c1);

$all_page = ceil($row/$page_add) ;  //全部有幾頁


	$front_page = $now_page - 1;
	$next_page = $now_page + 1;

?>

<table align="center" style="width:160;border="0";cellspacing="0";cellpadding="0";">
<tr><td>
<?php
if($now_page > 1){
echo "<a href='?page=".$front_page."'><img src='img/E01.jpg' /></a>" ;  //上一頁
}
?>
</tr></td>
</table> 
<?php do{ ?>

<table align="center" style="width:160;border="0";cellspacing="0";cellpadding="0";">
    <tr>
      <td height="105" align="center" valign="middle" bgcolor="FFCC00"><img height="103" width="150" src='img/<?=$c2["a_6_pic_pic"]?>' /></td>
     </tr>
    </table>   
<?php }while($c2 = mysqli_fetch_assoc($c1)); ?>

<table align="center" style="width:160;border="0";cellspacing="0";cellpadding="0";">
<tr><td>
<?php
if($now_page < $all_page){
echo "<a href='?page=".$next_page."'><img src='img/E02.jpg' /></a>" ;   //下一頁
}
?>
</tr></td>
</table> 