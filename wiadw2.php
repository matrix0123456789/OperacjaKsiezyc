<?
$zapytanie = "INSERT INTO `news` (`od`, `do`, `tresc`, `nr`, `tytul`, `data`, `typ`, `data2`) VALUES ('".$login."', '".$_POST['do']."', '".$_POST['tre']."', '".time()."', '".$_POST['tem']."', '".date(j).'-'.date(n).'-'.date(Y).' '.date(G).':'.date(i)."', '1', '".date("r")."')";
//echo $zapytanie;
$idzapytania = mysql_query($zapytanie);
echo '<div class="zawiad">Wys³ano!</div><br><br>';
include('wiado.php');
?>