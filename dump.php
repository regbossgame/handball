<?

if ($ok!=1){include "conf.php";}

if (($_GET['pas']=='wirt')||($ok==1)){
$ok=1;

//echo $rr;
//include "dump_cat.php";

//include "dump_tov.php";

//include "dump_kor.php";

//include "dump_zak.php";

include "dump_users.php";include "dump_news.php";

include "dump_video.php";

include "dump_koma.php";//include "dump_talk.php";
//include "dump_tip.php";

echo "init_all!!!<br>";
}else{echo "Херушки!";}
?>