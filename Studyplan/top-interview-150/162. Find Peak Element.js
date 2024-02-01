/**
 * @param {number[]} nums
 * @return {number}
 */
var findPeakElement = function (nums) {
  let left = 0;
  let right = nums.length - 1;

  while (left < right) {
    let mid = Math.floor((left + right) / 2);

    if (nums[mid] > nums[mid + 1]) {
      right = mid;
    } else {
      left = mid + 1;
    }
  }

  return left;
};

const nums1 = [1, 2, 3, 1];
console.log(findPeakElement(nums1)); // Output: 2

const nums2 = [1, 2, 1, 3, 5, 6, 4];
console.log(findPeakElement(nums2)); // Output: 5
