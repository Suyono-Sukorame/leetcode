/**
 * @param {number[][]} obstacleGrid
 * @return {number}
 */
var uniquePathsWithObstacles = function (obstacleGrid) {
    const m = obstacleGrid.length;
    const n = obstacleGrid[0].length;

    const dp = new Array(m).fill().map(() => new Array(n).fill(0));

    dp[0][0] = obstacleGrid[0][0] === 0 ? 1 : 0;

    for (let i = 1; i < m; i++) {
        dp[i][0] = obstacleGrid[i][0] === 0 ? dp[i - 1][0] : 0;
    }
    for (let j = 1; j < n; j++) {
        dp[0][j] = obstacleGrid[0][j] === 0 ? dp[0][j - 1] : 0;
    }

    for (let i = 1; i < m; i++) {
        for (let j = 1; j < n; j++) {
            if (obstacleGrid[i][j] === 0) {
                dp[i][j] = dp[i - 1][j] + dp[i][j - 1];
            } else {
                dp[i][j] = 0;
            }
        }
    }

    return dp[m - 1][n - 1];
};

console.log(uniquePathsWithObstacles([[0, 0, 0], [0, 1, 0], [0, 0, 0]])); // Output: 2
console.log(uniquePathsWithObstacles([[0, 1], [0, 0]])); // Output: 1
