<?php
/*
if($_GET['mime']!='')
{
header('Content-Type: '.$_GET['mime'].'; charset="utf-8"');
}
else
header('Content-Type: text/html; charset="utf-8"');
include('log.php'); */
//if($_GET['only'] !='body')
//{
echo '<!DOCTYPE html>
<html lang="'.$lang;.'">
	<head>
		<link rel="stylesheet" href="';
		if($_GET['css']=='')echo'przejrzysty.css';else echo $_GET['css'];
		echo '" />
	</head>';//}
	?><body style="resize: both; -moz-resize: both; border: 1px black solid; max-width: 500px; max-height:400px;">
		<header>
			<h1><a href="http://operacja-ksiezyc.mkik.bitmar.net/">Operacja księżyc</a></h1>
			<section>Zalogowany jako <b><?php echo $login;?></b></section>
		</header>
		<dl id="menu0">
			<dt><?
				$pa = "SELECT * FROM `news` WHERE `do` = '".$login."' AND `prz` = '0' AND `typ` = '1'";
				$po = mysql_query($pa);
				while ($py = mysql_fetch_row($po))
				{
					$wiadok = "ok";
				}
				if ($wiadok == "ok")
				{
					echo '<b><img src="mail.png" alt="WIADOMO¦Ć!:"><a href="http://operacja-ksiezyc.mkik.bitmar.net/?id=wiado">SKRZYNKA ODBIORCZA</a></b>';
				}
				else
				{	
				if ($lang == 'pl')
				{
					echo '<a href="http://operacja-ksiezyc.mkik.bitmar.net/?id=wiado">Skrzynka Odbiorcza</a>';
					
					}
				else
				{
				echo '<a href="http://operacja-ksiezyc.mkik.bitmar.net/?id=wiado">Mailbox</a>';
				}
				}
			?></dt>
			<dt><?				$aaa = '';
				$aaaa = '';
				$no = 0;
				$zap = "SELECT `tytul`, `data`, `nr` FROM `Temat` WHERE `w` = 'main'";
				$idz = mysql_query($zap);
				while ($wiersz = mysql_fetch_row($idz))
				{
					$aaa = '';
					$zapa = "SELECT `czas` FROM `zobtem` WHERE `tem` = '".$wiersz[2]."' AND `user` = '".$login."'";
					//echo $zapa;
					$idza = mysql_query($zapa);
					while ($wiersza = mysql_fetch_row($idza))
					{
						$aaza = $wiersza[0];
					}
					if ($wiersz[1] > $aaza)
					{
						$no = 1;
						$aaa = "<b>";
						$aaaa = "</b>";
					}
				}
				echo $aaa.'<a href="http://operacja-ksiezyc.mkik.bitmar.net/?id=for&amp;org=main">Forum</a>'.$aaaa.'</li><li>';
				$aaa = $aaaa = '';?></dt>
		</dl><script type="text/javascript">
// <![CDATA[
new Menu('menu0');
// ]]>
</script>
<?php
if($_GET['only'] !='body')
echo '</body>
</html>';
?>