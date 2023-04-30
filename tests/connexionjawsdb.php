<?php

$url = getenv('test');

if ($url) {
    echo $url;
} else {
    echo 'La variable JAWSDB_URL n\'est pas définie.';
}
