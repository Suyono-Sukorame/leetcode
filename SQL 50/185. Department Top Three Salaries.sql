-- Write your SQL query statement below

WITH RankedSalaries AS (
    SELECT
        e.id AS employee_id,
        e.name AS employee,
        e.salary,
        e.departmentId,
        d.name AS department,
        DENSE_RANK() OVER (PARTITION BY e.departmentId ORDER BY e.salary DESC) AS salary_rank
    FROM
        Employee e
    JOIN Department d ON e.departmentId = d.id
)

SELECT
    department AS Department,
    employee AS Employee,
    salary AS Salary
FROM
    RankedSalaries
WHERE
    salary_rank <= 3
ORDER BY
    department, salary_rank;
