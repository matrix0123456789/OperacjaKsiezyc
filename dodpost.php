<?
if ($_POST['tre'] != '')
{
	$time = time();
	$zapytanie = "INSERT INTO `post` (`org`, `temat`, `data`, `tresc`, `login`, `data2`) VALUES ('".$_GET['org']."', '".$_GET['nr']."', '".$time."', '".$_POST['tre']." ', '".$login."', '".date(j).'-'.date(n).'-'.date(Y).' '.date(G).':'.date(i)."')";
	$idzapytania = mysql_query($zapytanie);
	$zaz = "UPDATE `Temat` SET `data` = '".$time."' WHERE `nr` = '".$_GET['nr']."' AND `s` = '".$swiat."'";
	//echo $zaz;
	$aza = mysql_query($zaz);
	include('temat.php');
}
?>