<?php
include "cook_life.php";
//session_start();
$_SESSION["log"]="";
unset($_SESSION["log"]);
$_SESSION["adm"]="";
unset($_SESSION["adm"]);

for($i=0;$i<=7;$i++){
$_SESSION["par".$i]="";
unset($_SESSION["par".$i]);
}
//unset($_SESSION["pas"]);
//unset($_SESSION["name"]);

header("LOCATION: ".$_SERVER['HTTP_REFERER']);
?>