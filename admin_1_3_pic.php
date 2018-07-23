<?php
    include_once("head.php");
	$sql = "select * from a_3_banner where a_3_banner_seq = '".$_GET["picc"]."'";
	$c1 = mysqli_query($link,$sql);
    $c2 = mysqli_fetch_assoc($c1);
    echo $_GET["picc"];
?>
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
                                    <p class="t cent botli">修改標題區圖片</p>
        <form method="post" enctype="multipart/form-data">
    <table width="100%">
    
            <tr>
            <td width="50%" align="right">標題區圖片:</td>
            <td width="50%">
            <input type="file" name="pic_update" />
            <input type="hidden" name="pic_no" value="<?=$_GET['picc']?>"  />
            <input type="hidden" name="pic_name" value="<?=$c2['a_3_banner_pic']?>" />
            <?php echo $c2['a_3_banner_pic']; ?>
        </td>

            </tr>

  
</table>
           <table style="margin-top:40px; width:70%;" align="center">
     <tr>
      <td class="cent" align="center"><input type="submit" value="修改"><input type="reset" value="重置"></td>
     </tr>
    </table>   
    </form>
</div>