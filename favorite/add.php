<?php
include('../connect.php');
$itemId =  filterRequest('itemId');
$userId =  filterRequest('userId');

$stmt = $con->prepare("INSERT INTO `favorite`( `favorite_userid`, `favorite_itemid`) VALUES (?,?)");
$stmt->execute(array( $userId , $itemId ));
$count = $stmt->rowCount();
if ($count > 0) {
    printSuccess();
} else {
    printFailure();
}
