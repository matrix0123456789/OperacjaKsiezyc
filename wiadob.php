<?
if($_GET['usun'] != '')
{
	mysql_query("DELETE FROM `news` WHERE `nr` = '".$_GET['usun']."' and `do` = '$login'");
}
$zapytanie = "SELECT `do`, `tytul`, `data`, `prz`, `nr` FROM `news` WHERE `od` = '".$login."' AND `typ` = '1'";
$idzapytaniaw = mysql_query($zapytanie);
//echo $zapytanie;
$wiadjest = 0;
while ($wiersz = mysql_fetch_row($idzapytaniaw)) 
{
	if($wiadjest == 0)
	echo '<table style="table-layout: fixed; width: 100%; border: 0; border-spacing: 0;">
<tr><td  style="width: 150px;">odbiorca</td><td>Temat</td><td class="monk">Data</td></tr>';
	$wiadjest = 1;
	echo '<tr><td style="width: 150px;">';

	echo '<a href="?id=gracz&gracz='.$wiersz[0].'">'.$wiersz[0].'</a>';

	echo '</td><td>';
	echo '<a href="?id=wiado2b&nr='.$wiersz[4].'">'.$wiersz[1].'</a>';

	echo '</td><td class="monk">';

	echo $wiersz[2];

	echo '</td></tr>';
}
if($wiadjest == 0)
echo 'Brak wiadomoœci';
else
echo '</table>';
?>