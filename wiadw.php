<form action="?id=wiadw2" method="POST"><table style="table-layout: fixed; width: 100%; border: 0; border-spacing: 0;">
<tr><td  style="width: 100px;">Do</td><td><input name="do" size="50" <? if($_GET['do'] != '') {echo 'value="'.$_GET['do'].'"';} ?>></td></tr>
<tr><td  style="width: 100px;">Temat</td><td><input name="tem" size="50"></td></tr>
<tr><td  style="width: 100px;">Tre?æ</td><td><textarea name="tre" cols="50" rows="15"></textarea></td></tr></table><input type="submit" value="ok"></form>