<?
if ($lang == 'pl')
echo "W sklepie mo�esz kupi� rakiety kosmiczne.".'
<table>
	<tr>
		<td>Nazwa</td>
		<td>czas lotu ziemia-ksi�yc</td>
		<td>pojemno�� ludzi</td>
		<td>pakowno�� magazynu (tony)</td>
		<td>wymagany poziom kosmodromu</td>
		<td>cena</td>
		<td> </td>
	</tr>';
	else
	echo "In shop You can buy space ships.".'
<table>
	<tr>
		<td>name</td>
		<td>Time of flight Earth-Moon</td>
		<td>pojemno�� people</td>
		<td>pakowno�� magazine (tonny)</td>
		<td>Cosmodrome must has this level</td>
		<td>price</td>
		<td> </td>
	</tr>';
$zapytanie = "SELECT `nazwa`,`czas`,`poj`,`kosmo`,`cena`, `ton` FROM `shop1`";
$idzapytania = mysql_query($zapytanie);
while ($wiersz = mysql_fetch_row($idzapytania)) 
 {
	If ($wiersz[3] <= $kd)
	{
		if ($wiersz[4] <= $money)
		{
			$h = '<a href="?id=kup&nazwa='.$wiersz[0].'">Kup</a>';
		}
		else
		{
			$h = "Za ma�o pieni�dzy";
		}
	}
	else
	{
		$h = 'Za ma�y poziom kosmodromu';
	}
	echo '<tr><td>'. $wiersz[0] .'</td><td>'. $wiersz[1] .'</td><td>'. $wiersz[2] .'</td><td>'. $wiersz[5] .'</td><td>'. $wiersz[3] .'</td><td>'. $wiersz[4] .'</td><td>'.$h.'</td></tr>';
 }
echo'</table>';
?>