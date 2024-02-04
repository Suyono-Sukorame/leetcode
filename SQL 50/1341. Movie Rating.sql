# Write your MySQL query statement below
SELECT 
    (SELECT name FROM Users WHERE user_id = (
        SELECT user_id 
        FROM MovieRating
        GROUP BY user_id
        ORDER BY COUNT(DISTINCT movie_id) DESC, user_id ASC
        LIMIT 1
    )) AS results
UNION
SELECT 
    (SELECT title FROM Movies WHERE movie_id = (
        SELECT movie_id 
        FROM MovieRating
        WHERE YEAR(created_at) = 2020 AND MONTH(created_at) = 02
        GROUP BY movie_id
        ORDER BY AVG(rating) DESC, movie_id ASC
        LIMIT 1
    )) AS results;
