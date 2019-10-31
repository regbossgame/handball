<?
include "cook_life.php";
include "conf.php";

$id=$_GET['id'];
$bd=$_GET['bd'];


if ($bd=="zak"){
$sql="SELECT chek,treg,log FROM zak WHERE id LIKE '".$id."'";
$result = @mysql_query("$sql",$db);
$k=@mysql_num_rows($result);

if ($k>0){
$i=0;
$chek=@mysql_result($result, $i,"chek");
$treg=@mysql_result($result, $i,"treg");
$log=@mysql_result($result, $i,"log");



echo "<h3>Заказ №".$id."</h3>Отправлен <strong>".date('d.m.Y [H:i]',$treg)."</strong> пользователем <strong>$log</strong><br>".$chek."С уважением, ".$comp_name;

}
//end zak


}

echo "<script>setTimeout('window.print();',200);</script>";

?>