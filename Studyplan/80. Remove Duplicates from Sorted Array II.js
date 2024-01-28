/**
 * @param {number[]} nums
 * @return {number}
 */
var removeDuplicates = function (nums) {
  if (nums.length <= 2) {
    return nums.length;
  }

  let k = 2;
  for (let i = 2; i < nums.length; i++) {
    if (nums[i] !== nums[k - 2]) {
      nums[k] = nums[i];
      k++;
    }
  }

  return k;
};

const nums1 = [1, 1, 1, 2, 2, 3];
const result1 = removeDuplicates(nums1);
console.log(result1); // Output: 5
console.log(nums1.slice(0, result1)); // Output: [1, 1, 2, 2, 3]

const nums2 = [0, 0, 1, 1, 1, 1, 2, 3, 3];
const result2 = removeDuplicates(nums2);
console.log(result2); // Output: 7
console.log(nums2.slice(0, result2)); // Output: [0, 0, 1, 1, 2, 3, 3]
