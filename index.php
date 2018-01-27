<?php
/*if($_GET['mime']=='xhtml')
{
if(preg_match('/application\/xhtml\+xml(?![+a-z])(;q=(0\.\d{1,3}|[01]))?/i', 
$_SERVER['HTTP_ACCEPT'], $xhtml) && (isset($xhtml[2])?$xhtml[2]:1) > 0 || 
strpos($_SERVER["HTTP_USER_AGENT"], "W3C_Validator") ==! false || 
strpos($_SERVER["HTTP_USER_AGENT"], "WebKit") ==! false)
{
header('Content-Type: '.($xhtml?'application/xhtml+x':'text/ht').'ml; charset="utf-8"');
}}
else */if($_GET['mime']!='')
{
header('Content-Type: '.$_GET['mime'].'; charset="utf-8"');
}
include('log.php');
?>
<!DOCTYPE html>
<html lang="<? echo $lang;?>">
	<head>
		<link rel="stylesheet" href="<?php if($_GET['css']=='')echo'przejrzysty.css';else echo $_GET['css'];?>" />
		<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8"/>
		<script src="menu.js"></script>
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
		<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>
	<body>
		<header>
			<h1>Operacja Ksiê¿yc</h1>
			<section><?php include('gpasek.php')?></section>
		</header>
		<aside>
			<? include('menu.php'); ?>
		</aside>
		<section id="tresc">
			<!--[if lte IE 6]>
			<div id="ie6sux">
			  <h2>
				 <strong>Uwaga!</strong> Twoja przegl±darka jest w bardzo starej wersji, przez co strona bêdzie sie ¼le wy¶wietlaæ.
			  </h2>
			  Zaktualizuj przegl±darkê - to nic nie kosztuje, a wiele daje.<br /><br />
		<a href="http://ie6.pl">Dowiedz siê wiêcej</a>
		</div><![endif]--><!--[if lte IE 7]>
			<div id="ie6sux">
			  <h2>
				 <strong>Uwaga!</strong> Twoja przegl±darka jest w nieaktualnej wersji wersji.
			  </h2>
			  Zalecam zaktualizowaæ przegl¹darkê.<br /><br />
		<a href="http://mkik.pl/stopie7">Dowiedz siê wiêcej</a>
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
		?><br /><script type="text/javascript"><!--
		google_ad_client = "pub-8638511152242156";
		/* Operacja pod tre¶ci± */
		google_ad_slot = "3616288594";
		google_ad_width = 468;
		google_ad_height = 60;
		//-->
		</script>
		<script type="text/javascript"
		src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
		</script>
		</section>
	</body>
</html>