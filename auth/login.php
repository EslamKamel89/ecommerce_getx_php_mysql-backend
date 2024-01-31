<?php
include("../connect.php");
$email = filterRequest('email');
$password = sha1('password');
$stmt = $con ->prepare('SELECT * FROM `users` WHERE `users_email` = ? AND `users_password` = ?');
$stmt -> execute(array($email, $password));
$count = $stmt->rowCount();
if($count > 0){
    printSuccess();
} else {
    printFailure();
}
