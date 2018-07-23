<?php
if(!empty($_FILES["pic"]["tmp_name"])){
	$tt = date("YmdHis");
	$fd = strchr($_FILES["pic"]["name"],"."); //抓副檔名
	$sql = "insert into a_5_mvpic value(NULL,'".$tt.$fd."','0') ;";
	mysqli_query($link,$sql);
	copy($_FILES["pic"]["tmp_name"],"img/".$tt.$fd);
	echo "<script> document.location.href='admin.php?do=admin&redo=mvim'; </script>" ;
}

if(!empty($_POST["my_no"][0])){
	
	for($i=0;$i<count($_POST["my_no"]);$i++){
		$sql = " update a_5_mvpic set a_5_mvpic_display = '0' where a_5_mvpic_seq ='".$_POST['my_no'][$i]."';" ;
		mysqli_query($link,$sql);


		if(!empty($_POST["myupdate"][$i])){
			$sql = "update a_5_mvpic set a_5_mvpic_display = '1' where a_5_mvpic_seq ='".$_POST['myupdate'][$i]."' ;";
			mysqli_query($link,$sql);
			echo "<script> document.location.href='admin.php?do=admin&redo=mvim'; </script>" ;
			}


		if(!empty($_POST["mydelete"][$i])){
			$sql = "select * from a_5_mvpic where a_5_mvpic_seq = '".$_POST["mydelete"][$i]."'";
			$c1 = mysqli_query($link,$sql);
			$c2 = mysqli_fetch_assoc($c1);
			unlink("img/".$c2['a_5_mvpic_pic']);
			$sql = "delete from a_5_mvpic where a_5_mvpic_seq ='".$_POST["mydelete"][$i]."'";
			mysqli_query($link,$sql);
			echo "<script> document.location.href='admin.php?do=admin&redo=mvim'; </script>" ;
		}

	}


}

	if(!empty($_POST["pic_no"])){
	$tt = date("YmdHis");
	$fd = strchr($_FILES["pic_update"]["name"],"."); //抓副檔名
	copy($_FILES["pic_update"]["tmp_name"],"img/".$tt.$fd);
	$sql = "update a_5_mvpic set a_5_mvpic_pic = '".$tt.$fd."' where a_5_mvpic_seq = '".$_POST['pic_no']."'";
	mysqli_query($link,$sql);
	//echo "<script> document.location.href='admin.php?do=admin&redo=mvim'; </script>" ;
}
?>


<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
                                    <p class="t cent botli">動畫圖片管理</p>
        <form method="post" >
    <table width="100%">
    	<tr class="yel">
			<td width="60%">動畫圖片</td>
			<td width="10%">顯示</td>
			<td width="10%">刪除</td>
			<td width="20%"></td>
					</tr>
					<?php 
					$sql = "select * from a_5_mvpic";
					$c1 = mysqli_query($link,$sql);
					$c2 = mysqli_fetch_assoc($c1);
					do{
					?>
			<tr class="yel">
			<td width="45%"><embed loop="true" src="img/<?=$c2['a_5_mvpic_pic']?>" width="150" height="90" ></embed></td>
			<input type="hidden" name="my_no[]" value="<?=$c2['a_5_mvpic_seq']?>" />
			<td width="7%"><input type="checkbox" name="myupdate[]" value="<?=$c2['a_5_mvpic_seq']?>" <?php if($c2['a_5_mvpic_display']==1){ echo "checked"; } ?>></td>
			<td width="7%"><input type="checkbox" name="mydelete[]" value="<?=$c2['a_5_mvpic_seq']?>"></td>
			<td width="7%"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;admin_1_5_pic.php?picc=<?=$c2["a_5_mvpic_seq"]?>&#39;)" value="更換動畫"/></td>
					</tr>
					<?php }while($c2 = mysqli_fetch_assoc($c1)) ?>
    </table>
           <table style="margin-top:40px; width:70%;">
    <tr>
      <td width="200px"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;admin_1_5_add.php&#39;)" value="新增動畫圖片"></td><td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
     </tr>
    </table>    

        </form>
</div>