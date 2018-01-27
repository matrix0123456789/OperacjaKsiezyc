<?
$zapytanie = "SELECT  `e-mail`, `gg`, `kd` FROM `user` WHERE `login` = '".$_GET['gracz']."'";
$idzapytaniaa = mysql_query($zapytanie);
while ($wierszu = mysql_fetch_row($idzapytaniaa))
{
$zapytanien = "SELECT  `kd` FROM `users` WHERE `login` = '".$_GET['gracz']."' AND `s` = '$s'";
$idzapytaniaan = mysql_query($zapytanien);
while ($wierszun = mysql_fetch_row($idzapytaniaan))
{
	$z = '<h2>'.$gracz.'</h2>
	Punkty:';
	if ($wierszu[1] != '0')
	{
		$a = $a.'<a href="gg:'.$wierszu[1].'"><img border="0" src="http://www.gadu-gadu.pl/users/status.asp?id='.$wierszu[1].'">'.$wierszu[1].'</a><br>';
	}
	while ($i < $wierszun[0])
	{
		$i++;
		$p = $p + $i;
	}
	if ($wierszu[0] != '')
	{
		$a = $a.'<a href="mailto:'.$wierszu[0].'"><img border="0" src="http://www.operacja-ksiezyc.yoyo.pl/mail.png">'.$wierszu[0].'</a><br>';
	}
	$a = $a.'<a href="?id=wiadw&do='.$gracz.'">Napisz wiadomo¶æ</a><br><br>';
	$zapytanie = "SELECT  `X`, `Y`, `fabrbud`, `kd` FROM `wioski` WHERE `login` = '".$_GET['gracz']."' AND `s` = '".$swiat."'";
	//echo $zapytanie;
	$idzapytaniaa = mysql_query($zapytanie);
	while ($wiersz = mysql_fetch_row($idzapytaniaa))
	{
		$a = $a.'('.$wiersz[0].'|'.$wiersz[1].')<br>';
		$i = 1;
		$pw = 0;
		while ($i < $wiersz[2])
		{
			$i++;
			$pw = $pw + $i;
		}
		$i = 1;
		while ($i < $wiersz[3])
		{
			$i++;
			$pw = $pw + $i;
		}
	$p = $pw + $p;
	$a = $a.$pw;
	$zapytanie = "UPDATE `wioski` SET `p` = '".$pw."' WHERE `x`='".$_GET['x']."' AND `y`='".$_GET['y']."' AND `login`='".$gracz."' AND `s` = '".$swiat."'";
	//echo $zapytanie;
	$idzapytaniaa = mysql_query($zapytanie);
	}
}
$zapytanie = "UPDATE `users` SET `p` = '".$p."' WHERE `login`='".$_GET['gracz']."' AND `s` = '$s'";
$idzapytaniaa = mysql_query($zapytanie);
?>