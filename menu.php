<nav>
    <h2>Menu</h2>
    <ul>
        <li>
            <?
	if ($lang == 'pl')
	{
	echo '
            
            
            <a href="/">Strona główna</a>
        </li>
        <li>
            ';
            }
            elseif ($lang == 'eo')
            {
            echo '<a href="/">Pago cefa</a>
        </li>
        <li>
            ';
            }
            else
            {
            echo '<a href="/">Main Page</a>
        </li>
        <li>
            ';
            }
            if ($logp == 'ok')
            {
            $aaa = '';
            $aaaa = '';
            $no = 0;
            $zap = "SELECT `tytul`, `data`, `nr` FROM `Temat` WHERE `w` = 'main'";
            $idz = mysql_query($zap);
            while ($wiersz = mysql_fetch_row($idz))
            {
            $aaa = '';
            $zapa = "SELECT `czas` FROM `zobtem` WHERE `tem` = '".$wiersz[2]."' AND `user` = '".$login."'";
            //echo $zapa;
            $idza = mysql_query($zapa);
            while ($wiersza = mysql_fetch_row($idza))
            {
            $aaza = $wiersza[0];
            }
            if ($wiersz[1] > $aaza)
            {
            $no = 1;
            $aaa = "<b>
                ";
                $aaaa = "
            </b>";
            }
            }
            echo $aaa.'<a href="?id=for&amp;org=main">Forum</a>'.$aaaa.'
        </li>
        <li>
            ';
            $aaa = $aaaa = '';
            if ($lang == 'pl')
            {
            echo '<a href="?id=rang">Ranking</a>
        </li>
        <li>
            <a href="?id=pomoc">Pomoc</a>
        </li>
        <li>
            <a href="?id=autorzy">Autorzy</a>
        </li><hr/>
        <li>
            <a href="?id=kd">Kosmodrom</a>
        </li>
        <li>
            <a href="?id=shop1">Sklep rakiet</a>
        </li>
        <li>
            <a href="?id=koncesja">Koncesja</a>
        </li>
        <li>
            <a href="?id=ludzie">Ludzie</a>
        </li>
        <li>
            <a href="?id=mapa">Mapa księżyca</a>
        </li>
        <li>
            <ul>
                ';
                }
                else if ($lang == 'eo')
                {
                echo '<a href="?id=rang">Ranking</a>
            </li>
        <li>
            <a href="?id=pomoc">Help</a>
        </li>
        <li>
            <a href="?id=autorzy">A&#365;toroj</a>
        </li>
        <hr/>
        <li>
            <a href="?id=kd">Kosmodrom</a>
        </li>
        <li>
            <a href="?id=shop1">Vendejo raketojn</a>
        </li>
        <li>
            <a href="?id=koncesja">Permeso</a>
        </li>
        <li>
            <a href="?id=ludzie">Homoj</a>
        </li>
        <li>
            <a href="?id=mapa">Mapo lunon</a>
        </li>
        <li>
            <ul>
                ';
                }
                else
                {
                echo '<a href="?id=rang">Ranking</a>
            </li>
        <li>
            <a href="?id=pomoc">Help</a>
        </li>
        <li>
            <a href="?id=autorzy">Autors</a>
        </li>
        <hr />
        <li>
            <a href="?id=kd">Cosmodrome</a>
        </li>
        <li>
            <a href="?id=shop1">Rocket shop</a>
        </li>
        <li>
            <a href="?id=koncesja">Concess</a>
        </li>
        <li>
            <a href="?id=ludzie">People</a>
        </li>
        <li>
            <a href="?id=mapa">Moon map</a>
        </li>
        <li>
            <ul>
                ';
                }
                $zapytanie = "SELECT `nazwa`, `X`, `Y`, `typ` FROM `wioski` WHERE `login` = '".$login."' AND `s` = '".$swiat."'";
                $idzapytaniaa = mysql_query($zapytanie);
                while ($wiersz = mysql_fetch_row($idzapytaniaa))
                {
                $lot = 'tak';
                echo '<li>
                    <a href="?id=';
			if ($wiersz[3] == '2')
			{
				echo 'przeglad';
			}
			else if ($wiersz[3] == '1')
			{
				echo 'lot';
			}
			echo '&amp;x='.$wiersz[1].'&amp;y='.$wiersz[2].'">'.$wiersz[0].'('.$wiersz[1].'|'.$wiersz[2].')</a>
                </li>';
                }

                if ($lang == 'pl')
                {
                echo '
            </ul>
        </li>
        <li>
            <a href="?id=org">Organizacje</a>
        </li>
        <li>
            <ul>
                ';
                }
                elseif ($lang == 'eo')
                {
                echo '
            </ul>
        </li>
        <li>
            <a href="?id=org">Organizaĵoj</a>
        </li>
        <li>
            <ul>
                ';
                }
                else
                {
                echo '
            </ul>
        </li>
        <li>
            <a href="?id=org">Organizations</a>
        </li>
        <li>
            <ul>
                ';
                }
                $zapytanie = "SELECT `org` FROM `uwo` WHERE `login` = '".$login."' AND `s` = '".$swiat."'";
                $idzapytaniaw = mysql_query($zapytanie);
                //echo $zapytanie;
                while ($wiers = mysql_fetch_row($idzapytaniaw))
                {
                echo '<li>
                    ';
                    $no = 0;
                    $zap = "SELECT `tytul`, `data`, `nr` FROM `Temat` WHERE `w` = '".$wiers[0]."'";
                    //echo $zap;
                    $idz = mysql_query($zap);
                    while ($wiersz = mysql_fetch_row($idz))
                    {
                    $aaa = '';
                    $zapa = "SELECT `czas` FROM `zobtem` WHERE `tem` = '".$wiersz[2]."' AND `user` = '".$login."'";
                    //echo $zapa;
                    $idza = mysql_query($zapa);
                    while ($wiersza = mysql_fetch_row($idza))
                    {
                    $aaza = $wiersza[0];
                    }
                    if ($wiersz[1] > $aaza)
                    {
                    $no = 1;
                    $aaa = "<b>
                        ";
                        $aaaa = "
                    </b>";
                    }
                    }
                    echo $aaa.'<a href="?id=org2&amp;org='.$wiers[0].'">'.$wiers[0].'</a>'.$aaaa.'
                </li>';
                $aaa = $aaaa = '';
                }
                $pa = "SELECT * FROM `news` WHERE `do` = '".$login."' AND `prz` = '0' AND `typ` = '1'";
                $po = mysql_query($pa);
                if ($lang == 'pl')
                {echo '
            </ul>
        </li>
        <li>
            <a href="?id=profil">Profil i ustawienia</a>
        </li>
        <li>
            <a href="?id=wiadw">Nowa Wiadomość</a>
        </li>
        <li>
            ';
            }
            else if ($lang == 'eo')
                {echo '
            </ul>
        </li>
        <li>
            <a href="?id=profil">Profil i ustawienia</a>
        </li>
        <li>
            <a href="?id=wiadw">Nova Wiadomość</a>
        </li>
        <li>
            ';
            }
            else
            echo '
        
    </ul></li><li>
            <a href="?id=profil">settings</a>
        </li><li>
            <a href="?id=wiadw">New Message</a>
        </li><li>
            ';
            while ($py = mysql_fetch_row($po))
            {
            $wiadok = "ok";
            }
            if ($wiadok == "ok")
            {
            echo '<b>
                
                    <a href="?id=wiado"><img src="mail.png" alt="WIADOMO¦Ć!:">SKRZYNKA ODBIORCZA</a>
            </b>';
            }
            else
            {
            if ($lang == 'pl')
            {
            echo '<a href="?id=wiado">Skrzynka Odbiorcza</a>';

            }
            else
            {
            echo '<a href="?id=wiado">Mailbox</a>';
            }
            }
            if ($lang == 'pl')
            echo '
        </li><hr /><li>
            Kasa: <span id="kasa">'.$money.'</span>$
        </li><li>
            ';
            else
            echo '
        </li><hr /><li>
            Money: <span id="kasa">'.$money.'</span>$
        </li><li>
            ';
            }
            else
            {
            if ($lang == 'pl')
            {
            echo '
            <a href="?id=rang">Ranking</a>
        </li><li>
            <a href="?id=pomoc">Pomoc</a>
        </li><li>
            <a href="?id=autorzy">Autorzy</a>
        </li><hr /><li>
            ';
            }

            else
            {
            echo '
            <a href="?id=rang">Ranking</a>
        </li><li>
            <a href="?id=pomoc">Help</a>
        </li><li>
            <a href="?id=autorzy">Authors</a>
        </li><hr /><li>
            ';
            }
            }
            echo '<a href="http://mkik.bitmar.net">Mkik</a>
        </li><hr /><li>
            <span id="graczy">
                ';
                $ilouu = "SELECT count(login) as ile FROM `user`";
                $ilouz = mysql_query($ilouu);
                $il = mysql_fetch_array($ilouz);
                if ($lang == 'pl')
                echo $il['ile'].'
            </span> Graczy
        </li><li>
            <span id="graczytydzien">
                ';
                else
                echo $il['ile'].'
            </span> Players
        </li><li>
            <span id="graczytydzien">
                ';
                $czasprzedw = time() - 604800;
                $ilouulw = "SELECT count(login) as ile FROM `user` WHERE `czas` >= '".$czasprzedw."'";
                $ilouzlw = mysql_query($ilouulw);
                $illw = mysql_fetch_array($ilouzlw);
                if ($lang == 'pl')
                echo $illw['ile'].'
            </span> Aktywnych w tym tygodniu
        </li><li>
            <span id="graczyonline">
                ';
                else
                echo $illw['ile'].'
            </span> Active in this week
        </li><li>
            <span id="graczyonline">
                ';
                $czasprzed = time() - 100;
                $ilouul = "SELECT count(login) as ile FROM `user` WHERE `czas` >= '".$czasprzed."'";
                $ilouzl = mysql_query($ilouul);
                $ill = mysql_fetch_array($ilouzl);
                echo $ill['ile'].'
            </span> OnLine
        </li><li>
            ';
            echo '
        </li><hr /><li>
            <a href="http://mkik.pl">Mkik</a>
        </li><li>
            <a href="http://www.txpoker.cba.pl " title="TX Poker

