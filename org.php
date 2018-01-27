<?
if($lang=='pl')
echo "<h2>Organizacje w których jesteœ</h2>";
else
echo "<h2>You are in this organizations</h2>";
	$zapytanie = "SELECT `org` FROM `uwo` WHERE `login` = '".$login."' AND `s` = '".$swiat."'";
	$idzapytaniaw = mysql_query($zapytanie);
	while ($wiersz = mysql_fetch_row($idzapytaniaw)) 
	{
		echo '<a href="?id=org2&org='.$wiersz[0].'">'.$wiersz[0].'</a><br>';
	}
if($lang=='pl')
echo "<h2>Lista organizacji</h2>";
else
echo "<h2>List of organizations</h2>";
	$zapytanie = "SELECT `nazwa` FROM `stow` WHERE `s` = '".$swiat."' ORDER BY `nazwa` DESC ";
	$idzapytaniaw = mysql_query($zapytanie);
	while ($wiersz = mysql_fetch_row($idzapytaniaw)) 
	{
		echo '<a href="?id=org2&org='.$wiersz[0].'">'.$wiersz[0].'</a><br>';
	}
if($lang=='pl')
echo "<h2>Zaproszenia</h2>";
else
echo "<h2>Invites</h2>";
	$zapytanie = "SELECT `tytul` FROM `news` WHERE `do` = '".$login."' AND `typ` = '2'";
	$idzapytaniaw = mysql_query($zapytanie);
	while ($wiersz = mysql_fetch_row($idzapytaniaw)) 
	{
		echo '<a href="?id=org2&org='.$wiersz[0].'">'.$wiersz[0].'</a><br>';
	}
if($lang=='pl')
echo '<br><a href="?id=dodorg">Stwórz organicacjê</a>';
else
echo '<br><a href="?id=dodorg">Make a organization</a>';
?>