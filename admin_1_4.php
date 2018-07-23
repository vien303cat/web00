<?php
if(!empty($_POST["word"])){
	$tt = date("YmdHis");
	$txt = $_POST["word"];
	$sql = "insert into a_4_marquee value(NULL,'$txt','0') ;";
	mysqli_query($link,$sql);
	echo "<script> document.location.href='admin.php?do=admin&redo=ad'; </script>" ;
}
if(!empty($_POST["title"][0])){
	$sql = "update a_4_marquee set a_4_marquee_display = '0'";
    mysqli_query($link,$sql);
	for($i=0;$i<count($_POST["my_no"]);$i++){

		$sql = "update a_4_marquee set a_4_marquee_txt = '".$_POST["title"][$i]."' where a_4_marquee_sql = '".$_POST["my_no"][$i]."' ;";
		mysqli_query($link,$sql);
		
		if(!empty($_POST["myupdate"][$i])){
			$sql = "update a_4_marquee set a_4_marquee_display = '1' where a_4_marquee_seq ='".$_POST['myupdate'][$i]."' ;";
			mysqli_query($link,$sql);
			echo "<script> document.location.href='admin.php?do=admin&redo=ad'; </script>" ;
		}
		
		if(!empty($_POST["mydelete"][$i])){
			$sql = "delete from a_4_marquee where a_4_marquee_seq ='".$_POST["mydelete"][$i]."'";
			mysqli_query($link,$sql);
			echo "<script> document.location.href='admin.php?do=admin&redo=ad'; </script>" ;
		}

	}
	echo "<script> document.location.href='admin.php?do=admin&redo=ad'; </script>" ;
}
?>


<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
                                    <p class="t cent botli">動態文字廣告管理</p>
        <form method="post" >
    <table width="100%">
    	<tr class="yel">
			<td width="80%">動態文字廣告</td>
			<td width="10%">顯示</td>
			<td width="10%">刪除</td>
					</tr>
					<?php 
					$sql = "select * from a_4_marquee";
					$c1 = mysqli_query($link,$sql);
					$c2 = mysqli_fetch_assoc($c1);
					do{
					?>
			<tr class="yel">
			<td width="80%" align="left"><input type="text" name="title[]" style="width:80%; " value="<?=$c2['a_4_marquee_txt']?>" /></td>
			<input type="hidden" name="my_no[]" value="<?=$c2['a_4_marquee_seq']?>" />
			<td width="7%"><input type="checkbox" name="myupdate[]" value="<?=$c2['a_4_marquee_seq']?>" <?php if($c2['a_4_marquee_display']==1){ echo "checked"; } ?> ></td>
			<td width="7%"><input type="checkbox" name="mydelete[]" value="<?=$c2['a_4_marquee_seq']?>"></td>
					</tr>
					<?php }while($c2 = mysqli_fetch_assoc($c1)) ?>
    </table>
           <table style="margin-top:40px; width:70%;">
    <tr>
      <td width="200px"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;admin_1_4_add.php&#39;)" value="新增動態文字廣告"></td><td class="cent">
		  <input type="submit" value="修改確定"><input type="reset" value="重置"></td>
     </tr>
    </table>    

        </form>
</div>