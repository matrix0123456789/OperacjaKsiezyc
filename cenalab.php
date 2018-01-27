<?
$s = mysql_query("UPDATE `wioski` SET `labcen` = '".$_POST['cena']."' WHERE `x`='".$_GET['x']."' AND `y`='".$_GET['y']."' AND `login`='".$login."' AND `s` = '".$swiat."'");
include('lab.php');
?>