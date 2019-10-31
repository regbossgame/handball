<?php
/*==============================================================================
Библиотека классов для базовых функций скрипта
- логификатор
- качатель страниц
bild by Spymen (spymen1@yandex.ru, Skype: spymen_freelance)
==============================================================================*/

/*==============================================================================
Логификатор работы скриптов
==============================================================================*/
class Loger
{
	static $logs=array();
	// логируем ошибку чтения страницы
	static function bad_curl($type,$text,$url)
	{
		$f=fopen ('curl_error.log',"a");
		fwrite ($f, date("d.m.y H:m:s  ") . '== '.$type.' ===========================================' . "\n");
		fwrite ($f, $url . "\n");
		fwrite ($f, $text . "\n");
		fclose ($f);
	}
  
}

/*==============================================================================
Качатель страниц
==============================================================================*/
class Load
{
	static $time_curl=0;
	static $count_curl=0;
	static $set_cookie='';
	
	static function get_page($url,$agent,$parent) {
		//маскировка под браузер
		$mask['opera']='Opera/9.80 (Windows NT 5.1; U; ru) Presto/2.7.62 Version/11.01';
		$mask['firefox']="Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0";
		$mask['chrome']="Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.116 Safari/537.36";
		
		$t_run=microtime(true);
		Load::$count_curl++;
		// инициализируем модуль curl
		$ch = curl_init(); 
		if (!$ch) Loger::bad_curl("NOTcurl",'',"");
	
		// настраиваем CURL
		$ret = curl_setopt($ch, CURLOPT_URL,            "$url"); 	// адресс
		$ret = curl_setopt($ch, CURLOPT_HEADER,         0);			// читать заголовок
		$ret = curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);			//разрешить переадресацию
		$ret = curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);			//вывод в переменную
		$ret = curl_setopt($ch, CURLOPT_TIMEOUT,        30);		//тайм аут ожидания
		$ret = curl_setopt($ch, CURLOPT_USERAGENT,$mask[$agent]);	//маскируемся под браузер
		//$ret = curl_setopt($ch, CURLOPT_REFERER, $parent);			прикидываемся что пришли откуда то
		
		if (Load::$set_cookie<>'') $ret = curl_setopt($ch, CURLOPT_COOKIE, Load::$set_cookie); // прописываем куки

		// скачиваем страницу
		$ret = curl_exec($ch);
	
		// проверяем ликвидность результата
		if (empty($ret)) { Loger::bad_curl('Not load page',curl_error($ch),$url);
			curl_close($ch); // close cURL handler
			return "err";
		} else {
			//проверяем возвращённый код
			$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			if ($httpcode<>200) {
				Loger::bad_curl('Ret bad code',$httpcode,$url);
			}
			return $ret;
		}
		Load::$time_curl=Load::$time_curl + microtime(true) - $t_run;
	}
}

?>
