<?
if ($_POST['akt'] != '')
{
	$aa = "UPDATE `user` SET `gg` = '".$_POST['gg']."', `jabber` = '".$_POST['jabber']."', `e-mail` = '".$_POST['mail']."', `opis` = '".$_POST['osobie']."', `ajax` = '".$_POST['ajaxok']."', `gpasek` = '".$_POST['gpas']."' WHERE `login` = '".$login."'";
	$ab = mysql_query($aa);
}
$a = '';
$p = '';
$z = '';

$zapytaniea = "SELECT  `e-mail`, `gg`, `kd`, `opis`, `jabber` FROM `user` WHERE `login` = '".$login."'";
$idzapytaniaa = mysql_query($zapytaniea);
while ($wierszua  = mysql_fetch_row($idzapytaniaa))
{
	echo '<form method="POST" action="?id=profil" ENCTYPE="multipart/form-data"><input type="hidden" name="akt" value="tak">';

		echo '<img border="0" id="ggicon" src="http://status.gadu-gadu.pl/users/status.asp?id='.$wierszua[1].'"><input value="'.$wierszua[1].'" onkeyup="'."ggicon.src='http:/' + '/status.gadu-gadu.pl/users/status.asp?id=' + this.value".'" name="gg"></a><br>';
		echo '<img border="0" src="http://www.operacja-ksiezyc.mkik.pl/mail.png"><input value="'.$wierszua[0].'" name="mail"></a><br>';
		echo '<img border="0" src="http://www.operacja-ksiezyc.mkik.pl/mail.png"><input value="'.$wierszua[4].'" name="jabber"></a><br>';
	if($lang == 'pl')
	echo 'O sobie';
	else
	echo 'About you';
	echo '<textarea name="osobie">'.$wierszua[3].'</textarea><br>';
	if($lang == 'pl')
	echo 'korzystaj z AJAX';
	else
	echo 'Use AJAX';
	echo '<input name="ajaxok" value="ok" type="checkbox"><br>';
	if($lang == 'pl')
	echo 'informacje na górze<br>';
	else
	echo 'Top information';
	echo '<input name="gpas" value="txt" type="radio">tekstowe <input name="gpas" value="img" type="radio">Graficzne (paskowe)
	<input type="submit" value="Aktualizuj"></form>';
}
?>