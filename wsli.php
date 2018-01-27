<?
if ($lot == 'tak')
{
	echo "Masz ju¿ wioskê! Kolejna kosztuje 500 000$.<br>";
}
echo 'Wybierz rakietê
<table>
<tr><td>Nazwa</td><td>czas lotu (min.)</td><td> </td></tr>';
$zapytanie = "SELECT `rakieta` FROM `rakiety` WHERE `user` = '".$login."' AND `s` = '".$swiat."'";
$idzapytaniaa = mysql_query($zapytanie);
while ($wiersz = mysql_fetch_row($idzapytaniaa))
{
	$zapytanie = "SELECT `czas` FROM `shop1` WHERE `nazwa` = '".$wiersz[0]."'";
	$idzapytania = mysql_query($zapytanie);
	while ($wiers = mysql_fetch_row($idzapytania))
	{	
		echo '<tr><td>'.$wiersz[0].'</td><td>'.$wiers[0].'</td><td><a href="?id=wsli2&x='.$_GET['x'].'&y='.$_GET['y'].'&nazwa='.$wiersz[0].'">wy¶lij</a></td></tr>';
	}
}
echo "</table>";
?>