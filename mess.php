<?
echo "<div class=\"tov3\">
<div class=\"top3\"></div>
<div class=\"zag3\">
<h1><img src='res/top1/accept.png' width=15px/> Сообщение</h1>
</div>
<div class=\"cont3\">";

echo $_SESSION['mess'];
if ($_SESSION['mess']==""){echo "<p>Новых сообщений нет!</p>";}

$_SESSION['mess']="";

echo "</div>
<div class=\"down3\"></div>
</div>";
?>