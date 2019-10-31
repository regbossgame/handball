<?php

$comp_name="Гандбольный клуб «ФАКЕЛ» (Таганрог)";// название
$comp_name2="ФАКЕЛ";// название

$comp_end="";// c ( - ) зад названия

$modzen=1.0;



function htmlSubstr($html, $length)
{
    $out = '';
    $arr = preg_split('/(<.+?>|&#?\\w+;)/s', $html, -1, PREG_SPLIT_DELIM_CAPTURE);
    $tagStack = array();
    for($i = 0, $l = 0; $i < count($arr); $i++) {
        if( $i & 1 ) {
            if( substr($arr[$i], 0, 2) == '</' ) {
                array_pop($tagStack);
            } elseif( $arr[$i][0] == '&' ) {
                $l++;
            } elseif( substr($arr[$i], -2) != '/>' ) {
                array_push($tagStack, $arr[$i]);
            }
            $out .= $arr[$i];
        } else {
            if( ($l += strlen($arr[$i])) >= $length ) {
                $out .= substr($arr[$i], 0, $length - $l + strlen($arr[$i]));
                break;
            } else {
                $out .= $arr[$i];
            }
        }
    }
    while( ($tag = array_pop($tagStack)) !== NULL ) {
        $out .= '</' . strtok(substr($tag, 1), " \t>") . '>';
    }
    return $out;
}


function obrez($str,$kolko){

$str=str_replace("   "," ",$str);
$str=str_replace("  "," ",$str);
$str=str_replace("  "," ",$str);
$str=str_replace("  "," ",$str);


$rm="";
for ($ij=0;$ij<($kolko-2);$ij++){

$rm.=$str[$ij];
}
if (strlen($str)>=$kolko){$rm.="..";}

return $rm;
}

function zenka($z){
$r="";
$j=strlen($z);
for ($i=0;$i<$j;$i++){
	$r.=$z[$i];
	if (($j-$i-1)%3==0){$r.=" ";}
}

return $r;
}

function trans($str)
{
    $tr = array(
        "А"=>"A","Б"=>"B","В"=>"V","Г"=>"G",
        "Д"=>"D","Е"=>"E","Ж"=>"J","З"=>"Z","И"=>"I",
        "Й"=>"Y","К"=>"K","Л"=>"L","М"=>"M","Н"=>"N",
        "О"=>"O","П"=>"P","Р"=>"R","С"=>"S","Т"=>"T",
        "У"=>"U","Ф"=>"F","Х"=>"H","Ц"=>"TS","Ч"=>"CH",
        "Ш"=>"SH","Щ"=>"SCH","Ъ"=>"","Ы"=>"YI","Ь"=>"",
        "Э"=>"E","Ю"=>"YU","Я"=>"YA","а"=>"a","б"=>"b",
        "в"=>"v","г"=>"g","д"=>"d","е"=>"e","ж"=>"j",
        "з"=>"z","и"=>"i","й"=>"y","к"=>"k","л"=>"l",
        "м"=>"m","н"=>"n","о"=>"o","п"=>"p","р"=>"r",
        "с"=>"s","т"=>"t","у"=>"u","ф"=>"f","х"=>"h",
        "ц"=>"ts","ч"=>"ch","ш"=>"sh","щ"=>"sch","ъ"=>"y",
        "ы"=>"yi","ь"=>"","э"=>"e","ю"=>"yu","я"=>"ya",
		"№"=>"Num","+"=>"Plus","&"=>"And"
    );
	$str=strtr($str,$tr);
//	$str = preg_replace('~[^-a-z0-9_]+~u', '_', $str);
	$str = str_replace('""', '"', $str);
	$str = str_replace('"', '-', $str);
	$str = str_replace("''", "'", $str);
	$str = str_replace("'", '-', $str);
	
	
	$str = str_replace('|', '-', $str);
	$str = str_replace('%', '-', $str);
	$str = str_replace('*', '-', $str);
	$str = str_replace('?', '-', $str);
	$str = str_replace('#', '-', $str);
	$str = str_replace('<', '-', $str);
	$str = str_replace('>', '-', $str);
	$str = str_replace('`', '-', $str);	
	$str = str_replace('@', '-', $str);
	$str = str_replace(':', '-', $str);
	$str = str_replace(';', '-', $str);
	$str = str_replace('^', '-', $str);
	
	
	
	$str = str_replace('  ', '-', $str);
	$str = str_replace('/', '-', $str);
	$str=str_replace("\\", "-", $str);
	
	$str = str_replace(' ', '-', $str);
	//$str = str_replace('.', '-', $str);
	$str = str_replace(',', '-', $str);
	$str = str_replace('(', '-', $str);
	$str = str_replace(')', '-', $str);

	
	$str = str_replace("---", '-', $str);
	$str = str_replace("--", '-', $str);
	$str = str_replace("--", '-', $str);
	$str = str_replace("--", '-', $str);

	$str = str_replace("_-", '_', $str);
	$str = str_replace("-_", '_', $str);
	$str = str_replace("___", '_', $str);
	$str = str_replace("__", '_', $str);
	$str = str_replace("__", '_', $str);
	

	//$str=preg_match("/^[A-z]+$/ui", $str);
	
    $str = trim($str, "-");
    return $str;
    
}

include "conf_bd.php";

//include "bd.php";

?>