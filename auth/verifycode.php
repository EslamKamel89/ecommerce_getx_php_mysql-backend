<?php
// i can 't send the verification email because i don't have a host 
// i used fixed code : 11111
include("../connect.php");
$verifyCode = filterRequest('verifycode');
$email = filterRequest('email');
$stmt = $con->prepare("SELECT * FROM `users` WHERE `users_email` = ? AND `users_verifycode`=?");
$stmt->execute(array($email, $verifyCode));
$count = $stmt->rowCount();
if ($count > 0) {
    $data  = array('users_approve' => 1);
    updateData("users", $data, "users_email = '$email'");
    // printSuccess();
} else {
    printFailure();
}
