<?php
// echo 'I am here ';
include("../connect.php");
$username = filterRequest("username");
$email = filterRequest("email");
$phone = filterRequest("phone");
// for the password you should use sha1 for security reasons
$password = sha1($_POST["password"]);
// $verifyCode = "11111";
$verifyCode = rand(10000, 99999);

$stmt = $con->prepare("SELECT * FROM `users` WHERE `users_email`=? OR `users_phone` = ?");
$stmt->execute(array($email, $phone));
$count = $stmt->rowCount();
if ($count > 0) {
    printFailure();
} else {
    $data = array(
        'users_name' => $username,
        'users_email' => $email,
        'users_password' => $password,
        'users_phone' => $phone,
        'users_verifycode' => $verifyCode,
    );
    // sendEmail($email, 'Verify your account you just created with Ecommerce', 'verificaton code ' . $verifyCode,);
    insertData("users", $data);
}
