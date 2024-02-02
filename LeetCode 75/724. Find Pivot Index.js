/**
 * @param {number[]} nums
 * @return {number}
 */
var pivotIndex = function (nums) {
  let totalSum = 0;
  let leftSum = 0;

  // Calculate the total sum of the array.
  for (let num of nums) {
    totalSum += num;
  }

  // Iterate through the array to find the pivot index.
  for (let i = 0; i < nums.length; i++) {
    // Check if the sum of elements to the left is equal to the sum of elements to the right.
    if (leftSum === totalSum - leftSum - nums[i]) {
      return i;
    }

    leftSum += nums[i];
  }

  // If no pivot index is found, return -1.
  return -1;
};
