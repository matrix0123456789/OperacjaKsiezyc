<?header('Content-Type: image/jpeg');
 
$img = imagecreatefromjpeg('kartka.jpg');
 
$width = 300;
$height = 225;
$mini = imagecreatetruecolor($width,$height);
 
imagecopyresized($mini,    // uchwyt obrazka wynikowego
$img,                      // uchwyt obrazka ¼ród³owego 
0,                         // wspó³rzêdna x punktu od którego zaczynamy nanoszenie
0,                         // wspó³rzêdna y punktu od którego zaczynamy nanoszenie
0,                         // wspó³rzêdna x punktu od którego zaczynamy kopiowanie
0,                         // wspó³rzêdna y punktu od którego zaczynamy kopiowanie
$width,                    // szeroko¶æ skopiowanego obrazka na obrazku wynikowym
$height,                   // wysoko¶æ skopiowanego obrazka na obrazku wynikowym
imagesx($img),             // szeroko¶æ obszaru kopiowanego z obrazka ¼ród³owego
imagesy($img));            // wysoko¶æ obszaru kopiowanego z obrazka ¼ród³owego
 
imagejpeg($mini, null, 70);
?>