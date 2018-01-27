<?
$i = 0;
echo 'Oto mapa ksiê¿yca.<br><div style="background-color: #DFDFDF; width: 440px;">';
while ($i < 10)
{
echo "";
$w = 0;
while ($w < 10)
{
$obr = 0;
$zapytanie = "SELECT `typ`, `czas`, `login` FROM `wioski` WHERE `x` = '".$i."' and `y` = '".$w."'";
$idzapytaniaa = mysql_query($zapytanie);
while ($wiersz = mysql_fetch_row($idzapytaniaa))
{
	$obr = $wiersz[0];
	$tom = $wiersz[1];
	$log = $wiersz[2];
}
if ($obr == '0')
{
	echo '<a href="?id=wsli&x='.$_GET['mx'].$i.'&y='.$_GET['my'].$w.'"';
	echo '"><img src="mapy/0.png" width="40" heigh="40" border="0"></a> ';
}
else if ($obr == '1')
{
	if ($tom > time())
	{
		echo '<a href="?id=gracz&gracz='.$log.'"';
		echo '"><img src="mapy/1';
		if ($log == $login)
		{
			echo 'b';
		}
		echo '.png" width="40" heigh="40" border="0"></a> ';
	}
	else
	{
		$obr = '2';
		$zap = "UPDATE `wioski` SET `typ` = '2', `czas` = '', `kd` = '1', `fabrbud`='1', `kopalnia`='1' WHERE `x`='".$i."' AND `y`='".$w."'";
		$idzap = mysql_query($zap);
	}
}
if ($obr == '2')
{
	echo '<a href="?id=gracz&gracz='.$log.'"';
	echo '"><img src="mapy/2';
	if ($log == $login)
	{
		echo 'b';
	}
	echo '.png" width="40" heigh="40" border="0"></a> ';
}
$w++;
}
echo '<br>';
$i++;
}
echo '</div><a href="?id=mapa&mx='.$_GET['mx'] + 1.'">></a>';
?>