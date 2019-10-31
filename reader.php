<?

$file_name="csv/".$type.".csv";
		
$fp = fopen($file_name, "r");

$columns = fgets($fp, 999);
$columns = rtrim($columns);
$mc=explode(';',$columns);
$j=count($mc);
$kk=-1;
//echo "<br>-------|".$type;
while (!feof($fp))
{
$kk++;

$mt = fgets($fp, 999);
$mt = rtrim($mt);

$ma=explode(';',$mt);

for($i=0;$i<$j;$i++){

if ($mc[$i]=="str"){
if ($ma[$i]==""){$ma[$i]="index.php?str=".trans($conf[$type][$kk]['name']);}
}

if ($ma[$i]!=""){$conf[$type][$kk][$mc[$i]]=$ma[$i];}

}


}
 
 fclose($fp);

 //echo count($conf[$type]);//[1]['name']."|".$j;//['name'];
 
?>