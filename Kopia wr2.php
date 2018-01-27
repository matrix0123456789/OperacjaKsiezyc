<?
$zapytaniea = "SELECT `ilo` FROM `rakiety` WHERE `user` = '".$login."' AND `rakieta` = '".$_POST['nazwa']."' AND `x` = '".$_POST['x']."' AND `y` = '".$_POST['y']."'";
//echo $zapytaniea;
$idzapytaniaa = mysql_query($zapytaniea);
while ($wiersza = mysql_fetch_row($idzapytaniaa))
{
	//echo '1';
	$zapytanieb = "SELECT `czas`, `ton` FROM `shop1` WHERE `nazwa` = '".$_POST['nazwa']."'";
	//echo $zapytanie;
	$idzapytaniab = mysql_query($zapytanieb);
	while ($wiersb = mysql_fetch_row($idzapytaniab))
	{
		//echo '2';
		$ile = $_POST['t'] / $_POST['ilo'] / $wiersb[1];//ile razy obraca
		$wiersu = $wiersb[0] * 60;
		$aaaa = $wiersu * 2;
		$aaab = $aaaa * $ile;
		$aaac = $aaab - $wiersu;
		$lot = time() + $aaac;
		$w = explode("|", $_POST['w']);
		$z = ", `x` = '".$w[0]."', `y` =  '".$w[1]."'";
		if ($wiersza[0] ==  $_POST['ilo'])
		{
			$zapytaniec = "UPDATE `rakiety` SET `lot` = '".$lot."'".$z.", `z` = '".$_POST['t']."' WHERE `user` = '".$login."' AND `rakieta` = '".$_POST['nazwa']."' AND `x` = '".$_POST['x']."' AND `y` = '".$_POST['y']."'";
			//echo $zapytanie;
			$idzapytaniac = mysql_query($zapytaniec);
			echo 'Wys³ano';
			$a = 1;
		}
		else if ($wiersza[0] > $_POST['ilo'])
		{
			$ilo = $wiersza[0] - $_POST['ilo'];
			$zapytanied = "UPDATE `rakiety` SET `ilo` = '".$ilo."' WHERE `user` = '".$login."' AND `rakieta` = '".$_POST['nazwa']."' AND `x` = '".$_POST['x']."' AND `y` = '".$_POST['y']."'";
			$idzapytaniad = mysql_query($zapytanied);
			$zapytaniee = "INSERT INTO `rakiety` (`rakieta`, `ilo`, `x`, `y`, `user`, `lot`, `z`) VALUES ('".$_POST['nazwa']."', '".$_POST['ilo']."', '".$w[0]."', '".$w[1]."', '".$login."', '".$lot."', '".$_POST['t']."')";
			$idzapytaniae = mysql_query($zapytaniee);
			echo 'Wys³ano';
			$a = 1;
		}
		else
		{
			echo 'Nie masz tylu rakiet!';
		}
		if ($a == 1)
		{
			if($_POST['x'] != 'z')
			{
				if ($zelazo3[0] >= $_POST['t'])
				{
					$zelazo3 = $zelazo3 - $_POST['t'];
					$zapytanied = "UPDATE `wioski` SET `zelazo` = '".$zelazo3."' WHERE `user` = '".$login."' AND `x` = '".$_POST['x']."' AND `y` = '".$_POST['y']."'";
					$idzapytaniad = mysql_query($zapytanied);
				}
				else
				{
					echo 'Za ma³o ¿elaza.';
				}
			}
		}
	}
}
echo '<br><br>';
include('kd.php');
?>