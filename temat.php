<?
if($_GET['org'] != 'main')
include("orgmenu.php");
echo '<h2>'.$_GET['tem'].'</h2>';
$zapytanie = "SELECT `data2`, `tresc`, `login`, `nr` FROM `post` WHERE `org` = '".$_GET['org']."' AND `temat` = '".$_GET['nr']."' ORDER BY `data` ASC ";
$idzapytaniaw = mysql_query($zapytanie);

while ($wiersz = mysql_fetch_row($idzapytaniaw)) 
{
	//echo $no;
	$tresc = $wiersz[1];
	include('bbcode.php');
	echo '<a href="?id=gracz&gracz='.$wiersz[2].'">'.$wiersz[2].'</a> '.$wiersz[0];
	if ($wiersz[2] == $login)
	{
		echo '<a href="?id=temat&org='.$_GET['org'].'&tem='.$_GET['tem'].'&nr='.$_GET['nr'].'&edytuj='.$wiersz[3].'">edytuj</a>';
		if ($wiersz[3] == $_GET['edytuj'])
		{
			echo '<form action="?id=editpost&org='.$_GET['org'].'&tem='.$_GET['tem'].'&nr='.$_GET['nr'].'&edytuj='.$wiersz[3].'" method="POST"><textarea name="tre" cols="50" rows="5">';
		}
	}
	echo '<br>'.$tresc.'<br><br>';
	
	if ($wiersz[2] == $login)
	{
		if ($wiersz[3] == $_GET['edytuj'])
		{
			echo '</textarea><input type="submit" value="Zatwierd¼"><br></form>';
		}
	}
}
echo '<div id="nowytem"></div>
<form action="?id=dodpost&org='.$_GET['org'].'&tem='.$_GET['tem'].'&nr='.$_GET['nr'].'" method="POST"><textarea name="tre" cols="50" rows="5"></textarea><br><input type="submit" value="Odpowiedz"></form>';
$zapp = "INSERT INTO `zobtem` (`tem`, `czas`, `user`) VALUE ('".$_GET['nr']."', '".time()."', '".$login."')";
$zappa = mysql_query($zapp);
?>