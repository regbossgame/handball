<?include "cook_life.php";include "conf.php";include "fire.php";if ($ok==1){$name=$_POST['name'];$email=$_POST['email'];$code=$_POST['code'];$sql="SELECT email FROM talk WHERE email LIKE '$email'";$result = @mysql_query("$sql",$db);$k=@mysql_num_rows($result);if (($code!=$_SESSION['ff'])||($code=="")){$k=14;}if (strpos($email,"@")==false){$k=12;}if (strpos($email,".")==false){$k=12;}if ($name=="���"){$k=13;}if ($k<=0){include "genid4.php";$sql = "INSERT INTO talk (id,email,name,stat,treg) VALUES('$id22','$email','$name','0','".time()."')";$result = @mysql_query($sql,$db);$tema="��� �������� ������ - ".$comp_name2;$tema = '=?koi8-r?B?'.base64_encode(convert_cyr_string($tema, "w","k")).'?='; // ������ ���� �������� �������� �������� koi-8$msg="<a href=\"$hostname/videomail.php?vidid=".$id22."\" border=0><img src=\"".$hostname."/res/talk/email.jpg\" width=780px/></a>";$from=$adminmail;$mail=$email;	$r7=mail($mail, $tema, $msg, "Content-type: text/html; charset=\"windows-1251\" \r\n Reply-To: $from \r\n", "-f$from");if ($r7!=""){$_SESSION['mess']="<h2>�� ��� E-mail ����� ������� ������, � ������� ������� ��� �������� ������!</h2>";}else{$_SESSION['mess']="<h2>������ �� �����������, ��������� ������������ ������ ����� ��� ���������� � ����������!</h2>";}}else{	$_SESSION['mess']="<h2>�� ������ ������ ��� ���������� ������!</h2>";	if ($k==12){$_SESSION['mess']="<h2>�������� E-mail ����� - \"".$email."\"</h2>";}	if ($k==13){$_SESSION['mess']="<h2>�� �� ������� ���� ���!</h2>";}	if ($k==14){$_SESSION['mess']="<h2>�������� ��� ��������!</h2>";}}HEADER('LOCATION: message.php');}?>