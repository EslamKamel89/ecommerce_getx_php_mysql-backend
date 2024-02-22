<?php
include('../connect.php');
$itemName =  filterRequest('itemName');

$stmt = $con->prepare("SELECT * FROM `itemsview` WHERE items_name LIKE '%$itemName%' OR items_name_ar LIKE '%$itemName%'");
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count = $stmt->rowCount();
if ($count > 0) {
    printSuccess($data);
} else {
    printFailure();
}