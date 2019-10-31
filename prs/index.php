<?php
/*****************************************************************************************************
Парсер адресов сайта http://whoistory.com

bild by spymen (E-mail: spymen1@yandex.ru, Skype: spymen-freelance)
*****************************************************************************************************/

//установки для php
ignore_user_abort(true);             	// исключаем прерывание скрипта при отсоединении клиента
ini_set('max_execution_time', 0);    	// отключаем лимит на максимальное время выполнения
ini_set('max_input_time', 0);        	// аналогично
ini_set('memory_limit', '240M');     	// увеличиваем лимит памяти для работы скрипта
ini_set('display_errors',1);			// показывать все ошибки/предупреждения
error_reporting(E_ALL);					// аналогично

//подключаем модули
include ('func/lib_base_class.php'); // основной набор классов
$date=array();
$url=array();
$mode='';

// принимаем исходные данные
$year_start='';
$month_start='';
$date_start='';
$year_finish='';
$month_finish='';
$date_finish='';

if (isset($_REQUEST['year_start'])) if ($_REQUEST['year_start']<>'') {$mode='year';$year_start=$_REQUEST['year_start'];}
if (isset($_REQUEST['month_start'])) if ($_REQUEST['month_start']<>'') {$mode='month';$month_start=$_REQUEST['month_start'];}
if (isset($_REQUEST['date_start'])) if ($_REQUEST['date_start']<>'') {$mode='date';$date_start=$_REQUEST['date_start'];}
if (isset($_REQUEST['year_finish'])) if ($_REQUEST['year_finish']<>'') {$mode='period';$year_finish=$_REQUEST['year_finish'];}
if (isset($_REQUEST['month_finish'])) if ($_REQUEST['month_finish']<>'') $month_finish=$_REQUEST['month_finish'];
if (isset($_REQUEST['date_finish'])) if ($_REQUEST['date_finish']<>'') $date_finish=$_REQUEST['date_finish'];

if ($year_start=='') $year_start=date("Y");
if ($month_start=='') $month_start=date("m");
if ($date_start=='') $date_start=date("d")-1;
if ($year_finish=='') $year_finish=date("Y");
if ($month_finish=='') $month_finish=date("m");
if ($date_finish=='') $date_finish=date("d")-1;

// корректируем границы
if ($mode=='year') {
	$month_start='01'; $date_start='01'; $year_finish=$year_start;
	if ($year_start<>date("Y")) {$month_finish='12'; $date_finish='31';}
}
if ($mode=='month') {
	$date_start='01'; $month_finish=$month_start; $year_finish=$year_start;
	if (!($year_start==date("Y") and $month_start==date("m"))) {$date_finish=date("t",strtotime($year_start.'-'.$month_start.'-01'));}
}
if ($mode=='date') {$date_finish=$date_start; $month_finish=$month_start; $year_finish=$year_start;}

$start=strtotime($year_start.'-'.$month_start.'-'.$date_start);
$finish=strtotime($year_finish.'-'.$month_finish.'-'.$date_finish);

// формируем массив адресов
while ($start<=$finish) {
	$url[]="http://whoistory.com/".date("Y",$start)."/".date("m",$start)."/".date("d",$start)."/";
	$start=strtotime("+1 day",$start);
}

header('Content-type: text/html; charset=utf-8'); // задаём кодировку страниц
// проводим парсинг сформированных url
if ($mode<>'') {
	$f=fopen('links.txt',"w");
	echo 'Сформирован список адресов: '.count($url).'<br>';
	$i=0;
	foreach ($url as $key => $val) {
		Load::$set_cookie='PHPSESSID=jj4jn53l6n5dk04ik7f98i1nu6';
		$page=Load::get_page($val,'firefox','');
		echo $val.'<br>'."\n";
		// вырезаем область линков
		$x=strpos($page,'<div class="left">');
		$links_block=substr($page,strpos($page,'<h2>',$x),strpos($page,'</div>',$x)-$x);
		// разбираем линки
		while (strpos($links_block,'href=')) {
			$x=strpos($links_block,'">');
			$s=substr($links_block,$x+2,strpos($links_block,'</a>')-$x-2);
			if (!strpos($s,'</b>')) {fwrite($f,$s."\n");$i++;}
			$links_block=substr($links_block,strpos($links_block,'</a')+4);
		}
	}
	fclose ($f);
	echo 'Найдено линков: '.$i.'<br>';
}


?>

<center>
<h2>Парсинг сайта http://whoistory.com</h2>
<form>
<input type="text" size="2" name="date_start">.
<input type="text" size="2" name="month_start">.
<input type="text" size="4" name="year_start">г. - 
<input type="text" size="2" name="date_finish">.
<input type="text" size="2" name="month_finish">.
<input type="text" size="4" name="year_finish">г.
<br>
<input type="submit" name="submit">
</form>
</center>