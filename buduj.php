<?
echo '<div class="zawiad">';
$zapytanie = "SELECT `fabrbud`, `bud`, `kd`, `ele`, `buduz`, `kopalniaroz`, `kopalnia`, `las`, `pol`, `lab`, `dom` FROM `wioski` WHERE `x` = '".$_GET['x']."' AND `y` = '".$_GET['y']."' AND `login` = '".$login."' AND `s` = '".$swiat."'";
$idzapytania = mysql_query($zapytanie);
while ($wiersz = mysql_fetch_row($idzapytania)) 
{
	$buduz = $wiersz[4] + $_GET['ile'];
	$masz = $wiersz[1] - $wiersz[4];
	if ($_GET['ile'] <= $masz)
	{
		$prz = $_GET['ile'] * 500;
		if ($popr >= $prz)
		{
			if ($_GET['co'] == 'fabryka')
			{
				$i = 1;
				$asa = 86400;
				while ($i < $wiersz[0])
				{
					$i++;
					$asa = $asa * 2;
				}
				$asa1 = $asa / $_GET['ile'];
				$asa2 = time() + $asa1;
				$aa = "UPDATE `wioski` SET `fabrbudr` = '".$asa2."', `buduz` = '".$buduz."', `fabrbudb` = '".$_GET['ile']."' WHERE `x`='".$_GET['x']."' AND `y`='".$_GET['y']."' AND `login`='".$login."' AND `s` = '".$swiat."'";
				//echo $aa;
				//echo time();
				$ab = mysql_query($aa);
				
			}
			else if ($_GET['co'] == 'kd')
			{
				$i = 1;
				$asa = 86400;
				while ($i < $wiersz[2])
				{
					$i++;
					$asa = $asa * 2;
				}
				$asa1 = $asa / $_GET['ile'];
				$asa2 = time() + $asa1;
				$ba = "UPDATE `wioski` SET `kdr` = '".$asa2."', `buduz` = '".$buduz."', `kdb` = '".$_GET['ile']."' WHERE `x`='".$_GET['x']."' AND `y`='".$_GET['y']."' AND `login`='".$login."' AND `s` = '".$swiat."'";
				$bb = mysql_query($ba);
			}
			else if ($_GET['co'] == 'ele')
			{
				//echo '2,5';
				$asa = 86400;
				while ($i < $wiersz[3])
				{
					$i++;
					$asa = $asa * 2;
				}
				$asa1 = $asa / $_GET['ile'];
				$asa2 = time() + $asa1;
				$ca = "UPDATE `wioski` SET `eler` = '".$asa2."', `buduz` = '".$buduz."', `eleb` = '".$_GET['ile']."' WHERE `x`='".$_GET['x']."' AND `y`='".$_GET['y']."' AND `login`='".$login."' AND `s` = '".$swiat."'";
				$cb = mysql_query($ca);
			}
			else if ($_GET['co'] == 'kop')
			{
				//echo '2,5';
				$asa = 86400;
				$i = 1;
				while ($i < $wiersz[6])
				{
					$i++;
					$asa = $asa * 2;
				}
				$asa1 = $asa / $_GET['ile'];
				$asa2 = time() + $asa1;
				$da = "UPDATE `wioski` SET `kopalniaroz` = '".$asa2."', `buduz` = '".$buduz."', `kopalniab` = '".$_GET['ile']."' WHERE `x`='".$_GET['x']."' AND `y`='".$_GET['y']."' AND `login`='".$login."' AND `s` = '".$swiat."'";
				$db = mysql_query($da);
				//echo  $da;
			}
			else if ($_GET['co'] == 'mag')
			{
				//echo '2,5';
				$asa = 86400;
				$i = 1;
				while ($i < $wiersz[6])
				{
					$i++;
					$asa = $asa * 2;
				}
				$asa1 = $asa / $_GET['ile'];
				$asa2 = time() + $asa1;
				$ea = "UPDATE `wioski` SET `magbud` = '".$asa2."', `buduz` = '".$buduz."', `magb` = '".$_GET['ile']."' WHERE `x`='".$_GET['x']."' AND `y`='".$_GET['y']."' AND `login`='".$login."' AND `s` = '".$swiat."'";
				$eb = mysql_query($ea);
			}
			else if ($_GET['co'] == 'las')
			{
				//echo '2,5';
				$asa = 86400;
				$i = 1;
				while ($i < $wiersz[7])
				{
					$i++;
					$asa = $asa * 2;
				}
				$asa1 = $asa / $_GET['ile'];
				$asa2 = time() + $asa1;
				$da = "UPDATE `wioski` SET `lasm` = '".$asa2."', `buduz` = '".$buduz."', `lasb` = '".$_GET['ile']."' WHERE `x`='".$_GET['x']."' AND `y`='".$_GET['y']."' AND `login`='".$login."' AND `s` = '".$swiat."'";
				$db = mysql_query($da);
			}
			else if ($_GET['co'] == 'pol')
			{
				//echo '2,5';
				$asa = 86400;
				$i = 1;
				while ($i < $wiersz[8])
				{
					$i++;
					$asa = $asa * 2;
				}
				$asa1 = $asa / $_GET['ile'];
				$asa2 = time() + $asa1;
				$da = "UPDATE `wioski` SET `polbud` = '".$asa2."', `buduz` = '".$buduz."', `polb` = '".$_GET['ile']."' WHERE `x`='".$_GET['x']."' AND `y` = '".$_GET['y']."' AND `login`='".$login."' AND `s` = '".$swiat."'";
				$db = mysql_query($da);
			}
			else if ($_GET['co'] == 'lab')
			{
				//echo '2,5';
				$asa = 86400;
				$i = 1;
				while ($i < $wiersz[9])
				{
					$i++;
					$asa = $asa * 2;
				}
				$asa1 = $asa / $_GET['ile'];
				$asa2 = time() + $asa1;
				$da = "UPDATE `wioski` SET `labbud` = '".$asa2."', `buduz` = '".$buduz."', `labb` = '".$_GET['ile']."' WHERE `x`='".$_GET['x']."' AND `y` = '".$_GET['y']."' AND `login`='".$login."' AND `s` = '".$swiat."'";
				$db = mysql_query($da);
			}
			else if ($_GET['co'] == 'dom')
			{
				//echo '2,5';
				$asa = 86400;
				$i = 1;
				while ($i < $wiersz[10])
				{
					$i++;
					$asa = $asa * 2;
				}
				$asa1 = $asa / $_GET['ile'];
				$asa2 = time() + $asa1;
				$da = "UPDATE `wioski` SET `dombud` = '".$asa2."', `buduz` = '".$buduz."', `domb` = '".$_GET['ile']."' WHERE `x`='".$_GET['x']."' AND `y` = '".$_GET['y']."' AND `login`='".$login."' AND `s` = '".$swiat."'";
				$db = mysql_query($da);
			}
			else if ($_GET['co'] == 'osl')
			{
				$asa = 86400;
				$asa1 = $asa / $_GET['ile'];
				$asa2 = time() + $asa1;
				$ga = "UPDATE `wioski` SET `oslbud` = '".$asa2."', `buduz` = '".$buduz."', `oslb` = '".$_GET['ile']."' WHERE `x`='".$_GET['x']."' AND `y`='".$_GET['y']."' AND `login`='".$login."' AND `s` = '".$swiat."'";
				echo $ga;
				$gb = mysql_query($ga);
			}
			else if ($_GET['co'] == 'kol')
			{
				$asa = 86400;
				$asa1 = $asa / $_GET['ile'];
				$asa2 = time() + $asa1;
				$ga = "UPDATE `wioski` SET `kolbud` = '".$asa2."', `buduz` = '".$buduz."', `kolb` = '".$_GET['ile']."' WHERE `x`='".$_GET['x']."' AND `y`='".$_GET['y']."' AND `login`='".$login."' AND `s` = '".$swiat."'";
				$gb = mysql_query($ga);
			}
			else if ($_GET['co'] == 'kul')
			{
				$asa = 86400;
				$asa1 = $asa / $_GET['ile'];
				$asa2 = time() + $asa1;
				$ga = "UPDATE `wioski` SET `kulbud` = '".$asa2."', `buduz` = '".$buduz."', `kulb` = '".$_GET['ile']."' WHERE `x`='".$_GET['x']."' AND `y`='".$_GET['y']."' AND `login`='".$login."' AND `s` = '".$swiat."'";
				$gb = mysql_query($ga);
			}
			else if ($_GET['co'] == '')
			{
				echo 'B³±d: nie okre¶lono co budowaæ.<br><br>';
			}
			else
			{
				echo 'B³±d: nie ma takiego budynku.<br><br>';
			}
		}
		else
		{
			echo 'Brak pr±du<br><br>';
		}
	}
	else
	{
		echo 'Nie masz tylu budowniczych<br><br>';
	}
}
echo '</div>';
include('fabryka.php');
?>