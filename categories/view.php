<?php
include('../connect.php');
$stmt = $con->prepare("SELECT * FROM `categories` ");
$stmt->execute();
$count = $stmt->rowCount();
if ($count> 0) {
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    printSuccess($data);
} else {
    printFailure();
}
