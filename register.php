<center>
	<form action="?" method="POST" id="form">Aby siê zarejestrowaæ wystarczy podaj swój login i has³o<br></center>
<input name="id" value="register_ok" type="hidden">
Login<input id="login" name="login"><br>
Has³o<input id="haslo" name="haslo" type="password"><br>
Powtórz has³o<input id="haslo2" name="haslo2" type="password"><br><br>
<noscript>Podchwytliwe pytanie antyspamowe<br>Jak ma na <b>imiê</b> Monika Brodka?<input name="cap"></noscript>
<input type="hidden" id="hid" name="hid">
<input type="hidden" name="hid2">
<input name="hid3" class="hid3">
Wybierz Œwiat<select name="zapiszs"><?
	$uac = "SELECT `nr`, `wer`, `jenzyk` from `swiaty` Order By `nr` ASC";
	$uacc = mysql_query($uac);
	while ($mys = mysql_fetch_row($uacc))
	{
		echo '<option>';
				if($mys[0] == '999')
				echo 'beta';
				else
				echo $mys[0];
			echo '</option>';
	}
	?>
	</select><br><br>

Dane wy¶wietlane w profilu (Ich podawanie nie jest obowi±zkowe)<br>
Gadu-gadu<img id="ggicon" src="http://www.gadu-gadu.pl/users/status.asp?id=0" alt=""><input name="gg" onkeypress="ggicon.src='http://www.gadu-gadu.pl/users/status.asp?id=' + this.value"><br>
E-mail<input name="mail"><br>
Jabber (w tym AQQ 2.0 i tlen) <input name="jabber"><br>
<center><input type="submit" value="Rejestracja"></center></form>
<script type="text/javascript">
<!--
  document.getElementById( "hid" ).value = '?';
//-->
</script>