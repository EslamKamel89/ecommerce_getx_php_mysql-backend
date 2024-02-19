<?php
include('../connect.php');
$userId =  filterRequest('userId');

$stmt = $con->prepare("SELECT * FROM `cartview` WHERE `cart_userid` = ?");
$stmt->execute(array($userId));
$cartViewData = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count = $stmt->rowCount();
if ($count > 0) {
    $stmt = $con->prepare("SELECT SUM(totalprice) AS totalprice, SUM(countitems) AS totalcount FROM cartview WHERE cart_userid = ? GROUP BY cart_userid");
    $stmt->execute(array($userId));
    $totalPriceAndCount = $stmt->fetch(PDO::FETCH_ASSOC);
    $count = $stmt->rowCount();
    if ($count > 0) {
        $data = array('cartview' => $cartViewData, 'totalPriceAndCount' => $totalPriceAndCount);
        printSuccess($data);
        return;
    }
}
printFailure();
