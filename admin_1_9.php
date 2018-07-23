<?php
if(!empty($_POST["word"])){
	$txt = $_POST["word"];
	$sql = "insert into a_9_news value(NULL,'$txt','0') ;";
	mysqli_query($link,$sql);
	echo "<script> document.location.href='admin.php?do=admin&redo=news'; </script>" ;
}
if(!empty($_POST["title"][0])){

	for($i=0;$i<count($_POST["my_no"]);$i++){
		$sql = "update a_9_news set a_9_news_display = '0' where a_9_news_seq ='".$_POST['my_no'][$i]."';" ;
		mysqli_query($link,$sql);
	}
	for($i=0;$i<count($_POST["my_no"]);$i++){

		$sql = "update a_9_news set a_9_news_txt = '".$_POST["title"][$i]."' where a_9_news_sql = '".$_POST["my_no"][$i]."' ;";
		mysqli_query($link,$sql);
		
		if(!empty($_POST["myupdate"][$i])){
			$sql = "update a_9_news set a_9_news_display = '1' where a_9_news_seq ='".$_POST['myupdate'][$i]."' ;";
			mysqli_query($link,$sql);
			echo "<script> document.location.href='admin.php?do=admin&redo=news'; </script>" ;
		}
		
		if(!empty($_POST["mydelete"][$i])){
			$sql = "delete from a_9_news where a_9_news_seq ='".$_POST["mydelete"][$i]."'";
			mysqli_query($link,$sql);
			echo "<script> document.location.href='admin.php?do=admin&redo=news'; </script>" ;
		}

	}
	echo "<script> document.location.href='admin.php?do=admin&redo=news'; </script>" ;
}
?>
<style>
a{
	text-decoration: none;
}
</style>

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
					$sql = "select * from a_9_news";
					$c1 = mysqli_query($link,$sql);
					$c2 = mysqli_fetch_assoc($c1);
					$all_data = mysqli_num_rows($c1);
					$now_page = 1 ; //目前頁
					$add_page = 3 ; //一次幾筆
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
	
					$sql = "select * from a_9_news limit $open_page,$add_page";// limit a,b 從第a筆之後(不含它) 開始抓數量b筆資料
					$c1 = mysqli_query($link,$sql);
					$c2 = mysqli_fetch_assoc($c1);
					do{
					?>
			<tr class="yel">
			<td width="80%" align="left"><textarea  cols="40" rows="4" name="title[]" style="width:80%;"><?=$c2['a_9_news_txt']?></textarea></td>
			<input type="hidden" name="my_no[]" value="<?=$c2['a_9_news_seq']?>" />
			<td width="7%"><input type="checkbox" name="myupdate[]" value="<?=$c2['a_9_news_seq']?>" <?php if($c2['a_9_news_display']==1){ echo "checked"; } ?> ></td>
			<td width="7%"><input type="checkbox" name="mydelete[]" value="<?=$c2['a_9_news_seq']?>"></td>
					</tr>
					<?php }while($c2 = mysqli_fetch_assoc($c1)) ?>
    </table>
	<table width="100%" border="0" cellspacing="0" cellpadding="2">
  	<tr>
    <td align="center" valign="middle">
	<?php 

	echo "<span style='font-size:25px;'><a href='admin.php?do=admin&redo=news&page=".$pp."'> < </a></span>";
	for($i=1;$i<=$all_page;$i++){
		if($now_page == $i){
			echo "<span style='font-size:50px;color:#F00;'>".$i."</span>" ;
		}else{ echo "<span style='font-size:25px;'><a href='admin.php?do=admin&redo=news&page=".$i."'>".$i."</a></span>" ;}
	}
	echo "<span style='font-size:25px;'><a href='admin.php?do=admin&redo=news&page=".$np."'> > </a></span>";
	?>
	</td>
  	</tr>
	</table>
           <table style="margin-top:40px; width:70%;">
    <tr>
      <td width="200px"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;admin_1_9_add.php&#39;)" value="新增最新消息"></td><td class="cent">
		  <input type="submit" value="修改確定"><input type="reset" value="重置"></td>
     </tr>
    </table>    

        </form>
</div>