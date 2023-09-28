<?php

function formatDate(string $date): string
{
    if (!str_contains($date, '-')) {
        throw new InvalidArgumentException('Invalid date');
    }

    $dateArray = explode('-', $date);

    if (!checkdate($dateArray[1], $dateArray[2], $dateArray[0])) {
        throw new InvalidArgumentException('Invalid date');
    }

    $timestamp = mktime(0, 0, 0, $dateArray[1], $dateArray[2], $dateArray[0]);
    $formattedDate = date("d/m/Y", $timestamp);
    return $formattedDate;
}

function validDate(string $date): bool
{
    if (empty($date) || !str_contains($date, '-')) {
        return false;
    }

    $dateArray = explode('-', $date);

    if (!checkdate($dateArray[1], $dateArray[2], $dateArray[0])) {
        return false;
    }

    return true;
}

function validURL(string $URL): bool
{
    if (!empty($URL) && !filter_var($URL, FILTER_VALIDATE_URL)) {
        return false;
    }
    return true;
}