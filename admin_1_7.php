<?php
if(!empty($_POST["txt"])){
	$sql = "update a_7_total set a_7_total_txt = '".$_POST["txt"]."'";
    mysqli_query($link,$sql);

	echo "<script> document.location.href='admin.php?do=admin&redo=total'; </script>" ;
}
$sql = "select * from a_7_total";
$c1 = mysqli_query($link,$sql);
$c2 = mysqli_fetch_assoc($c1);
?>


<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
                                    <p class="t cent botli">進站總人數管理</p>
        <form method="post" >
    <table width="100%">
    	<tr class="yel">
			<td width="50%">進站總人數：</td>
			<td class=""　width="50%"><input type="text" name="txt" style="width:80%; " value="<?=$c2['a_7_total_txt']?>" /></td>
					</tr>

    </table>
           <table style="margin-top:40px; width:70%;">
    <tr>
	  <input type="submit" value="修改確定"><input type="reset" value="重置"></td>
     </tr>
    </table>    

        </form>
</div>