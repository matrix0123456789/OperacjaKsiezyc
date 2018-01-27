<?
$zapytanie = "SELECT `login`, `p`, `czas`, `gg` FROM `user` ORDER BY `p` DESC";
$idzapytaniaw = mysql_query($zapytanie);

	if($lang == 'pl')
	echo '<table><tr><td>Nazwa</td><td>Punkty</td><td>Ostatnio aktywny</td></tr>';
	else if($lang == 'en')
	echo '<table><tr><td>Name</td><td>Points</td><td>Last active</td></tr>';
while ($wiersz = mysql_fetch_row($idzapytaniaw)) 
{
	/*echo '<tr><td><a href="?id=gracz&gracz='.$wiersz[0].'">'.$wiersz[0].'</a></td><td>'.$wiersz[1].'</td><td>';
	if ($wiersz[2] < 2000)
	{
		if($lang == 'pl')
		echo 'Brak danych';
		else if($lang == 'en')
		echo 'No data';
	}
	else
	echo date('j-n-Y G:i', $wiersz[2]);
	echo '</td><td>';
	*/
	echo '<tr><td><a href="?id=gracz&gracz='.$wiersz[0].'">'.$wiersz[0].'</a></td><td>'.$wiersz[1].'</td><td>'.date('j-n-Y G:i', $wiersz[2]).'</td><td>';
	if ($wiersz[3] != 0)
	echo '<a href="gg:'.$wiersz[3].'"><img border="0" src="http://status.gadu-gadu.pl/users/status.asp?id='.$wiersz[3].'">'.$wiersz[3].'</a>';
	echo '</td></tr>';
}
echo '</table>';
?>