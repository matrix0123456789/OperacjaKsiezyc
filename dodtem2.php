<?
if ($_POST['tyt'] != '')
{
	$time = time();
	$zapytanie = "INSERT INTO `Temat` (`data`, `w`, `tytul`, `s`) VALUES ('".$time."', '".$_GET['org']."', '".$_POST['tyt']."', '$swiat')";
	$idzapytania = mysql_query($zapytanie);
	$ss = "SELECT `nr` FROM `Temat` ORDER BY `nr` ASC";
	$s = mysql_query($ss);
	while($sss = mysql_fetch_row($s))
	{
		$nrt = $sss[0];
	}
	$zapytanie = "INSERT INTO `post` (`org`, `temat`, `data`, `tresc`, `login`) VALUES ('".$_GET['org']."', '".$nrt."', '".$time."', '".$_POST['tre']." ', '".$login."')";
	$idzapytania = mysql_query($zapytanie);
}
include('for.php');
?>