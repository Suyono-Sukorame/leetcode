/**
 * @param {string} word1
 * @param {string} word2
 * @return {number}
 */
var minDistance = function (word1, word2) {
    const m = word1.length;
    const n = word2.length;

    // Initialize a 2D array to store the minimum distances
    const dp = new Array(m + 1).fill(0).map(() => new Array(n + 1).fill(0));

    // Initialize the base cases
    for (let i = 0; i <= m; i++) {
        dp[i][0] = i;
    }

    for (let j = 0; j <= n; j++) {
        dp[0][j] = j;
    }

    // Fill in the rest of the dp array
    for (let i = 1; i <= m; i++) {
        for (let j = 1; j <= n; j++) {
            if (word1[i - 1] === word2[j - 1]) {
                dp[i][j] = dp[i - 1][j - 1];
            } else {
                dp[i][j] = Math.min(
                    dp[i - 1][j],      // Deletion
                    dp[i][j - 1],      // Insertion
                    dp[i - 1][j - 1]   // Replacement
                ) + 1;
            }
        }
    }

    return dp[m][n];
};

// Test cases
console.log(minDistance("horse", "ros"));          // Output: 3
console.log(minDistance("intention", "execution")); // Output: 5
