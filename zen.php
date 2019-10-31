<?
	//$zen0=$zen0*$modzen;

	if (($zen0>0.00)&&($zenz0==0)){$zenz0=$zen0*1.7;}

	if (($zen0==0)&&($zenz0>0.00)){$zen0=$zenz0;}
	
	if (($zenz0<=0.001)&&($zen0<=0.001)){
	$zen0="Нет цены!";
	}else{
	$zen0=$zenz0*$modzen;
	
	$zen0=round($zen0,2);
	if (strlen(end(explode(".",$zen0)))==1){$zen0.="0";}
	if (round($zen0)==$zen0){$zen0.=".00";}
	
	$zent0=$zen0;
	
	$ez6=explode(".",$zen0);
	if (strlen($ez6[0])>3){$ez6[0]=rtrim(zenka($ez6[0]));}
		
		$ez6[1]="<span style=\"font-size:8pt;\">.".$ez6[1]."</span>";
		$zen0=$ez6[0].$ez6[1];
	//}
	
	//$ez6=explode(".",$zen0);
	//if (strlen($ez6[0])>3){$zen0=zenka($ez6[0]).".".end($ez6);}
	
	}
	
	
?>