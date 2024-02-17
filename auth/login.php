<?php
include("../connect.php");
$email = filterRequest('email');
$password = sha1($_POST['password']);
$stmt = $con->prepare('SELECT * FROM `users` WHERE `users_email` = ? AND `users_password` = ?');
$stmt->execute(array($email, $password));
$data = $stmt->fetch(PDO::FETCH_ASSOC);
$count = $stmt->rowCount();
if ($count > 0) {
    printSuccess($data);
} else {
    printFailure();
}
