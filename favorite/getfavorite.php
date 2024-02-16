<?php
include('../connect.php');
$userId =  filterRequest('userId');


$stmt = $con->prepare("SELECT * FROM `myfavorite` WHERE `users_id` = ?");
$stmt->execute(array($userId));
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count = $stmt->rowCount();
if ($count > 0) {
    printSuccess($data);
} else {
    printFailure();
}


/*
CREATE OR REPLACE VIEW  myfavorite AS  
SELECT favorite.* , items.* , users.users_id FROM favorite 
INNER JOIN items ON items.items_id = favorite.favorite_itemid
INNER JOIN users ON users.users_id = favorite.favorite_userid
*/