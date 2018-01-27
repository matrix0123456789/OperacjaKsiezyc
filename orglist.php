<?
include("orgmenu.php");
if ($_GET['zmien'] != '')
{
	if ($_GET['na'] == '2')
	{
		$upy = 2;
	}
	else
	{
		$upy = 1;
	}
	$up = "UPDATE `uwo` SET `prawa` = '".$upy."' WHERE `login` = '".$_GET['zmien']."' AND `s` = '".$swiat."'";
	$op = mysql_query($up);
	//echo $up;
}
$zapytaniea = "SELECT  `prawa` FROM `uwo` WHERE `org` = '".$_GET['org']."' AND `login` = '".$login."' AND `s` = '".$swiat."'";
$idzapytaniawa = mysql_query($zapytaniea);
while ($wiersza = mysql_fetch_row($idzapytaniawa)) 
{
	$tp = $wiersza[0];
}
$zapytanie = "SELECT `login`, `prawa` FROM `uwo` WHERE `org` = '".$_GET['org']."' AND `s` = '".$swiat."'";
$idzapytaniaw = mysql_query($zapytanie);
?>
<table style="table-layout: fixed; width: 100%; border: 0; border-spacing: 0;">
<?
while ($wiersz = mysql_fetch_row($idzapytaniaw)) 
{
	echo '<tr><td><a href="?id=gracz&gracz='.$wiersz[0].'">'.$wiersz[0].'</a></td><td>';
	if ($tp == '2')
	{
		if ($wiersz[1] == '2')
		{
			echo '<select onchange="self.location.href = this.value">
					<option VALUE="?id=orglist&zmien='.$wiersz[0].'&na=2&org='.$_GET['org'].'" selected="selected">Administrator</option>
					<option VALUE="?id=orglist&zmien='.$wiersz[0].'&na=1&org='.$_GET['org'].'">Gracz</option>
				</select>';
		}
		else
		{
			echo '<select onchange="self.location.href = this.value">
					<option VALUE="?id=orglist&zmien='.$wiersz[0].'&na=2&org='.$_GET['org'].'">Administrator</option>
					<option VALUE="?id=orglist&zmien='.$wiersz[0].'&na=1&org='.$_GET['org'].'" selected="selected">Gracz</option>
				</select>';
		}
		echo '</td></tr>';
	}
	else
	{
		if ($wiersz[1] == '2')
		{
			echo 'Administrator';
		}
		else
		{
			echo 'Gracz';
		}
		echo '</td></tr>';
	}
}
echo '</table>';
?>