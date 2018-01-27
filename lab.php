<? if($woj == 'tak') echo '<a href="?id=lab&x='.$_GET['x'].'&y='.$_GET['y'].'">Ogólnie</a> <a href="?id=lab2&x='.$_GET['x'].'&y='.$_GET['y'].'">Machiny wojenne</a><br>'; ?>
Laboratorium bada technologie.
<?
$aaza = "SELECT `lab`, `labcen` FROM `wioski` WHERE `x`='".$_GET['x']."' AND `y`='".$_GET['y']."' AND `login`='".$login."' AND `s` = '".$swiat."'";
$zqa = mysql_query($aaza);
while($a = mysql_fetch_row($zqa))
{
echo $a[0];
$i = 0;
while($i < $a[0])
{
	$maxlab = $a[0] + $maxlab;
	$i++;
	$czylab=true;
}
$pensja = $a[1];
}
if($czylab==true)
{
	echo 'Zatrudnieni /'.$maxlab.':<br>';
	$aaa = "SELECT `imie`, `nazwisko`, `id` FROM `ludzie` WHERE `praca` = 'lab' AND `ukogo` = '$login' AND `s` = '".$swiat."'";
	$a = mysql_query($aaa);
	while($aa = mysql_fetch_row($a))
	{
		$jak = $aa[2] % 10;
		echo '<a href="?id=czlowiek&nr='.$aa[2].'">'.$aa[0].' '.$aa[1].'</a> <span title="Jako¶æ">('.$jak.')</span><br>';
		$wydlab = $wydlab + $jak;
	}
	echo 'Chc±cy pracowaæ:<br>';
	$aaa = "SELECT `imie`, `nazwisko`, `id` FROM `ludzie` WHERE `praca` = 'labch' AND `ukogo` = '$login' AND `s` = '".$swiat."' limit 0,50";
	$an = mysql_query($aaa);
	while($aa = mysql_fetch_row($an))
	{
		$jak = $aa[2] % 10;
		echo '<a href="?id=czlowiek&nr='.$aa[2].'">'.$aa[0].' '.$aa[1].'</a> <span title="Jako¶æ">('.$jak.')</span><a href="?id=zat&nr='.$aa[2].'&x='.$_GET['x'].'&y='.$_GET['y'].'"> Zatrudnij</a><br>';
	}
	echo'<h2>Technologie</h2>
	Wydajno¶æ: '.$wydlab.'p.
	<h3>Twoje</h3>';
	$waa = "SELECT `nr` FROM `wynal` WHERE `login` = '".$login."' AND `s` = '".$swiat."'";
	$aw = mysql_query($waa);
	while($aaw = mysql_fetch_row($aw))
	{
		if($_POST[$aaaw[0].'zm'])
		mysql_query("UPDATE `wynal` SET `dost` = '".$_POST[$aaw[0].'zm']."' WHERE `nr` = '".$aaw[0]."'");
		$awaa = "SELECT `nr`, `nazwa`, `iledaje`, `opis`, `typ`, `waga` FROM `wynalazki` WHERE `nr` = '".$aaw[0]."'";
		$aaw = mysql_query($awaa);
		while($aaaw = mysql_fetch_row($aaw))
		{
			echo '<h3>'.$aaaw[1].'</h3>'.$aaaw[3].'<br><br> Jakoœæ:'.$aaaw[2].'<br>Typ:'.$aaaw[4].'<br>Waga:'.$aaaw[5].'KG<br><form action="?id=lab&x='.$_GET['x'].'&y='.$_GET['y'].'" method="post"><label><input type="radio" name="'.$aaaw[0].'zm" value="wlas">tylko tobie</label> <label><input type="radio" name="'.$aaaw[0].'zm" value="all">Wszystkim</label><input type="submit" value="Zmieñ"></form>';
		}
	}
	echo '<h3>Udostêpnione przez innych za darmo</h3>';
	$waa = "SELECT `nr` FROM `wynal` WHERE `dost` = 'all' AND `s` = '".$swiat."'";
	$aw = mysql_query($waa);
	while($aaw = mysql_fetch_row($aw))
	{
		$awaa = "SELECT `nr`, `nazwa`, `iledaje`, `opis`, `typ`, `waga` FROM `wynalazki` WHERE `nr` = '".$aaw[0]."'";
		$aaw = mysql_query($awaa);
		while($aaaw = mysql_fetch_row($aaw))
		{
			echo '<h3>'.$aaaw[1].'</h3>'.$aaaw[3].'<br><br> Jakoœæ:'.$aaaw[2].'<br>Typ:'.$aaaw[4].'<br>Waga:'.$aaaw[5].'KG<br>';
		}
	}
	echo '<form action="?id=cenalab&x='.$_GET['x'].'&y='.$_GET['y'].'" method="POST"><br>Pensja dzienna<input name="cena" value="'.$pensja.'"><input type="submit" value="zmieñ"></form>';
}
else
echo 'nie posiadasz laboratorium.';
?>