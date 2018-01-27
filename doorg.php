<?
//echo '1';
$zapytanie = "INSERT INTO `uwo` (`login`, `org`, `s`) VALUES ('".$login."', '".$_GET['org']."', '".$swiat."')";
//echo '2';
$idzapytania = mysql_query($zapytanie);
//echo $zapytanie;
echo '<div class="zawiad">Do³±czono!</div>';
include('org2');
?>