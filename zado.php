<?
$ilouu = "SELECT count(id) as ile FROM `ludzie` WHERE `ukogo` = '".$tulog."' AND `x` = '".$tux."' AND `y` = '".$tuy."' AND `s` = '".$swiat."'";
//echo $ilouu;
$ilouz = mysql_query($ilouu);
$il = mysql_fetch_array($ilouz);
//$ludzitu = $il['ile'];
$peen = 1/$il['ile'];
$pen = 1 - $peen;
//echo $peen.'/'.$pen;
$pen = $pen * 3;//max 3, a domem kultury 3,6
$aafa = "SELECT `dom`, `kul` FROM `wioski` WHERE `x`='".$tux."' AND `y`='".$tuy."' AND `login`='".$tulog."' AND `s` = '".$swiat."'";
$af = mysql_query($aafa);
while($aas = mysql_fetch_row($af))
{
	$peeen = $aas[0] / 10;//chyba max 3
	if ($aas[1] == 1)
	{
		$peeeen = 1;//max 1
		$pen = $pen * 1.2;
	}
}

$koszt = 1000;
$paen = 1/(($koszt / 1000) + 1);
$paeen = 1.4-($paen * 1.4);
$zado = 10*($peeen + $pen + $peeeen+$paeen);?>