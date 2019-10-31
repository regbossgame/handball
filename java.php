<?
/*$rej="setTimeout('begu(0,0);',10);

function begu(k,p){
k+=0.02175438;
if (k>6.28){k=0;}
p+=0.0164386351;
if (p>6.28){p=0;}

id=document.getElementById('begi');
id.style.color=rgb2hex(Math.abs(Math.round(Math.sin(k)*175))+10,10,Math.abs(Math.round(Math.cos(p)*175))+10);
setTimeout('begu('+k+','+p+');',20);
}


*/
/*
$ref="function rnd() {
   return rnd.arguments[Math.floor(Math.random()*rnd.arguments.length)]
}



\n";
*/
//if (($kpos>=0)&&($_SESSION['adm_en']==1)){
$rej.= "setTimeout('tita2();',100);

function delka(bd,id){
  if (confirm('Вы действительно хотите удалить объект('+bd+') ID={'+id+'}?')){
	  self.location='del.php?bd='+bd+'&id='+id;
}

}


function delka2(path,obj){
      if (confirm('Вы действительно хотите удалить {object:'+obj+'}?')){
		self.location='delimg2.php?path='+path+'&name='+obj;
}
}

function delka3(path){
      if (confirm('Вы действительно хотите удалить {object:'+path+'}?')){
		self.location='delalbum.php?path='+path;
}
}

function tita2(){
	id=document.getElementById('tita');
	if (id!=null){if (id.value==''){id.style.background='#FF0000';}else{id.style.background='#00FF00';}}
}

\n";

$rej.= "\n

function rand( min, max ) {	// Generate a random integer

	if( max ) {
		return Math.floor(Math.random() * (max - min + 1)) + min;
	} else {
		return Math.floor(Math.random() * (min + 1));
	}
}

function rgb2hex(r,g,b)
{
 return Number(r).toString(16).toUpperCase().replace(/^(.)$/,'0$1') + 
 Number(g).toString(16).toUpperCase().replace(/^(.)$/,'0$1') +
 Number(b).toString(16).toUpperCase().replace(/^(.)$/,'0$1');
}

var firt=0;

function fires(id,k){
if (k==0){clearTimeout(firt);}
obj=document.getElementById('inp_'+id);
if (k==0){document.getElementById('koi').src='res/koi.gif?rnd='+rand(10000,9999999);}
k++;



if (obj!=null){obj.style.background=rgb2hex(k*10,255,k*10);}
if (k<25){firt=setTimeout('fires('+id+','+k+');',15);}else{document.getElementById('koi').src='res/koi.png'}

}

function usl(id){

var key = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
if (key == 13){ 
	self.location='add_kor.php?id='+id+'&set=1&kol='+document.getElementById('inp_'+id).value;
}
}";

//}

/*
$rej.= "\n
var kslides=".($kslides-1).";
var sli=rand(0,kslides);

var slides=new Array();
\n";


for($i=0;$i<$kslides;$i++){
$rej.="slides[".$i."]='".$slides[$i]."';\n";
}


$rej.="\n
 if (kslides>0){setTimeout('slide(rand(0,'+kslides+'));',2000);}
 
function slide(n){
document.getElementById('slima').src='slides/'+slides[n];
setTimeout('slide(rand(0,'+kslides+'));',3200);
}";


file_put_contents("java.js",$rej);
*/
echo "<script>
 $rej
 
 
 var galy=0;

function gal(url,k){
	galy=k;
	document.getElementById('galko1').src=url;
}

function sh2(id){ // выделить
	id.style.backgroundColor = '#CBCBCB';
	id.style.color='#c00000';
	id.className='alf08';
}

function hd2(id){ // убрать
	id.style.backgroundColor = 'transparent';
	id.style.color='#000000';
	id.className='alf1';
}

 

 
 function makeRequest22(url,params)
{
var http_request = false;
if (window.XMLHttpRequest) 
{ // Mozilla, Safari, ...
http_request = new XMLHttpRequest();
if (http_request.overrideMimeType) 
{
http_request.overrideMimeType('text/xml');
}
} 
else if (window.ActiveXObject) 
{ // IE
try 
{
http_request = new ActiveXObject(\"Msxml2.XMLHTTP\");
} 
catch (e) 
{
try 
{
http_request = new ActiveXObject(\"Microsoft.XMLHTTP\");
} catch (e) {}
}
}

if (!http_request) 
{
alert('Невозможно отобразить данные на странице');
return false;
}

http_request.onreadystatechange = function() { alertContents22(http_request,params); };
http_request.open('POST', url, true);
http_request.setRequestHeader(\"Content-type\", \"application/x-www-form-urlencoded\");
http_request.setRequestHeader(\"Content-length\", params.length);
http_request.setRequestHeader(\"Connection\", \"close\");
http_request.send(params);
}

function alertContents22(http_request,params) 
{
if (http_request.readyState == 4) 
{
if (http_request.status == 200) 
{

rt=http_request.responseText;
if (params=='type=1'){
if (rt!='-'){
if (document.getElementById('imka').innerHTML!=rt){document.getElementById('imka').innerHTML=rt;}
}
}


if (params=='0'){
	da=new Array();
	da=rt.split(';');
	if (da[1]!='-'){
	document.getElementById('inp_'+da[0]).value='1';
	document.getElementById('kola').innerHTML=da[1];
	document.getElementById('kora').innerHTML=da[2];
	
	}
	
}

if (params=='1'){
	document.getElementById('par33').innerHTML=rt;
}




}else{}
}
}
 
 
</script>";

//file_put_contents("java.js",$rej);
?>