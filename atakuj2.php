<?
$izi=0;
$odleg = sqrt((($_GET['x'] - $_POST['x']) * ($_GET['x'] - $_POST['x'])) + (($_GET['y'] - $_POST['y']) * ($_GET['y'] - $_POST['y'])));
echo 'Odleg³oœæ: '.$odleg.'<br>
Czas dolotu';


$zapytaniepo = "SELECT `id2`, `id` FROM `machzb` WHERE `x`='".$_GET['x']."' AND `y`='".$_GET['y']."' AND `login`='".$login."' AND `s` = '".$swiat."' ORDER BY `id2` ASC";
$idzapytaniapo = mysql_query($zapytaniepo);
while ($wierszregpo = mysql_fetch_row($idzapytaniapo)) 
{
echo $wierszregpo[0].' == '.$id2t.' [] ';
if($wierszregpo[0] != $id2t)
$izi=0;
	
	echo $_POST['ilowoj'.$wierszregpo[0]].' > '.$izi;
	echo 'ilowoj'.$wierszregpo[0];
	if($_POST['ilowoj'.$wierszregpo[0]] > $izi)
	{
		$ama = "UPDATE `machzb` SET `dox` = '".$_POST['x']."', `doy` = '".$_POST['x']."', `lot` = '".time()."' WHERE `id2` = '".$wierszregpo[0]."' and `id` = '".$wierszregpo[1]."'";
		echo $ama;
		$a=mysql_query($ama);	
		//echo $ama;
		//echo '<br> - if - ';
	}$izi++;
/*}
else
{
$ft = "SELECT `nazwa`, `waga`, `moc` FROM `mach` WHERE `id`='".$id2t."' AND `login`='".$login."' AND `s` = '".$swiat."'";
$ftg = mysql_query($ft);
while ($ftr = mysql_fetch_row($ftg)) 
{
	echo 'ilowoj'.$wierszregpo[0];
	if($_POST['ilowoj'.$wierszregpo[0]] > 0)
	{
		echo '<h3>'.$ftr[0].'</h3>';
		$przysp = $ftr[2] / $ftr[1];
		$czaslot = sqrt((2*$odleg)/$przysp);
		echo $przysp.'  c  '.$czaslot;
		$ama = "UPDATE `machzb` SET `dox` = '".$_POST['x']."', `doy` = '".$_POST['x']."', `lot` = '".time()."' WHERE `id2` = '".$wierszregpo[0]."' and `id` = '".$wierszregpo[1]."'";
		echo $ama;
		$a=mysql_query($ama);	
		//$a=mysql_query("UPDATE `machzb` SET `dox` = '".$_POST['x']."', `doy` = '".$_POST['x']."', `lot` = '".time()."' WHERE `id2` = '".$wierszregpo[0]."' AND `dox` = '' AND `doy` = '' LIMIT 0,");
	}
}
$izi=0;
}
$id2t = $wierszregpo[0];
*/}
$izi=0;
?>