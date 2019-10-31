<?

   $db = @mysql_connect("$sqllocal", "$databaseuser", "$databasepasswd") or die("Ошибка соединения с базой данных ;(");;
   @mysql_select_db("$databasename",$db);

$rr=@mysql_set_charset("cp1251",$db);

//echo $rr;
?>