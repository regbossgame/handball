<?php

if (($_GET['pas']=='wirt')||($ok==1)){

if ($ok!=1){include "conf.php";}

$sql = "DROP TABLE tov";
   $result = @mysql_query("$sql",$db);

$sql = "CREATE TABLE tov (
	id int not null,
	catid varchar(130) not null,
	name varchar(130) not null,
	str varchar(130) not null,
	zen decimal(9,2) not null,
	zenz decimal(9,2) not null,
	title varchar(150) not null,
	fotos text not null,
	stat int not null,		statp int not null,		kol int not null,
	wirt int not null
)";

   $result = @mysql_query("$sql",$db);
	echo "tov_rez=".$result."<br>";

}

?>