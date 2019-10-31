<?
$i99=1;//rand(1,7);
echo "<img src='res/bg".$i99.".jpg' style='position:fixed;z-index:-1;top:0px;left:0px;width:100%;height:100%;'/>";
//<img src='res/logo1.png' height=250px style='padding:10px;'/>
?>
<br>
<div class='maket'>

<div class='header'>



<?
//echo "<div style='position:fixed;left:0px;top:0px;width:100px;height:20px;z-index:2;background:#000000;color:#FFFFFF;'><b>Фон: ".$i99." из 7</b></div>";
echo "<div class='kor'>";

if ($_SESSION['log']!=""){
echo "<select style='width:150px;font-size:11pt;font-weight:bold;margin-bottom:10px;background:#e9f5fb;' onchange=\"self.location=this.value\">";
echo "<option value='index.php' selected>".$_SESSION['log']."</option>
<option value='news.php'>Новости</option>
<option value='exit.php'>Выйти</option>";
//Здравствуйте ".$_SESSION['par1']."<br>в кабинет / ";
//echo "<strong>Статусы:<br> 1 -> курьер 50р<br> 2 -> Самовывоз<br> 3 -> Почтой<br> (-1) -> В обработке<br> (-7) -> Закрыта </strong><br> \n";
if ($_SESSION['adm']>0){
echo "<option value='admin.php'>В админку</option>";
//echo "<a href='admin.php' target='blank'>в админку</a>";
echo "</select>";
	echo "<div style='position:absolute;'>";
	echo "<a href='admin.php' target='_blank' title='Открыть админку в новой вкладке'>адм</a>";
	include "ruba.php";
	echo "</div>";
}else{echo "</select>";}

	 }else{}

 

	echo "<div style='height:61px;'>";
	$t3="koi.gif?rnd=".rand(10000,9999999);
if ($kol03<=0){$t3="kor.png";}

echo "</div>";
?>
</div>


</div>


<?
//<div class='line1'></div>
 include "men.php";
?>


<?

echo '<div class="leftmen">';
echo "\n";

include "lm.php";


echo "</div>";



echo "<div class=\"content1\">\n";

?>