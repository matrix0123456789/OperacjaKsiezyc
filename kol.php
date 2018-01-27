<?
	$zz = mysql_query("SELECT `kol` FROM `wioski` WHERE `x` = '".$_POST['dox']."' AND  `y` = '".$_POST['doy']."' AND `s` = '".$swiat."'");
	while($z = mysql_fetch_row($zz))
	{
	$kol = $z[0];
	$wios = 1;
	}
if($wios == 1)
{
	if($kol != 0)
	{ 
		if($_POST['zel'] != '')
		{

			$zz = mysql_query("SELECT `zelazo`, `jedzenie` FROM `wioski` WHERE `x` = '".$_GET['x']."' AND  `y` = '".$_GET['y']."' AND `login` = '".$login."' AND `s` = '".$swiat."' LIMIT 0,1");
			while($z = mysql_fetch_row($zz))
			{

				if ($z[0] >= $_POST['zel'])
				{

						if(mysql_query("UPDATE `wioski` SET `zelazo` = `zelazo` 
						- ".$_POST['zel']." WHERE `x` = '".$_GET['x']."'
						AND  `y` = '".$_GET['y']."' AND `s` = '".$swiat."'"))
						echo '<div class="zawiad">Wys³a';
						//echo "UPDATE `wioski` SET `zelazo` = `zelazo` 
						//- ".$_POST['zel']." WHERE `x` = '".$_GET['x']."'
						//AND  `y` = '".$_GET['y']."'";
						if(mysql_query("
						UPDATE `wioski` SET `zelazo` = `zelazo` 
						+ ".$_POST['zel']." WHERE `x` = '".$_POST['dox']."'
						AND  `y` = '".$_POST['doy']."' AND `s` = '".$swiat."'"))
						echo 'no</div><br>';

				}
				else
				echo '<div class="zawiad">nie masz tyle surowców</div>';
			}
		}
	}
	else
	echo '<div class="zawiad">Odbiorca nie ma stacji kolejowej</div>';
}
else
echo 'Nie ma takiej wioski';
?><form method="POST" action="?id=kol&x=<? echo $_GET['x'].'&y='.$_GET['y']; ?>">
¿elazo<input name="zel"><br>
¯ywno¶æ<input name="jedz"><br>
do<input name="dox" size="3">|<input name="doy" size="3"> <input type="submit" value="Prze¶lij"></form>