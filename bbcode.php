<?
$tresc = str_replace("<", "&#60;", $tresc);
$tresc = str_replace(">", "&#62;", $tresc);
$tresc = str_replace("  ", "&#8194;", $tresc);

//³amanie linii
//$tresci = nl2br($tresc);
//$tresc = $tresci;
//pogrubienie, pochylenie, podkreslenie, przekreslenie, indeks gorny i dolny
$tresc = preg_replace("#\[b\](.*?)\[/b\]#si",'<b>\\1</b>',$tresc);
$tresc = preg_replace("#\[i\](.*?)\[/i\]#si",'<i>\\1</i>',$tresc);
$tresc = preg_replace("#\[u\](.*?)\[/u\]#si",'<u>\\1</u>',$tresc);
$tresc = preg_replace("#\[s\](.*?)\[/s\]#si",'<s>\\1</s>',$tresc);
$tresc = preg_replace("#\[sup\](.*?)\[/sup\]#si",'<sup>\\1</sup>',$tresc);
$tresc = preg_replace("#\[sub\](.*?)\[/sub\]#si",'<sub>\\1</sub>',$tresc);

//lista
$tresc = preg_replace("#\[ul\](.*?)\[/ul\]#si",'<ul>\\1</ul>',$tresc);
$tresc = preg_replace("#\[list\](.*?)\[/list\]#si",'<ul>\\1</ul>',$tresc);
$tresc = preg_replace("#\[li\](.*?)\[/li\]#si",'<li>\\1</li>',$tresc);
$tresc = preg_replace("#\[*\](.*?)<br>#si",'<li>\\1</li>',$tresc);
//tabela
$tresc = preg_replace("#\[table\](.*?)\[/table\]#si",'<table>\\1</table>',$tresc);
$tresc = preg_replace("#\[tr\](.*?)\[/tr\]#si",'<tr>\\1</tr>',$tresc);
$tresc = preg_replace("#\[td\](.*?)\[/td]#si",'<td>\\1</td>',$tresc);


//Cieñ
$tresc = preg_replace("#\[shadow=(.*?)\](.*?)\[/shadow\]#si",'<span style="text-shadow: \\1">\\2</span>',$tresc);
$tresc = preg_replace("#\[shadow\](.*?)\[/shadow\]#si",'<span style="text-shadow: 2px 2px 3px;">\\1</span>',$tresc);

//wstawianie obrazków bez tekstu alternatywnego
$tresc = preg_replace("#\[img\](.*?)\[/img\]#si",'<img src="\\1" alt="">',$tresc);
//wstawianie obrazków z tekstem alternatywnym
$tresc = preg_replace("#\[img=(.*?)\](.*?)\[/img\]#si",'<img src="\\1" alt="\\2">',$tresc);

//kolory
$tresc = preg_replace("#\[color=(.*?)\](.*?)\[/color\]#si",'<span style="color: \\1">\\2</span>',$tresc);

//wielko¶æ
$tresc = preg_replace("#\[size=(.*?)\](.*?)\[/size\]#si",'<span style="font-size: \\1">\\2</span>',$tresc);

//czcionka
$tresc = preg_replace("#\[font=(.*?)\](.*?)\[/color\]#si",'<span style="font-family: \\1">\\2</span>',$tresc);

//odno¶nik www - nie dodaje http
$tresc = preg_replace("#\[url\](http.*?)\[/url\]#si", "<a href=\"\\1\">\\1</a>", $tresc);
//odno¶nik www z opisem - nie dodaje http
$tresc = preg_replace("#\[url=(http.*?)\](.*?)\[/url\]#si", "<a href=\"\\1\" TARGET=\"_blank\">\\2</a>", $tresc);
//odno¶nik www - dodaje http
$tresc = preg_replace("#\[url\](.*?)\[/url\]#si", "<a href=\"http://\\1\">\\1</a>", $tresc);
//odno¶nik www - dodaje http
$tresc = preg_replace("#\[url=(.*?)\](.*?)\[/url\]#si", "<a href=\"http://\\1\">\\2</a>", $tresc);

