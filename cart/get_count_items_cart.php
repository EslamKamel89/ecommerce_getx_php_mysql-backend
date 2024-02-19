<?php

include('../connect.php');
$userId =  filterRequest('userId');
$itemId =  filterRequest('itemId');

$stmt = $con->prepare("SELECT COUNT(cart_id) AS count_items FROM cart WHERE `cart_userid` = ? AND `cart_itemid` = ?");
$stmt->execute(array($userId , $itemId));
$data = $stmt->fetch(PDO::FETCH_ASSOC);
$count = $stmt->rowCount();
if ($count > 0) {
    printSuccess($data);
} else {
    printFailure();
}