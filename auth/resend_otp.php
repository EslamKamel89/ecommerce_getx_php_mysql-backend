<?php
include("../connect.php");
$email = filterRequest("email");
$verifyCode = rand(10000, 99999);

$stmt = $con->prepare("UPDATE `users` SET `users_verifycode`=? WHERE `users_email` = ?");
$stmt->execute(array($verifyCode, $email));
$count = $stmt->rowCount();
if ($count > 0) {
    // sendEmail($email, 'Verify your account you just created with Ecommerce', 'verificaton code ' . $verifyCode,);
    printSuccess();
} else {
    printFailure();
}
