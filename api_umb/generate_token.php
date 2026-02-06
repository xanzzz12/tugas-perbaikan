<?php
require 'config.php';
require 'jwt_helper.php';

$payload = ["user" => "admin", "iat" => time()];
echo "Gunakan Token ini di Header Postman:<br><br>";
echo "<b>Bearer " . JWTHelper::create($payload) . "</b>";