<?php

$url = getenv('JAWSDB_URL');

if ($url) {
    echo $url;
} else {
    echo 'La variable JAWSDB_URL n\'est pas définie.';
}
