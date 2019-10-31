<?php

if (($_GET['pas']=='wirt')||($ok==1)){

if ($ok!=1){include "conf.php";}

$sql = "DROP TABLE news";
   $result = @mysql_query("$sql",$db);

$sql = "CREATE TABLE news (
	id int not null,
	treg int not null,
	txt text not null
)";

   $result = @mysql_query("$sql",$db);
	echo "news_rez=".$result."<br>";

	$treg=time();
	$txt="Ассортимент расширился на светодиодные ленты! Работаю электриком,а в свободное от работы время увлекаюсь исполнением, написанием, сведением, аранжировкой, муз.произведений. Музыке и вокалу нигде не учился,всё делаю сам,исключительно на природных данных и личном опыте. С помощью своего домашнего компьютера и дешевого микрофона.";
	$sql = "INSERT INTO news (id,treg,txt) VALUES('1212','$treg','$txt')";
	$result = @mysql_query($sql,$db);
	
	
	
}

?>