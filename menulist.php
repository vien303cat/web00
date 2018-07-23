<?php
    $sql = "select * from a_12_admin where a_12_admin_display = '1' ;";
    $c1  = mysqli_query($link,$sql);
    $c2  = mysqli_fetch_assoc($c1);
    /*<div class="mainmu">管理登入</div>												
<div class="mainmu2">網站首頁</div>
<div class="mainmu">Q.Q</div>*/
    do{
?>
<a href="<?=$c2["a_12_admin_url"]?>"><div class="mainmu" onmouseover="xx('w<?=$c2["a_12_admin_url"]?>');" onmouseout="oo('w<?=$c2["a_12_admin_url"]?>');"><?=$c2["a_12_admin_name"]?></a>
<div id="w<?=$c2["a_12_admin_url"]?>" class="ccc">

<?php 
    $sqq = "select * from a_12_admin2 where a_12_admin2_admin = '".$c2["a_12_admin_seq"]."'";
    $c11 = mysqli_query($link,$sqq);
    $c22 = mysqli_fetch_assoc($c11); 
    $roww = mysqli_num_rows($c11);
    if(!empty($roww)){ 
    do{
?>	

<a href="<?=$c22["a_12_admin2_url"]?>"> <div class="mainmu2"><?=$c22["a_12_admin2_name"]?></div> </a>



<?php }while( $c22 = mysqli_fetch_assoc($c11)); } ?>
</div>
</div>
<?php }while($c2  = mysqli_fetch_assoc($c1)); ?>



<script> 
function xx(oo){
    document.getElementById(oo).style.display="block";
}
function oo(xx){
    document.getElementById(xx).style.display="none";
}
function close(){
$(".ccc").hide();
}
close();
</script>