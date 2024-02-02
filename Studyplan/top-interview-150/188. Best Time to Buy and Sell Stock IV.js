/**
 * @param {number} k
 * @param {number[]} prices
 * @return {number}
 */
var maxProfit = function (k, prices) {
    const n = prices.length;

    if (k >= n / 2) {
        let maxProfit = 0;
        for (let i = 1; i < n; i++) {
            if (prices[i] > prices[i - 1]) {
                maxProfit += prices[i] - prices[i - 1];
            }
        }
        return maxProfit;
    }

    const dp = new Array(k + 1).fill(0).map(() => new Array(n).fill(0));

    for (let i = 1; i <= k; i++) {
        let maxDiff = -prices[0];
        for (let j = 1; j < n; j++) {
            dp[i][j] = Math.max(dp[i][j - 1], prices[j] + maxDiff);
            maxDiff = Math.max(maxDiff, dp[i - 1][j] - prices[j]);
        }
    }

    return dp[k][n - 1];
};

const k1 = 2;
const prices1 = [2, 4, 1];
console.log(maxProfit(k1, prices1)); // Output: 2

const k2 = 2;
const prices2 = [3, 2, 6, 5, 0, 3];
console.log(maxProfit(k2, prices2)); // Output: 7
