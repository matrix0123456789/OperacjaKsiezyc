<?
$time = time();
$ms = mysql_query("SELECT * FROM `ustawienia` WHERE `co` = 'codzienakt'");
while($mss = mysql_fetch_row($ms))
{
$teraz = floor($time/86400);
$wted = $mss[1];
//echo $teraz.' '.$wted;

}
while($teraz > $wted)
{
$wted++;
$mos = mysql_query("SELECT `x`, `y`, `s`, `login`, `cenadzien`, `jedzenie`, `labcen` FROM `wioski`");
while($moss = mysql_fetch_row($mos))
{
	$kasaplus = 0;
	$jedzminus = 0;
	$zmos = mysql_query("SELECT `praca` FROM `ludzie` WHERE `x` = '".$moss[0]."' AND `y` = '".$moss[1]."' AND `s` = '".$moss[2]."'");
	//echo "SELECT * FROM `ludzie` WHERE `x` = '".$moss[0]."' AND `y` = '".$moss[1]."' AND `s` = '".$moss[2]."'";
	while($zmoss = mysql_fetch_row($zmos))
	{
		
		if($zmoss[0] == 'lab')
		$kasaplus = $kasaplus - $moss[6];
		else
		$kasaplus = $kasaplus + $moss[4];
		//echo '+'.$moss[4].'+';
		$jedzminus++;
		
	}
	
	if ($kasaplus != 0)
	{
		$mmos = mysql_query("SELECT `kasa` FROM `users` WHERE `login` = '".$moss[3]."' AND `s` = '".$moss[2]."'");
		while($mmoss = mysql_fetch_row($mmos))
		{
			$kasalus = $kasaplus + $mmoss[0];
			if(mysql_query("UPDATE `users` SET `kasa` = '$kasalus' WHERE `login` = '".$moss[3]."' AND `s` = '".$moss[2]."'"))
			echo '';
			
		}
	}
	//echo $jedzminus;
	if($jedzminus != 0)
	{
			$jedzr = $moss[5] - $jedzminus;
			$zmien = "UPDATE `wioski` SET `jedzenie` = '". $jedzr ."' WHERE `login` = '".$moss[3]."' AND `x` = '".$moss[0]."' AND `y` = '".$moss[1]."'  AND `s` = '".$swiat."'";
			if(mysql_query($zmien))
			echo '';

			
	}
	$jedzr = 0;

}	
	include('wynajdz.php');
}

mysql_query("UPDATE `ustawienia` SET `jak` = '$teraz' WHERE `co` = 'codzienakt'")
?>