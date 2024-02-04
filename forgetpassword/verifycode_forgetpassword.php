<?php
// verify code after forget password 
include("../connect.php");
$email = filterRequest("email");
$verifyCode = filterRequest("verifyCode");
$stmt = $con->prepare('SELECT * FROM `users` WHERE `users_email` =? AND `users_verifycode` = ?');
$stmt->execute(array($email, $verifyCode));
$count = $stmt->rowCount();
if ($count > 0) {
    printSuccess();
} else {
    printFailure();
}
