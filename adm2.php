<?
echo "<a href='admin.php'>в админку</a>\n";

echo "<div style='background:#DDDDFF'>
<h3>Загрузить новый прайс объектов (CSV)</h3>
<form enctype='multipart/form-data' action='upload_price.php' method='post'>
<input type='hidden' name='MAX_FILE_SIZE' value='9990000'>
<font class='txtc'>Загрузить<br>price.csv:</font>
<br><input name='userfile' type='file'\">
<input type='submit' value='Загрузить'>
</form>
</div>
<hr>";

?>