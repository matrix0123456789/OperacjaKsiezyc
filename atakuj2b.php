<?
$odleg = sqrt((($_GET['x'] - $_POST['x']) * ($_GET['x'] - $_POST['x'])) + (($_GET['y'] - $_POST['y']) * ($_GET['y'] - $_POST['y'])));
echo 'Odleg³oœæ: '.$odleg.'<br>
Czas dolotu';


$zapytaniepo = "SELECT `id2`, `id` FROM `machzb` WHERE `x`='".$_GET['x']."' AND `y`='".$_GET['y']."' AND `login`='".$login."' AND `s` = '".$swiat."' ORDER BY `id2` ASC";
$idzapytaniapo = mysql_query($zapytaniepo);
while ($wierszregpo = mysql_fetch_row($idzapytaniapo)) 
{
if($wierszregpo[0] == $id2t)
{
$izi++;
$a=mysql_query("UPDATE `machzb` SET `dox` = '".$_POST['x']."', `doy = '".$_POST['x']."', `lot` = '".time()."' WHERE `id2` = '".$wierszregpo[0]."' and `id` = '".$wierszregpo[1]."'");
}
else
{
$ft = "SELECT `nazwa`, `waga`, `moc` FROM `mach` WHERE `id`='".$id2t."' AND `login`='".$login."' AND `s` = '".$swiat."'";
$ftg = mysql_query($ft);
while ($ftr = mysql_fetch_row($ftg)) 
{

	if($_POST['ilowoj'.$ftr[0]] > 0)
	{
		echo '<h3>'.$ftr[0].'</h3>';
		$przysp = $ftr[2] / $ftr[1];
		$czaslot = sqrt((2*$odleg)/$przysp);
		echo $przysp.'  c  '.$czaslot;
	}
}
$izi=0;
}
$id2t = $wierszregpo[0];
}
?>