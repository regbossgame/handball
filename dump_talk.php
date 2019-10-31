<?php

if (($_GET['pas']=='wirt')||($ok==1)){

if ($ok!=1){include "conf.php";}

$sql = "DROP TABLE talk";
   $result = @mysql_query("$sql",$db);

$sql = "CREATE TABLE talk (		id int not null,	
	email varchar(120) not null,
	name varchar(100) not null,
	stat int not null,
	treg int not null
)";

   $result = @mysql_query("$sql",$db);
	echo "talk_rez=".$result."<br>";

//$bd="cat";
//$file_name="csv/$bd.csv";

//include "reader.php";

}

?>