<?php

include 'connect.php';
$stmt = $con->prepare("SELECT * FROM `categories` ");
$stmt->execute();
$count = $stmt->rowCount();
if ($count > 0) {
    $temp = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $data = array('categories' => $temp);
} else {
    return printFailure();
}
$stmt = $con->prepare("SELECT * FROM `itemsview` WHERE  `items_discount` > 0 ");
$stmt->execute();
$count = $stmt->rowCount();
if ($count > 0) {
    $temp = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $data['items'] = $temp;
} else {
    return printFailure();
};
printSuccess($data);
/*
CREATE OR REPLACE VIEW itemsview AS SELECT
    items.*,
    categories.*
FROM
    items
INNER JOIN categories ON items_categories_id = categories_id
*/