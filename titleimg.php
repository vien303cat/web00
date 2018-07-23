<?php

$sql ="select * from a_3_banner where a_3_banner_display = '1'";
$c1 = mysqli_query($link,$sql);
$c2 = mysqli_fetch_assoc($c1);

?>

<a title="" href="index.php"><div class="ti" style="background:url(&#39;use/&#39;); background-size:cover;">
<img src="img/<?=$c2['a_3_banner_pic']?>" width="1024" height="100" alt="<?=$c2["a_3_banner_title"]?>" title="<?=$c2["a_3_banner_title"]?>" />
</div>
		<!--標題--></a>