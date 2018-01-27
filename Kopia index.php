<?
$sql_conn = mysql_connect('mysql1.yoyo.pl', 'db534463', 'mateusz');
mysql_select_db('db534463');
$logp = 'no';
if ($_POST['id'] == 'register_ok')
{
	if ($_POST['haslo'] == $_POST['haslo2'])
	{
		$zapytanie = "SELECT `login` FROM `user` WHERE `login`='".$_POST['login']."'";
		$idzapytania = mysql_query($zapytanie);
		while ($wierszreg = mysql_fetch_row($idzapytania)) 
		{
			$reg = $wierszreg[0];
		}
		if ($reg != $_POST['login'])
		{
			$zapytanie = "INSERT INTO `user` (`login`, `haslo`) VALUES ('".$_POST['login']."', '".$_POST['haslo']."')";
			$bsb = '2='.$zapytanie;
			$idzapytania = mysql_query($zapytanie);
		}
	}
	else
	{
		$register = 'Has³a nie s± jednakowe';
	}
}
else if ($_GET['id'] == 'logout')
{
		setcookie('login', '');
		setcookie('haslo', '');
}
if ($_COOKIE['login'] != '')
{
	$login = $_COOKIE['login'];
	$haslo = $_COOKIE['haslo'];
}
else
{
	if($_POST['login'] != '')
	{
		$login = $_POST['login'];
		$haslo = $_POST['haslo'];
		setcookie('login', $login, 2000000000);
		setcookie('haslo', $haslo, 2000000000);
	}
	else
	{
		$logp = 'no';
	}
}
if ($login != '')
{
	$zapytanie = "SELECT `haslo`, `kasa`, `work-id`, `work-time`, `kd`, `kdr` FROM `user` WHERE `login`='".$login."'";
	$idzapytania = mysql_query($zapytanie);
	while ($wiersz = mysql_fetch_row($idzapytania)) 
	{
		$hask = $wiersz[0];
		$money = $wiersz[1];
		$workid = $wiersz[2];
		$worktime = $wiersz[3];
		$kd = $wiersz[4];
		$kdr = $wiersz[5]; 
	}
	if ($hask == $haslo)
	{
		$logp = 'ok';
	}
	else
	{
		$logp = 'no';
	}
}
echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
<head>
<script type="text/javascript" src="sprzet/menu.js"></script>
<title>Operacja ksiê¿yc - gra komputerowa przez przegl±darkê.</title>
<link rel="Bookmark" title="Mkik" href="http://mkik.yoyo.pl">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2">
<link rel="Stylesheet" type="text/css" href="style.css">
</head>
<body>';


if ($logp == 'ok')
{
	echo 'Zalogowany jako:'.$login.' <a href="/?id=logout">Wyloguj</a>';
	if ($_GET['x'] != '')
	{
		$zapytanie = "SELECT `zelazo`, `caz`, `kopalnia`, `kopalniaroz` FROM `wioski` WHERE `x`='".$_GET['x']."' AND `y`='".$_GET['y']."' AND `login`='".$login."'";
		$idzapytania = mysql_query($zapytanie);
		while ($wierszreguu = mysql_fetch_row($idzapytania)) 
		{
			$caz = $wierszreguu[1];
			$zelazo = $wierszreguu[0];
			$kopalnia = $wierszreguu[2];
			if ($wierszregi[3] == '')
			{
				$z = 1;
				$godz = 30;
				while ($z < $kopalnia)
				{
					$z++;
					$godz = $godz * 1.3;
				}
				$sek = $godz / 3600;
				$zelazo1 = time() - $caz;
				$zelazo2 = $zelazo1 * $sek;
				$zelazo3 = $zelazo2 + $zelazo;
				echo 'Zelazo:'.$zelazo3;
				$zapytanie = "UPDATE `wioski` SET `caz` = '".time()."', `zelazo` = '".$zelazo3."' WHERE `x`='".$_GET['x']."' AND `y`='".$_GET['y']."' AND `login`='".$login."'";
				$idzapytania = mysql_query($zapytanie);
			}
		}
	}
}
else
{
	echo '<form method="POST" action="/">Login:<input name="login"> Has³o:<input type="password" name="haslo"><input type="submit" value="ok"> <a href="/?id=register">Zarejestruj siê</a></form>';
}
//echo $hask.' <br>'.$haslo.'<br><br><br><br>'.$zapytanie;
echo '<div class="tresc">
	<div class="menu">Menu<br>';
	echo '<a href="/">Strona g³ówna</a><br>';
	if ($logp == 'ok')
	{
		echo '<a href="/?id=kd">Kosmodrom</a><br>
		<a href="/?id=shop1">Sklep rakiet</a><br>
		<a href="/?id=mapa">Mapa ksiê¿yca</a><br>';
	}
		echo '<a href="/?id=pomoc">Pomoc</a><br><br>';
	if ($logp == 'ok')
	{
		echo 'Kasa: '.$money.'$<br>';
		$zapytanie = "SELECT `nazwa`, `X`, `Y`, `typ` FROM `wioski` WHERE `login` = '".$login."'";
		$idzapytaniaa = mysql_query($zapytanie);
		while ($wiersz = mysql_fetch_row($idzapytaniaa))
		{
			echo '<a href="?id=';
			if ($wiersz[3] == '2')
			{
				echo 'przeglad';
			}
			else if ($wiersz[3] == '1')
			{
				echo 'lot';
			}
			echo '&x='.$wiersz[1].'&y='.$wiersz[2].'">'.$wiersz[0].' ('.$wiersz[1].'|'.$wiersz[2].')</a><br>';
		}
	echo '<br>';
	}
	echo '<a href="http://www.rsactive.max-plus.pl">Katalog stron</a><br>
	<a href="http://katalog.stron.org/internet,komputery/mmorpg">Gry online</a>
<script type="text/javascript"><!--
google_ad_client = "pub-8638511152242156";
/* 160x600, operacja ksiezyc */
google_ad_slot = "1853514349";
google_ad_width = 160;
google_ad_height = 600;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
<p>
<a href="http://jigsaw.w3.org/css-validator/validator?uri=operacja-ksiezyc.yoyo.pl&profile=css21&usermedium=all&warning=1&lang=pl-PL">
    <img style="border:0;width:88px;height:31px"
        src="http://jigsaw.w3.org/css-validator/images/vcss-blue"
        alt="Poprawny CSS!">
</a>
</p>
	</div>
<div class="gl">';
//echo $aba.'<br>'.$bsb;
$str = $_GET['id'].'.php';
if ($str == '.php')
{
	$str = 'glowna.php';
}
if ($str == 'logout.php')
{
	$str = 'glowna.php';
}
include($str);
?>
</div>
<div class="stopka">Autor: matrix0123456789 (Mateusz Krawczyk) <a href="gg:7772361"><img src="http://www.gadu-gadu.pl/users/status.asp?id=7772361" border="0"></a>7772361 <a href="mailto:matrix0123456789@o2.pl"><img src="mail.png" border="0"></a>matrix0123456789@o2.pl</div></div></body></html>