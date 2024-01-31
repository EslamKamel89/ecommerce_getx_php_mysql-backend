<?php
include("../connect.php");
$email = filterRequest('email');
$stmt = $con->prepare('SELECT * FROM `users` WHERE `users_email` = ?');
$stmt->execute(array($email));
$count = $stmt->rowCount();
if($count > 0){
    // sendEmail($email, 'Verify your account you just created with Ecommerce', 'verificaton code ' . $verifyCode,);
    printSuccess();
} else {
    printFailure();
}