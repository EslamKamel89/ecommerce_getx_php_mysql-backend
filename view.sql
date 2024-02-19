SELECT
    itemsview.*,
    1 AS favorite_item
FROM
    itemsview
    INNER JOIN favorite ON favorite.favorite_itemid = itemsview.items_id
    AND favorite.favorite_userid = 22
UNION
ALL
SELECT
    itemsview.*,
    0 AS favorite_item
FROM
    itemsview
WHERE
    items_id NOT IN (
        SELECT
            itemsview.items_id
        FROM
            itemsview
            INNER JOIN favorite ON favorite.favorite_itemid = itemsview.items_id
            AND favorite.favorite_userid = 22
    ) -------------------------------------------------------------------------------------------------------------------------------------------------------
    CREATE
    OR REPLACE VIEW myfavorite AS
SELECT
    favorite.*,
    items.*,
    users.users_id
FROM
    favorite
    INNER JOIN items ON items.items_id = favorite.favorite_itemid
    INNER JOIN users ON users.users_id = favorite.favorite_userid ------------------------------------------------------------------------
    CREATE
    OR REPLACE VIEW cartview AS
SELECT
    SUM(items.items_price) AS totalprice,
    COUNT(cart.cart_itemid) AS countitems,
    items.*,
    cart.*
FROM
    cart
    INNER JOIN items ON items.items_id = cart.cart_itemid
GROUP BY
    cart.cart_itemid,
    cart.cart_userid