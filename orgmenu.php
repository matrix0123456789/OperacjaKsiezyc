<?
if($lang == 'pl')
echo '<ul class="org">
<li><a href="?id=org2&org='.$_GET['org'].'">Opis</a></li>
<li><a href="?id=orglist&org='.$_GET['org'].'">Lista graczy</a></li>
<li><a href="?id=for&org='.$_GET['org'].'"">Forum</a></li>
</ul>';
else
echo '<ul class="org">
<li><a href="?id=org2&org='.$_GET['org'].'">Decsription</a></li>
<li><a href="?id=orglist&org='.$_GET['org'].'">List of players</a></li>
<li><a href="?id=for&org='.$_GET['org'].'"">Forum</a></li>
</ul>';
?>