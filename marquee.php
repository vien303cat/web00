<?php

$sql ="select * from a_4_marquee where a_4_marquee_display = '1'";
$c1 = mysqli_query($link,$sql);
$c2 = mysqli_fetch_assoc($c1);


?>

<marquee scrolldelay="120" direction="left" style="position:absolute; width:100%; height:40px;">
<?php do{ ?> 
<?=$c2["a_4_marquee_txt"]?>
<?php }while($c2 = mysqli_fetch_assoc($c1)); ?>
</marquee>