<?
	$uac = "SELECT `nr` from `swiaty` Order By `nr` ASC";
	$uacc = mysql_query($uac);
	while ($mys = mysql_fetch_row($uacc))
	{
$a=0;
$i = 0;
$zapytaniea = "SELECT  `x`, `y`, `login` FROM `wioski` WHERE `lab` != '0' AND `s` = '".$mys[0]."'";
$idzapytaniaa = mysql_query($zapytaniea);
while ($my  = mysql_fetch_row($idzapytaniaa))
{
$aaa = "SELECT `imie`, `nazwisko`, `id` FROM `ludzie` WHERE `praca` = 'lab' AND `ukogo` = '".$my[2]."' AND `s` = '".$mys[0]."'";
$a = mysql_query($aaa);
while($aa = mysql_fetch_row($a))
{
	$jak = $aa[2] % 10;

	$wydlab = $wydlab + $jak;
}
$ii = 0;
while($ii < $wydlab)
{
$i++;
$ii++;
$prawdotab[$i] = $my[2];
}
//echo $prawdotab[rand(0, $i)];
	/*echo $my[0].' '.$my[1];
	$aaa = "SELECT `imie`, `nazwisko`, `id` FROM `ludzie` WHERE `praca` = 'lab' AND `ukogo` = '".$my[2]."' limit 0,50";
	$a = mysql_query($aaa);
	while($aa = mysql_fetch_row($a))
	{
		$jak = $aa[2] % 10;
		$i = 0;
		while($i < $jak)
		{
			$tabela[$a] = $my[2];
			echo $a;
			$i++;
			$a++;
		}
		echo '<a href="?id=czlowiek&nr='.$aa[2].'">'.$aa[0].' '.$aa[1].'</a> <span title="Jako¶æ">('.$jak.')</span><br>';
	}*/
}
$wynik = $prawdotab[rand(0, $i)];
$at = mysql_query("INSERT INTO `wynal` (`nr`, `login`, `s`) VALUES ('".rand(0, 10)."', '$wynik', '".$mys[0]."')");
}
?>