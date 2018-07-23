<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0055)?do=meg -->
<?php include_once("head.php"); ?>

<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>卓越科技大學校園資訊系統</title>
<link href="./news_files/css.css" rel="stylesheet" type="text/css">
<script src="./news_files/jquery-1.9.1.min.js"></script>
<script src="./news_files/js.js"></script>
</head>

<body>
<div id="cover" style="display:none; ">
	<div id="coverr">
    	<a style="position:absolute; right:3px; top:4px; cursor:pointer; z-index:9999;" onclick="cl(&#39;#cover&#39;)">X</a>
        <div id="cvr" style="position:absolute; width:99%; height:100%; margin:auto; z-index:9898;"></div>
    </div>
</div>
<iframe style="display:none;" name="back" id="back"></iframe>
	<div id="main">
	<?php include_once("titleimg.php"); ?><div id="ms">
             	<div id="lf" style="float:left;">
            		<div id="menuput" class="dbor">
                    <!--主選單放此-->
                    	                            <span class="t botli">主選單區</span>
													<?php include_once("menulist.php"); ?>
                                                </div>
                    <div class="dbor" style="margin:3px; width:95%; height:20%; line-height:100px;">
					<?php 
				$sql = "select * from a_7_total";
				$c1 = mysqli_query($link,$sql);
				$c2 = mysqli_fetch_assoc($c1); ?>	
						<span class="t">進站總人數 :<?=$c2["a_7_total_txt"]?></span>
                    </div>
        		</div>
                <div class="di" style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
				<?php include_once("marquee.php"); ?>
                    <div style="height:32px; display:block;"></div>
                                        <!--正中央-->
										<span class="t botli">
							<table width="100%" border="0" cellspacing="0" cellpadding="2">
							<tr>
							<td width="100%" align="center">更多最新消息區</td>
							</tr>
							</table>
                            </span>
							<ul class="sswww" style="list-style-type:decimal;">
							<?php include_once("index_1_9_2.php"); ?></ul>
                        <div style="text-align:center;">
<!--跳頁--> 
<?php
echo "<a href='?page=".$front_page."'>＜</a>" ;  //上一頁

for($i=1;$i<=$all_page;$i++){
	if($now_page == $i){
		echo "<span style='font-size:80px;color:#f00;'>".$i."</span>"  ;
	}else{ echo "<span style='font-size:44px'><a href='?page=".$i."'>".$i."</a></span>"  ; }
	
}

echo "<a href='?page=".$next_page."'>＞</a>" ;   //下一頁
?>
<!-------->

    </div>
	
	                </div>
					
                <div id="alt" style="position: absolute; width: 350px; min-height: 100px; word-break:break-all; text-align:justify;  background-color: rgb(255, 255, 204); top: 50px; left: 400px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;"></div>
                    	<script>
						$(".sswww div").hover(
							function ()
							{
								$("#alt").html(""+$(this).children(".all").html()+"").css({"top":$(this).offset().top-50})
								$("#alt").show()
							}
						)
						$(".sswww").mouseout(
							function()
							{
								$("#alt").hide()
							}
						)
                        </script>
                                 <div class="di di ad" style="height:540px; width:23%; padding:0px; margin-left:22px; float:left; ">
                	<!--右邊-->   
                	<button style="width:100%; margin-left:auto; margin-right:auto; margin-top:2px; height:50px;" onclick="lo(&#39;login.php&#39;)">管理登入</button>
                	<div style="width:89%; height:480px;" class="dbor">
                    	<span class="t botli">校園映象區</span>
						<?php include_once("index_1_6.php"); ?>
                    </div>
                </div>
                            </div>
             	<div style="clear:both;">
				 </div>
            	<div style="width:1024px; left:0px; position:relative; background:#FC3; margin-top:4px; height:123px; display:block;">
				<?php 
				$sql = "select * from a_8_bottom";
				$c1 = mysqli_query($link,$sql);
				$c2 = mysqli_fetch_assoc($c1); ?>	
				<span class="t" style="line-height:123px;"><?=$c2["a_8_bottom_txt"]?></span><!--footer-->
                
                </div>
    </div>

</body></html>