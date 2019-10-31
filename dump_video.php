<?php

if (($_GET['pas']=='wirt')||($ok==1)){

if ($ok!=1){include "conf.php";}

$bd="video";

$sql = "DROP TABLE ".$bd;
   $result = @mysql_query("$sql",$db);

$sql = "CREATE TABLE $bd (
	id int not null,
	name varchar(120) not null,
	treg int not null,
	txt text not null,
	opis text not null
)";

   $result = @mysql_query("$sql",$db);
	echo "video_rez=".$result."<br>";

	$treg=time();
	$txt='<iframe width="640" height="360" src="https://www.youtube.com/embed/6c2jx5oaSvQ?feature=player_detailpage" frameborder="0" allowfullscreen></iframe>';
	$sql = "INSERT INTO $bd (id,name,treg,txt) VALUES('722349','Новое видео 1','$treg','$txt')";
	$result = @mysql_query($sql,$db);

	$txt='<object width="646" height="362"><param name="video" value="http://static.video.yandex.ru/lite/tagan-media/i2z8274bfb.4615/"></param><param name="allowFullScreen" value="true"></param><param name="scale" value="noscale"></param><param name="flashvars" value="is-hq=true"></param><embed src="http://static.video.yandex.ru/lite/tagan-media/i2z8274bfb.4615/" type="application/x-shockwave-flash" width="646" height="362" allowFullScreen="true" scale="noscale"flashvars="is-hq=true" ></embed></object>';
	$sql = "INSERT INTO $bd (id,name,treg,txt) VALUES('6475474','Новое видео 2','$treg','$txt')";
	$result = @mysql_query($sql,$db);

	$txt='<iframe width="640" height="360" src="https://www.youtube.com/embed/Uht3Bn7IcXo?feature=player_detailpage" frameborder="0" allowfullscreen></iframe>';
	$sql = "INSERT INTO $bd (id,name,treg,txt) VALUES('234234','Новое видео 3','$treg','$txt')";
	$result = @mysql_query($sql,$db);

	$txt='<iframe width="646" height="362" frameborder="0" src="http://video.yandex.ru/iframe/tagan-media/zi5ax524fd.4926/"></iframe>';
	$sql = "INSERT INTO $bd (id,name,treg,txt) VALUES('956856','Новое видео 4','$treg','$txt')";
	$result = @mysql_query($sql,$db);

	$txt='<iframe width="646" height="362" src="https://www.youtube.com/embed/aMRNKlUk51Y?feature=player_detailpage" frameborder="0" allowfullscreen></iframe>';
	$sql = "INSERT INTO $bd (id,name,treg,txt) VALUES('45727356','Новое видео 5','$treg','$txt')";
	$result = @mysql_query($sql,$db);	
	
}

?>