<?
	include('wersj.php');
	$lll = "SELECT count(tytul) as ile FROM `news` WHERE `typ` = '0'";
	$llll = mysql_query($lll);
	$str1 = mysql_fetch_array($llll);
	$str2 = $str1['ile'] / 10;
	$str3 = ceil($str2);
	$i = 0;
	while ($i < $str3)
	{
		$list = $list.'<a href="?strona='.$i.'">';
		$i++;
		$list = $list.$i.'</a>';
	}
	if ($lang == 'pl')
	echo 'Witaj w Operacji Ksiê¿yc, strategicznej grze komputerowej przez przegl±darkê (via www). Mo¿esz tu graæ z innymi mlud¼mi z ca³ego ¶wiata (tzw. MMO). Wy¶lij rakietê w kosmos, na sam ksiê¿yc.';
	else
	echo 'Welcome in Operation Moon, computer game in web browser (via www)';
	echo '<br>'.$list.'<br>';
	$a = $_GET['strona'] * 10;
	$b = $a + 9;
	$zapytanie = "SELECT `tytul`, `data`, `tresc`, `nr`, `od` FROM `news` WHERE `typ` = '0' ORDER BY `nr` DESC LIMIT ".$a." , ".$b."";
	$idzapytaniaw = mysql_query($zapytanie);
	while ($wiersz = mysql_fetch_row($idzapytaniaw)) 
	{
		$tresc = $wiersz[2];
		include('bbcode.php');
		echo '<span id="news'.$wiersz[3].'" style="font-size: 25px; font-weight: 700;">'.$wiersz[0].'</span><br><b>Napisane '.$wiersz[1];
		if ($wiersz[4] != '')
		{
			echo ' przez '.$wiersz[4];
		}
		echo '</b><br>'.$tresc.'<br><br>';
	}
	echo $list;
?>