<?
$sel = mysql_query("SELECT `login`, `kasa`, `kd`, `kdr`, `kdr2`, `p`, `czas`, `cenalot` FROM `user`");
while($se = mysql_fetch_row($sel))
{
if(mysql_query("INSERT INTO `users` (`login`, `kasa`, `kd`, `kdr`, `kdr2`, `p`, `czas`, `cenalot`, `s`) VALUES ('".$se[0]."', '".$se[1]."', '".$se[2]."', '".$se[3]."', '".$se[4]."', '".$se[5]."', '".$se[6]."', '".$se[7]."', '0')"));
echo '<br>'.$se[0];
}
?>