<?
$an="";

echo "<h1>".$an."</h1>";

/*
$fn5="catalog/txt/".$str."_ocat.txt";
if (file_exists($fn5)){$te5=file_get_contents($fn5);}else{$te5="";}

//if (($enadm==0)&&($te5=="")){$te5=$te4;}//else{$te5=file_put_contents($fn6,"");}

if ($enadm==0){echo $te5;}else{
echo "<form action=edit_opis.php method='POST'>
<input type='hidden' name='fn1' value='$fn5'/>
<textarea name='txt10' style='width:170px;height:50px;'>$te5</textarea>
<input type='submit' value='Сохранить'/>

</form>";
}
*/



$sql="SELECT * FROM tov ORDER BY str";
$result = @mysql_query("$sql",$db);
$k=@mysql_num_rows($result);

include "price.php";

?>