//Gracz
$tresc = preg_replace("#\[player=(.*?)\](.*?)\[/player\]#si", "<a href=\"?id=gracz&gracz=\\1\">\\2</a>", $tresc);
$tresc = preg_replace("#\[user\](.*?)\[/user\]#si",'<a href=\"/?id=gracz&gracz=\\1">\\1</a>',$tresc);
$tresc = preg_replace("#\[player\](.*?)\[/player\]#si",'<a href=\"/?id=gracz&gracz=\\1">\\1</a>',$tresc);

//organizacja

$tresc = preg_replace("#\[ally\](.*?)\[/ally\]#si",'<a href=\"/?id=org2&org=\\1">\\1</a>',$tresc);
$tresc = preg_replace("#\[organizacja\](.*?)\[/organizacja\]#si",'<a href=\"/?id=org2&org=\\1">\\1</a>',$tresc);
$tresc = preg_replace("#\[organization\](.*?)\[/organization\]#si",'<a href=\"/?id=org2&org=\\1">\\1</a>',$tresc);

$i = 0;
while ($i < 100)
{
	$i++;
	// cytat bez autora
	$tresc = preg_replace("#\[quote\](.*?)\[/quote\]#si",'Cytat<div>\\1</div>',$tresc);
	// cytat z dat¹
	$tresc = preg_replace("#\[quote date=(.*?)\](.*?)\[/quote\]#si",'\\1 napisno:<div>\\2</div>',$tresc);
	// cytat z autorem
	$tresc = preg_replace("#\[quote=(.*?)\](.*?)\[/quote\]#si",'\\1 napisa³:<div>\\2</div>',$tresc);
	$tresc = preg_replace("#\"(.*?)\"#si",'&#8222;\\1&#8221;',$tresc);
}
//kod
$tresc = preg_replace("#\[code\](.*?)\[/code\]#si",'<span style="font-family: Courier New">\\1</span>',$tresc);

//Serwisy i komunikacja
$tresc = preg_replace("#\[google\](.*?)\[/google\]#si", "<a href=\"http://google.pl/search?q=\\1\">\\1</a>", $tresc);
$tresc = preg_replace("#\[wikipedia\](.*?)\[/wikipedia\]#si", "<a href=\"http://pl.wikipedia.org/wiki/\\1\">\\1</a>", $tresc);
$tresc = preg_replace("#\[wikipedia=(.*?)\](.*?)\[/wikipedia\]#si", "<a href=\"http://\\1.wikipedia.org/wiki/\\2\">\\2</a>", $tresc);
$tresc = preg_replace("#\[bing\](.*?)\[/bing\]#si", "<a href=\"http://www.bing.com/search?q=\\1/\">\\1</a>", $tresc);
$tresc = preg_replace("#\[gg\](.*?)\[/gg\]#si", "<a href=\"gg://\\1\">\\1</a>", $tresc);
$tresc = preg_replace("#\[xmpp\](.*?)\[/xmpp\]#si", "<a href=\"xmpp://\\1\">\\1</a>", $tresc);
$tresc = preg_replace("#\[jabber\](.*?)\[/jabber\]#si", "<a href=\"xmpp://\\1\">\\1</a>", $tresc);
$tresc = preg_replace("#\[jid\](.*?)\[/jid\]#si", "<a href=\"xmpp://\\1\">\\1</a>", $tresc);
$tresc = preg_replace("#\[youtube\]http://www.youtube.com/watch?v=(.*?)\[/youtube\]#si", '<object width="480" height="385"><param name="movie" value="http://www.youtube.com/v/'."\\1".'&hl=pl_PL&fs=1&"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/'."\\1".'&hl=pl_PL&fs=1&" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="480" height="385"></embed></object>', $tresc);
//$tresc = preg_replace("#\[\](.*?)\[/\]#si", "<a href=\"http://\">\\1</a>", $tresc);


$tresc = str_replace("<br>
<br>", "</p><p>", $tresc);
$trescc = str_replace("<br><br>", "</p><p>", $tresc);
$tresc = str_replace("<br>/n<br>", "</p><p>", $trescc);
$trescc = str_replace("/n", "<br>", $tresc);
$tresc = '<p>'.$trescc.'</p>';
?>