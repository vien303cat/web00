<?php include_once("head.php"); ?>
<?php
$sql = "select * from a_5_mvpic where a_5_mvpic_display = '1' ";
$c1 = mysqli_query($link,$sql);
$c2 = mysqli_fetch_assoc($c1);
$allrow = mysqli_num_rows($c1);
$now_pic = 0;
do{  ?>
lin[<?=$now_pic?>]="img/<?=$c2['a_5_mvpic_pic'] ?>";
<?php $now_pic++ ; }while($c2 = mysqli_fetch_assoc($c1)) ?>