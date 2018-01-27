<?
$i = 0;
if($lang == 'pl')
echo 'Oto mapa ksiê¿yca.<br>';
else
echo 'This is Moon map';
$xug = $_GET['xu']-1;
$yug = $_GET['yu']-1;
echo '<table style="border: 0pt none; table-layout: fixed; border-spacing: 0pt;" cellspacing="0"><tr><td></td><td>';
if ($_GET['xu'] == '')
{
	echo 'w górê';
}else if ($_GET['xu'] == 0)
{
echo 'w górê';
}
else
{
	echo '<a href="?id=mapa&xu='.$xug.'&yu='.$_GET['yu'].'"><img src="st-g.png" alt="w górê"></a>';
}
echo '</td><td></td></tr>
	<tr><td>';
	if ($_GET['yu'] == '')
{
echo 'w lewo';
}
else if ($_GET['yu'] == 0)
{
echo 'w lewo';
}
else
	echo '<a href="?id=mapa&xu='.$_GET['xu'].'&yu='.$yug.'"><img src="st-l.png" alt="w lewo"></a>';
	echo '</td><td><div style="background-color: #DFDFDF; width: 440px;">';

while ($i < 10)
{
echo "";
$w = 0;
while ($w < 10)
{
$obr = 0;
$zapytanie = "SELECT `typ`, `czas`, `login` FROM `wioski` WHERE `x` = '".$_GET['xu'].$i."' and `y` = '".$_GET['yu'].$w."' AND `s` = '".$swiat."'";
$idzapytaniaa = mysql_query($zapytanie);
while ($wiersz = mysql_fetch_row($idzapytaniaa))
{
	$obr = $wiersz[0];
	$tom = $wiersz[1];
	$log = $wiersz[2];
}
if ($obr == '0')
{
	echo '<a href="?id=wsli&x='.$_GET['xu'].$i.'&y='.$_GET['yu'].$w.'"';
	echo '"><img src="mapy/0.png" alt="pusto " width="40" heigh="40" border="0"></a> ';
}
else if ($obr == '1')
{
	if ($tom > time())
	{
		echo '<a href="?id=gracz&amp;gracz='.$log.'"';
		echo '" title="'.$log.'"><img src="mapy/1';
		if ($log == $login)
		{
			echo 'b';
		}
		echo '.png" alt="wioska" width="40" heigh="40" border="0"></a> ';
	}
	else
	{
		$obr = '2';
		$zap = "UPDATE `wioski` SET `typ` = '2', `czas` = '', `kd` = '1', `fabrbud`='1', `kopalnia`='1' WHERE `x`='".$_GET['xu'].$i."' AND `y`='".$_GET['yu'].$w."'  AND `s` = '".$swiat."'";
		$idzap = mysql_query($zap);
	}
}
if ($obr == '2')
{
	echo '<a href="?id=gracz&gracz='.$log.'"';
	echo '" title="'.$log.'"><img src="mapy/2';
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
$xuu = $_GET['xu'] + 1;
$yuu = $_GET['yu']+1;
echo '</div></td><td><a href="?id=mapa&xu='.$_GET['xu'].'&yu='.$yuu.'"><img src="st-p.png" alt="w prawo"></a></td></tr>
<tr><td></td><td><a href="?id=mapa&xu='.$xuu.'&yu='.$_GET['yu'].'"><img src="st-d.png" alt="w dó³"></a></td><td></td></tr></table>';
?>