<?
if ($_POST['ilo'] > $zelazo)
{
	echo '<div class="zawiad">Za ma³o ¿elaza</div><br><br>';
}
else
{
	$z = "SELECT `budr`, `fabrbud`, `budrc`, `bud` FROM `wioski` WHERE `login` = '".$login."' AND `x` = '".$_GET['x']."' AND `y` = '".$_GET['y']."' AND `s` = '".$swiat."'";
	$gosc = mysql_query($z);
	while ($i = mysql_fetch_row($gosc))
	{
				$fabryka = $i[1];
				$y = 1;
				$zelazo10 = $zelazo3 - $_POST['ilo'];
				$godz = 60;
				while ($y < $fabryka)
				{
					$y++;
					$godz = $godz * 1.5;
				}
				$sek = $godz / 3600;
				$cz1 = $i[0] / $sek;
				$cz2 = $cz1 + $i[2];
				if ($cz2 > time())
				{
					$u = $_POST['ilo'] + $i[0];
				}
				else
				{
					$bud = $i[3] + $i[0];
					$u = $_POST['ilo'];
					$zz = ", `budrc` = '".time()."', `bud` = '".$bud."'";
				}
				$zelazo = $zelazo - $_POST['ilo'];
		
	}
	$z = "UPDATE `wioski` SET `zelazo` = '".$zelazo."', `budr` = '".$u."'".$zz." WHERE `login` = '".$login."' AND `x` = '".$_GET['x']."' AND `y` = '".$_GET['y']."' AND `s` = '".$swiat."'";
	
	
	$go = mysql_query($z);
}
	include('fabryka.php');
?>