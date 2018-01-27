<?
$zapytanieu = "SELECT `cena` FROM `shop1` WHERE `nazwa`='".$_GET['nazwa']."'";
$idzapytaniau = mysql_query($zapytanieu);
while ($wierszy = mysql_fetch_row($idzapytaniau)) 
{
	if ($money >= $wierszy[0])
	{
		echo '<div class="zawiad">Kupiono rakietê</div></br><br>';
		$kas = $money - $wierszy[0];
		$zapytanie = "UPDATE `users` SET `kasa` = '".$kas."' WHERE `login` = '".$login."' AND `s` = '$s'";
		$idzapytania = mysql_query($zapytanie);
		$zapytanieu = "SELECT `ilo` FROM `rakiety` WHERE `rakieta`='".$_GET['nazwa']."' AND `user`='".$login."' AND `x` = 'z' and `s` = '".$swiat."'";
		//echo $zapytanieu;
		$idzapytaniau = mysql_query($zapytanieu);
		while ($wierszak = mysql_fetch_row($idzapytaniau)) 
		{
			echo "";
			$ilo = $wierszak[0];
		}
		if ($ilo == '')
		{
			$zapytanie = "INSERT INTO `rakiety` (`rakieta`, `user`, `ilo`, `x`, `s`) VALUES ('".$_GET['nazwa']."', '".$login."', '1', 'z', '".$swiat."')";
			//echo $zapytanie;
			$idzapytania = mysql_query($zapytanie);
		}
		else
		{
			$oro = $ilo + 1;
			$zapytanie = "UPDATE `rakiety` SET `ilo` = '".$oro."' WHERE `user` = '".$login."' AND `rakieta` = '".$_GET['nazwa']."' AND `x` = 'z' and `s` = '".$swiat."'";
			//echo $zapytanie;
			$idzapytania = mysql_query($zapytanie);
		}
	}
	else
	{
		echo "Brak pieniêdzy<br>";
	}
}
include('shop1.php');
?>