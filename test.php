<?php

$img_src = 'hs://placedog.net/  200/150';

if (!filter_var($img_src, FILTER_VALIDATE_URL, )) {
    echo '<p>Invalid URL</p>';
}