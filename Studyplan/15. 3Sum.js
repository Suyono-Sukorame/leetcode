/**
 * @param {number[]} nums
 * @return {number[][]}
 */
var threeSum = function (nums) {
  nums.sort((a, b) => a - b);
  const result = [];

  for (let i = 0; i < nums.length - 2; i++) {
    if (i === 0 || (i > 0 && nums[i] !== nums[i - 1])) {
      let start = i + 1;
      let end = nums.length - 1;
      const target = -nums[i];

      while (start < end) {
        const sum = nums[start] + nums[end];

        if (sum === target) {
          result.push([nums[i], nums[start], nums[end]]);

          while (start < end && nums[start] === nums[start + 1]) start++;
          while (start < end && nums[end] === nums[end - 1]) end--;

          start++;
          end--;
        } else if (sum < target) {
          start++;
        } else {
          end--;
        }
      }
    }
  }

  return result;
};

console.log(threeSum([-1, 0, 1, 2, -1, -4]));
console.log(threeSum([0, 1, 1]));
console.log(threeSum([0, 0, 0]));
