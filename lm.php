<?if ($str=="start.php"){echo '<div class="tov1"><div class="top1"></div><div class="zag1"><h1><a href="index.php?str=Anons"><img src="res/top1/accept.png" width=15px/> Следующая игра</a></h1></div><div class="cont1">';$tx0=file_get_contents("txt/Anons_str.php");echo $tx0;echo '</div><div class="down1"></div></div><br>';}?><div class="tov1">
<div class="top1"></div>
<div class="zag1">
<h1><a href='news.php'><img src='res/top1/accept.png' width=15px/> Новости</a></h1>
</div>
<div class="cont1"><?echo "<ul style='font-size:9pt;padding:5px;'>";$sql="SELECT * FROM news ORDER BY treg DESC LIMIT 10";$result = @mysql_query("$sql",$db);$k=@mysql_num_rows($result);for ($i=0;$i<$k;$i++){	$id=@mysql_result($result, $i,"id");	$treg=@mysql_result($result, $i,"treg");	$txt=@mysql_result($result, $i,"txt");	//echo "<div style='width:450px;'>$txt</div>";	echo "<li>";//echo "|".strip_tags($txt)."|";$txt=strip_tags($txt);//$txt=rtrim($txt);echo "<a href='news.php?id=$id' title='".obrez($txt,128)."'>[".date('d.m.Y', $treg)."] ".obrez($txt,26)."</a></li>\n";	}echo "</ul>";?>
</div>
<div class="down1"></div>
</div>
<br>

<?echo '<div class="tov1"><div class="top1"></div><div class="zag1"><h1><a href="index.php?str=Tyrnir"><img src="res/top1/accept.png" width=15px/> Предыдущая игра</a></h1></div><div class="cont1">';$tx0=file_get_contents("txt/Tyrnir_str.php");echo $tx0;echo '</div><div class="down1"></div></div><br>';if (($str=="start.php")||($str=="Kommentarii")){echo '<div class="tov1"><div class="top1"></div><div class="zag1"><h1><a href="index.php?str=Vkontakte"><img src="res/top1/accept.png" width=15px/> Вконтакте</a></h1></div><div class="cont1">';echo "<!-- VK Widget --><div id=\"vk_groups\" style='padding:2px;'></div><script type=\"text/javascript\">VK.Widgets.Group(\"vk_groups\", {mode: 0, width: \"266\", height: \"350\", color1: 'FFFFFF', color2: '2B587A', color3: '5B7FA6'}, 56638518);</script>";echo '</div><div class="down1"></div></div><br>';}echo '<div class="tov1"><div class="top1"></div><div class="zag1"><h1><a href="index.php?str=Sponsori"><img src="res/top1/accept.png" width=15px/> Спонсоры</a></h1></div><div class="cont1">';$tx0=file_get_contents("txt/Sponsori_str.php");echo $tx0;echo '</div><div class="down1"></div></div><br>';echo '<div class="tov1"><div class="top1"></div><div class="zag1"><h1><a href="index.php?str=Partnery"><img src="res/top1/accept.png" width=15px/> Парнёры</a></h1></div><div class="cont1">';$tx0=file_get_contents("txt/Partnery_str.php");echo $tx0;echo '</div><div class="down1"></div></div><br>';/*echo '<div class="tov1"><div class="top1"></div><div class="zag1"><h1><img src="res/top1/accept.png" width=15px/> Опросы</a></h1></div><div class="cont1">';include "vote_form.php";echo '</div><div class="down1"></div></div><br>';
*//*
if ($vidak!="1"){
echo '<div class="tov1">
<div class="top1"></div>
<div class="zag1">
<h1><img src="res/top1/accept.png" width=15px/> Получить скидку 10%</h1>
</div>
<div class="cont1">';

echo "\n";
include "talk_form.php";
echo "\n";
echo '</div>
<div class="down1"></div>
</div>
<br>';}
*//*
if ($str=="start.php"){
echo '<div class="tov1">
<div class="top1"></div>
<div class="zag1">
<h1><a href="index.php?str=Stati"><img src="res/top1/accept.png" width=15px/> Статьи</a></h1>
</div>
<div class="cont1">';
$tx0=file_get_contents("txt/Stati_str.php");//$tx0=obrez(strip_tags($tx0),120);//echo "<p>".echo $tx0;//."</p>";echo '</div>
<div class="down1"></div>
</div>
<br>';
}*/
?>

<div class="tov1"><div class="top1"></div><div class="zag1"><h1><img src='res/top1/accept.png' width=15px/> Счётчики</h1></div><div class="cont1" style='padding:5px;text-align:center;'><!-- Yandex.Metrika informer --><a href="http://metrika.yandex.ru/stat/?id=22218022&amp;from=informer"target="_blank" rel="nofollow"><img src="//bs.yandex.ru/informer/22218022/3_0_8AD4FFFF_6AB4F1FF_0_pageviews"style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" onclick="try{Ya.Metrika.informer({i:this,id:22218022,lang:'ru'});return false}catch(e){}"/></a><!-- /Yandex.Metrika informer --><!-- Rating@Mail.ru logo --><a href="http://top.mail.ru/jump?from=2397358" target="_blank"><img src="//top-fwz1.mail.ru/counter?id=2397358;t=479;l=1" style="border:0;" height="31" width="88" alt="Рейтинг@Mail.ru" /></a><!-- //Rating@Mail.ru logo --><!--<a href='http://uptime-service.ru/address.php?id=495'><img src='http://uptime-service.ru/image.php?id=495&style=1' border='0' alt='Uptime Service' title='Uptime Service'></a><a href='http://uptime-service.ru'><img src='http://uptime-service.ru/images/baner.png' alt='Сервис мониторинга серверов' title='Uptime Service'></a>--></div><div class='down1'></div></div>