<?php

function format_time($sec)
{
    $minutes = round($sec / 60);
    $seconds = round($sec % 60);
    $time = array(
        'minutes' => $minutes,
        'seconds' => $seconds
    );

    return $time;
}


$mytime = format_time(400);
echo "Munites: " . $mytime['minutes'] . " Seconds: " . $mytime['seconds'];
