<?
function getmicrotime(){
    list($usec, $sec) = explode(" ",microtime());
    return ((float)$usec + (float)$sec);
    }

$time_start = getmicrotime();

?><<? ?>!DOCTY<? ?>PE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="<? echo $lang;?>">
<?
if($_GET['id'] == 'pp')
{
	 echo '<!-- XT:yRbmdLATsM42M1pHHJCLocqBHcM1F0Z0fHIv3f4nhJLDA5rVhEh4IUgpO9Lg0yzI -->';
}
else
{
	echo '<!-- XT:yRbmdLATsM42M1pHHJCLocqBHcM1F0Z0QjyzwR0UUInal89HdySenbfGiwhDuOxG -->';
}
?>
<head>
<title><?
if($logp=='ok')
{
if($lang == 'en')
echo 'World '.$s.' - ';
else
echo '�wiat '.$s.' - ';
}
if($lang == 'en') echo 'Operation moon - computer game via www'; else echo 'Operacja ksi�yc - gra komputerowa przez przegl�dark�.'; ?></title>
<link rel="Bookmark" title="Mkik" href="http://mkik.pl">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2">
<link rel="Stylesheet" type="text/css" href="1.css">
<link rel="Start" href="/">
<link rel="help" href="/?id=pomoc">
<link rel="author" href="/?id=autorzy">
<link rel="Alternate" title="English version" lang="en" href="?id=<? echo $_GET['id']; ?>&lang=en">
<link rel="Shortcut icon" href="favicon.ico">
<meta name="Description" content="Przegl�darkowa gra komputerowa, osadzona w �wiecie cywilizacji ksi�ycowej.">
<link rel="alternate" type="application/rss+xml" title="Newsy" href="rss.php">
<meta name="Keywords" content="<?if($lang == 'en') echo 'Operation, moon, computer game, web browser, space, strategy'; else echo 'Operacja, Ksi�yc, Gra komputerowa, Przegl�darka, Kosmos, Strategia';?> 2D, MMO,">
<link rel="alternate" type="application/rss+xml" title="Newsy i prywante wiadomo�ci<? if ($logp == 'no') { echo '(nie jeste� zalogowany)'; } ?>" href="rss.php?prywatne=wiadomosci<? if ($logp != 'no') {echo '&login='.$login.'&haslo='.$haslo;} ?>">
<script type="text/javascript" src="menu.js"></script>
<? if($logp != 'no')
echo '<script type="text/javascript">
ajaxczas = new Date().getTime(); 
ajaxakt = '.time().'; 
setInterval("getData(\'ajax.php?x='.$_GET['x'].'&y='.$_GET['y'].'&id='.$_GET['id'];
if($_GET['id'] == 'temat')
echo '&org='.$_GET['org'].'&tem='.$_GET['tem'].'&nr='.$_GET['nr'];
echo '\', \''.$_GET['id'].'\')", 15000);
</script>';
?>
<!--[if IE 6]>
<script src="DD_belatedPNG_0.0.8a.js"></script>
<script>
  /* EXAMPLE */
  DD_belatedPNG.fix(\'ul li, div, img, ul, a, td, tr, table\');
  
  /* string argument can be any CSS selector */
  /* .png_bg example is unnecessary */
  /* change it to what suits you! */
</script>
<![endif]--> 
</head>
<body  style="background-image: url(1.jpg);
	background-attachment: fixed;
	background-position: center;">
<?

	//if (1 == 2)
	//echo '<div style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: #fff; z-index: 1000; visibility: visible;" id="pre"><h1>Witaj w operacji ksi�yc!</h1></div>';
?>
<? /*
if($oktapeta == 'stara')
{echo ''; 
}else if($oktapeta != '')
{
echo '<img style="height: 100%; width: 100%; position: fixed; top: 0; left: 0; z-index: -100000" src="'.$_COOKIE['oktapeta'].'">'; 
}else 
{echo '<img style="height: 100%; width: 100%; position: fixed; top: 0; left: 0; z-index: -100000" src="img.php?z=2.png&typ=jpg&q=80">';
}*/?>
<table cellspacing="0" style="table-layout: fixed; width: 100%; border: 0; border-spacing: 0;">
	<tr>
		<td style="	background-image: url(ramki/2.1.png);	width: 39px;	height: 78px;	border: 0;"> </td>
		<td style="background-image: url(ramki/2.2.png); border: 0;">
		<?
		include('gpasek.php');
		?></td>
		<td style="background-image: url(ramki/2.3.png); width: 39px; height: 78px; border: 0;"> </td>
	</tr>
</table><div class="tresc">

	<div class="menu"><table cellspacing="0" style="table-layout: fixed; width: 100%; border: 0; border-spacing: 0;">
	<tr>
		<td style="background-image: url(ramki/1.1.png); background-position: right bottom; background-repeat: no-repeat; width: 39px; height: 39px; border: 0;"> </td>
		<td style="background-image: url(ramki/1.2.png); background-position: bottom; background-repeat: repeat-x; border: 0;"> </td>
		<td style="background-image: url(ramki/1.3.png); background-position: bottom; background-repeat: no-repeat; width: 39px; height: 39px; border: 0;"> </td>
	</tr>
	<tr>
		<td style="background-image: url(ramki/1.4.png); width: 39px; height: 39px; border: 0;"> </td>
		<td style="background-image: url(ramki/1.5.png); border: 0;">
<? include('menu.php'); ?>


</td>
		<td style="background-image: url(ramki/1.6.png); width: 39px; height: 39px; border: 0;"> </td>
	</tr>
	<tr>
		<td style="background-image: url(ramki/1.7.png); background-repeat: no-repeat; width: 39px; height: 39px; border: 0;"> </td>
		<td style="background-image: url(ramki/1.8.png); background-repeat: repeat-x; border: 0;"> </td>
		<td style="background-image: url(ramki/1.9.png); background-repeat: no-repeat; width: 39px; height: 39px; border: 0;"> </td>
	</tr>
</table></div>
<div class="gl" id="gl">
<table cellspacing="0" style="table-layout: fixed; width: 100%; border: 0; border-spacing: 0;">
	<tr>
		<td style="background-image: url(ramki/1.1.png); background-position: bottom; background-repeat: no-repeat; width: 39px; height: 39px; border: 0;"> </td>
		<td style="background-image: url(ramki/1.2.png); background-position: bottom; background-repeat: repeat-x; border: 0;"> </td>
		<td style="background-image: url(ramki/1.3.png); background-position: bottom; background-repeat: no-repeat; width: 39px; height: 39px; border: 0;"> </td>
	</tr>
	<tr>
		<td style="background-image: url(ramki/1.4.png); width: 39px; height: 39px; border: 0;"> </td>
		<td style="background-image: url(ramki/1.5.png); border: 0;"><!--[if lte IE 6]>
	<div id="ie6sux">
      <h2>
         <strong>Uwaga!</strong> Twoja przegl�darka jest w bardzo starej wersji, przez co strona b�dzie sie �le wy�wietla�.
      </h2>
	  Zaktualizuj przegl�dark� - to nic nie kosztuje, a wiele daje.<br><br>
<a href="http://ie6.pl">Dowiedz si� wi�cej</a>
</div><![endif]--><!--[if lte IE 7]>
	<div id="ie6sux">
      <h2>
         <strong>Uwaga!</strong> Twoja przegl�darka jest w nieaktualnej wersji wersji.
      </h2>
	  Zalecam zaktualizowa� przegl�dark�.<br><br>
<a href="http://mkik.pl/stopie7">Dowiedz si� wi�cej</a>
</div><![endif]-->

<?

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
?><br><script type="text/javascript"><!--
google_ad_client = "pub-8638511152242156";
/* Operacja pod tre�ci� */
google_ad_slot = "3616288594";
google_ad_width = 468;
google_ad_height = 60;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></td>
		<td style="background-image: url(ramki/1.6.png); width: 39px; height: 39px; border: 0;"> </td>
	</tr>
	<tr>
		<td style="background-image: url(ramki/1.7.png); background-repeat: no-repeat; width: 39px; height: 39px; border: 0;"> </td>
		<td style="background-image: url(ramki/1.8.png); background-repeat: repeat-x; border: 0;"> </td>
		<td style="background-image: url(ramki/1.9.png); background-repeat: no-repeat; width: 39px; height: 39px; border: 0;"> </td>
	</tr>
</table>

</div>

<div class="stopka"><table cellspacing="0" style="table-layout: fixed; width: 100%; border: 0; border-spacing: 0;">
	<tr>
		<td style="background-image: url(ramki/2.1.png); width: 39px; height: 78px; border: 0;"> </td>
		<td style="background-image: url(ramki/2.2.png); border: 0;">Autor: matrix0123456789 (Mateusz Krawczyk) <a href="gg:7772361"><img src="http://www.gadu-gadu.pl/users/status.asp?id=7772361" id="gg">7772361</a> <a href="mailto:matrix0123456789@o2.pl" alt="gg:"><img src="mail.png" alt="e-mail:">matrix0123456789@o2.pl</a>  <a href="?id=autorzy">(Zobacz wi�cej)</a>
		<?
		$time_end = getmicrotime();
		$timesss = $time_end - $time_start;
		$timessss  = $timesss * 1000;
		if ($_REQUEST['czaswyk'] == 'on')
		echo 'Strona wykonywa�a si� '.$timessss.'ms.';
		?></td>
		<td style="background-image: url(ramki/2.3.png); width: 39px; height: 78px; border: 0;"> </td>
	</tr>
</table></div></div><script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-9580933-1");
pageTracker._trackPageview();
} catch(err) {}</script></body></html>