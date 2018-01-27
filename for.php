<?
if($_GET['org'] != 'main')
{
	include("orgmenu.php");
	$swiatorg = " AND `s` = '".$swiat."'";
}
else
$swiatorg = '';
echo  '<table style="table-layout: fixed; width: 100%; border: 0; border-spacing: 0;">';
$zap = "SELECT `tytul`, `data`, `nr` FROM `Temat` WHERE `w` = '".$_GET['org']."'".$swiatorg;
//echo $zap;
$idz = mysql_query($zap);
while ($wiersz = mysql_fetch_row($idz))
{
	$no = 0;
	$zapa = "SELECT `czas` FROM `zobtem` WHERE `tem` = '".$wiersz[2]."' AND `user` = '".$login."'".$swiatorg;
	$idza = mysql_query($zapa);
	while ($wiersza = mysql_fetch_row($idza))
	{
		if ($wiersz[1] < $wiersza[0])
		{
			$no = 1;
		}
	}
	echo '<tr><td>';
	if ($no == 0)
	{
		echo '<b>';
	}
	echo '<a href="?id=temat&org='.$_GET['org'].'&tem='.$wiersz[0].'&nr='.$wiersz[2].'">'.$wiersz[0];
	if ($no == 0)
	{
		echo '</b>';
	}
	echo '</td><td class="monk">'.date('d-m-Y ', $wiersz[1]);

	echo '</td></tr>';
}
echo '</table><a href="?id=dodtem&org='.$_GET['org'].'">';
if($lang == 'pl')
echo 'Nowy Temat</a>';
else
echo 'Add topic';
?> topic';
?>