<?php

if (session_status() === PHP_SESSION_NONE) {


    if(isset($_ENV['DYNO'])){

        ini_set('session.cookie_secure', 1);

        ini_set('session.cookie_samesite', 'Strict');
    } else {

        ini_set('session.cookie_secure', 0);


    }

        session_start();

}