<?
//error_reporting(E_ALL); // poziom raportowania, 
error_reporting(E_ERROR | E_WARNING | E_PARSE); // poziom raportowania, http://pl.php.net/manual/pl/function.error-reporting.php4
ini_set('display_errors', 1);
//header('text/html; charset=iso-8859-2');
$woj = 'tak';
$sql_conn = mysql_connect('localhost', 'itechnolog_mkik', 'mateusz');
mysql_select_db('itechnolog_ok');
$hasloz = base64_encode(sha1(base64_encode($_POST['haslo'])).md5(sha1(base64_encode($_POST['haslo']))).md5(sha1(base64_encode($_POST['login']))));
$cap = 'ok';
if ($_GET['hid2'] != '')
$cap = 'no';
if ($_GET['hid3'] != '')
$cap = 'no';
if ($_POST['hid'] == '')
{
	if ($_POST['cap'] != 'Monika')
	$cap = 'no';
}
else if ($_POST['hid'] == '?')
{
	if ($_POST['cap'] != '')
	$cap = 'no';
}
else
$cap = 'no';
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
			$zapytanie = "INSERT INTO `user` (`login`, `haslo`, `gg`, `e-mail`, `jabber`) VALUES ('".$_POST['login']."', '".$hasloz."', '".$_POST['gg']."', '".$_POST['mail']."', '".$_POST['jabber']."')";
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
	setcookie('loginok', '');
	setcookie('haslook', '');
	$login = '';
	$haslo = '';
	$logp = 'no';
}
else if ($_COOKIE['loginok'] != '')
{
	$login = $_COOKIE['loginok'];
	$haslo = $_COOKIE['haslook'];
}
else
{
	if($_GET['login'] != '')
	{
		$login = $_GET['login'];
		$haslo = $_GET['haslo'];
		setcookie('loginok', $login, 2000000000);
		setcookie('haslook', $haslo, 2000000000);
	}
	else if($_POST['login'] != '')
	{
		$login = $_POST['login'];
		$haslo = $_POST['haslo'];
		setcookie('loginok', $login, 2000000000);
		setcookie('haslook', $haslo, 2000000000);
	}
	else
	{
		$logp = 'no';
		$login = '';
		$haslo = '';
		setcookie('loginok', '');
		setcookie('haslook', '');
	}
}

//echo base64_encode(sha1(base64_encode($haslo)).md5(sha1(base64_encode($haslo))).md5(sha1(base64_encode($login))));
//echo '<br>'.$hazloz.'<br>'.$hask.$haslo;
if ($login != '')
{$swiat = 0;
if($_GET['sf'] != '')
{
	$swiat = $_GET['sf'] - 1;
	setcookie('swiat', $swiat);
}
else if($_COOKIE['swiat'] != '')
$swiat = $_COOKIE['swiat'];
if($id == 'rss')
$id='rss';
else
$id=$_GET['id'];
$zapytanie = "INSERT INTO `user_agent` (`login`, `agent`, `id`) VALUES ('".$login."', '".$_SERVER['HTTP_USER_AGENT']."', '".$id."')";
if(mysql_query($zapytanie))
echo '';
if($_GET['zaiszs'] != '')
{
	$zapiss = $_GET['zaiszs'] - 1;
	if(mysql_query("INSERT INTO `users` (`login`, `s`) VALUES ('".$login."', '".$zapiss."')"));
	echo "";
}
if($_POST['zaiszs'] != '')
{
	$zapiss = $_POST['zaiszs'] - 1;
	if(mysql_query("INSERT INTO `users` (`login`, `s`) VALUES ('".$login."', '".$zapiss."')"));
	echo "";
}
$s = $swiat;
	$zapytanie = "SELECT `haslo`, `gpasek` FROM `user` WHERE `login`='".$login."'";
	$idzapytania = mysql_query($zapytanie);
	while ($wiersz = mysql_fetch_row($idzapytania)) 
	{
		$hask = $wiersz[0];
		$gpastyp = $wiersz[1]; 
	}	$zapytaniekas = "SELECT `kasa`, `kd`, `kdr`, `kdr2`, `cenalot` FROM `users` WHERE `login`='".$login."' AND `s` = '$s'";
	$idzapytaniakas = mysql_query($zapytaniekas);
	while ($wiersz = mysql_fetch_row($idzapytaniakas)) 
	{
		$money = $wiersz[0];
		$kd = $wiersz[1];
		$kdr = $wiersz[2]; 
		$kdr2 = $wiersz[3]; 
		$cenalot = $wiersz[4]; 
	}
	if ($hask == base64_encode(sha1(base64_encode($haslo)).md5(sha1(base64_encode($haslo))).md5(sha1(base64_encode($login)))))
	{
		$logp = 'ok';
	}
	else
	{
		$logp = 'no';
		$login = '';
		$haslo = '';
		$hasloz = '';
		setcookie('loginok', '');
		setcookie('haslook', '');
		$register = 'Z³e has³o';
	}
}
if ($logp == 'ok')
{
	$oka1 = "UPDATE `user` SET `czas` = '".time()."' WHERE `login` = '".$login."'";
	$oka2 = mysql_query($oka1);
}
$lang = 'pl';
if ($_GET['lang'] != '')
{
$lang = $_GET['lang'];
setcookie('lang', $lang);
}
else if($_COOKIE['lang'] != '')
{
$lang = $_COOKIE['lang'];
}

include('codzien.php');
?>