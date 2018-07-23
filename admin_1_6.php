
<?php
if(!empty($_FILES["pic"]["tmp_name"])){
	$tt = date("YmdHis");
	$fd = strchr($_FILES["pic"]["name"],"."); //抓副檔名
	$sql = "insert into a_6_pic value(NULL,'".$tt.$fd."','0') ;";
	mysqli_query($link,$sql);
	copy($_FILES["pic"]["tmp_name"],"img/".$tt.$fd);
	echo "<script> document.location.href='admin.php?do=admin&redo=image'; </script>" ;
}

if(!empty($_POST["my_no"][0])){
	
	for($i=0;$i<count($_POST["my_no"]);$i++){
			$sql = " update a_6_pic set a_6_pic_display = '0' where a_6_pic_seq ='".$_POST['my_no'][$i]."';" ;
			mysqli_query($link,$sql);
	}
	for($i=0;$i<count($_POST["my_no"]);$i++){

		if(!empty($_POST["myupdate"][$i])){
			$sql = "update a_6_pic set a_6_pic_display = '1' where a_6_pic_seq ='".$_POST['myupdate'][$i]."' ;";
			mysqli_query($link,$sql);
			echo "<script> document.location.href='admin.php?do=admin&redo=image'; </script>" ;
			}


		if(!empty($_POST["mydelete"][$i])){
			$sql = "select * from a_6_pic where a_6_pic_seq = '".$_POST["mydelete"][$i]."'";
			$c1 = mysqli_query($link,$sql);
			$c2 = mysqli_fetch_assoc($c1);
			unlink("img/".$c2['a_6_pic_pic']);
			$sql = "delete from a_6_pic where a_6_pic_seq ='".$_POST["mydelete"][$i]."'";
			mysqli_query($link,$sql);
			echo "<script> document.location.href='admin.php?do=admin&redo=image'; </script>" ;
		}

	}


}

	if(!empty($_POST["pic_no"])){
	$tt = date("YmdHis");
	$fd = strchr($_FILES["pic_update"]["name"],"."); //抓副檔名
	copy($_FILES["pic_update"]["tmp_name"],"img/".$tt.$fd);
	$sql = "update a_6_pic set a_6_pic_pic = '".$tt.$fd."' where a_6_pic_seq = '".$_POST['pic_no']."'";
	mysqli_query($link,$sql);
	//echo "<script> document.location.href='admin.php?do=admin&redo=image'; </script>" ;
}
?>

<style>
a{
	text-decoration: none;
}
</style>

<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
                                    <p class="t cent botli">校園映像資料管理</p>
        <form method="post" >
    <table width="100%">
    	<tr class="yel">
			<td width="60%">校園映像資料圖片</td>
			<td width="10%">顯示</td>
			<td width="10%">刪除</td>
			<td width="20%"></td>
					</tr>
					<?php 
					$sql = "select * from a_6_pic";
					$c1 = mysqli_query($link,$sql);
					$c2 = mysqli_fetch_assoc($c1);
					$all_data = mysqli_num_rows($c1);

					$now_page = 1 ; //開始頁數
					$add_page = 3 ; //每頁撈取筆數
					if(!empty($_GET["page"])){$now_page = $_GET["page"];}else{$_GET["page"] = 1;}
					$open_page = ($now_page-1) * $add_page ;
					$all_page = ceil($all_data/$add_page);
					
					if($_GET["page"] == 1){
						$pp = $now_page  ;
						$np = $now_page +1 ;
					}else if($_GET["page"] == $all_page){
						$pp = $now_page -1 ;
						$np = $now_page  ;
					}else{
						$pp = $now_page -1 ;
						$np = $now_page +1 ;
					}
	

					$sql = "select * from a_6_pic limit $open_page,$add_page";// limit a,b 從第a筆之後(不含它) 開始抓數量b筆資料
					$c1 = mysqli_query($link,$sql);
					$c2 = mysqli_fetch_assoc($c1);
					do{
					?>
			<tr class="yel">
			<td width="45%"><embed loop="true" src="img/<?=$c2['a_6_pic_pic']?>" width="150" height="90" ></embed></td>
			<input type="hidden" name="my_no[]" value="<?=$c2['a_6_pic_seq']?>" />
			<td width="7%"><input type="checkbox" name="myupdate[]" value="<?=$c2['a_6_pic_seq']?>" <?php if($c2['a_6_pic_display']==1){ echo "checked"; } ?>></td>
			<td width="7%"><input type="checkbox" name="mydelete[]" value="<?=$c2['a_6_pic_seq']?>"></td>
			<td width="7%"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;admin_1_5_pic.php?picc=<?=$c2["a_6_pic_seq"]?>&#39;)" value="更換圖片"/></td>
					</tr>
					<?php }while($c2 = mysqli_fetch_assoc($c1)) ?>
					
    </table>
	<table width="100%" border="0" cellspacing="0" cellpadding="2">
  	<tr>
    <td align="center" valign="middle">
	<?php 

	echo "<span style='font-size:25px;'><a href='admin.php?do=admin&redo=image&page=".$pp."'> < </a></span>";
	for($i=1;$i<=$all_page;$i++){
		if($now_page == $i){
			echo "<span style='font-size:50px;color:#F00;'>".$i."</span>" ;
		}else{ echo "<span style='font-size:25px;'><a href='admin.php?do=admin&redo=image&page=".$i."'>".$i."</a></span>" ;}
	}
	echo "<span style='font-size:25px;'><a href='admin.php?do=admin&redo=image&page=".$np."'> > </a></span>";
	?>
	</td>
  	</tr>
	</table>
           <table style="margin-top:40px; width:70%;">
    <tr>
      <td width="200px"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;admin_1_5_add.php&#39;)" value="新增校園映像圖片"></td><td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
     </tr>
    </table>    

        </form>
</div>