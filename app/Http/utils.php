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

