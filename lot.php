<?
$zapytanie = "SELECT `rak`, `czas` FROM `wioski` WHERE `x`='".$_GET['x']."' AND `y`='".$_GET['y']."' AND `login`='".$login."' AND `s` = '".$swiat."'";
$idzapytaniaa = mysql_query($zapytanie);
while ($wiersz = mysql_fetch_row($idzapytaniaa))
{
	if ($wiersz[1] > time())
	{
		$zapytanie = "SELECT `sek` FROM `shop1` WHERE `nazwa` = '".$wiersz[0]."'";
		$idzapytaniaa = mysql_query($zapytanie);
		while ($wiersza = mysql_fetch_row($idzapytaniaa))
		{
			$t = $wiersz[1] - $wiersza[0];
			$a = time() - $t;
			$b = $a / $wiersza[0];
			$c = $b * 232;
			$d = $c + 182;
			$f = $wiersza[0] - $a;
			$e = $f / 60;
			$g = ceil($e);
			echo '<span class="pasekpost"><span style="width: '. $b*100 .'%">'. $b*100 .'%</span></span>
			<span style="color: #0F0;"> Osada zostanie za³orziona za '.$g.'min.</span>';
		}
	}
	else
	{
	include('przeglad.php');
	}
}
?>