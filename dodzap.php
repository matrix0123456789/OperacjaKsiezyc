<?
$a = "INSERT INTO `news` (`nr`, `od`, `do`, `typ`, `tytul`, `data2`) VALUES ('".time()."', '".$login."', '".$_GET['gracz']."', '2', '".$_GET['org']."', '".date("r")."')";
$b = mysql_query($a);
echo '<div id="zawiad">Zaproszono!</div><BR><BR>';
include('gracz.php');
?>