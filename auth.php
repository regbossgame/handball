<?
include "cook_life.php";
//header("Content-Type: text/html;charset=windows-1251");

include "conf.php";

$err="";

include "fire.php";
//echo "|";

if ($ok==1){

if ($_POST['user_name']!=""){//3
$user_name=strtolower($_POST['user_name']);
$user_pass=strtolower($_POST['user_pass']);



//echo $user_name."|".$user_pass;

$sql="SELECT * FROM users WHERE log LIKE '$user_name' AND pas LIKE '$user_pass'";
        $result = @mysql_query($sql,$db);
        $k=@mysql_num_rows($result);
$adminok=0;
if (($user_name==$admuser)&&($user_pass==$admpas)){$k=1;$adminok=1;};



		
if ($k>0){//2

//$logged_user = @mysql_result($result, 0, "log");
$log = @mysql_result($result, 0, "log");
$adm = @mysql_result($result, 0, "adm");
$act = @mysql_result($result, 0, "act");
$treg = @mysql_result($result, 0, "treg");

if ($adminok==1){
$log = $admuser;
$adm = 10;
$act = 1;
$treg = time();
};


$_SESSION["log"]=$log;
$_SESSION['treg']=$treg;
$_SESSION['act']=$act;
$_SESSION['adm']=$adm;

for($i=1;$i<=6;$i++){
	$_SESSION['par'.$i] = @mysql_result($result, 0, "par".$i);
}


$sql = "UPDATE users SET act=1 WHERE log LIKE '$log'";
 $result = @mysql_query("$sql",$db);

//$sql = "DELETE FROM kor WHERE ((".time()."-treg)>".(3600*24*30).")";
//			$result = @mysql_query("$sql",$db);

$sql = "DELETE FROM users WHERE act LIKE '0' AND ((".time()."-treg)>".(3600*24*60).")";
			$result = @mysql_query("$sql",$db);

			
 
/*
$user_pass = @mysql_result($result, 0, "pas");
$prav = @mysql_result($result, 0, "prav");
$name = @mysql_result($result, 0, "name");
$tel = @mysql_result($result, 0, "tel");
$mail = @mysql_result($result, 0, "mail");
$act = @mysql_result($result, 0, "act");
$foto = @mysql_result($result, 0, "foto");
*/
//if ($act==1){

//session_register("log");
//session_register("uid");

//$_SESSION["prav"]=$prav;
//$_SESSION["name"]=$name;
//$_SESSION["tel"]=$tel;
//$_SESSION["mail"]=$mail;
//$_SESSION["foto"]=$foto;

//HEADER("LOCATION: index.php");

//$err="";
//}else{
//$err="Ваша учётная запись ещё не активирована! Обратитесь к администратору $adminmail!";
//$tt=4;

//}

$_SESSION['terka']="1";

}else{$_SESSION['terka']="-1";$err="Неверный логин или пароль!";}//-2
}else{$_SESSION['terka']="-1";$err="Введите логин и пароль";}//-3
}else{$_SESSION['terka']="-1";$err="Хak -> Error 04 / При повторных попытках выш IP будет заблокирован! [<b>".$ipt."</b>]";}//-1


if ($err!=""){echo $err."<br><a href='loginka.php'>назад</a>";$_SESSION['erka']=$err;}

HEADER("LOCATION: index.php");

//echo "+".$_POST['user_name']."|";
//$tt=1;
//echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=index.php'/>";

?>