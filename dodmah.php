<?
if($woj == 'tak')
{
echo '<form action="?id=dodmah2" method="post"><input name="ludz">Ilo�� stanowisk dla ludzi<br>
<input name="nazwa">Nazwa
<h3>Nap�d</h3>
<table><tr><td>nazwa</td><td>jako��</td><td>Waga</td></tr>';
$mym = mysql_query("SELECT `nr` FROM `wynal` WHERE `login` = '$login' OR `dost` = 'all' AND `s` = '$s'");
while($mum = mysql_fetch_row($mym))
{
	$mymn = mysql_query("SELECT `nazwa`, `iledaje`, `waga` FROM `wynalazki` WHERE `typ` = 'naped' AND `nr` = $mum[0]");
	while($mumn = mysql_fetch_row($mymn))
	{
		echo '<tr><td><input type="checkbox" name="ust'.$mum[0].'" value="tak">'.$mumn[0].'</td><td>'.$mumn[1].'</td><td>'.$mumn[2].' KG</td></tr>';
	}
}
//<input type="checkbox" name="naped" value="naped2">powietrzny (silnik odrzutowy)<br>
echo '</table><h3>bro�</h3><table><tr><td>nazwa</td><td>jako��</td><td>Waga</td></tr>';
$mym = mysql_query("SELECT `nr` FROM `wynal` WHERE `login` = '$login' OR `dost` = 'all' AND `s` = '$s'");
while($mum = mysql_fetch_row($mym))
{
	$mymn = mysql_query("SELECT `nazwa`, `iledaje`, `waga` FROM `wynalazki` WHERE `typ` = 'bron' AND `nr` = $mum[0]");
	while($mumn = mysql_fetch_row($mymn))
	{
		echo '<tr><td><input type="checkbox" name="ust'.$mum[0].'" value="tak">'.$mumn[0].'</td><td>'.$mumn[1].'</td><td>'.$mumn[2].' KG</td></tr>';
	}
}echo '</table><h3>sterowanie</h3><table><tr><td>nazwa</td><td>jako��</td><td>Waga</td></tr>';
$mym = mysql_query("SELECT `nr` FROM `wynal` WHERE `login` = '$login' OR `dost` = 'all' AND `s` = '$s'");
while($mum = mysql_fetch_row($mym))
{
	$mymn = mysql_query("SELECT `nazwa`, `iledaje`, `waga` FROM `wynalazki` WHERE `typ` = 'ster' AND `nr` = $mum[0]");
	while($mumn = mysql_fetch_row($mymn))
	{
		echo '<tr><td><input type="checkbox" name="ust'.$mum[0].'" value="tak">'.$mumn[0].'</td><td>'.$mumn[1].'</td><td>'.$mumn[2].' KG</td></tr>';
	}
}echo '</table><h3>stanowiska ludzi</h3><table><tr><td>nazwa</td><td>jako��</td><td>Waga</td></tr>';
$mym = mysql_query("SELECT `nr` FROM `wynal` WHERE `login` = '$login' OR `dost` = 'all' AND `s` = '$s'");
while($mum = mysql_fetch_row($mym))
{
	$mymn = mysql_query("SELECT `nazwa`, `iledaje`, `waga` FROM `wynalazki` WHERE `typ` = 'ludzs' AND `nr` = $mum[0]");
	while($mumn = mysql_fetch_row($mymn))
	{
		echo '<tr><td><input type="checkbox" name="ust'.$mum[0].'" value="tak">'.$mumn[0].'</td><td>'.$mumn[1].'</td><td>'.$mumn[2].' KG</td></tr>';
	}
}
echo '</table><h3>inne</h3><table><tr><td>nazwa</td><td>jako��</td><td>Waga</td></tr>';
$mym = mysql_query("SELECT `nr` FROM `wynal` WHERE `login` = '$login' OR `dost` = 'all' AND `s` = '$s'");
while($mum = mysql_fetch_row($mym))
{
	$mymn = mysql_query("SELECT `nazwa`, `iledaje`, `waga` FROM `wynalazki` WHERE `typ` = 'inne' AND `nr` = $mum[0]");
	while($mumn = mysql_fetch_row($mymn))
	{
		echo '<tr><td><input type="checkbox" name="ust'.$mum[0].'" value="tak">'.$mumn[0].'</td><td>'.$mumn[1].'</td><td>'.$mumn[2].' KG</td></tr>';
	}
}
}
?></table><input type="submit" value="Zapisz"></form>