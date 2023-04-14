<?php
require_once '../Classes/myjwt.php';
require_once '../Includes/cles.php';
const TOKEN = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyX2lkIjoxLCJyb2xlcyI6WyJST0xFU19BRE1JTiIsIlJPTEVTX0FETUlOMiJdLCJpYSI6MTY4MTQ3MjkyNywiZXhwIjoxNjgxNTU5MzI3fQ.fmqPqTMEk5LlAPlFgOlL65kL8gF5shUn4OQsYhtJ2gk';

$jwt= new JWT();
var_dump($jwt->check(TOKEN,SECRET));
