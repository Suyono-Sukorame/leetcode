# Write your MySQL query statement below
SELECT DISTINCT p1.product_id,
       COALESCE(p2.new_price, 10) AS price
FROM Products p1
LEFT JOIN Products p2 
    ON p1.product_id = p2.product_id
    AND p2.change_date <= '2019-08-16'
    AND NOT EXISTS (
        SELECT 1
        FROM Products p3
        WHERE p3.product_id = p1.product_id
        AND p3.change_date > p2.change_date
        AND p3.change_date <= '2019-08-16'
    );

