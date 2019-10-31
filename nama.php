<?
$fnam=str_replace("127.0.0.1/", "", $fnam);
$fnam=str_replace("localhost/", "", $fnam);
$fnam=str_replace($hostname0, "", $fnam);

if (strpos("^".$fnam,"?")>0){$fnam=substr($fnam,0,strpos($fnam,"?"));}
$fnam=str_replace("index.php", "", $fnam);
$fnam=str_replace(".php", "", $fnam);
$fnam=str_replace("/", "", $fnam);
$fnam=$fnam.$str;

?>