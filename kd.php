<?
	if ($lang == 'pl')
	{
	echo "Kosmodrom to twój jedyny budynek za ziemi. Z niego startuj±, i tu l±duj± rakiety kosmiczne.<br><br>";
	}
	else
	{
	echo 'Cosmodrome is your only earth building.';
	}
$kdn = $kd + 1;
$z = 20000 * $kdn; 
if ($_GET['kd'] == '+1')
{
	if ($money >= $z)
	{
		$kas = $money - $z;
		$cz = $kdn * 60;
		$kdr = time() + $cz;
		$zapytanie = "UPDATE `users` SET `kdr` = '".$kdr."', `kdr2` = '".time()."', `kasa` = '".$kas."' WHERE `login`='".$login."' AND `s` = '$s'";
		$idzapytania = mysql_query($zapytanie);
	}
	
	else
	{
		if ($lang == 'pl')
		echo '<div class="zawiad">Nie posiadasz do¶ć pieniędzy</a><br><br>';
		else
		echo '<div class="zawiad">You don\'t so much money.</a><br><br>';
	}
}
if ($kdr != '0')
{
	if ($kdr > time())
	{
		$r1 = $kdr - $kdr2;
		$r2 = time() - $kdr2;
		$r3 = $r2 / $r1;
		$r4 = $r3 * 300;
		$r5 = 300 - $r4;
		//echo $kdr.' '.$kdr2.' '.$r1.' '.$r2.' '.$r3.' '.$r4.' '.$r5;
		if($_GET['kd'] == '+1')
		{
		$r4 = 0;
		$r5 = 300;
		}
		if ($lang == 'pl')
		echo 'Trwa rozbudowa kosmodromu<br>';
		else
		echo 'Cosmodrome is building';
		echo '<img src="l1.png" id="paseknr1" style="height: 30px; width: '.$r4.'px;"><img src="l2.png" id="paseknr2" style="height: 30px; width: '.$r5.'px;"><br><br>';
		echo "<script>
			t=setInterval('buduj()',100);
			var paseknr1 = document.getElementById('paseknr1');
			var paseknr2 = document.getElementById('paseknr2');
			var kdr = $kdr;
			var time = ".time().";
			var kdr2 = $kdr2;
			var r1 = $r1;
			function buduj()
			{
				time = time + 0.1;
				var r2 = time - kdr2;
				var r3 = (r2/r1);
				var r4 = r3 * 300;
				//var r4out = r4+'%';
				paseknr1.style.width = r4;
				paseknr2.style.width = 300 - r4;
				paseknr1.title = (r4/3)+'%';
				//document.write(r4);
				if(r4 > 300)
				{
					r4 = 300;
					paseknr1.style.width = r4;
					paseknr2.style.width = 300 - r4;
					paseknr1.title = r4+'%';
					clearInterval(t);
				}
			}
		</script>";
	}
	else
	{
		$kd = $kd + 1;
		$zapytanie = "UPDATE `users` SET `kdr` = '0',`kd` = '".$kd."' WHERE `login`='".$login."' AND `s` = '$s'";
		$idzapytania = mysql_query($zapytanie);
		
		if ($lang == 'pl')
		echo 'Poziom twojego kosmodromu to '.$kd.'.<br><a href="?id=kd&kd=+1">Rozbuduj ('.$kdn.' minut, '.$z.'$)</a>';
		else
		echo 'Level your cosmodrome is '.$kd.'.<br><a href="?id=kd&kd=+1">Build ('.$kdn.' minutes, '.$z.'$)</a>';
	}
}
else if ($kd != '0')
{
			if ($lang == 'pl')
		echo 'Poziom twojego kosmodromu to '.$kd.'.<br><a href="?id=kd&kd=+1">Rozbuduj ('.$kdn.' minut, '.$z.'$)</a>';
		else
		echo 'Level your cosmodrome is '.$kd.'.<br><a href="?id=kd&kd=+1">Build ('.$kdn.' minutes, '.$z.'$)</a>';
}
else
{
	if ($lang == 'pl')
	echo 'Nie posiadasz kosmodromu<br><a href="?id=kd&kd=+1">Wybuduj (1 minuta, 20 000$)</a>';
	else
	echo 'You don\'t have cosmodrome<br><a href="?id=kd&kd=+1">build (1 minute, 20 000$)</a>';
}
if ($lang == 'pl')
echo '<h2>Ziemia</h2><table>
<tr><td>Nazwa</td><td>czas lotu (min.)</td><td>Pojemno¶ć (ludzi/ton)</td><td>Posiadasz (szt.)</td><td> </td></tr>';
else
echo '<h2>Earth</h2><table>
<tr><td>Name</td><td>Time of flight (min.)</td><td>Pojemno¶ć (people/tonny)</td><td>You have</td><td> </td></tr>';
$zapytanie = "SELECT `rakieta`, `ilo`, `lot`, `z` FROM `rakiety` WHERE `user` = '".$login."' AND `x` = 'z' AND `s` = '$s'";
$idzapytaniaa = mysql_query($zapytanie);
while ($wiersz = mysql_fetch_row($idzapytaniaa))
{
	$zapytanie = "SELECT `czas`, `ton` FROM `shop1` WHERE `nazwa` = '".$wiersz[0]."'";
	$idzapytania = mysql_query($zapytanie);
	while ($wiers = mysql_fetch_row($idzapytania))
	{	
		echo '<tr><td>'.$wiersz[0].'</td><td>'.$wiers[0].'</td><td></td><td>'.$wiersz[1].'</td><td>';
		//echo $wiersz[2];
				if ($wiersz[2] < time())
				{
					if ($lang == 'pl')
					echo '<a href="?id=wr&x=z&nazwa='.$wiersz[0].'">Wy¶lij</a>';
					else
					echo '<a href="?id=wr&x=z&nazwa='.$wiersz[0].'">Send</a>';
					if ($wiersz[2] != 0)
					{
						$kzz = $wiersz[3] * 400;
						while($lkk = mysql_fetch_row())
						$lkk = mysql_fetch_array(mysql_query("SELECT count(id) as ile FROM `ludzie`"));
						$lk = $lkk * $cenalot;
						$money = $money + $kzz + $lk;
						if ($wiersz[3] <= $wiers[1])
						{
							$w1 = "UPDATE `rakiety` SET `lot` = '0', `z` = '0' WHERE `user` = '".$login."' AND `x` = 'z' AND `s` = '".$swiat."'";
						}
						else
						{
							$z = $wiersz[3] - $wiers[1];
							$w1 = "UPDATE `rakiety` SET `lot` = '0', `z` = '".$z."' WHERE `user` = '".$login."' AND `x` = 'z' AND `s` = '".$swiat."'";
						}
						$w1 = "UPDATE `rakiety` SET `lot` = '0', `z` = '".$z."' WHERE `user` = '".$login."' AND `x` = 'z' AND `s` = '".$swiat."'";
						$w2 = mysql_query($w1);
						$u1 = "UPDATE `users` SET `kasa` = '".$money."'  WHERE `login` = '".$login."' AND `s` = '$s'";
						$u2 = mysql_query($u1);
						//echo $w1.$u1;
					}
				}
				else
				{
					echo 'W trakcie lotu (koniec'.date(j, $wiersz[2]).'-'.date(n, $wiersz[2]).'-'.date(Y, $wiersz[2]).' '.date(G, $wiersz[2]).':'.date(i, $wiersz[2]).')';
				}
				echo '</td></tr>';
	}
}
$i = 1;
echo "</table>";
$zapytanie = "SELECT `nazwa`, `X`, `Y` FROM `wioski` WHERE `login` = '".$login."' AND `s` = '".$swiat."'";
$idzapytaniaa = mysql_query($zapytanie);
while ($wierszu = mysql_fetch_row($idzapytaniaa))
{
	echo '<h2>'.$wierszu[0].'('.$wierszu[1].'|'.$wierszu[2].')</h2><table>';
	if ($lang == 'pl')
echo '<tr><td>Nazwa</td><td>czas lotu (min.)</td><td>Pojemno¶ć (ludzi/ton)</td><td>Posiadasz (szt.)</td><td> </td></tr>';
else
echo '<tr><td>Name</td><td>Time of flight (min.)</td><td>Pojemno¶ć (people/tonny)</td><td>You have</td><td> </td></tr>';
	
	$zapytanie = "SELECT `rakieta`, `ilo`, `lot` FROM `rakiety` WHERE `user` = '".$login."' AND `x` = '".$wierszu[1]."' AND `y` = '".$wierszu[2]."' AND `s` = '".$swiat."'";
	$idzapytaniaa = mysql_query($zapytanie);
	while ($wiersz = mysql_fetch_row($idzapytaniaa))
	{
		$zapytanie = "SELECT `czas`, `sek` FROM `shop1` WHERE `nazwa` = '".$wiersz[0]."'";
		$idzapytania = mysql_query($zapytanie);
		while ($wiers = mysql_fetch_row($idzapytania))
		{	
			echo '<tr><td>'.$wiersz[0].'</td><td>'.$wiers[0].'</td><td></td><td>'.$wiersz[1].'</td><td>';
			// echo $wiersz[2];
			if ($wiersz[2] < time())
			{
				echo '<a href="?id=wr&x='.$wierszu[1].'&y='.$wierszu[2].'&nazwa='.$wiersz[0].'">Wy¶lij</a>';
			}
			else if($wiersz[2] == 0)
			{
				echo '<a href="?id=wr&x='.$wierszu[1].'&y='.$wierszu[2].'&nazwa='.$wiersz[0].'">Wy¶lij</a>';
			}
			else
			{
				if ($lang == 'pl')
				echo 'Leci';
				else
				echo 'It\'s flying';
			}
			echo '</td></tr>';
			$i++;
		}
	}
}
echo "</table>";
?>