<?
if ($login != '')
{
//echo '1';
	if ($lot == 'tak')
	{
		$zapytanie = "SELECT `kasa` FROM `users` WHERE `login` = '".$login."' AND `s` = '$s'";
		$idzapytaniaa = mysql_query($zapytanie);
		while ($moneya = mysql_fetch_row($idzapytaniaa))
		{
		$money = $moneya[0];
		}
		//echo ' '.$money.' ';
		if ($money >= 500000)
		{
			$money = $money - 500000;
			$aaa = "UPDATE `users` SET `kasa` = '$money' WHERE `login` = '".$login."'";
			$aza = mysql_query($aaa);
			echo '2';
		}
		else
		{
			$cw = '1';
			echo 'Nie masz do¶æ pieniêdzy (masz tylko'.$money.')';
		}//echo ' '.$money.' ';
		//echo '3';
	}
	if ($cw == '')
	{
		$zapytanie = "SELECT `sek` FROM `shop1` WHERE `nazwa` = '".$_GET['nazwa']."'";
		$idzapytaniaa = mysql_query($zapytanie);
		while ($wiersz = mysql_fetch_row($idzapytaniaa))
		{
			$oko = time() + $wiersz[0];
			$min = $wiersz[0] / 60;
			$zapytanie = "INSERT INTO `wioski` (`czas`, `x`, `y`, `login`, `typ`, `rak`, `caz`, `s`) VALUES ('".$oko."', '".$_GET['x']."', '".$_GET['y']."', '".$login."', '1', '".$_GET['nazwa']."', '".$oko."', '".$swiat."')";
			$idzapytania = mysql_query($zapytanie);
			$zapytaniez = "SELECT `ilo` FROM `rakiety` WHERE `rakieta` = '".$_GET['nazwa']."' AND `user` = '".$login."'";
			$idzapytaniz = mysql_query($zapytaniez);
			while ($wiers = mysql_fetch_row($idzapytaniz))
			{
				if ($wiers[0] == '1')
				{
					$zapytanie = "UPDATE `rakiety` SET `x` = '".$_GET['x']."', `y` = '".$_GET['y']."', `lot` = '".$oko."' WHERE `user` = '".$login."' AND `rakieta` = '".$_GET['nazwa']."' AND `x` = 'z' AND `s` = '".$swiat."'";
					//echo $zapytanie;
					$idzapytania = mysql_query($zapytanie);
				}
				else
				{
					$asa = $wiers[0] - 1;
					$zapytanie = "UPDATE `rakiety` SET `ilo` = '".$asa."' WHERE `user` = '".$login."' AND `rakieta` = '".$_GET['nazwa']."' AND `x` = 'z' AND `s` = '".$swiat."'";
					$idzapytania = mysql_query($zapytanie);
					$zapytanie = "INSERT INTO `rakiety` (`user`, `ilo`, `x`, `y`, `lot`, `s`) VALUES ('".$login."', '1', '".$login."', '".$_GET['x']."', '".$_GET['y']."', '".$oko."', '".$swiat."')";
					$idzapytania = mysql_query($zapytanie);
				}
			}
		echo "Rakieta wys³ana! Osada zostanie za³orzona za ".$min." minut!";
		}
	}
}
?>