Poker dla każdego">TX Poker Poker dla każdego</a>
        </li>';
        ?>
        <li>
            <b>
                <a href="http://WebMP3.pl" title="Pobierz pliki MP3! WebMP3.pl 
# Poprawny zapis formatu *.mp3 przy ściąganiu pliku!
# Oryginalna nazwa ściąganego pliku.
# Wszystko - zupełnie za darmo! ">Pobierz pliki MP3! WebMP3.pl</a>
            </b>
        </li>
    </ul>
</nav>
<?
if ($styl2!='mob')
echo '<div id="reklamy">
    <a href="http://www.windows7.pl/" title="Windows 7 (Seven) - Serwis informacyjny">
        <img src="http://www.windows7.pl/img/windows7-button.png" width="107" height="34" alt="Windows 7 (Seven)" />
    </a>
    <a href="http://gry.toplista.pl/?we=matrix01234">
        <span style="width:120px;height:40px;overflow:hidden;background:#EE8800;border:2px;border-color:#FFAA22;border-style:outset;padding:5px;font:bold 11px verdana;color:white;text-decoration:none;text-align:center;cursor:pointer">
            Lista przebojów<br />najlepszych stron:<br />gry komputerowe
        </span>
    </a>
    <a href="http://mmo.toplista.pl/?we=matrix012343">
        <img src="http://mmo.toplista.pl/toplista.pl/mmo/button.gif" width="120" height="40" alt="gry toplisty" />
    </a>
    <a href="http://mmo.top-100.pl/?we=matrix012341">
        <img src="http://mmo.top-100.pl/top-100.pl/mmo/button.gif" width="120" height="40" alt="Toplista gier mmo" />
    </a>
    <a href="http://gry.najlepsze.net/?we=matrix012342">
        <span style="width:120px;height:40px;overflow:hidden;background:#00EE00;border:2px;border-color:#22FF22;border-style:outset;padding:5px;font:bold 11px verdana;color:white;text-decoration:none;text-align:center;cursor:pointer">Najlepsza toplista stron z Grami !!</span>
    </a>
</div>
<!--[if lte IE 6]>
Urzywasz Internet Explorera w wersji 6 lub starszej. Jest to stara przegl±darka, więc strona może wy¶wietlać się błędnie. Czytaj więcej na <a href="http://ie6.pl">ie6.pl</a>.
<![endif]-->';
?>