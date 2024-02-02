/**
 * @param {number[]} prices
 * @return {number}
 */
var maxProfit = function (prices) {
    if (!prices || prices.length <= 1) {
        return 0;
    }

    const n = prices.length;

    // Define the state variables for the two transactions
    const buy1 = Array(n).fill(0);
    const sell1 = Array(n).fill(0);
    const buy2 = Array(n).fill(0);
    const sell2 = Array(n).fill(0);

    // Initialize the base cases
    buy1[0] = -prices[0];
    sell1[0] = 0;
    buy2[0] = -prices[0];
    sell2[0] = 0;

    // Iterate through the prices array to update the state variables
    for (let i = 1; i < n; i++) {
        buy1[i] = Math.max(buy1[i - 1], -prices[i]);
        sell1[i] = Math.max(sell1[i - 1], buy1[i - 1] + prices[i]);
        buy2[i] = Math.max(buy2[i - 1], sell1[i - 1] - prices[i]);
        sell2[i] = Math.max(sell2[i - 1], buy2[i - 1] + prices[i]);
    }

    // Return the maximum profit after two transactions
    return Math.max(sell1[n - 1], sell2[n - 1]);
};

// Example usage:
const prices1 = [3, 3, 5, 0, 0, 3, 1, 4];
console.log(maxProfit(prices1)); // Output: 6

const prices2 = [1, 2, 3, 4, 5];
console.log(maxProfit(prices2)); // Output: 4

const prices3 = [7, 6, 4, 3, 1];
console.log(maxProfit(prices3)); // Output: 0
