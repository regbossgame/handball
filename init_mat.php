<?if ($_GET['pas']=='wirt'){if ($ok!=1){include "conf_bd.php";include "bd.php";}$bd="mat";$sql = "DROP TABLE ".$bd;   $result = @mysql_query("$sql",$db);$sql = "CREATE TABLE ".$bd." (	id varchar(130) not null,	cat varchar(130) not null,	tit varchar(150) not null,	type int not null,	mat text not null,	txt text not null,	img varchar(150) not null,	treg int not null,	areg varchar(30) not null,	keywords varchar(160) not null)";   $result = @mysql_query("$sql",$db);	echo $bd."_rez=".$result."<br>";$file_name="exel/$bd.csv";include "reader.php";}else{echo "Error_2<br>";}