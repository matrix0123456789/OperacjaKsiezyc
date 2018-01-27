<? if($woj == 'tak') echo '<a href="?id=fabryka&x='.$_GET['x'].'&y='.$_GET['y'].'">Ogólnie</a> <a href="?id=fabryka2&x='.$_GET['x'].'&y='.$_GET['y'].'">Machiny wojenne</a><br>'; 
$zapytanie = "SELECT `fabrbud`, `kd`, `kopalnia`, `bud`, `budr`, `budrc`, `fabrbudr`, `kdr`, `kopalniaroz`, `ele`, `eler`, `buduz`, `fabrbudb`, `kdb`, `kopalniab`, `eleb`, `mag`, `las`, `magbud`, `lasbud`, `osl`, `oslb`, `oslbud`, `lasm`, `lasb`, `pol`, `polbud`, `polb`, `kol`, `kolbud`, `kolb`, `lab`, `labbud`, `labb`, `magb`, `dom`, `dombud`, `domb`, `kul`, `kulbud`, `kulb` FROM `wioski` WHERE `x`='".$_GET['x']."' AND `y`='".$_GET['y']."' AND `login`='".$login."' AND `s` = '".$swiat."'";
$idzapytaniak = mysql_query($zapytanie);
while ($wierszreg = mysql_fetch_row($idzapytaniak)) 
{
	$fabryka = $wierszreg[0];
	$kdr = $wierszreg[7];
	$kop = $wierszreg[2];
	$kopr = $wierszreg[8];
	$ele = $wierszreg[9];
	$eler = $wierszreg[10];
	$buduz = $wierszreg[11];
	$fabrbudb = $wierszreg[12];
	$kdbudb = $wierszreg[13];
	$kopbudb = $wierszreg[14];
	$elebudb = $wierszreg[15];
	$mag = $wierszreg[16];
	$las = $wierszreg[17];
	$magbud = $wierszreg[18];
	$magb = $wierszreg[34];
	$lasbud = $wierszreg[19];
	$osl = $wierszreg[20];
	$oslb = $wierszreg[21];
	$oslbud = $wierszreg[22];
	$lasbud = $wierszreg[23];
	$lasb = $wierszreg[24];
	$pol = $wierszreg[25];
	$polbud = $wierszreg[26];
	$polb = $wierszreg[27];
	$kol = $wierszreg[28];
	$kolbud = $wierszreg[29];
	$kolb = $wierszreg[30];
	$lab = $wierszreg[31];
	$labbud = $wierszreg[32];
	$labb = $wierszreg[33];
	$dom = $wierszreg[35];
	$dombud = $wierszreg[36];
	$domb = $wierszreg[37];
	$kul = $wierszreg[38];
	$kulbud = $wierszreg[39];
	$kulb = $wierszreg[40];
	$z = 1;
	$godz = 60;
	while ($z < $fabryka)
	{
		$z++;
		$godz = $godz * 1.5;
	}
	$sek = $godz / 3600;
	$cz1 = $wierszreg[4] / $sek;
	$cz2 = $cz1 + $wierszreg[5];
	echo $sek.'.'.$cz1.'.'.$cz2.'.\'.time();
	if ($cz2 > time())
	{
		$cz3 = time() - $wierszreg[5];
		$ilo1 = $cz3 * $sek;
		$bud = $wierszreg[3] + $ilo1;
		echo 'r'.$cz3.'.'.$ilo1;
		$r = $wierszreg[4] - $ilo1;
		$budowa = 'W budowie '.$r.' budowniczych.';
	}
	else
	{
		$bud = $wierszreg[3] + $wierszreg[4];
		$zapytanie = "UPDATE `wioski` SET `bud` = '".$bud."', `budr` = '0', `budrc` = '0' WHERE `x`='".$_GET['x']."' AND `y`='".$_GET['y']."' AND `login`='".$login."' AND `s` = '".$swiat."'";
		$idzapytania = mysql_query($zapytanie);
	}
		//echo $godz.'<br>'.$cz1.'<br>'.$cz2.' '. time().'<br>'.$cz3.'<br>'.$ilo1.'<br>'.$bud;
	$fabryka = $wierszreg[0];
	$bud = floor($bud);
	$budwol = $bud - $wierszreg[11];
	echo 'W fabryce budujesz budowniczych, którzy buduj± bydynki, oraz zlecaæ budowê.<br><br>'.$budowa.'
	<form action="?id=rubbud&x='.$_GET['x'].'&y='.$_GET['y'].'" method="POST">
	Wyprodukuj budowniczych (1 t, masz '.$bud.', wolnych '.$budwol.') <input name="ilo" size="4"><input type="submit" value="Buduj"></form><br><br><br><form action="?" method="GET">';
	echo '<table>';
	$fabrbud = $wierszreg[6];
	if ($fabrbud <= time())
	{
		if ($fabrbud != '0')
		{
			//echo '55';
			$fabrbud = 0;
			$fabryka++;
			$buduz = $buduz - $fabrbudb;
			$zapytanie = "UPDATE `wioski` SET `fabrbudr` = '0', `fabrbud` = '".$fabryka."', `buduz` = '".$buduz."' WHERE `x`='".$_GET['x']."' AND `y`='".$_GET['y']."' AND `login`='".$login."' AND `s` = '".$swiat."'";
			$idzapytania = mysql_query($zapytanie);
		}
	}
	echo '<tr><td>';
	if ($fabrbud == '0')
	{
		if ($fabryka == 15)
		{
			echo 'Budynek ca³kowicie rozbudowany!';
		}
		else
		{
			echo '<form action="?id=buduj" method="GET"><input type="hidden" name="id" value="buduj"><input type="hidden" name="co" value="fabryka"><input type="hidden" name="x" value="'.$_GET['x'].'"><input type="hidden" name="y" value="'.$_GET['y'].'"><input name="ile" size="4" value="'.$budwol.'" title="Wpisz ilu chcesz u¿yæ budowniczych"><input name="ilepoz" size="4" value="1" title="Wpisz ile poziomów chcesz wybudowaæ."><input type="submit" value="Ok">';
		}
	}
	else
	{
		$s = $fabrbud - time();
		$g = ceil($s / 3600);
		$m = ceil($s % 3600 / 60); 
		$sz = $s % 60;
		$g--;
		$m--;
		if ($m<10)
		$mm = '0'.$m;
		else
		$mm = $m;
		if ($s<10)
		$ss = '0'.$sz;
		else
		$ss = $sz;		echo 'Trwa budowa jeszcze '. $g.':';
				if ($m<10)
		echo '0'.$m;
		else
		echo $m;
		echo ':';
		
		if ($sz<10)
		echo '0'.$sz;
		else
		echo $sz;
	}
	echo '</form></td><td><a href="?id=fabryka&x='.$_GET['x'].'&y='.$_GET['y'].'">Fabryka budowniczych ('.$fabryka.')</a></form></td></tr>';
	$kd = $wierszreg[1];
	if ($kdr <= time())
	{
		if ($kdr != '0')
		{
			$kdr = 0;
			$kd++;
			$buduz = $buduz - $kdbudb;
			$zapytanie = "UPDATE `wioski` SET `kdr` = '0', `kd` = '".$kd."', `kdr` = '0', `buduz` = '".$buduz."' WHERE `x`='".$_GET['x']."' AND `y`='".$_GET['y']."' AND `login`='".$login."' AND `s` = '".$swiat."'";
			$idzapytania = mysql_query($zapytanie);
		}
	}
	echo '<tr><td><form action="?id=buduj" method="GET">';
	if ($kdr == '0')
	{
		if ($kd == 10)
		{
			echo 'Budynek ca³kowicie rozbudowany!';
		}
		else
		{
			echo '<form action="?id=buduj" method="GET"><input type="hidden" name="id" value="buduj"><input type="hidden" name="co" value="kd"><input type="hidden" name="x" value="'.$_GET['x'].'"><input type="hidden" name="y" value="'.$_GET['y'].'"><input name="ile" size="4" value="'.$budwol.'" title="Wpisz ilu chcesz u¿yæ budowniczych"><input type="submit" value="Ok">';
		}
	}
	else
	{
		$s = $kdr - time();
		$g = ceil($s / 3600);
		$m = ceil($s % 3600 / 60); 
		$sz = $s % 60;
		$g--;
		$m--;
		if ($m<10)
		$mm = '0'.$m;
		else
		$mm = $m;
		if ($s<10)
		$ss = '0'.$sz;
		else
		$ss = $sz;		echo 'Trwa budowa jeszcze '. $g.':';
				if ($m<10)
		echo '0'.$m;
		else
		echo $m;
		echo ':';
		
		if ($sz<10)
		echo '0'.$sz;
		else
		echo $sz;
	}
	echo '</td><td><a href="?id=kd">Kosmodrom ('.$kd.')</a><br></form></td></tr>';
	echo '<tr><td><form action="?id=buduj" method="GET">';
	if ($kopr <= time())
	{
		//echo $eler;
		//echo $kopr;
		if ($kopr != '0')
		{
			$kopr = 0;
			$kop++;
			$buduz = $buduz - $kopbudb;
			$uz = "UPDATE `wioski` SET `kopalniaroz` = '0', `kopalnia` = '".$kop."', `buduz` = '".$buduz."' WHERE `x`='".$_GET['x']."' AND `y`='".$_GET['y']."' AND `login`='".$login."' AND `s` = '".$swiat."'";
			//echo $uz;
			$usz = mysql_query($uz);
		}
	}
	if ($kopr == '0')
	{
		if ($kop == '15')
		{
			echo 'Budynek ca³kowicie rozbudowany!';
		}
		else
		{
			echo '<input type="hidden" name="id" value="buduj"><input type="hidden" name="co" value="kop"><input type="hidden" name="x" value="'.$_GET['x'].'"><input type="hidden" name="y" value="'.$_GET['y'].'"><input name="ile" size="4" value="'.$budwol.'" title="Wpisz ilu chcesz u¿yæ budowniczych"><input type="submit" value="Ok">';
		}
	}
	else
	{
		$s = $kopr - time();
		$g = ceil($s / 3600);
		$m = ceil($s % 3600 / 60); 
		$sz = $s % 60;
		$g--;
		$m--;
		if ($m<10)
		$mm = '0'.$m;
		else
		$mm = $m;
		if ($s<10)
		$ss = '0'.$sz;
		else
		$ss = $sz;		echo 'Trwa budowa jeszcze '. $g.':';
				if ($m<10)
		echo '0'.$m;
		else
		echo $m;
		echo ':';
		
		if ($sz<10)
		echo '0'.$sz;
		else
		echo $sz;
	}
	echo '</td><td>Kopalnia ¿elaza ('.$kop.')</form></td></tr>';
	//echo '0';
	echo '<tr><td><form action="?id=buduj" method="GET">';
	//echo '1';
	if ($eler <= time())
	{
	//echo $eler;
		if ($eler != '0')
		{
			$eler = 0;
			$ele++;
			$buduz = $buduz - $elebudb;
			$zaa = "UPDATE `wioski` SET `eler` = '0', `ele` = '".$ele."', `buduz` = '".$buduz."' WHERE `x`='".$_GET['x']."' AND `y`='".$_GET['y']."' AND `login`='".$login."' AND `s` = '".$swiat."'";
			$zba = mysql_query($zaa);
		}
	}
	if ($eler == '0')
	{
		if ($ele == '15')
		{
			echo 'Budynek ca³kowicie rozbudowany!';
		}
		else
		{
			echo '<input type="hidden" name="id" value="buduj"><input type="hidden" name="co" value="ele"><input type="hidden" name="x" value="'.$_GET['x'].'"><input type="hidden" name="y" value="'.$_GET['y'].'"><input name="ile" size="4" value="'.$budwol.'" title="Wpisz ilu chcesz u¿yæ budowniczych"><input type="submit" value="Ok">';
		}
	}
	else
	{
		$s = $eler - time();
		$g = ceil($s / 3600);
		$m = ceil($s % 3600 / 60); 
		$sz = $s % 60;
		$g--;
		$m--;
		if ($m<10)
		$mm = '0'.$m;
		else
		$mm = $m;
		if ($s<10)
		$ss = '0'.$sz;
		else
		$ss = $sz;		echo 'Trwa budowa jeszcze '. $g.':';
				if ($m<10)
		echo '0'.$m;
		else
		echo $m;
		echo ':';
		
		if ($sz<10)
		echo '0'.$sz;
		else
		echo $sz;
	}
	echo '</td><td><a href="?id=ele&x=
	'.$_GET['x'].'
	&y='.$_GET['y'].'
	">Elektrownia ('.$ele.')</a></form></td></tr>';
	echo '<tr><td><form action="?id=buduj" method="GET">';
			
	if ($magbud <= time())
	{
	//echo $eler;
		if ($magbud != '0')
		{
			$magbud = 0;
			$mag++;
			$buduz = $buduz - $magb;
			
$zapytanie = "UPDATE `wioski` SET `magbud` = '0', `mag` = '$mag', `magb` = '0', `buduz` = '$buduz' WHERE `x`='".$_GET['x']."' AND `y`='".$_GET['y']."' AND `login`='$login' AND `s` = '".$swiat."'";
if(mysql_query($zapytanie)){
   //tu ewentualny komunikat typu "zmiany zapisano" etc.
}else{
   echo mysql_error();
   exit();
   //koñczysz dzia³anie skryptu lub wy¶wietlasz b³±d
}
			//$zbs = mysql_query("UPDATE `wioski` SET )`magbud` = '0', `mag` = '$mag', `magb` = '0' `buduz` = '$buduz'= WHERE `x`='".$_GET['x']."' AND `y`='".$_GET['y']."' AND `login`='$login'");
			//$zmiena="UPDATE `wioski` SET (`magbud` = 0, `mag` = 3, `magb` = 0, `buduz` = '1472') WHERE `x`=0 AND `y`=0 AND `login`='admin'";
			//$ans = mysql_query($zmiena);
		
		}
	}
	if ($magbud == '0')
	{
		if ($mag == '20')
		{
			echo 'Budynek ca³kowicie rozbudowany!';
		}
		else
		{
			echo '<input type="hidden" name="id" value="buduj"><input type="hidden" name="co" value="mag"><input type="hidden" name="x" value="'.$_GET['x'].'"><input type="hidden" name="y" value="'.$_GET['y'].'"><input name="ile" size="4" value="'.$budwol.'" title="Wpisz ilu chcesz u¿yæ budowniczych"><input type="submit" value="Ok">';
		}
	}
	else
	{
		$s = $magbud - time();
		$g = ceil($s / 3600);
		$m = ceil($s % 3600 / 60); 
		$sz = $s % 60;
		$g--;
		$m--;
		if ($m<10)
		$mm = '0'.$m;
		else
		$mm = $m;
		if ($s<10)
		$ss = '0'.$sz;
		else
		$ss = $sz;		echo 'Trwa budowa jeszcze '. $g.':';
				if ($m<10)
		echo '0'.$m;
		else
		echo $m;
		echo ':';
		
		if ($sz<10)
		echo '0'.$sz;
		else
		echo $sz;
	}
	echo '</td><td>Magazyn ('.$mag.')</form></td></tr>';	echo '<tr><td><form action="?id=buduj" method="GET">';
		
	if ($oslbud <= time())
	{
	//echo $eler;
		if ($oslbud != '0')
		{
			$oslbud = 0;
			$osl++;
			$buduz = $buduz - $oslb;
			$zza = "UPDATE `wioski` SET `oslbud` = '0', `osl` = '".$osl."', `oslbud` = '0', `oslb` = '0', `buduz` = '".$buduz."' WHERE `x`='".$_GET['x']."' AND `y`='".$_GET['y']."' AND `login`='".$login."'";
			if(mysql_query($zza)){
   //tu ewentualny komunikat typu "zmiany zapisano" etc.
}else{
   echo mysql_error();
   exit();
   //koñczysz dzia³anie skryptu lub wy¶wietlasz b³±d
}
		}
	}
	if ($oslbud == '0')
	{
		if ($osl == '1')
		{
			echo 'Budynek ca³kowicie rozbudowany!';
		}
		else
		{
			echo '<input type="hidden" name="id" value="buduj"><input type="hidden" name="co" value="osl"><input type="hidden" name="x" value="'.$_GET['x'].'"><input type="hidden" name="y" value="'.$_GET['y'].'"><input name="ile" size="4" value="'.$budwol.'" title="Wpisz ilu chcesz u¿yæ budowniczych"><input type="submit" value="Ok">';
		}
	}
	else
	{
		$s = $oslbud - time();
		$g = ceil($s / 3600);
		$m = ceil($s % 3600 / 60); 
		$sz = $s % 60;
		$g--;
		$m--;
		if ($m<10)
		$mm = '0'.$m;
		else
		$mm = $m;
		if ($s<10)
		$ss = '0'.$sz;
		else
		$ss = $sz;		echo 'Trwa budowa jeszcze '. $g.':';
				if ($m<10)
		echo '0'.$m;
		else
		echo $m;
		echo ':';
		
		if ($sz<10)
		echo '0'.$sz;
		else
		echo $sz;
	}
	echo '</td><td>Os³ona('.$osl.')</form></td></tr>';
	
	/*echo '<tr><td><form action="?id=buduj" method="GET">';
	if ($lasbud <= time())
	{
	//echo $eler;
		if ($lasbud != '0')
		{
			$lasbud = 0;
			$las++;
			$buduz = $buduz - $lasb;
			$ga = "UPDATE `wioski` SET `lasbud` = '0', `las` = '".$las."', `lasm` = '0', `lasb` = '0' `buduz` = '".$buduz."' WHERE `x`='".$_GET['x']."' AND `y`='".$_GET['y']."' AND `login`='".$login."'";
			//echo $zz;
			$gb = mysql_query($ga);
		}
	}
	if ($lasbud == '0')
	{
		if ($las == '30')
		{
			echo 'Budynek ca³kowicie rozbudowany!';
		}
		else if ($osl == 0)
		{
			 echo 'Brak os³ony';
		}
		else
		{
			echo '<input type="hidden" name="id" value="buduj"><input type="hidden" name="co" value="las"><input type="hidden" name="x" value="'.$_GET['x'].'"><input type="hidden" name="y" value="'.$_GET['y'].'"><input name="ile" size="4" value="'.$budwol.'" title="Wpisz ilu chcesz u¿yæ budowniczych"><input type="submit" value="Ok">';
		}
	}
	else
	{
		$s = $lasbud - time();
		$g = ceil($s / 3600);
		$m = ceil($s % 3600 / 60);
		$s = $s % 60;
		$g--;
		$m--;
		if ($m<10)
		$mm = '0'.$m;
		if ($s<10)
		$ss = '0'.$s;
		echo 'Trwa budowa jeszcze '. $g.':'.$mm.':'.$ss.'';
	}
	echo '</td><td><a href="?id=las&x='.$_GET['x'].'&y='.$_GET['y'].'">Las('.$las.')</a></form></td></tr>';*/
	echo '<tr><td><form action="?id=buduj" method="GET">';
	
	if ($polbud <= time())
	{
	//echo $eler;
		if ($polbud != '0')
		{
			$polbud = 0;
			$pol++;
			$buduz = $buduz - $polb;
			echo $polbud.' '.$polb;
			$za = "UPDATE `wioski` SET 
			`polbud` = '0', `pol` = '$pol', `polbud` = '0',
			`polb` = '0', `buduz` = '$buduz' WHERE 
			`x`='".$_GET['x']."' AND `y`='".$_GET['y']."' AND `login`='$login' AND `s` = '".$swiat."'";
			if(mysql_query($za)){
   //tu ewentualny komunikat typu "zmiany zapisano" etc.
}else{
   echo mysql_error();
   exit();
   //koñczysz dzia³anie skryptu lub wy¶wietlasz b³±d
}
		}
	}
	if ($polbud == '0')
	{
		if ($pol == '30')
		{
			echo 'Budynek ca³kowicie rozbudowany!';
		}
		else if ($osl == 0)
		{
			 echo 'Brak os³ony';
		}
		else
		{
			echo '<input type="hidden" name="id" value="buduj"><input type="hidden" name="co" value="pol"><input type="hidden" name="x" value="'.$_GET['x'].'"><input type="hidden" name="y" value="'.$_GET['y'].'"><input name="ile" size="4" value="'.$budwol.'" title="Wpisz ilu chcesz u¿yæ budowniczych"><input type="submit" value="Ok">';
		}
	}
	else
	{
		$s = $polbud - time();
		$g = ceil($s / 3600);
		$m = ceil($s % 3600 / 60); 
		$sz = $s % 60;
		$g--;
		$m--;
		if ($m<10)
		$mm = '0'.$m;
		else
		$mm = $m;
		if ($s<10)
		$ss = '0'.$sz;
		else
		$ss = $sz;		echo 'Trwa budowa jeszcze '. $g.':';
				if ($m<10)
		echo '0'.$m;
		else
		echo $m;
		echo ':';
		
		if ($sz<10)
		echo '0'.$sz;
		else
		echo $sz;
	}
	echo '</td><td>Pole('.$pol.')</form></td></tr>';
	echo '<tr><td><form action="?id=buduj" method="GET">';

	
	if ($labbud <= time())
	{
	//echo $eler;
		if ($labbud != '0')
		{
			$labbud = 0;
			$lab++;
			$buduz = $buduz - $labb;
			$zaaza = "UPDATE `wioski` SET `labbud` = '0', `lab` = '".$lab."', `labbud` = '0', `labb` = '0', `buduz` = '".$buduz."' WHERE `x`='".$_GET['x']."' AND `y`='".$_GET['y']."' AND `login`='".$login."' AND `s` = '".$swiat."'";
			if(mysql_query($zaaza)){
   //tu ewentualny komunikat typu "zmiany zapisano" etc.
}else{
   echo mysql_error();
   exit();
   //koñczysz dzia³anie skryptu lub wy¶wietlasz b³±d
}
		}
	}
	if ($labbud == '0')
	{
		if ($lab == '30')
		{
			echo 'Budynek ca³kowicie rozbudowany!';
		}
		else
		{
			echo '<input type="hidden" name="id" value="buduj"><input type="hidden" name="co" value="lab"><input type="hidden" name="x" value="'.$_GET['x'].'"><input type="hidden" name="y" value="'.$_GET['y'].'"><input name="ile" size="4" value="'.$budwol.'" title="Wpisz ilu chcesz u¿yæ budowniczych"><input type="submit" value="Ok">';
		}
	}
	else
	{
		$s = $labbud - time();
		$g = ceil($s / 3600);
		$m = ceil($s % 3600 / 60); 
		$sz = $s % 60;
		$g--;
		$m--;
		if ($m<10)
		$mm = '0'.$m;
		else
		$mm = $m;
		if ($s<10)
		$ss = '0'.$sz;
		else
		$ss = $sz;
		echo 'Trwa budowa jeszcze '. $g.':';
				if ($m<10)
		echo '0'.$m;
		else
		echo $m;
		echo ':';
		
		if ($sz<10)
		echo '0'.$sz;
		else
		echo $sz;
	}
	echo '</td><td><a href="?id=lab&x='.$_GET['x'].'&y='.$_GET['y'].'">laboratorium('.$lab.')</a></form></td></tr>';
	
	echo '<tr><td><form action="?id=buduj" method="GET">';

	
	if ($dombud <= time())
	{
	//echo $eler;
		if ($dombud != '0')
		{
			$dombud = 0;
			$dom++;
			$buduz = $buduz - $domb;
			$zaaza = "UPDATE `wioski` SET `dom` = '".$dom."', `dombud` = '0', `domb` = '0', `buduz` = '".$buduz."' WHERE `x`='".$_GET['x']."' AND `y`='".$_GET['y']."' AND `login`='".$login."' AND `s` = '".$swiat."'";
			if(mysql_query($zaaza)){
   //tu ewentualny komunikat typu "zmiany zapisano" etc.
}else{
   echo mysql_error();
   echo 'b³±d';
   exit();
   //koñczysz dzia³anie skryptu lub wy¶wietlasz b³±d
}
		}
	}
	if ($dombud == '0')
	{
		if ($dom == '30')
		{
			echo 'Budynek ca³kowicie rozbudowany!';
		}
		else
		{
			echo '<input type="hidden" name="id" value="buduj"><input type="hidden" name="co" value="dom"><input type="hidden" name="x" value="'.$_GET['x'].'"><input type="hidden" name="y" value="'.$_GET['y'].'"><input name="ile" size="4" value="'.$budwol.'" title="Wpisz ilu chcesz u¿yæ budowniczych"><input type="submit" value="Ok">';
		}
	}
	else
	{
		$s = $dombud - time();
		$g = ceil($s / 3600);
		$m = ceil($s % 3600 / 60); 
		$sz = $s % 60;
		$g--;
		$m--;
		if ($m<10)
		$mm = '0'.$m;
		else
		$mm = $m;
		if ($s<10)
		$ss = '0'.$sz;
		else
		$ss = $sz;		echo 'Trwa budowa jeszcze '. $g.':';
				if ($m<10)
		echo '0'.$m;
		else
		echo $m;
		echo ':';
		
		if ($sz<10)
		echo '0'.$sz;
		else
		echo $sz;
	}
	echo '</td><td><a href="?id=dom&x='.$_GET['x'].'&y='.$_GET['y'].'">Domy('.$dom.')</a></form></td></tr>';
	
	echo '<tr><td><form action="?id=buduj" method="GET">';
	
	if ($kolbud <= time())
	{
	//echo $eler;
		if ($kolbud != '0')
		{
			$kolbud = 0;
			$kol++;
			$buduz = $buduz - $kolb;
			$sta = "UPDATE `wioski` SET `kolbud` = '0', `kol` = '".$osl."', `kolbud` = '0', `kolb` = '0', `buduz` = '".$buduz."' WHERE `x`='".$_GET['x']."' AND `y`='".$_GET['y']."' AND `login`='".$login."' AND `s` = '".$swiat."'";
						if(mysql_query($sta)){
   //tu ewentualny komunikat typu "zmiany zapisano" etc.
}else{
   echo mysql_error();
   exit();
   //koñczysz dzia³anie skryptu lub wy¶wietlasz b³±d
}

		}
	}
	if ($kolbud == '0')
	{
		if ($kol == '1')
		{
			echo 'Budynek ca³kowicie rozbudowany!';
		}
		else
		{
			echo '<input type="hidden" name="id" value="buduj"><input type="hidden" name="co" value="kol"><input type="hidden" name="x" value="'.$_GET['x'].'"><input type="hidden" name="y" value="'.$_GET['y'].'"><input name="ile" size="4" value="'.$budwol.'" title="Wpisz ilu chcesz u¿yæ budowniczych"><input type="submit" value="Ok">';
		}
	}
	else
	{
		$s = $kolbud - time();
		$g = ceil($s / 3600);
		$m = ceil($s % 3600 / 60); 
		$sz = $s % 60;
		$g--;
		$m--;
		if ($m<10)
		$mm = '0'.$m;
		else
		$mm = $m;
		if ($s<10)
		$ss = '0'.$sz;
		else
		$ss = $sz;		echo 'Trwa budowa jeszcze '. $g.':';
				if ($m<10)
		echo '0'.$m;
		else
		echo $m;
		echo ':';
		
		if ($sz<10)
		echo '0'.$sz;
		else
		echo $sz;
	}
	echo '</td><td><a href="?id=kol&x='.$_GET['x'].'&y='.$_GET['y'].'">Stacja kolejowa('.$kol.')</a></form></td></tr>';
}	
	echo '<tr><td><form action="?id=buduj" method="GET">';
	
	if ($kulbud <= time())
	{
	//echo $eler;
		if ($kulbud != '0')
		{
			$kulbud = 0;
			$kul++;
			$buduz = $buduz - $kulb;
			$sta = "UPDATE `wioski` SET `kulbud` = '0', `kul` = '".$osl."', `kulbud` = '0', `kulb` = '0', `buduz` = '".$buduz."' WHERE `x`='".$_GET['x']."' AND `y`='".$_GET['y']."' AND `login`='".$login."' AND `s` = '".$swiat."'";
						if(mysql_query($sta)){
   //tu ewentualny komunikat typu "zmiany zapisano" etc.
}else{
   echo mysql_error();
   exit();
   //koñczysz dzia³anie skryptu lub wy¶wietlasz b³±d

		}
	}
	if ($kulbud == '0')
	{
		if ($kul == '1')
		{
			echo 'Budynek ca³kowicie rozbudowany!';
		}
		else
		{
			echo '<input type="hidden" name="id" value="buduj"><input type="hidden" name="co" value="kul"><input type="hidden" name="x" value="'.$_GET['x'].'"><input type="hidden" name="y" value="'.$_GET['y'].'"><input name="ile" size="4" value="'.$budwol.'" title="Wpisz ilu chcesz u¿yæ budowniczych"><input type="submit" value="Ok">';
		}
	}
	else
	{
		$s = $kulbud - time();
		$g = ceil($s / 3600);
		$m = ceil($s % 3600 / 60); 
		$sz = $s % 60;
		$g--;
		$m--;
		if ($m<10)
		$mm = '0'.$m;
		else
		$mm = $m;
		if ($s<10)
		$ss = '0'.$sz;
		else
		$ss = $sz;
		echo 'Trwa budowa jeszcze '. $g.':';
		if ($m<10)
		echo '0'.$m;
		else
		echo $m;
		echo ':';
		
		if ($sz<10)
		echo '0'.$sz;
		else
		echo $sz;
	}
	echo '</td><td><a href="?id=kul&x='.$_GET['x'].'&y='.$_GET['y'].'">Dom kultury('.$kul.')</a></form></td></tr>';
	echo '</table>';
	
}?>