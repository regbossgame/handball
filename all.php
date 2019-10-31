<?
include "init.php";

include "up.php";

$tt=0;
for($i56=0;$i56<count($specs);$i56++){
	if ($str==$specs[$i56]){include $str;$tt=1;}
}


if ($tt==0){
	$modif="str";
	include "content.php";
}

include "down.php";


if ($enadm==1){include "tiny.php";}

include "java.php";


echo "

</body>\n
</html>";

?>