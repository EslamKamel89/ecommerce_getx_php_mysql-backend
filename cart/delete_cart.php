<?php
include('../connect.php');
$userId =  filterRequest('userId');
$itemId =  filterRequest('itemId');

$stmt = $con->prepare("DELETE FROM `cart` WHERE cart_id = (SELECT `cart_id` FROM `cart` WHERE cart_userid = ? AND cart_itemid = ? LIMIT 1)");
$stmt->execute(array(  $userId, $itemId ));
$count = $stmt->rowCount();
if ($count > 0) {
    printSuccess();
} else {
    printFailure();
}