<?
if($_GET['usun'] != '')
{
	mysql_query("DELETE FROM `news` WHERE `nr` = '".$_GET['usun']."' and `do` = '$login'");
}
$zapytanie = "SELECT `od`, `tytul`, `data`, `prz`, `nr`, `do` FROM `news` WHERE `od` = '".$login."' AND `typ` = '1' or `do` = '".$login."' AND `typ` = '1'";
$idzapytaniaw = mysql_query($zapytanie);
//echo $zapytanie;
$wiadjest = 0;
while ($wiersz = mysql_fetch_row($idzapytaniaw)) 
{
	if($wiadjest == 0)
	echo '<table id="tabwiad" style="table-layout: fixed; width: 100%; border: 0; border-spacing: 0;">
<tr><td style="width: 150px;">Nadawca</td><td>Temat</td><td class="monk">Data</td></tr>';
	$wiadjest = 1;
	echo '<tr><td style="width: 150px;">';
	if ($wiersz[3] == 0)
	{
		echo '<b>';
	}
	if($wiersz[0] == $login)
	echo 'odbiorca <a href="?id=gracz&gracz='.$wiersz[5].'">'.$wiersz[5].'</a>';
	else
	echo 'Nadawca: <a href="?id=gracz&gracz='.$wiersz[0].'">'.$wiersz[0].'</a>';
	if ($wiersz[3] == 0)
	{
		echo '<b>';
	}
	echo '</td><td>';
	if ($wiersz[3] == 0)
	{
		echo '<b>';
	}
	echo '<a href="?id=wiado&nr='.$wiersz[4].'" onclick="getData(\'ajax.php?x='.$_GET['x'].'&y='.$_GET['y'].'&id='.$_GET['id'].'&nr='.$wiersz[4].'\', \''.$_GET['id'].'\'); nrwiad = \''.$wiersz[4].'\'; return false;">'.$wiersz[1].'</a>';
	if ($wiersz[3] == 0)
	{
		echo '</b>';
	}
	echo '</td><td class="monk">';
	if ($wiersz[3] == 0)
	{
		echo '<b>';
	}
	echo $wiersz[2];
	if ($wiersz[3] == 0)
	{
		echo '</b>';
	}
	echo '</td><td><a href="?id=wiado&usun='.$wiersz[4].'">Usuñ</a> <a href="?id=wiadw&do='.$wiersz[0].'">Odpowiedz</a></td></tr>';
}
if($wiadjest == 0)
echo 'Brak wiadomoœci';
else
echo '</table>';
echo '<div id="wiado2">';
if($_GET['nr'] != '')
{
	$zapytanie = "SELECT `od`, `tytul`, `tresc` FROM `news` WHERE `do` = '".$login."' AND `nr` = '".$_GET['nr']."' or `od` = '".$login."' AND `nr` = '".$_GET['nr']."'";
	//echo $zapytanie;
	$idzapytaniaw = mysql_query($zapytanie);
	while ($wiersz = mysql_fetch_row($idzapytaniaw)) 
	{
		$tresc = $wiersz[2];
		include('bbcode.php');
		echo $wiersz[0].' '.$_GET['czas'].'<br>'.$tresc;
		$aa = "UPDATE `news` SET `prz` = '1' WHERE `od` = '".$wiersz[0]."' AND `do` = '".$login."' AND `tytul` = '".$wiersz[1]."' AND `tresc` = '".$wiersz[2]."'";
		$ab = mysql_query($aa);
		echo '<br><a href="?id=wiadw&do='.$wiersz[0].'">Odpowiedz</a>';
	}
}
echo '</div>';
?>