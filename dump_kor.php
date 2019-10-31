<?php

if (($_GET['pas']=='wirt')||($ok==1)){

if ($ok!=1){include "conf.php";}

$sql = "DROP TABLE kor";
   $result = @mysql_query("$sql",$db);

$sql = "CREATE TABLE kor (
	id int not null,
	seso varchar(25) not null,
	kol int not null,
	code int not null,
	name varchar(130) not null,
	str varchar(130) not null,
	zent decimal(9,2) not null,
	zen decimal(9,2) not null,
	zenz decimal(9,2) not null,
	fotos varchar(100) not null,
	stat decimal(9,2) not null,
	treg int not null
)";

   $result = @mysql_query("$sql",$db);
	echo "korzina_rez=".$result."<br>";


//$bd="cat";
//$file_name="csv/$bd.csv";

//include "reader.php";


	

}

?>