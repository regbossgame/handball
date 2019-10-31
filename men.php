
<table class='menu' border=0 cellspacing=0 cellpadding=0>
<tr>
<td width=10px></td>
<?
$type="up_men";
for($i=0;$i<count($conf[$type]);$i++){
$tt="";
if ("index.php?str=".$str==$conf[$type][$i]['str']){$tt=" class='active'";$name67=$conf[$type][$i]['name'];}
if (($conf[$type][$i]['str']=="news.php")&&($str=="newso.php")){$tt=" class='active'";}
if (($conf[$type][$i]['str']=="galery.php")&&($str=="gal.php")){$tt=" class='active'";}
if (($conf[$type][$i]['str']=="video.php")&&($str=="vid.php")){$tt=" class='active'";}
if (($conf[$type][$i]['str']=="komanda.php")&&($str=="koma.php")){$tt=" class='active'";}

	echo "<td width=80px><a href='".$conf[$type][$i]['str']."'".$tt." title='".$conf[$type][$i]['title']."'>".$conf[$type][$i]['name']."</a></td>
	<td class='bb'></td>\n";
}
?>

	<td width=210px;>
			<div class="ya-site-form ya-site-form_inited_no" style="width:200px;" onclick="return {'bg': 'transparent', 'target': '_self', 'language': 'ru', 'suggest': true, 'tld': 'ru', 'site_suggest': true, 'action': 'http://yandex.ru/sitesearch', 'webopt': false, 'fontsize': 12, 'arrow': false, 'fg': '#000000', 'searchid': '2047039', 'logo': 'rb', 'websearch': false, 'type': 3}"><form action="http://yandex.ru/sitesearch" method="get" target="_self"><input type="hidden" name="searchid" value="2047039" /><input type="hidden" name="l10n" value="ru" /><input type="hidden" name="reqenc" value="" /><input type="text" name="text" value="" /><input type="submit" value="Найти" /></form></div><style type="text/css">.ya-page_js_yes .ya-site-form_inited_no { display: none; }</style><script type="text/javascript">(function(w,d,c){var s=d.createElement('script'),h=d.getElementsByTagName('script')[0],e=d.documentElement;(' '+e.className+' ').indexOf(' ya-page_js_yes ')===-1&&(e.className+=' ya-page_js_yes');s.type='text/javascript';s.async=true;s.charset='utf-8';s.src=(d.location.protocol==='https:'?'https:':'http:')+'//site.yandex.net/v2.0/js/all.js';h.parentNode.insertBefore(s,h);(w[c]||(w[c]=[])).push(function(){Ya.Site.Form.init()})})(window,document,'yandex_site_callbacks');</script>			 
		 
		 
		</a>
	</td>
	<td>
	<?
//	include "beg.php";
	?>
	</td>
	
	</tr>
	</table>

	

<?
/*
<div style='position:absolute;left:450px;top:245px;height:30px;border:1px #FF0000 solid;'>
		include "beg.php";
</div>
*/


// include "beg.php";
//<div style='width:60%;height:30px;border:1px #FF0000 solid;'>
//<div class="ya-site-form ya-site-form_inited_no" style="width:120px;height:30px;" onclick="return {'bg': 'transparent', 'target': '_blank', 'language': 'ru', 'suggest': true, 'tld': 'ru', 'site_suggest': true, 'action': 'http://yandex.ru/sitesearch', 'webopt': false, 'fontsize': 12, 'arrow': false, 'fg': '#000000', 'searchid': '2015043', 'logo': 'rb', 'websearch': false, 'type': 2}"><form action="http://yandex.ru/sitesearch" method="get" target="_blank"><input type="hidden" name="searchid" value="2015043" /><input type="hidden" name="l10n" value="ru" /><input type="hidden" name="reqenc" value="" /><input type="text" name="text" value="" /><input type="submit" value="Найти" /></form></div><style type="text/css">.ya-page_js_yes .ya-site-form_inited_no { display: none; }</style><script type="text/javascript">(function(w,d,c){var s=d.createElement('script'),h=d.getElementsByTagName('script')[0],e=d.documentElement;(' '+e.className+' ').indexOf(' ya-page_js_yes ')===-1&&(e.className+=' ya-page_js_yes');s.type='text/javascript';s.async=true;s.charset='utf-8';s.src=(d.location.protocol==='https:'?'https:':'http:')+'//site.yandex.net/v2.0/js/all.js';h.parentNode.insertBefore(s,h);(w[c]||(w[c]=[])).push(function(){Ya.Site.Form.init()})})(window,document,'yandex_site_callbacks');</script>
//</div>

?>
