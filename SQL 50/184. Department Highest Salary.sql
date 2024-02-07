# Write your MySQL query statement below
SELECT d.name AS Department, e.name AS Employee, e.salary AS Salary
FROM (
    SELECT departmentId, MAX(salary) AS max_salary
    FROM Employee
    GROUP BY departmentId
) AS max_salaries
JOIN Employee e ON e.departmentId = max_salaries.departmentId AND e.salary = max_salaries.max_salary
JOIN Department d ON e.departmentId = d.id;
