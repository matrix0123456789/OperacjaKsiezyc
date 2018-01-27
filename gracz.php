<?
$a = '';
$p = '';
$z = '';
$zapytaniea = "SELECT  `e-mail`, `gg`, `kd`, `czas`, `opis`, `jabber` FROM `user` WHERE `login` = '".$_GET['gracz']."'";
$idzapytaniaa = mysql_query($zapytaniea);
while ($wierszua  = mysql_fetch_row($idzapytaniaa))
{
	$z = '
		<table class="gracz"><tr><td><h3 style="height: 30px; margin: 0; padding: 0;">'.$_GET['gracz'].'</h3>'.$wierszua[4];
		
			$a = $a.'<a href="?id=wiadw&do='.$_GET['gracz'].'">';
			if ($lang == 'pl')
			$a = $a.'Napisz wiadomo¶æ';
			else 
			$a = $a.'New message';
		if ($wierszua[1] != '0')
		{	$a = $a.'</a><br><a href="gg:'.$wierszua[1].'"><img bor alt="gg:">'.$wierszua[1].'</a><br>';
		while ($i < $wierszuakd[0])
		{
			$i++;
			$p = $p + $i;
		}
		if ($wierszua[0] != '')
		{
			$a = $a.'<a href="mailto:'.$wierszua[0].'"><img border="0" src="/mail.png" alt="e-mail">'.$wierszua[0].'</a><br>';
		}
		if ($wierszua[5] != '')
		{
			$a = $a.'<a href="jabber:'.$wierszua[5].'"><img border="0" src="/mail.png">'.$wierszua[5].'</a><br>';
		}
		if ($wierszua[4] != '')
		{
		}
		if($logp == 'ok')


		if ($lang == 'pl')
		$a = $a.'<br>Ostatnio aktywny ';
		else
		$a = $a.'<br>Last active ';
		$a = $a.''.date('j-n-Y G:i', $wierszua[3]).'</td></tr><tr style="height: 30px; margin: 0; padding: 0;"><td style="height: 30px; margin: 0; padding: 0;" colspan="2"><h3 style="height: 30px; margin: 0; padding: 0;">';
	$zapytaniea = "SELECT  `kd` FROM `users` WHERE `login` = '".$_GET['gracz']."' AND `s` = '$s'";
	$idzapytaniaa = mysql_query($zapytaniea);
	while ($wierszuakd  = mysql_fetch_row($idzapytaniaa))
	{
		
		if ($lang == 'pl')
		$zax = $zax.'Punkty:';
		else
		$zax = $zax.'Points:';
		
		
		
		if ($lang == 'pl')
		$a = $a.'Wioski</h3></td></tr>';
		else
		$a = $a.'Villages</h3></td></tr>';
		$zapytanieb = "SELECT  `X`, `Y`, `fabrbud`, `kd`, `ele`, `kopalnia`, `nazwa` FROM `wioski` WHERE `login` = '".$_GET['gracz']."' AND `s` = '".$swiat."'";
		//echo $zapytanieb;
		
		$idzapytaniab = mysql_query($zapytanieb);
		while ($wierszb2 = mysql_fetch_row($idzapytaniab))
		{
			$a = $a.'<tr><td>'.$wierszb2[6].'('.$wierszb2[0].'|'.$wierszb2[1].')</td><td>';
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
		if ($lang == 'pl')
		$a = $a.'punkty:'.$pw.'<br><a href="?id=atakuj&amp;ax='.$wierszb2[0].'&amp;ay='.$wierszb2[1].'">Atakuj</a>';
		else
		$a = $a.'points:'.$pw.'<br><a href="?id=atakuj&amp;ax='.$wierszb2[0].'&amp;ay='.$wierszb2[1].'">Attack</a>';
		$zapytanic = "UPDATE `wioski` SET `p` = '".$pw."' WHERE `x`='".$_GET['x']."' AND `y`='".$_GET['y']."' AND `login`='".$_GET['gracz']."'";
		//echo $zapytanie;
		$idzapytaniac = mysql_query($zapytaniec);
		}
		$akt = $wierszua[3];
	}
}

$zapytanied = "UPDATE `users` SET `p` = '".$p."' WHERE `login`='".$_GET['gracz']."'";
$idzapytaniad = mysql_query($zapytanied);
	$a = $a.'<tr  style="height: 30px; margin: 0; padding: 0;"><td style="height: 30px; margin: 0; padding: 0;" colspan="2"><h3 style="height: 30px; margin: 0; padding: 0;">';
	if ($lang == 'pl')
	$a = $a.'Organizacje';
	else
	$a = $a.'Organizations';
	$a = $a.'</h3></td></tr>';
	$zapytanie = "SELECT `org` FROM `uwo` WHERE `login` = '".$_GET['gracz']."' AND `s` = '".$swiat."'";
	$idzapytaniaw = mysql_query($zapytanie);
	while ($wiersz = mysql_fetch_row($idzapytaniaw)) 
	{
		$a = $a.'<tr><td colspan="2"><a href="?id=org2&org='.$wiersz[0].'">'.$wiersz[0].'</a></td></tr>';
		$czyjest[$wiersz[0]] = 'tak';
	}
echo $z.'</td><td>'.$zax.$p.'<br>'.$a;
if($logp == 'ok')
{
	$zapytanie = "SELECT `org` FROM `uwo` WHERE `login` = '".$login."'";
	$idzapytaniaw = mysql_query($zapytanie);
	while ($wiersz = mysql_fetch_row($idzapytaniaw))
	{
		if($czyjest[$wiersz[0]] != 'tak')
		$a = $a.'<tr><td colspan="2"><a onclick="getData(\'?typ=dodzap&org='.$wiersz[0].'&gracz='.$_GET['gracz'].'\');">';
		if ($lang == 'pl')
		$a = $a.'Zapro¶ do ';
		else
		$a = $a.'Invite to ';
		$a = $a.$wiersz[0].'</a></td></tr>';
	}
}}




echo '</table>';
?>