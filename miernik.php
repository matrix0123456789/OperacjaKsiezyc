<?php
function getmicrotime(){
    list($usec, $sec) = explode(" ",microtime());
    return ((float)$usec + (float)$sec);
    }

$time_start = getmicrotime();
    
for ($i=0; $i < 10000; $i++){
    //nie r�b nic przez 1000 iteracji
    }

$time_end = getmicrotime();
$time = $time_end - $time_start;

echo "Nie robi� nic przez $time sekund";
?> 