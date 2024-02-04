/**
 * @param {number[]} nums
 * @return {number}
 */
// S: O(1)
// T: O(N) // traverse nums(N)

var singleNumber = function (nums) {
  return processBit(nums);
};

const processBit = (nums) => {
  let result = nums[0];

  for (let i = 1; i < nums.length; i++) result ^= nums[i];

  return result;
};
