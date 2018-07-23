<?php
$now_menu = $_GET["list"];
if(!empty($_POST["word"])){
	$tt = date("YmdHis");
	$txt = $_POST["word"];
	$url = $_POST["url"];
	$sql = "insert into a_12_admin2 value(NULL,'$txt','$url','$now_menu') ;";
	mysqli_query($link,$sql);
	echo "<script> document.location.href='admin.php?do=admin&redo=menu2&list=$now_menu'; </script>" ;
}
if(!empty($_POST["title"][0])){
	$sql = "update a_12_admin2 set a_12_admin2_display = '0'";
	mysqli_query($link,$sql);
	echo $sql ;	for($i=0;$i<count($_POST["my_no"]);$i++){

		if(!empty($_POST["title"][$i])){
		$sql = "update a_12_admin2 set a_12_admin2_name = '".$_POST["title"][$i]."' , a_12_admin2_url='".$_POST["urll"][$i]."' where a_12_admin2_seq = '".$_POST["my_no"][$i]."'  ;";
		mysqli_query($link,$sql);

		}
		if(!empty($_POST["myupdate"][$i])){
			$sql = "update a_12_admin2 set a_12_admin2_display = '1' where a_12_admin2_seq ='".$_POST['myupdate'][$i]."' ;";
			mysqli_query($link,$sql);
			echo "<script> document.location.href='admin.php?do=admin&redo=menu2&list=$now_menu'; </script>" ;
		}
		
		if(!empty($_POST["mydelete"][$i])){
			$sql = "delete from a_12_admin2 where a_12_admin2_seq ='".$_POST["mydelete"][$i]."'";
			mysqli_query($link,$sql);
			echo "<script> document.location.href='admin.php?do=admin&redo=menu2&list=$now_menu'; </script>" ;
		}

	}
	echo "<script> document.location.href='admin.php?do=admin&redo=menu2&list=$now_menu'; </script>" ;
}
?>


<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
                                    <p class="t cent botli">次選單管理</p>
        <form method="post" >
    <table width="100%">
    	<tr class="yel">
			<td width="30%">次選單名稱</td>
			<td width="30%">次選單連結網址</td>
			<td width="5%">刪除</td>

					</tr>
					<?php 
					$sql = "select * from a_12_admin2 where a_12_admin2_admin ='$now_menu'";
					$c1 = mysqli_query($link,$sql);
					$c2 = mysqli_fetch_assoc($c1);
					$row = mysqli_num_rows($c1);
					if(!empty($row)){
					do{
					?>
			<tr class="yel">
			<td width="35%" align="left"><input type="text" name="title[]" style="width:80%; " value="<?=$c2['a_12_admin2_name']?>" /></td>
			<input type="hidden" name="my_no[]" value="<?=$c2['a_12_admin2_seq']?>" />
			<td width="35%" align="left"><input type="text" name="urll[]" style="width:80%; " value="<?=$c2['a_12_admin2_url']?>" /></td>
			<td width="5%"><input type="checkbox" name="mydelete[]" value="<?=$c2['a_12_admin2_seq']?>"></td>

					</tr>
					<?php }while($c2 = mysqli_fetch_assoc($c1));} ?>
    </table>
           <table style="margin-top:40px; width:70%;">
    <tr>
      <td width="200px"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;admin_1_12_2_add.php&#39;)" value="更多次選單"></td><td class="cent">
		  <input type="submit" value="修改確定"><input type="reset" value="重置"></td>
     </tr>
    </table>    

        </form>
</div>