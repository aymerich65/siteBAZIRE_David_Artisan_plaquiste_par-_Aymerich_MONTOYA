<?php
$password = 'monmotdepasse';
$hash = password_hash($password, PASSWORD_BCRYPT);
echo $hash;