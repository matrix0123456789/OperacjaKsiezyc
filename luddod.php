<?
if ($_GET['typ'] == '')
{
	$n = 0;
	while($n < $_GET['ile'])
	{
		$los = rand(0,9);
		$aaa = "SELECT `co` FROM `propozycje` WHERE `typ` = 'imie' limit ".$los.",1";
		$a = mysql_query($aaa);
		while($aa = mysql_fetch_row($a))
		{
			$imie = $aa[0];
		}
		$los = rand(0,9);
		$bbb = "SELECT `co` FROM `propozycje` WHERE `typ` = 'nazwisko' limit ".$los.",1";
		$b = mysql_query($bbb);
		while($bb = mysql_fetch_row($b))
		{
			$nazwisko = $bb[0];
		}
		echo $imie.' '.$nazwisko.' ';
		$ccc = "INSERT INTO `ludzie` (`imie`, `nazwisko`, `ileda`, `s`) VALUES ('".$imie."', '".$nazwisko."', '". rand(0,100000) ."', '".$_GET['s']."')";
		//echo $ccc;
		$c = mysql_query($ccc);
		$n++;
		$g++;
	}
}
else
{
	$n = 0;
	$g = 0;
	while($n < $_GET['ile'])
	{
		$los = rand(0,9);
		$aaa = "SELECT `co` FROM `propozycje` WHERE `typ` = 'imie' limit ".$los.",1";
		$a = mysql_query($aaa);
		while($aa = mysql_fetch_row($a))
		{
			$imie = $aa[0];
		}
		$los = rand(0,9);
		$bbb = "SELECT `co` FROM `propozycje` WHERE `typ` = 'nazwisko' limit ".$los.",1";
		$b = mysql_query($bbb);
		while($bb = mysql_fetch_row($b))
		{
			$nazwisko = $bb[0];
		}
		echo $imie.' '.$nazwisko.' ';
		$ccc = "INSERT INTO `ludzie` (`imie`, `nazwisko`, `ileda`, `praca`, `lubi`, `jakos`, `s`) VALUES ('".$imie."', '".$nazwisko."', '". rand(0,1000) ."', '".$_GET['typ']."ch', '". rand(1, 10) ."', '". rand(1,10) ."', '".$_GET['s']."')";
		//echo $ccc;
		if(mysql_query($ccc)){
   //tu ewentualny komunikat typu "zmiany zapisano" etc.
}else{
   echo mysql_error();
   exit();
   //koñczysz dzia³anie skryptu lub wy¶wietlasz b³±d
}
		$n++;
		$g++;
	}
}
?>