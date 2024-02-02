/**
 * @param {number[]} prices
 * @return {number}
 */
var maxProfit = function (prices) {
    if (!prices || prices.length <= 1) {
        return 0;
    }

    const n = prices.length;
    const dp = new Array(n).fill(0).map(() => new Array(3).fill(0));

    dp[0][0] = 0;
    dp[0][1] = -prices[0];
    dp[0][2] = 0;

    for (let i = 1; i < n; i++) {
        dp[i][0] = Math.max(dp[i - 1][0], dp[i - 1][1] + prices[i]);

        dp[i][1] = Math.max(dp[i - 1][1], dp[i - 1][2] - prices[i]);

        dp[i][2] = Math.max(dp[i - 1][2], dp[i - 1][0]);
    }

    return Math.max(dp[n - 1][0], dp[n - 1][2]);
};

const prices1 = [3, 3, 5, 0, 0, 3, 1, 4];
console.log(maxProfit(prices1)); // Output: 6

const prices2 = [1, 2, 3, 4, 5];
console.log(maxProfit(prices2)); // Output: 4

const prices3 = [7, 6, 4, 3, 1];
console.log(maxProfit(prices3)); // Output: 0
