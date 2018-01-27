<?
$aaa = "SELECT `imie`, `nazwisko`, `id`, `ukogo`, `x`, `y`, `praca` FROM `ludzie` WHERE `id` = '".$_GET['nr']."'  AND `s` = '".$swiat."'";
$a = mysql_query($aaa);
while($aa = mysql_fetch_row($a))
{
	$xx = $aa[5];
	$yy = $aa[5];
	echo '<h2>'.$aa[0].' '.$aa[1].'</h2>';
	if ($aa[3] != 'nikt')
	echo 'Jest u '.$aa[3].'<br>';
	if ($aa[6] == 'lab')
	echo 'Pracuje w laboratorium';
	else if ($aa[6] == 'labch')
	echo 'Chce pracowaæ w laboratorium';
	else
	echo 'Turysta';
	$tux = $aa[4];
	$tuy = $aa[5];
	$tulog = $aa[3];
include('zado.php');
echo '<br>Zadowolenie: '. $zado.' w tym:<br>
Jako¶æ domu'. 10*$peeen.'<br>
Ilo¶æ kolegów w wiosce'. 10*$pen.'<br>
Dom kultury'. 10*$peeeen.'<br>
Koszt wycieczki'. 10*$paeen;
}
?>