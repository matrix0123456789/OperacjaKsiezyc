<?
$a = mysql_query("SELECT `cenalot` FROM `users` WHERE `login` = '".$login."'");
while ($ca = mysql_fetch_row($a))//zapytanie o rakiete, od razu z warunkiem ilo¶ci rakiet.
{
$cenalot = $ca[0];
}
$a = mysql_query("SELECT * FROM `rakiety` WHERE `user` = '".$login."' AND `ilo` >= '".$_POST['ilo']."' AND `rakieta` = '".$_POST['nazwa']."' AND `s` = '".$swiat."'");
while ($b = mysql_fetch_row($a))//zapytanie o rakiete, od razu z warunkiem ilo¶ci rakiet.
{
	$w = explode('|', $_POST['w']);
	
	$aa = mysql_query("SELECT `sek`, `ton` FROM `shop1` WHERE `nazwa` = '".$_POST['nazwa']."'");
	while ($bb = mysql_fetch_row($aa))//zapytanie o szas lotu rakiety
	{
		$sek = $bb[0];
		$poj = $bb[1];
	}
	$il = ceil($_POST['t'] / $poj) * 2 - 1;
	if ($il < 1)
	$il = 1;
	$cz = time() + ($il * $sek);
	
	$d = "UPDATE `rakiety` SET `odx` = '".$_POST['x']."', `ody` = '".$_POST['y']."', `lot` = '".$cz."', `x` = '".$w[0]."', `y` = '".$w[1]."' WHERE `user` = '".$login."' AND `ilo` >= '".$_POST['ilo']."' AND `rakieta` = '".$_POST['nazwa']."' AND `s` = '".$swiat."'";
	$c = mysql_query($d);//aktualizacja rakiety
	echo 'Rakieta wys³ana';
	$t = $b[0];
	if ($_POST['x'] == 'z')//je¶li wysy³a z ziemi
	{
		$dz = "UPDATE `ludzie` SET `x` = '".$w[0]."', `y` = '".$w[1]."' WHERE `ukogo` = '".$login."' AND `x` = '".$_POST['x']."' AND `s` = '".$swiat."'";
		echo $dz;
		$cz = mysql_query($dz);//aktualizacja ludzi
		$kasa = $kasa + $cenalot;
	}
	$a = mysql_query("UPDATE `users` SET `kasa` = '".$kasa."' WHERE `login` = '".$login."' AND `s` = '$s'");
}
If ($t == '')
echo '<div class="zawiad">Nie masz tyle rakiet</div>';

echo '<br><br>';
include('kd.php');
?>