<?php
include("../connect.php");
$email = filterRequest('email');
$password = sha1($_POST['password']);
$stmt = $con ->prepare('SELECT * FROM `users` WHERE `users_email` = ? AND `users_password` = ? AND `users_approve` = 1');
$stmt -> execute(array($email, $password));
$count = $stmt->rowCount();
if($count > 0){
    printSuccess();
} else {
    printFailure();
}
