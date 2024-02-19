<?php
include('../connect.php');
$userId =  filterRequest('userId');
$itemId =  filterRequest('itemId');

$stmt = $con->prepare("INSERT INTO `cart`(`cart_userid`, `cart_itemid`) VALUES ( ? , ?  )");
$stmt->execute(array(  $userId, $itemId ));
$count = $stmt->rowCount();
if ($count > 0) {
    printSuccess();
} else {
    printFailure();
}
