<?
$a = '';
$p = '';
$z = '';
$zapytaniea = "SELECT  `e-mail`, `gg`, `kd`, `czas`, `opis` FROM `user` WHERE `login` = '".$_GET['gracz']."'";
$idzapytaniaa = mysql_query($zapytaniea);
while ($wierszua  = mysql_fetch_row($idzapytaniaa))
{
	$z = '<h2>'.$_GET['gracz'].'</h2>
	Punkty:';
	if ($wierszua[1] != '0')
	{
		$a = $a.'<a href="gg:'.$wierszua[1].'"><img border="0" src="http://status.gadu-gadu.pl/users/status.asp?id='.$wierszua[1].'">'.$wierszua[1].'</a><br>';
	}
	while ($i < $wierszua[2])
	{
		$i++;
		$p = $p + $i;
	}
	if ($wierszua[0] != '')
	{
		$a = $a.'<a href="mailto:'.$wierszua[0].'"><img border="0" src="/mail.png">'.$wierszua[0].'</a><br>';
	}
	if ($wierszua[4] != '')
	{
		$a = $a.'Opis:<br>'.$wierszua[4].'<br>';
	}
	if($logp == 'ok')
	$a = $a.'<a href="?id=wiadw&do='.$_GET['gracz'].'">Napisz wiadomo¶æ</a><br><br><h2>Organizacje</h2>';
	$zapytanie = "SELECT `org` FROM `uwo` WHERE `login` = '".$_GET['gracz']."' AND `s` = '".$swiat."'";
	$idzapytaniaw = mysql_query($zapytanie);
	while ($wiersz = mysql_fetch_row($idzapytaniaw)) 
	{
		$a = $a.'<a href="?id=org2&org='.$wiersz[0].'">'.$wiersz[0].'</a><br>';
		$czyjest[$wiersz[0]] = 'tak';
	}$zapytanieb = "SELECT  `X`, `Y`, `fabrbud`, `kd`, `ele`, `kopalnia`, `nazwa` FROM `wioski` WHERE `login` = '".$_GET['gracz']."' AND `s` = '".$swiat."'";
	//echo $zapytanieb;
	$idzapytaniab = mysql_query($zapytanieb);
	while ($wierszb2 = mysql_fetch_row($idzapytaniab))
	{
		$a = $a.'<h3>'.$wierszb2[6].'('.$wierszb2[0].'|'.$wierszb2[1].')</h3>';
		$pw = 0;
		for ($i = 0;$i <= $wierszb2[2];$i++)
		{
			$pw = $pw + $i;
		}
		for ($i = 0;$i <= $wierszb2[3];$i++)
		{
			$pw = $pw + $i;
		}
		for ($i = 0;$i <= $wierszb2[4];$i++)
		{
			$pw = $pw + $i;
		}
		for ($i = 0;$i <= $wierszb2[5];$i++)
		{
			$pw = $pw + $i;
		}
	$p = $pw + $p;
	$a = $a.'punkty:'.$pw;
	
	$zapytanic = "UPDATE `wioski` SET `p` = '".$pw."' WHERE `x`='".$_GET['x']."' AND `y`='".$_GET['y']."' AND `login`='".$_GET['gracz']."'";
	//echo $zapytanie;
	$idzapytaniac = mysql_query($zapytaniec);
	}
	$akt = $wierszua[3];
}
$zapytanied = "UPDATE `user` SET `p` = '".$p."' WHERE `login`='".$_GET['gracz']."'";
$idzapytaniad = mysql_query($zapytanied);

echo $z.$p.'<br>'.$a.'<br>';

echo '<br><br>Ostatnio aktywny '.date('j-n-Y G:i', $akt).'<br>';

if($logp == 'ok')
{
	$zapytanie = "SELECT `org` FROM `uwo` WHERE `login` = '".$login."'";
	$idzapytaniaw = mysql_query($zapytanie);
	while ($wiersz = mysql_fetch_row($idzapytaniaw)) 
	{
		if($czyjest[$wiersz[0]] != 'tak')
		echo '<a href="?id=dodzap&org='.$wiersz[0].'&gracz='.$_GET['gracz'].'">Zapro¶ do '.$wiersz[0].'</a><br>';
	}
}
?>