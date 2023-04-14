<?php
require_once 'vendor/autoload.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;



define('JWT_KEY', 'secret_key');

function validateJWT($token)
{
    try {
        $decoded = JWT::decode($token, new Key(JWT_KEY, 'HS256'), array('HS256'));
        return $decoded;
    } catch (Exception $e) {
        return false;
    }
}
