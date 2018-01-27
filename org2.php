<?
	$zapytanie = "SELECT `prawa` FROM `uwo` WHERE `login` = '".$login."' AND `org` = '".$_GET['org']."'";
	$idzapytaniaw = mysql_query($zapytanie);
	//echo $zapytanie;
	while ($wiersz = mysql_fetch_row($idzapytaniaw)) 
	{
		$a = 'a';
		$pra = $wiersz[0];
	}
	$zapytanie = "SELECT `opis`, `zap`, `bud` FROM `stow` WHERE `nazwa` = '".$_GET['org']."'";
	$idzapytaniaw = mysql_query($zapytanie);
	//echo $zapytanie;
	while ($wiersz = mysql_fetch_row($idzapytaniaw)) 
	{
		if ($a == 'a')
		{
			include("orgmenu.php");
		}
		$opis = $wiersz[0];
		if  ($pra == '2' && $_GET['ed'] == 'po')
		{
			$auc = "UPDATE `stow` SET `opis` = '".$_POST['opis']."' WHERE `nazwa` = '".$_GET['org']."'";
			$aucc = mysql_query($auc);
			$opis = $_POST['opis'];
		}
		echo '<h2>'.$_GET['org'].'</h2>';
		if  ($pra == '2' && $_GET['ed'] == 'tak')
		{
			echo '<form method="POST" action="/?id=org2&org='.$_GET['org'].'&ed=po""><textarea name="opis" cols="30" rows="10">';
			echo $opis;
			echo '</textarea><input type="submit" value="ok"></form>';
		}
		else
		{
			$tresc = $opis;
			include('bbcode.php');
			echo $tresc;
		}
		if ($a != 'a')
		{
			if ($wiersz[1] != '')
			{
				echo '<br><br><br>';
				if($wiersz[2] == 'tak')
				echo 'Przystêpuj±c zgadzasz sie, by inni cz³onkowie widzeli rozbudowanie twoich budynków<br>';
				echo '<a href="?id=doorg&org='.$_GET['org'].'">Do³±cz</a>';
			}
			else
			{
				$aZ = "SELECT * FROM `news` WHERE `tytul` = '".$_GET['org']."' AND `do` = '".$login."' AND `typ` = '2' LIMIT 0, 1";
				$aaZ = mysql_query($aZ);
				while ($aZZ = mysql_fetch_row($aaZ))
				{
					
				echo '<br><br><br>';
				if($wiersz[2] == 'tak')
				echo 'Przystêpuj±c zgadzasz sie, by inni cz³onkowie widzeli rozbudowanie twoich budynków<br>';
				echo '<a href="?id=doorg&org='.$_GET['org'].'">Do³±cz</a>';
				}				
			}
		}
		else if ($pra == '2')
		{
			echo '<br><a href="/?id=org2&org='.$_GET['org'].'&ed=tak">Edytuj</a>';
		}
	}
?>