<?php
include("../connect.php");
$categoryId = filterRequest('categoryId');
$userId = filterRequest('userId');
// $stmt = $con->prepare("SELECT * FROM `itemsview` WHERE `items_categories_id` = ?");
$stmt = $con->prepare("SELECT
itemsview.*,
1 AS favorite_item , 
(`items_price` -(`items_price` * `items_discount`/100)) as items_price_discount
FROM
itemsview
INNER JOIN favorite ON favorite.favorite_itemid = itemsview.items_id AND favorite.favorite_userid = 22 
AND itemsview.items_categories_id = $categoryId
UNION ALL
SELECT
itemsview.*,
0 AS favorite_item,
(`items_price` -(`items_price` * `items_discount`/100)) as items_price_discount
FROM
itemsview
WHERE
itemsview.items_categories_id = $categoryId AND items_id NOT IN(
SELECT
    itemsview.items_id
FROM
    itemsview
INNER JOIN favorite ON favorite.favorite_itemid = itemsview.items_id AND favorite.favorite_userid = 22
)
");
$stmt->execute();
$count = $stmt->rowCount();
if ($count > 0) {
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    printSuccess($data);
} else {
    printFailure();
}
