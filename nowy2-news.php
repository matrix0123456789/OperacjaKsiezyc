<?
if ($_POST['title'] != '')
{
$aa = "INSERT INTO `news` (`tytul`, `tresc`, `data`, `data2`, `od`) VALUES ('".$_POST['title']."', '".$_POST['tresc']."', '".date(j).'-'.date(n).'-'.date(Y).' '.date(G).':'.date(i)."', '".date("r")."', '".$login."')";
//echo $aa;
$ab = mysql_query($aa);
echo 'Dodano<br>';
}
include('glowna.php');
?>