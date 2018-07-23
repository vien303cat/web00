<?php
if(!empty($_POST["word"])){
	$tt = date("YmdHis");
	$txt = $_POST["word"];
	$url = $_POST["url"];
	$sql = "insert into a_12_admin value(NULL,'$txt','$url','0') ;";
	mysqli_query($link,$sql);
	echo "<script> document.location.href='admin.php?do=admin&redo=menu'; </script>" ;
}
if(!empty($_POST["title"][0])){
	$sql = "update a_12_admin set a_12_admin_display = '0'";
	mysqli_query($link,$sql);
	echo $sql ;	for($i=0;$i<count($_POST["my_no"]);$i++){

		if(!empty($_POST["title"][$i])){
		$sql = "update a_12_admin set a_12_admin_name = '".$_POST["title"][$i]."' , a_12_admin_url='".$_POST["urll"][$i]."' where a_12_admin_seq = '".$_POST["my_no"][$i]."'  ;";
		mysqli_query($link,$sql);

		}
		if(!empty($_POST["myupdate"][$i])){
			$sql = "update a_12_admin set a_12_admin_display = '1' where a_12_admin_seq ='".$_POST['myupdate'][$i]."' ;";
			mysqli_query($link,$sql);
			echo "<script> document.location.href='admin.php?do=admin&redo=menu'; </script>" ;
		}
		
		if(!empty($_POST["mydelete"][$i])){
			$sql = "delete from a_12_admin where a_12_admin_seq ='".$_POST["mydelete"][$i]."'";
			mysqli_query($link,$sql);
			echo "<script> document.location.href='admin.php?do=admin&redo=menu'; </script>" ;
		}

	}
	echo "<script> document.location.href='admin.php?do=admin&redo=menu'; </script>" ;
}
?>


<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
                                    <p class="t cent botli">選單管理</p>
        <form method="post" >
    <table width="100%">
    	<tr class="yel">
			<td width="30%">主選單名稱</td>
			<td width="30%">選單連結網址</td>
			<td width="10%">次選單數</td>
			<td width="5%">顯示</td>
			<td width="5%">刪除</td>
			<td width="20%"></td>
					</tr>
					<?php 
					$sql = "select * from a_12_admin";
					$c1 = mysqli_query($link,$sql);
					$c2 = mysqli_fetch_assoc($c1);
					do{
					?>
			<tr class="yel">
			<td width="35%" align="left"><input type="text" name="title[]" style="width:80%; " value="<?=$c2['a_12_admin_name']?>" /></td>
			<input type="hidden" name="my_no[]" value="<?=$c2['a_12_admin_seq']?>" />
			<td width="35%" align="left"><input type="text" name="urll[]" style="width:80%; " value="<?=$c2['a_12_admin_url']?>" /></td>
			<td width="10%">
			<?php
					$sqq = "select * from a_12_admin2 where a_12_admin2_admin ='".$c2['a_12_admin_seq']."'";
					$cc = mysqli_query($link,$sqq);
					$row = mysqli_num_rows($cc);
					echo $row;
			?>
			</td>
			<td width="5%"><input type="checkbox" name="myupdate[]" value="<?=$c2['a_12_admin_seq']?>" <?php if($c2['a_12_admin_display']==1){ echo "checked"; } ?> ></td>
			<td width="5%"><input type="checkbox" name="mydelete[]" value="<?=$c2['a_12_admin_seq']?>"></td>
			<td width="20%"><input type="button" name="rex" onclick="document.location.href='admin.php?do=admin&redo=menu2&list=<?=$c2["a_12_admin_seq"]?>'" value="編輯次選單"></td>
					</tr>
					<?php }while($c2 = mysqli_fetch_assoc($c1)) ?>
    </table>
           <table style="margin-top:40px; width:70%;">
    <tr>
      <td width="200px"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;admin_1_12_add.php&#39;)" value="新增主選單"></td><td class="cent">
		  <input type="submit" value="修改確定"><input type="reset" value="重置"></td>
     </tr>
    </table>    

        </form>
</div>