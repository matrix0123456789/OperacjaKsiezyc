<?
echo $swiat;
$zapytanie = "SELECT `fabrbud`, `kd`, `kopalnia`, `bud`, `ele`, `nazwa`, `mag`, `cenadzien`, `pol`, `dom`, `lab`, `kol`, `kul`, `osl` FROM `wioski` WHERE `x`='".$_GET['x']."' AND `y`='".$_GET['y']."' AND `login`='".$login."' AND `s` = '".$swiat."'";
$idzapytania = mysql_query($zapytanie);
while ($wierszreg = mysql_fetch_row($idzapytania)) 
{
	if($lang=='pl')
	echo '<h4>Budynki:</h4>
	<a href="?id=fabryka&x='.$_GET[x].'&y='.$_GET[y].'">Fabryka budowniczych ('.$wierszreg[0].')</a><br>
	<a href="?id=kd">Kosmodrom ('.$wierszreg[1].')</a><br>
	Kopalnia ¿elaza ('.$wierszreg[2].')<br>
	<a href="?id=ele&x='.$_GET[x].'&y='.$_GET[y].'">Elektrownia ('.$wierszreg[4].')</a><br>
	Magazyn ('.$wierszreg[6].')<br>
	Os³ona ('.$wierszreg[13].')<br>
	Pole ('.$wierszreg[8].')<br>
	<a href="?id=lab&x='.$_GET['x'].'&y='.$_GET['y'].'">laboratorium('.$wierszreg[10].')</a><br>
	<a href="?id=dom&x='.$_GET['x'].'&y='.$_GET['y'].'">Domy('.$wierszreg[9].')</a><br>
	<a href="?id=kol&x='.$_GET['x'].'&y='.$_GET['y'].'">Stacja kolejowa('.$wierszreg[11].')</a><br>
	<a href="?id=lab&x='.$_GET['x'].'&y='.$_GET['y'].'">Dom kultury('.$wierszreg[12].')</a><br>
	<h4>Maszyny:</h4>
	Budowniczy ('.$wierszreg[3].')<br>';
	else
	echo '<h4>Building:</h4>
	<a href="?id=fabryka&x='.$_GET[x].'&y='.$_GET[y].'">Factory of builders ('.$wierszreg[0].')</a><br>
	<a href="?id=kd">Cosmodrome ('.$wierszreg[1].')</a><br>
	Iron mine ('.$wierszreg[2].')<br>
	<a href="?id=ele&x='.$_GET[x].'&y='.$_GET[y].'">Electrycity ('.$wierszreg[4].')</a><br>
	Magazyn ('.$wierszreg[6].')<br>
	Os³ona ('.$wierszreg[13].')<br>
	Pole ('.$wierszreg[8].')<br>
	<a href="?id=lab&x='.$_GET['x'].'&y='.$_GET['y'].'">Lab('.$wierszreg[10].')</a><br>
	<a href="?id=dom&x='.$_GET['x'].'&y='.$_GET['y'].'">Houses('.$wierszreg[9].')</a><br>
	<a href="?id=kol&x='.$_GET['x'].'&y='.$_GET['y'].'">Railway station('.$wierszreg[11].')</a><br>
	<a href="?id=lab&x='.$_GET['x'].'&y='.$_GET['y'].'">Dom kultury('.$wierszreg[12].')</a><br>
	<h4>Maszyny:</h4>
	Builders ('.$wierszreg[3].')<br>';
	$zapytaniepo = "SELECT `id2` FROM `machzb` WHERE `x`='".$_GET['x']."' AND `y`='".$_GET['y']."' AND `login`='".$login."' AND `s` = '".$swiat."' ORDER BY `id2` ASC";
$idzapytaniapo = mysql_query($zapytaniepo);
while ($wierszregpo = mysql_fetch_row($idzapytaniapo)) 
{
if($wierszregpo[0] == $id2t)
{
$izi++;
}
else
{
	$ft = "SELECT `nazwa` FROM `mach` WHERE `id`='".$id2t."' AND `login`='".$login."' AND `s` = '".$swiat."'";
	$ftg = mysql_query($ft);
	while ($ftr = mysql_fetch_row($ftg)) 
	{
	echo $ftr[0].' ('.$izi.')<br>';
	}
$izi=0;
}
$id2t = $wierszregpo[0];
}
$ft = "SELECT `nazwa` FROM `mach` WHERE `id`='".$id2t."' AND `login`='".$login."' AND `s` = '".$swiat."'";
$ftg = mysql_query($ft);
while ($ftr = mysql_fetch_row($ftg)) 
{
echo $ftr[0].' ('.$izi.')<br>';
}
$izi=0;

echo '<h3>Loty</h3>';
$zapytaniepo = "SELECT `id2`, `dox`, `doy`, `lot` FROM `machzb` WHERE `x`='".$_GET['x']."' AND `y`='".$_GET['y']."' AND `login`='".$login."' AND `lot` > 0 AND `s` = '".$swiat."' ORDER BY `id2` ASC";
$idzapytaniapo = mysql_query($zapytaniepo);
while($wierszregpo = mysql_fetch_row($idzapytaniapo))
{
if($wierszregpo[0] == $id2t)
{
$izi++;
}
else
{
	if($wierszregpo[1] == $id2t2)
	{
	$izi2++;
	}
	else
	{
		$ft = "SELECT `nazwa`, `waga`, `moc` FROM `mach` WHERE `id`='".$id2t."' AND `login`='".$login."' AND `s` = '".$swiat."'";
		$ftg = mysql_query($ft);
		while ($ftr = mysql_fetch_row($ftg)) 
		{	$odleg = sqrt((($_GET['x'] - $wierszregpo[1]) * ($_GET['x'] - $wierszregpo[1])) + (($_GET['y'] - $wierszregpo[2]) * ($_GET['y'] - $wierszregpo[2])));

				$przysp = $ftr[2] / $ftr[1];
				$czaslot = sqrt((2*$odleg)/$przysp);
				$juztrwa = time() - $wierszregpo[3];
				$procentbez  = $juztrwa / $czaslot;
				$koniec = $wierszregpo[3] + $czaslot;
				$procent = 100*$procentbez;
		echo $ftr[0].' ('.$izi.') '.$procent.'%'.$koniec.' '.$wierszregpo[3].' '.$czaslot.'<br>';

		}
		$izi2=0;
	$id2t2 = $wierszregpo[1];}
	
$id2t = $wierszregpo[0];}

}
	$ft = "SELECT `nazwa`, `waga`, `moc` FROM `mach` WHERE `id`='".$id2t."' AND `login`='".$login."' AND `s` = '".$swiat."'";
	$ftg = mysql_query($ft);
	while ($ftr = mysql_fetch_row($ftg)) 
	{	$odleg = sqrt((($_GET['x'] - $wierszregpo[1]) * ($_GET['x'] - $wierszregpo[1])) + (($_GET['y'] - $wierszregpo[2]) * ($_GET['y'] - $wierszregpo[2])));

				$przysp = $ftr[2] / $ftr[1];
				$czaslot = sqrt((2*$odleg)/$przysp);
				$juztrwa = time() - $wierszregpo[3];
				$procentbez  = $juztrwa / $czaslot;
				$koniec = $wierszregpo[3] + $czaslot;
				$procent = 100*$procentbez;
		echo $ftr[0].' ('.$izi.') '.$procent.'%'.$koniec.'<br>';

	}
	$izi2=0;
$izi=0;
	echo '<h4>Zadowolenie ';
	$tux = $_GET['x'];
	$tuy = $_GET['y'];
	$tulog = $login;
	include('zado.php');
	echo $zado.'</h4>	<form action="?id=nazwawio&x='.$_GET['x'].'&y='.$_GET['y'].'" method="POST"><input name="nazwa" value="'.$wierszreg[5].'"><br>Cena za dzieñ pobytu dla turystów<input name="cena" value="'.$wierszreg[7].'"><input type="submit" value="zmieñ"></form>';
}
?>