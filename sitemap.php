<<? ?>?xml version="1.0" encoding="UTF-8"?<? ?>>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
   <url>
      <loc>http://operacja-ksiezyc.mkik.bitmar.net/</loc>
      <changefreq>weekly</changefreq>
      <priority>1.0</priority>
   </url>   <url>
      <loc>http://operacja-ksiezyc.mkik.bitmar.net/?lang=en</loc>
      <changefreq>weekly</changefreq>
      <priority>0.9</priority>
   </url>
   <url>
      <loc>http://operacja-ksiezyc.mkik.bitmar.net/?id=rang</loc>
      <changefreq>daily</changefreq>
      <priority>0.3</priority>
   </url>
   <url>
      <loc>http://operacja-ksiezyc.mkik.bitmar.net/?id=pomoc</loc>
      <changefreq>never</changefreq>
      <priority>0.5</priority>
   </url>
   <url>
      <loc>http://operacja-ksiezyc.mkik.bitmar.net/?id=pomoc-zanda</loc>
      <changefreq>never</changefreq>
	  <priority>0.5</priority>
	</url>
	<url>
	  <loc>http://operacja-ksiezyc.mkik.bitmar.net/?id=pomoc-bbc</loc>
	  <changefreq>never</changefreq>
	  <priority>0.5</priority>
	</url>
	<url>
	  <loc>http://operacja-ksiezyc.mkik.bitmar.net/?id=pomoc-plemiona.pl</loc>
	  <changefreq>never</changefreq>
	  <priority>0.5</priority>
	</url>
	<url>
	  <loc>http://operacja-ksiezyc.mkik.bitmar.net/?id=faq</loc>
	  <changefreq>monthly</changefreq>
	  <priority>0.5</priority>
	</url>
	<url>
	  <loc>http://operacja-ksiezyc.mkik.bitmar.net/?id=autorzy</loc>
	  <changefreq>monthly</changefreq>
      <priority>0.6</priority>
   </url>
	<url>
	  <loc>http://operacja-ksiezyc.mkik.bitmar.net/?id=ogrze</loc>
	  <changefreq>monthly</changefreq>
      <priority>0.6</priority>
   </url>
	<url>
	  <loc>http://operacja-ksiezyc.mkik.bitmar.net/?id=ogrze&amp;lang=en</loc>
	  <changefreq>monthly</changefreq>
      <priority>0.6</priority>
   </url>
   <?
	$sql_conn = mysql_connect('localhost', 'itechnolog_mkik', 'mateusz');
	mysql_select_db('itechnolog_ok');
	$zapytanie = "SELECT `login` FROM `user` ORDER BY `p` DESC";
	$idzapytaniaw = mysql_query($zapytanie);
	while ($wiersz = mysql_fetch_row($idzapytaniaw)) 
	{
		echo '<url>
		  <loc>http://operacja-ksiezyc.mkik.bitmar.net/?id=gracz&amp;gracz='.$wiersz[0].'</loc>
		  <changefreq>daily</changefreq>
		  <priority>0.1</priority>
	   </url>';
   }
   ?>
</urlset> 
