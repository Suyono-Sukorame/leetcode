/**
 * @param {number[]} nums
 * @param {number} val
 * @return {number}
 */
var removeElement = function (nums, val) {
  let k = 0;

  for (let i = 0; i < nums.length; i++) {
    if (nums[i] !== val) {
      nums[k] = nums[i];
      k++;
    }
  }

  return k;
};

const nums1 = [3, 2, 2, 3];
const val1 = 3;
const result1 = removeElement(nums1, val1);
console.log(result1); // Output: 2
console.log(nums1.slice(0, result1)); // Output: [2, 2]

const nums2 = [0, 1, 2, 2, 3, 0, 4, 2];
const val2 = 2;
const result2 = removeElement(nums2, val2);
console.log(result2); // Output: 5
console.log(nums2.slice(0, result2)); // Output: [0, 1, 4, 0, 3]
