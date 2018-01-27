<?
$id = 'rss';
include('log.php');
?><<? ?>?xml version="1.0" encoding="iso-8859-2"?<? ?>>

<rss version="2.0">

<channel>

<title>
<? 
if($_GET['prywatne'] == 'wiadomosci') 
{ echo 'Operacja kiê¿yc - kana³ spersonalizwany'; 
 $where = "`typ` = '0' OR `do` = '".$login."'";}
 else 
 { echo 'Operacja ksiê¿yc - Newsy'; 
$where = "`typ` = '0'";} 
 ?></title>

<description>Aktualno¶ci o grze Operacja Ksiê¿yc.</description>

<link>http://operacja-ksiezyc.mkik.pl</link>

<copyright>matrix0123456789</copyright>

<language>pl-pl</language>

<?
//$sql_conn = mysql_connect('mysql1.yoyo.pl', 'db534463', 'mateusz');
//mysql_select_db('db534463');
$zapytanie = "SELECT `tytul`, `data`, `tresc`, `nr`, `data2`, `typ`, `od` FROM `news` WHERE ".$where." ORDER BY `nr` DESC LIMIT 0,15";
$idzapytaniaw = mysql_query($zapytanie);

while ($wiersz = mysql_fetch_row($idzapytaniaw)) 
{
	echo '<item>

	<title>';
	if($_GET['prywatne'] == 'wiadomosci') 
	{
		if ($wiersz[5] == 0)
		echo 'news:';
		else if ($wiersz[5] == 1)
		echo 'wiadomo¶æ:';
		else
		echo 'zaproszenie:';
	}
	echo $wiersz[0].'</title>

	<link>http://operacja-ksiezyc.mkik.pl/#news'.$wiersz[3].'</link>
	
	';

	$trescc = preg_replace("#\[(.*?)\\]#si",' ',$wiersz[2]);
	
	$tresc = str_replace("&", "&amp;", $trescc);
	
	echo '<description>'.$tresc.'</description>

	<author>'.$wiersz[6].'</author>

	<pubDate>'.$wiersz[4].'</pubDate>

	<guid>www.operacja-ksiezyc.yoyo.pl/isagorax/pyrokar/xardas/'.$wiersz[3].'</guid>

	</item>';
}
?>

</channel>
</rss>