/**
 * @param {character[][]} matrix
 * @return {number}
 */
var maximalSquare = function (matrix) {
    if (!matrix || matrix.length === 0 || matrix[0].length === 0) {
        return 0;
    }

    const m = matrix.length;
    const n = matrix[0].length;

    // Initialize a 2D array to store the side lengths
    const dp = new Array(m).fill(0).map(() => new Array(n).fill(0));

    let maxSide = 0;

    // Fill in the dp array
    for (let i = 0; i < m; i++) {
        for (let j = 0; j < n; j++) {
            // Convert characters to integers
            const value = parseInt(matrix[i][j]);

            if (i === 0 || j === 0) {
                // Base case: first row or first column
                dp[i][j] = value;
            } else if (value === 1) {
                // If the current cell is 1, update dp[i][j] based on the neighboring cells
                dp[i][j] = Math.min(dp[i - 1][j], dp[i][j - 1], dp[i - 1][j - 1]) + 1;
            }

            // Update the maximum side length
            maxSide = Math.max(maxSide, dp[i][j]);
        }
    }

    // Return the area of the largest square
    return maxSide * maxSide;
};

// Test cases
console.log(maximalSquare([["1", "0", "1", "0", "0"], ["1", "0", "1", "1", "1"], ["1", "1", "1", "1", "1"], ["1", "0", "0", "1", "0"]])); // Output: 4
console.log(maximalSquare([["0", "1"], ["1", "0"]])); // Output: 1
console.log(maximalSquare([["0"]])); // Output: 0
