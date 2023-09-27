<?php

function formatDate(string $date): string
{
    if (!str_contains($date, '-')) {
        throw new InvalidArgumentException('Invalid date');
    }

    $dateArray = explode('-', $date);

    if (!checkDate($dateArray[1], $dateArray[2], $dateArray[0])) {
        throw new InvalidArgumentException('Invalid date');
    }

    $timestamp = mktime(0, 0, 0, $dateArray[1], $dateArray[2], $dateArray[0]);
    $formattedDate = date("d/m/Y", $timestamp);
    return $formattedDate;
}