<?
include('wiado.php');
$zapytanie = "SELECT `od`, `tytul`, `tresc` FROM `news` WHERE `do` = '".$login."' AND `nr` = '".$_GET['nr']."'";
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
?>