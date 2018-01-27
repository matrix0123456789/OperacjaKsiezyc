<?
	if ($logp == 'ok')
	{
//		if ($_POST['ilosc'] != '')
//		{
//			$wal = substr($worktime, 0, 2);
//			$wol = substr($worktime, 3, 5);
//			$wak = $wal * 3600;
//			$wok = $wol * 60;
//			$workczas = time() + $wak + $wok;
//			$zapytanie = "UPDATE `user` SET `work-id` = '".$_POST['id']."',`work-time` = '".$workczas."' WHERE `login`='".$login."'";
//			$idzapytania = mysql_query($zapytanie);
//		}
		if ($workid == '0')
		{
			if ($_POST['ilosc'] == '')
			{
				echo 'Je¶li brakuje ci pieniêdzy powiniene¶ rozej¿eæ siê za prac±, ale pamiêtaj, podczas pracy nie mo¿esz robiæ nic innego!<br><br>	<h2>Zlecenie</h2><table>';
				$zapytanie = "SELECT `nazwa`, `czas`, `zarobek`, `skil1`, `skil2`, `ilosc`, `id`, `czass` FROM `workz`";
				$idzapytaniaw = mysql_query($zapytanie);
			
				echo '<tr><td>Nazwa</td><td>Czas pracy (gg:mm)</td><td>Zarobek</td><td>Potrzebne umiejêtno¶ci</td><td>Pracuj!</td></tr>';
			
				while ($wiersz = mysql_fetch_row($idzapytaniaw)) 
				{
					echo '<tr><td>'.$wiersz[0].'</td><td>'.$wiersz[1].'</td><td>'.$wiersz[2].'$</td><td>'.$wiersz[3].$wiersz[4].'</td><td><form method="POST" action="/?id=work"><input name="ilosc" size="5">/'.$wiersz[5].'<input type="submit" value="Pracuj!"><input type="hidden" name="id" value"'.$wiersz[6].'"><input type="hidden" name="czass" value"'.$wiersz[8].'"></form></td><tr>';
				}
			}
			else
			{
				$ntime = $_POST['ilosc'] * $_POST['czass'];
				$time = time() + $ntime;
				$zapytanie = "UPDATE `user` SET `work-id` = '".$_POST['id']."',`work-time` = '".$time."' WHERE `id`='1'";
				$idzapytania = mysql_query($zapytanie);
			}
		echo '</table>';
		}
		{
			echo 'Je¶li brakuje ci pieniêdzy powiniene¶ rozej¿eæ siê za prac±, ale pamiêtaj, podczas pracy nie mo¿esz robiæ nic innego!<br><br>	<h2>Zlecenie</h2><table>';
			$zapytanie = "SELECT `nazwa`, `czas`, `zarobek`, `skil1`, `skil2`, `ilosc`, `id` FROM `workz`";
			$idzapytaniaw = mysql_query($zapytanie);
			//echo "<tr><td>Nazwa</td><td>Czas pracy (gg:mm)</td><td>Zarobek</td><td>Potrzebne umiejêtno¶ci</td><td>Pracuj!</td></tr>";
			
			echo '<tr><td>Nazwa</td><td>Czas pracy (gg:mm)</td><td>Zarobek</td><td>Potrzebne umiejêtno¶ci</td><td>Pracuj!</td></tr>';
			
			while ($wiersz = mysql_fetch_row($idzapytaniaw)) 
			{
				echo '<tr><td>'.$wiersz[0].'</td><td>'.$wiersz[1].'</td><td>'.$wiersz[2].'&dol;</td><td>'.$wiersz[3].$wiersz[4].'</td><td><form method="POST" action="/?id=work"><input name="ilosc" size="5">/'.$wiersz[5].'<input type="submit" value="Pracuj!"><input type="hidden" name="id" value"'.$wiersz[6].'"></form></td><tr>';
			}
		echo '</table>';
		}
	}
	?>