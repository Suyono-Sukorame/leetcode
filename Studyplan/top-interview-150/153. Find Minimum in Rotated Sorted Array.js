/**
 * @param {number[]} nums
 * @return {number}
 */
var findMin = function (nums) {
  let left = 0;
  let right = nums.length - 1;

  while (left < right) {
    let mid = Math.floor((left + right) / 2);

    if (nums[mid] > nums[right]) {
      left = mid + 1;
    } else {
      right = mid;
    }
  }

  return nums[left];
};

const nums1 = [3, 4, 5, 1, 2];
console.log(findMin(nums1)); // Output: 1

const nums2 = [4, 5, 6, 7, 0, 1, 2];
console.log(findMin(nums2)); // Output: 0

const nums3 = [11, 13, 15, 17];
console.log(findMin(nums3)); // Output: 11
