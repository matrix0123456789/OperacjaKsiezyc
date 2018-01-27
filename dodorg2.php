<?
$zapytanie = "INSERT INTO `stow` (`nazwa`, `opis`, `zap`, `s`) VALUES ('".$_POST['nazwa']."', '".$_POST['opis']."', '".$_POST['wolna']."', '".$swiat."')";
//echo $zapytanie;
$idzapytania = mysql_query($zapytanie);
$zapytaniey = "INSERT INTO `uwo` (`login`, `org`, `prawa`, `s`) VALUES ('".$login."', '".$_POST['nazwa']."', '2', '$swiat')";
//echo $zapytaniey;
$idzapytaniay = mysql_query($zapytaniey);
echo '<br><div id="zawiad">Dodano organizacjê!</div>';
?>