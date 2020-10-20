<?php

use Carbon\Carbon;

function carbon() {
    $mytime = new Carbon;
    $mytime->setTimezone('GMT+2');

    return $mytime;
}

function toFormatDate() {
    $mytime = carbon();

    echo $mytime->locale('fr')->isoFormat('dddd, Do MMMM YYYY, HH:mm');
}

function actualDay() {
    $mytime = carbon();
    $mytime->setTimezone('GMT+2');

    $today=$mytime->isoFormat('d');
    return $today;
}

function minutesToHours($time) {
    $hours = $time/60;
    $minutes = $time%60;
    if($minutes === 0){
        $minutes = "00";
    }
    $time = $hours.'h'.$minutes;

    return $time;
}

