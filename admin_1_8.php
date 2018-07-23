<?php
if(!empty($_POST["txt"])){
	$sql = "update a_8_bottom set a_8_bottom_txt = '".$_POST["txt"]."'";
    mysqli_query($link,$sql);

	echo "<script> document.location.href='admin.php?do=admin&redo=bottom'; </script>" ;
}
$sql = "select * from a_8_bottom";
$c1 = mysqli_query($link,$sql);
$c2 = mysqli_fetch_assoc($c1);
?>


<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
                                    <p class="t cent botli">頁尾版權區管理</p>
        <form method="post" >
    <table width="100%">
    	<tr class="yel">
			<td width="50%">頁尾版權文字：</td>
			<td class=""　width="50%"><input type="text" name="txt" style="width:80%; " value="<?=$c2['a_8_bottom_txt']?>" /></td>
					</tr>

    </table>
           <table style="margin-top:40px; width:70%;">
    <tr>
	  <input type="submit" value="修改確定"><input type="reset" value="重置"></td>
     </tr>
    </table>    

        </form>
</div>