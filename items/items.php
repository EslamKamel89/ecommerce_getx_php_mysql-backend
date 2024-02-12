<?php
include("../connect.php");
$categoryId = filterRequest('categoryId');
$stmt = $con->prepare("SELECT * FROM `itemsview` WHERE `items_categories_id` = ?");
$stmt->execute(array($categoryId));
$count = $stmt->rowCount();
if ($count > 0) {
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    printSuccess($data);
} else {
    printFailure();
}
