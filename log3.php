<?
//error_reporting(E_ALL); // poziom raportowania, http://pl.php.net/manual/pl/function.error-reporting.php
//ini_set('display_errors', 1);

$sql_conn = mysql_connect('localhost', 'itechnolog_mkik', 'mateusz');
mysql_select_db('itechnolog_ok');

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
			$zapytanie = "INSERT INTO `user` (`login`, `haslo`, `gg`, `e-mail`) VALUES ('".$_POST['login']."', '".$_POST['haslo']."', '".$_POST['gg']."', '".$_POST['mail']."')";
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
	$login = '';
	$haslo = '';
	$logp = 'no';
}
else if ($_COOKIE['login'] != '')
{
	$login = $_COOKIE['login'];
	$haslo = $_COOKIE['haslo'];
}
else
{
	if($_GET['login'] != '')
	{
		$login = $_GET['login'];
		$haslo = $_GET['haslo'];
		setcookie('login', $login, 2000000000);
		setcookie('haslo', $haslo, 2000000000);
	}
	else if($_POST['login'] != '')
	{
		$login = $_POST['login'];
		$haslo = $_POST['haslo'];
		setcookie('login', $login, 2000000000);
		setcookie('haslo', $haslo, 2000000000);
	}
	else
	{
		$logp = 'no';
		$login = '';
		$haslo = '';
		setcookie('login', '');
		setcookie('haslo', '');
	}
}
if ($login != '')
{
	$zapytanie = "SELECT `haslo`, `kasa`, `kd`, `kdr`, `kdr2`, `cenalot` FROM `user` WHERE `login`='".$login."'";
	$idzapytania = mysql_query($zapytanie);
	while ($wiersz = mysql_fetch_row($idzapytania)) 
	{
		$hask = $wiersz[0];
		$money = $wiersz[1];
		$kd = $wiersz[2];
		$kdr = $wiersz[3]; 
		$kdr2 = $wiersz[4]; 
		$cenalot = $wiersz[5]; 
	}
	if ($hask == $haslo)
	{
		$logp = 'ok';
	}
	else
	{
		$logp = 'no';
		$login = '';
		$haslo = '';
		setcookie('login', '');
		setcookie('haslo', '');
	}
}
if ($logp == 'ok')
{
	$oka1 = "UPDATE `user` SET `czas` = '".time()."' WHERE `login` = '".$login."'";
	$oka2 = mysql_query($oka1);
}
$lang = 'pl';
if ($_GET['lang'] != '')
$lang = $_GET['lang'];
?>