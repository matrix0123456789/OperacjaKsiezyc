<? 

if($woj == 'tak') echo '<a href="?id=fabryka&x='.$_GET['x'].'&y='.$_GET['y'].'">Ogólnie</a> <a href="?id=fabryka2&x='.$_GET['x'].'&y='.$_GET['y'].'">Machiny wojenne</a><br><table><tr><td>Nazwa</td><td>Ile siê buduje</td></tr>';
$zaptd = "SELECT `ilo`, `nazwa`, `czas`, `id`, `id2` FROM `machil` WHERE `login` = '$login' AND `s` = '$s' AND `x` = '".$_GET['x']."' AND `y` = '".$_GET['y']."'";
//echo $zaptd;

$zsm = mysql_query($zaptd);
while($zssm = mysql_fetch_row($zsm))
{
	if($zssm[0] != 0)
	{
		$zsmw = mysql_query("SELECT `waga` FROM `mach` WHERE `id` = '".$zssm[4]."'");
		while($zssmw = mysql_fetch_row($zsmw))
		{
			$czasraz = $zssmw[0];
		}
		$ilerazy = ceil((time() - $zssm[2])/$czasraz)-1;
		if($zssm[0] < $ilerazy)
		$ilerazy = $zssm[0];
		else
		$ilon = $zssm[0] - $ilerazy;
		$nczas = $zssm[2] + ($czasraz * $ilerazy);
		//echo $ilerazy.' - '.$nczas.' - '.$ilon.'<br>';
		$ilerazj = 0;
		while($ilerazy > $ilerazj)
		{
				$zapytanie = "INSERT INTO `machzb` (`login`, `x`, `y`, `s`, `id2`) VALUES ('$login', '".$_GET['x']."', '".$_GET['y']."' , '$s', '".$zssm[4]."')";
							//echo $zapytanie;
				$idzapytania = mysql_query($zapytanie);
				$ilerazj++;
		}
		if($nczas > 0)
	mysql_query("UPDATE `machil` SET `czas` = '$nczas', `ilo` = '$ilon' WHERE `id` = '".$zssm[3]."' AND `login` = '$login' AND `s` = '$s'");
	else
	mysql_query("DELETE FROM`machil` WHERE `id` = '".$zssm[3]."' AND `login` = '$login' AND `s` = '$s'");
		echo '<tr><td>'.$zssm[1].'</td><td>'.$zssm[0].'</td></tr>';
	}
}
echo '</table><form action="?id=fabryka2&bud=woj&x='.$_GET['x'].'&y='.$_GET['y'].'" method="post">
<table><tr><td>Nazwa</td><td>Max ludzi</td><td>Waga</td><td>ile budowaæ</td></tr>';
$mym = mysql_query("SELECT `nazwa`, `lud`, `waga`, `id` FROM `mach` WHERE `login` = '$login' AND `s` = '$s'");
while($mum = mysql_fetch_row($mym))
{

$ilomumz = 0;
$on = 0;
//echo $_POST['ilb'.$mum[3]].' - '.'ilb'.$mum[3]; 
	if($_POST['ilb'.$mum[3]] > 0)
	{
		//echo ',';
			$zapytanie = "INSERT INTO `machil` (`ilo`, `nazwa`, `x`, `y`, `s`, `czas`, `login`, `id2`) VALUES ('".$_POST['ilb'.$mum[3]]."', '".$mum[0]."', '".$_GET['x']."', '".$_GET['y']."' , '$s', '".time()."', '$login', '".$mum[3]."')";
						//echo $zapytanie;
			$idzapytania = mysql_query($zapytanie);
	}




	echo '<tr><td>'.$mum[0].'</td>
	<td>'.$mum[1].'</td>
	<td>'.$mum[2].'KG</td>
	<td><input name="ilb'.$mum[3].'"></td></tr>';

}?></table><input type="submit" value="buduj"></form>