<?php

if (($_GET['pas']=='wirt')||($ok==1)){

if ($ok!=1){include "conf.php";}

$sql = "DROP TABLE cat";
   $result = @mysql_query("$sql",$db);

$sql = "CREATE TABLE cat (
	id int not null,
	name varchar(100) not null,
	str varchar(150) not null,
	title varchar(150) not null,
	img varchar(100) not null,
	rod int not null,
	prod int not null,
	wirt int not null
)";

   $result = @mysql_query("$sql",$db);
	echo "category_rez=".$result."<br>";


//$bd="cat";
//$file_name="csv/$bd.csv";

//include "reader.php";


	

}

?>