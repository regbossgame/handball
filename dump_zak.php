<?php

if (($_GET['pas']=='wirt')||($ok==1)){

if ($ok!=1){include "conf.php";}

$sql = "DROP TABLE zak";
   $result = @mysql_query("$sql",$db);

$sql = "CREATE TABLE zak (
	id int not null,
	seso varchar(25) not null,
	kol int not null,
	zent decimal(9,2) not null,
	zen decimal(9,2) not null,
	zenz decimal(9,2) not null,
	stat int not null,
	msg text not null,
	pers text not null,
	log varchar(50) not null,		chek text not null,
	treg int not null
)";

   $result = @mysql_query("$sql",$db);
	echo "zakazy_rez=".$result."<br>";


//$bd="cat";
//$file_name="csv/$bd.csv";

//include "reader.php";


	

}

?>