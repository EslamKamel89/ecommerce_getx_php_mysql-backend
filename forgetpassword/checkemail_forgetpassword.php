<?php
include("../connect.php");
// checkemail after forgetpassword 
$email = filterRequest('email');
$checkCode = rand(10000, 99999);
//! i sended fixed code 22222 until i upload the files on host 
$checkCode = 22222;
$stmt = $con->prepare("SELECT * FROM  `users` WHERE `users_email` = ?");
$stmt->execute(array($email));
$count = $stmt->rowCount();
if ($count > 0) {
    // TODO you should send email to the user with verify code to reset password 
    // sendEmail($email , 'reset password' , $checkCode);
    // sending the verify code to the database to be saved 
    //! the code send when forgeting the password is  saved in the same column 
    //! for the code send when creating new account
    //! i sended fixed code 22222 until i upload the files on host 
    $stmt = $con->prepare('UPDATE `users` SET `users_verifycode`= ? WHERE `users_email` = ?');
    $stmt->execute(array($checkCode, $email));
    $count = $stmt->rowCount();
    if ($count > 0) {
        printSuccess();
    } else {
        printFailure();
    }
} else {
    printSuccess();
}
