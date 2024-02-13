<?php
include('favorite_functions.php');
$userId = filterRequest('userId');
$itemId = filterRequest('itemId');
$itemInFavorite =  isItemInUserFavorites($userId, $itemId);
if ($itemInFavorite) {
   removeFromFavorite($userId , $itemId);
} else {
    addToFavorite($userId , $itemId);
}


