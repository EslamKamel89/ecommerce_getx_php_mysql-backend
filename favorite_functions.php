<?php
include('connect.php');

function isItemInUserFavorites($userId , $itemId){
    global $con;
    $stmt = $con->prepare("SELECT * FROM `favorite` WHERE `favorite_userid` = ? AND `favorite_itemid` = ? ");
    $stmt->execute(array($userId, $itemId));
    $count = $stmt->rowCount();
    if ($count > 0) {
        return true;
    } else {
        return false;
    }
}

function removeFromFavorite($userId, $itemId)
{
    global $con;
    $stmt = $con->prepare("DELETE FROM `favorite` WHERE `favorite_userid` = ? AND  `favorite_itemid` = ? ");
    $stmt->execute(array($userId, $itemId));
    $count = $stmt->rowCount();
    if ($count > 0) {
        $data = array(
            'userId' => $userId,
            'itemId' => $itemId,
            'favorite' => 0
        );
        printSuccess($data);
    } else {
        printFailure();
    }
}


function addToFavorite($userId, $itemId)
{
    global $con;
    $stmt = $con->prepare("INSERT INTO `favorite`( `favorite_userid`, `favorite_itemid`) VALUES ( ? , ?)");
    $stmt->execute(array($userId, $itemId));
    $count = $stmt->rowCount();
    if ($count > 0) {
        $data = array(
            'userId' => $userId,
            'itemId' => $itemId,
            'favorite' => 1
        );
        printSuccess($data);
    } else {
        printFailure();
    }
}