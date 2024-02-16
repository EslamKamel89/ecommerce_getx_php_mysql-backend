<?php
include('../connect.php');
$itemId =  filterRequest('itemId');
$userId =  filterRequest('userId');

$stmt = $con->prepare("DELETE FROM `favorite` WHERE `favorite_itemid` = ? AND `favorite_userid` = ?");
$stmt->execute(array($itemId , $userId));
$count = $stmt->rowCount();
if ($count > 0) {
    printSuccess();
} else {
    printFailure();
}