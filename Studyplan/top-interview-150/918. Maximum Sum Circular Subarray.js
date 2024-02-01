/**
 * @param {number[]} nums
 * @return {number}
 */
var maxSubarraySumCircular = function (nums) {
  if (nums.length === 0) {
    return 0;
  }

  let maxSum = nums[0];
  let currentSum = nums[0];
  let totalSum = nums[0];
  let minSum = nums[0];
  let currentMinSum = nums[0];

  for (let i = 1; i < nums.length; i++) {
    currentSum = Math.max(nums[i], currentSum + nums[i]);
    maxSum = Math.max(maxSum, currentSum);

    currentMinSum = Math.min(nums[i], currentMinSum + nums[i]);
    minSum = Math.min(minSum, currentMinSum);

    totalSum += nums[i];
  }

  if (maxSum < 0) {
    return maxSum;
  }

  return Math.max(maxSum, totalSum - minSum);
};

const nums1 = [1, -2, 3, -2];
console.log(maxSubarraySumCircular(nums1)); // Output: 3

const nums2 = [5, -3, 5];
console.log(maxSubarraySumCircular(nums2)); // Output: 10

const nums3 = [-3, -2, -3];
console.log(maxSubarraySumCircular(nums3)); // Output: -2
