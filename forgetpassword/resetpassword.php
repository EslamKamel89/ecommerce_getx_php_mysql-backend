<?php
include("../connect.php");
$email  = filterRequest('email');
$password = sha1($_POST['password']);
$stmt = $con->prepare('UPDATE `users` SET `users_password`= ? WHERE `users_email` = ?');
$stmt->execute(array($password , $email));
$count = $stmt->rowCount();
if ($count > 0) {
    printSuccess();
} else {
    printFailure();
}
