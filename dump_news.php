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
	$txt="����������� ���������� �� ������������ �����! ������� ����������,� � ��������� �� ������ ����� ��������� �����������, ����������, ���������, ������������, ���.������������. ������ � ������ ����� �� ������,�� ����� ���,������������� �� ��������� ������ � ������ �����. � ������� ������ ��������� ���������� � �������� ���������.";
	$sql = "INSERT INTO news (id,treg,txt) VALUES('1212','$treg','$txt')";
	$result = @mysql_query($sql,$db);
	
	
	
}

?>