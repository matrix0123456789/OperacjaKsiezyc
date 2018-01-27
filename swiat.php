<table>
	<tr>
		<td>¦wiat</td>
		<td>wersja</td>
		<td>Jêzyk preferowany</td>
	</tr>
	<?
	$uac = "SELECT `s` from `users` WHERE `login` = '".$login."'";
	$uacc = mysql_query($uac);
	while ($mysn = mysql_fetch_row($uacc))
	{
$swiatytak[$mysn[0] + 1] = 'tak';
	}
	$uac = "SELECT `nr`, `wer`, `jenzyk` from `swiaty` Order By `nr` ASC";
	$uacc = mysql_query($uac);
	while ($mys = mysql_fetch_row($uacc))
	{
		echo'
			<tr>
				<td>';
				if($mys[0] == '999')
				echo 'beta';
				else
				echo $mys[0];
				echo'</td>
				<td>'.$mys[1].'</td>
				<td>'.$mys[2].'</td>';
				if($swiatytak[$mys[0]] == 'tak')
				{
				echo '<td><a href="/';
								if($mys[0] == '999')
				echo 'beta/';
				else
				echo '';
				echo '?sf='.$mys[0].'">Prze³±cz</a></td>';}
				else
				{
				echo '<td><a href="/';
				if($mys[0] == '999')
				echo 'beta/';
				else
				echo '/'.$mys[0];
				echo '?id=swiat&zapiszs='.$mys[0].'">Zarejestruj</a></td>';
				}
			echo '</tr>';
	}
	?>
</table>