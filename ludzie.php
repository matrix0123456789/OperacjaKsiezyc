<?

		$ss = "SELECT * FROM `wioski` WHERE `login` = '".$login."' AND `kon` = '1'";
		$s = mysql_query($ss);
		while(mysql_fetch_row($s))
		{
			$kon = 1;
		}
echo '<a href="?id=ludzie">Tury¶ci</a>, <a href="?id=ludzie&pra=cownicy">pracownicy</a>';
if ($_GET['pra'] == '')
{
	if($_POST['cenalot'] != '')
	{
		$asd = "UPDATE `users` SET `cenalot` = '".$_POST['cenalot']."' WHERE `login` = '".$login."' AND `s` = '$s'";
		//echo $asd;
		$z = mysql_query($asd);
		$cenalot = $_POST['cenalot'];
	}
	else
	{
		$ss = "SELECT `cenalot` FROM `users` WHERE `login` = '".$login."' AND `s` = '$s'";
		$s = mysql_query($ss);
		while($aa = mysql_fetch_row($s))
		{
			$cenalot = $aa[0];
		}
	}
	if ($_GET['id2'] != '')
	{
		if($login != '')
		{
			$zc = "UPDATE `ludzie` SET `ukogo` = '".$login."' WHERE `id` = '".$_GET['id2']."' AND `s` = '".$swiat."'";
			$k = mysql_query($zc);
		}
	}
	echo '<form action="?id=ludzie" method="POST">Jaka jest cena za przelot ziemia-ksiê¿yc?<input name="cenalot" value="'.$cenalot.'"><br>';
	//Jaka jest dzienna cena pobytu w twojej wiosce?<input name="cenadzien">
	echo '<input value="zatwierd¼" type="submit"></form><br>';
	$aaa = "SELECT `imie`, `nazwisko`, `id` FROM `ludzie` WHERE `ukogo` = '".$login."' AND `s` = '".$swiat."' limit 0,50";
	$a = mysql_query($aaa);
	while($aa = mysql_fetch_row($a))
	{
		echo $aa[0].' '.$aa[1].'<br>';
	}
	echo '<h2>Do zabrania</h2>';
	$aaa = "SELECT `imie`, `nazwisko`, `id` FROM `ludzie` WHERE `ileda` >= '".$cenalot."' AND `ukogo` = 'nikt' AND `praca` = '' AND `s` = '".$swiat."' limit 0,50";
	$a = mysql_query($aaa);
	while($aa = mysql_fetch_row($a))
	{
		echo $aa[0].' '.$aa[1].' ';
		if ($kon == 1)
		echo '<a href="?id=ludzie&id2='.$aa[2].'">Zabierz</a>';
		echo '<br>';
	}
}
else if($_GET['pra'] == 'cownicy')
{

	if($_POST['cenalot'] != '')
	{
		$asd = "UPDATE `users` SET `cenalot` = '".$_POST['cenalot']."' WHERE `login` = '".$login."' AND `s` = '$s'";
		//echo $asd;
		$z = mysql_query($asd);
		$cenalot = $_POST['cenalot'];
	}
	else
	{
		$ss = "SELECT `cenalot` FROM `users` WHERE `login` = '".$login."' AND `s` = '$s'";
		$s = mysql_query($ss);
		while($aa = mysql_fetch_row($s))
		{
			$cenalot = $aa[0];
		}
	}
	if ($_GET['id'] != '')
	{
		$zc = "UPDATE `ludzie` SET `ukogo` = '".$login."' WHERE `id` = '".$_GET['id2']."' AND `s` = '".$swiat."'";
		//echo $zc;
		$k = mysql_query($zc);
	}
	echo '<form action="?id=ludzie" method="POST">Jaka jest cena za przelot ziemia-ksiê¿yc?<input name="cenalot"><br>
	Jaka jest dzienna cena pobytu w twojej wiosce?<input name="cenadzien"><input value="zatwierd¼" type="submit"></form><br>';
	$aaa = "SELECT `imie`, `nazwisko`, `id` FROM `ludzie` WHERE `ukogo` = '".$login."' limit 0,50";
	$a = mysql_query($aaa);
	while($aa = mysql_fetch_row($a))
	{
		echo $aa[0].' '.$aa[1].'<br>';
	}
	echo '<h2>Do zabrania</h2>';
	$aaa = "SELECT `imie`, `nazwisko`, `id`, `praca`, `jakos` FROM `ludzie` WHERE `ukogo` = 'nikt' AND `praca` = 'labch' AND `s` = '".$swiat."' limit 0,50";
	$a = mysql_query($aaa);
	while($aa = mysql_fetch_row($a))
	{
		echo $aa[0].' '.$aa[1].' (Laboratorium) jakoð '.$aa[4].'';
		if ($kon == 1)
		echo '<a href="?id=ludzie&id2='.$aa[2].'">Zabierz</a>';
		echo '<br>';
	}
}
?>