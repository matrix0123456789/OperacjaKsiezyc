<?
$aaza = "SELECT `dom` FROM `wioski` WHERE `x`='".$_GET['x']."' AND `y`='".$_GET['y']."' AND `login`='".$login."' AND `s` = '".$swiat."'";
$zqa = mysql_query($aaza);
while($a = mysql_fetch_row($zqa))
{

$i = 0;
while($i < $a[0])
{
	$maxdom = $a[0] * 2 + $maxdom;
	$i++;
}
}
echo 'Mo¿e mieszkaæ '.$maxdom.'ludzi';
$aaa = "SELECT `imie`, `nazwisko`, `id`, `praca`, `jakos` FROM `ludzie` WHERE `x` = '".$_GET['x']."' AND `y` = '".$_GET['y']."' AND `s` = '".$swiat."' limit 0,100";
	$aew = mysql_query($aaa);
	while($aa = mysql_fetch_row($aew))
	{
		echo '<a href="?id=czlowiek&nr='.$aa[2].'">'.$aa[0].' '.$aa[1];
		if($aa[3] == 'lab')
		echo ' (Laboratorium) jakoð '.$aa[4].'';
		echo '</a><br>';
	}
?>