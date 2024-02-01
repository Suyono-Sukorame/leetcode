/**
 * @param {number[]} nums
 * @return {number}
 */
var majorityElement = function (nums) {
  let candidate = nums[0];
  let count = 1;

  for (let i = 1; i < nums.length; i++) {
    if (count === 0) {
      candidate = nums[i];
      count = 1;
    } else if (nums[i] === candidate) {
      count++;
    } else {
      count--;
    }
  }

  count = 0;
  for (let i = 0; i < nums.length; i++) {
    if (nums[i] === candidate) {
      count++;
    }
  }

  return count > nums.length / 2 ? candidate : -1;
};
