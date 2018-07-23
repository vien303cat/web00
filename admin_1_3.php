<?php
if(!empty($_POST["word"])){
	$tt = date("YmdHis");
	$pho = $tt.".jpg";
	$sql = "insert into a_3_banner value(NULL,'$pho','".$_POST['word']."','0') ;";
	mysqli_query($link,$sql);
	copy($_FILES["pic"]["tmp_name"],"img/".$tt.".jpg");
	echo "<script> document.location.href='admin.php?do=admin&redo=banner'; </script>" ;
}
if(!empty($_POST["title"][0])){
	
	for($i=0;$i<count($_POST["my_no"]);$i++){
		$sql = " update a_3_banner set a_3_banner_title ='".$_POST['title'][$i]."', a_3_banner_display = '0' where a_3_banner_seq ='".$_POST['my_no'][$i]."';" ;
		mysqli_query($link,$sql);
		
		if(!empty($_POST["mydelete"][$i])){
			$sql = "select * from a_3_banner where a_3_banner_seq = '".$_POST["mydelete"][$i]."'";
			$c1 = mysqli_query($link,$sql);
			$c2 = mysqli_fetch_assoc($c1);
			unlink("img/".$c2['a_3_banner_pic']);
			$sql = "delete from a_3_banner where a_3_banner_seq ='".$_POST["mydelete"][$i]."'";
			mysqli_query($link,$sql);
			echo "<script> document.location.href='admin.php?do=admin&redo=banner'; </script>" ;
		}

	}
	if(!empty($_POST["myupdate"])){
	$sql = "update a_3_banner set a_3_banner_display = '1' where a_3_banner_seq ='".$_POST['myupdate']."' ;";
	mysqli_query($link,$sql);
	echo "<script> document.location.href='admin.php?do=admin&redo=banner'; </script>" ;
	}

}
	if(!empty($_POST["pic_no"])){
	echo "<script> alert('fuck') </script>" ;
	copy($_FILES["pic_update"]["tmp_name"],"img/".$_POST["pic_name"]);
	echo "<script> document.location.href='admin.php?do=admin&redo=banner'; </script>" ;
}
?>


<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
                                    <p class="t cent botli">網站標題管理</p>
        <form method="post" >
    <table width="100%">
    	<tr class="yel">
			<td width="45%">網站標題</td>
			<td width="23%">替代文字</td>
			<td width="7%">顯示</td>
			<td width="7%">刪除</td>
			<td width="7%"></td>
					</tr>
					<?php 
					$sql = "select * from a_3_banner";
					$c1 = mysqli_query($link,$sql);
					$c2 = mysqli_fetch_assoc($c1);
					do{
					?>
			<tr class="yel">
			<td width="45%"><img src="img/<?=$c2['a_3_banner_pic']?>" width="300" height="30" ></td>
			<td width="23%"><input type="text" name="title[]" value="<?=$c2['a_3_banner_title']?>" /></td>
			<input type="hidden" name="my_no[]" value="<?=$c2['a_3_banner_seq']?>" />
			<td width="7%"><input type="radio" name="myupdate" value="<?=$c2['a_3_banner_seq']?>" <?php if($c2["a_3_banner_display"]==1){ echo "checked"; }?> ></td>
			<td width="7%"><input type="checkbox" name="mydelete[]" value="<?=$c2['a_3_banner_seq']?>"></td>
			<td width="7%"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;admin_1_3_pic.php?picc=<?=$c2["a_3_banner_seq"]?>&#39;)" value="更新圖片"/></td>
					</tr>
					<?php }while($c2 = mysqli_fetch_assoc($c1)) ?>
    </table>
           <table style="margin-top:40px; width:70%;">
    <tr>
      <td width="200px"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;admin_1_3_add.php&#39;)" value="新增網站標題圖片"></td><td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
     </tr>
    </table>    

        </form>
</div>