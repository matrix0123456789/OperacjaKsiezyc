<?
if($woj == 'tak')
{
echo '<a href="?id=lab&x='.$_GET['x'].'&y='.$_GET['y'].'">Ogólnie</a> <a href="?id=lab2&x='.$_GET['x'].'&y='.$_GET['y'].'">Machiny wojenne</a><br><br>';
	$mymn = mysql_query("SELECT `nazwa`, `lud`, `waga` FROM `mach` WHERE `login` = '$login' AND `s` = '$s'");
	while($mumn = mysql_fetch_row($mymn))
	{
	echo '<h3>'.$mumn[0].'</h3>
	Max ludzi: '.$mumn[1].'<br>
	Waga: '.$mumn[2].'KG</br>';
	}
echo '<a href="?id=dodmah"> Nowa maszyna wojenna</a>';
/*$mym = mysql_query("SELECT `nr` FROM `wynal` WHERE `login` = '$login' AND `s` = '$s'");
while($mum = mysql_fetch_row($mym))
{
	$mymn = mysql_query("SELECT `nazwa` FROM `wynalazki` WHERE `nr` = '$mum[0]'");
	while($mumn = mysql_fetch_row($mymn))
	{
	echo '<h3>'.$mumn[0].'</h3>';
	}
}
*/
}
?>