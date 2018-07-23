<?php


if(!empty($_POST["ac"])){
	if($_POST["pw"] == $_POST["pw2"]){
	$acc = $_POST["ac"];
	$pw = $_POST["pw"];
	$sql = "insert into admin value(NULL,'$acc','$pw','1') ;";
	mysqli_query($link,$sql);
	echo "<script> document.location.href='admin.php?do=admin&redo=admin'; </script>" ;
	}else{echo "<script> alert('請確認密碼是否正確'); </script>" ;}
}
if(!empty($_POST["acc"][0])){
	
	for($i=0;$i<count($_POST["my_no"]);$i++){

		$sql = "update admin set a_acc = '".$_POST["acc"][$i]."', a_pw = '".$_POST["pw"][$i]."' where a_seq = '".$_POST["my_no"][$i]."' ;";
		mysqli_query($link,$sql);
		if(!empty($_POST["mydelete"][$i])){
			$sql = "delete from admin where a_seq ='".$_POST["mydelete"][$i]."'";
			mysqli_query($link,$sql);
			echo "<script> document.location.href='admin.php?do=admin&redo=admin'; </script>" ;
		}

	}
	echo "<script> document.location.href='admin.php?do=admin&redo=admin'; </script>" ;
}
?>


<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
                                    <p class="t cent botli">管理者帳號管理</p>
        <form method="post" >
    <table width="100%">
    	<tr class="yel">
			<td width="40%">帳號</td>
			<td width="40%">密碼</td>
			<td width="10%">刪除</td>
					</tr>
					<?php 
					$sql = "select * from admin";
					$c1 = mysqli_query($link,$sql);
					$c2 = mysqli_fetch_assoc($c1);
					do{
					?>
			<tr class="yel">
			<td width="40%" align="left"><input type="text" name="acc[]" style="width:80%; " value="<?=$c2['a_acc']?>" /></td>
			<input type="hidden" name="my_no[]" value="<?=$c2['a_seq']?>" />
			<td width="40%" align="left"><input type="password" name="pw[]" style="width:80%; " value="<?=$c2['a_pw']?>" /></td>
			<td width="7%"><input type="checkbox" name="mydelete[]" value="<?=$c2['a_seq']?>"></td>
					</tr>
					<?php }while($c2 = mysqli_fetch_assoc($c1)) ?>
    </table>
           <table style="margin-top:40px; width:70%;">
    <tr>
      <td width="200px"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;admin_1_11_add.php&#39;)" value="新增管理者帳號"></td><td class="cent">
		  <input type="submit" value="修改確定"><input type="reset" value="重置"></td>
     </tr>
    </table>    

        </form>
</div>