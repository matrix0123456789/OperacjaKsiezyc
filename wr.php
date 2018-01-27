<script>
function licz()
{
	document.getElementById('wynik').innerHTML = Math.ceil(document.getElementById('pole1').value / document.getElementById('pole2').value / <?
	$waw = "SELECT `ton` FROM `shop1` WHERE `nazwa` = '".$_GET['nazwa']."'";
	//echo $waw;
	$wow = mysql_query($waw);
	while ($wiw = mysql_fetch_row($wow))
	{
		echo $wiw[0];
	}
	?>);
	if (document.getElementById('wynik').innerHTML == '0')
	{
		document.getElementById('wynik').innerHTML = '1';
	}
}
licz();
</script>

<form action="?id=wr2" method="POST">
<p>£adunek <input onkeyup="licz()" name="t" id="pole1" />t</p>
<p>Rakiet<input onkeyup="licz()" name="ilo" id="pole2" /></p>
<input type="hidden" name="x" value="<? echo $_GET['x']; ?>">
<input type="hidden" name="y" value="<? echo $_GET['y']; ?>">
<p>Wybierz Miejsce docelowe<br>
<?
if ($_GET['x'] != 'z')
{
	echo '<input type="radio" name="w" value="z|">Ziemia<br>';
}
else
{
	$zapytanie = "SELECT `nazwa`, `X`, `Y`, `typ` FROM `wioski` WHERE `login` = '".$login."'  AND `s` = '".$swiat."'";
	$idzapytaniaa = mysql_query($zapytanie);
	while ($wiersz = mysql_fetch_row($idzapytaniaa))
	{
		echo '<input type="radio" name="w" value="'.$wiersz[1].'|'.$wiersz[2].'">('.$wiersz[1].'|'.$wiersz[2].')<br>';
	}	
}	
?></p>
<p>Rakieta obróci <span id="wynik">
<?
//if(is_numeric($_POST['pole1']) && is_numeric($_POST['pole2']))echo $_POST['pole1'] * $_POST['pole2'] / 10;
?>
</span> razy.</p>

<?
if ($_GET['x'] == 'z')
{
	echo '<h3>Zostan± zabrani</h3>';
	$aaa = "SELECT `imie`, `nazwisko`, `id` FROM `ludzie` WHERE `ukogo` = '".$login."'";
	$a = mysql_query($aaa);
	while($aa = mysql_fetch_row($a))
	{
		echo $aa[0].' '.$aa[1].'<br>';
	}
}
?>
<noscript><p>Twoja przegl±darka ma wy³±czony JavaScript i strona morze dzia³aæ niepoprawnie.</p></noscript>
<input type="submit" value="Wy¶lij"><input type="hidden" name="nazwa" value="<? echo $_GET['nazwa']; ?>"><input type="hidden" name="x" value="<? echo $_GET['x']; ?>"><input type="hidden" name="y" value="<? echo $_GET['y']; ?>"></form>