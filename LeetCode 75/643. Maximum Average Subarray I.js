/**
 * @param {number[]} nums
 * @param {number} k
 * @return {number}
 */
var findMaxAverage = function (nums, k) {
  let sum = 0;

  // Calculate the sum of the first k elements.
  for (let i = 0; i < k; i++) {
    sum += nums[i];
  }

  let maxAverage = sum / k;

  // Iterate through the remaining elements and maintain a sliding window of size k.
  for (let i = k; i < nums.length; i++) {
    sum = sum + nums[i] - nums[i - k];
    maxAverage = Math.max(maxAverage, sum / k);
  }

  return maxAverage;
};
