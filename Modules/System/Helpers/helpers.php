<?php

use Illuminate\Support\Str;

function plural($string)
{
    return Str::plural($string);
}

function datetimeGreeting()
{
    $now = now()->toTimeString();

    $greeting = '';

    if ($now > date('H:i:s', strtotime('23:59:59'))) $greeting = "morning";
    if ($now >= date('H:i:s', strtotime('12:00:00'))) $greeting = "afternoon";
    if ($now >= date('H:i:s', strtotime('18:00:00'))) $greeting = "evening";

    return $greeting;
}