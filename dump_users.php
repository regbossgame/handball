<?

if (($_GET['pas']=='wirt')||($ok==1)){

if ($ok!=1){include "conf.php";}
$bd="users";

$sql = "DROP TABLE ".$bd;
   $result = @mysql_query("$sql",$db);

$sql = "CREATE TABLE ".$bd." (
	log varchar(50) not null,
	pas varchar(30) not null,
	par1 varchar(60) not null,
	par2 varchar(60) not null,
	par3 varchar(60) not null,
	par4 varchar(90) not null,
	par5 varchar(15) not null,
	par6 text not null,
	par7 varchar(12) not null,
	treg int not null,
	adm int not null,
	act int not null
)";

   $result = @mysql_query("$sql",$db);
	echo "users_rez=".$result."<br>";

	
$log="wirtbox@mail.ru";
$pas='next2008';
$par1="Супер-Админ";
$treg=time();
$act=1;
$adm=1;
$sql = "INSERT INTO $bd (log,pas,par1,treg,act,adm) VALUES('$log','$pas','$par1','$treg','$act','$adm')";
$result = @mysql_query("$sql",$db);
echo "R=".$result."<br>";
	
$log="to363999@mail.ru";
$pas='331210';
$par1="Админ";
$treg=time();
$act=1;
$adm=1;
$sql = "INSERT INTO $bd (log,pas,par1,treg,act,adm) VALUES('$log','$pas','$par1','$treg','$act','$adm')";
$result = @mysql_query("$sql",$db);
echo "R=".$result."<br>";

$log="sp684190@mail.ru";
$pas='lbhtrnjh15';
$par1="Админ";
$treg=time();
$act=1;
$adm=1;
$sql = "INSERT INTO $bd (log,pas,par1,treg,act,adm) VALUES('$log','$pas','$par1','$treg','$act','$adm')";
$result = @mysql_query("$sql",$db);
echo "R=".$result."<br>";

	

}

?>