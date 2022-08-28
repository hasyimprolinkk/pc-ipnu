<?php

namespace App\Helpers;

function indo_date($date)
{
    $timestamp = strtotime($date);
    return date('d F Y', $timestamp);
}

