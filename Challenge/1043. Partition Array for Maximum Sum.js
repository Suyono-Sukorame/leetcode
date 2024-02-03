/**
 * @param {number[]} arr
 * @param {number} k
 * @return {number}
 */
var maxSumAfterPartitioning = function (arr, k) {
  const n = arr.length;
  const dp = new Array(n).fill(0);

  for (let i = 0; i < n; i++) {
    let maxVal = 0;
    for (let j = 1; j <= k && i - j + 1 >= 0; j++) {
      maxVal = Math.max(maxVal, arr[i - j + 1]);
      dp[i] = Math.max(dp[i], (i >= j ? dp[i - j] : 0) + maxVal * j);
    }
  }

  return dp[n - 1];
};

// Test cases
console.log(maxSumAfterPartitioning([1, 15, 7, 9, 2, 5, 10], 3)); // Output: 84
console.log(maxSumAfterPartitioning([1, 4, 1, 5, 7, 3, 6, 1, 9, 9, 3], 4)); // Output: 83
console.log(maxSumAfterPartitioning([1], 1)); // Output: 1
