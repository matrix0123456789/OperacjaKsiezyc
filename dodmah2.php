<?
$mym = mysql_query("SELECT `nr` FROM `wynal` WHERE `login` = '$login' OR `dost` = 'all'");
while($mum = mysql_fetch_row($mym))
{
	//echo $_POST['ust'.$mum[0]].'/<br>';
	if($_POST['ust'.$mum[0]] == 'tak')
	{
		$zop = "Insert Into `machb` (`nr`, `login`, `nazwa`) VALUES ('$mum[0]', '$login', '".$_POST['nazwa']."')";
		//echo $zop;
		mysql_query($zop);
		$mymn = mysql_query("SELECT `waga` FROM `wynalazki` WHERE `nr` = $mum[0]");
		while($mumn = mysql_fetch_row($mymn))
		{
			$waga = $waga + $mumn[0];
		}
		$mymnm = mysql_query("SELECT `iledaje` FROM `wynalazki` WHERE `nr` = $mum[0] AND `typ` = 'naped'");
		while($mumnm = mysql_fetch_row($mymnm))
		{
			$moc = $moc + $mumnm[0];
		}
	}

}
$zapytaniey = "INSERT INTO `mach` (`nazwa`, `lud`, `login`, `s`, `waga`, `mocnap`) VALUES ('".$_POST['nazwa']."', '".$_POST['ludz']."', '".$login."', '$swiat', '$waga', '$moc')";
$idzapytaniay = mysql_query($zapytaniey);
?>