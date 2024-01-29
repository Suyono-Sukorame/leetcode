/**
 * @param {number[]} nums
 * @param {number} target
 * @return {boolean}
 */
var search = function (nums, target) {
  let left = 0;
  let right = nums.length - 1;

  while (left <= right) {
    while (left < right && nums[left] === nums[left + 1]) {
      left++;
    }
    while (left < right && nums[right] === nums[right - 1]) {
      right--;
    }

    const mid = Math.floor((left + right) / 2);

    if (nums[mid] === target) {
      return true;
    }

    if (nums[left] <= nums[mid]) {
      if (nums[left] <= target && target < nums[mid]) {
        right = mid - 1;
      } else {
        left = mid + 1;
      }
    } else {
      if (nums[mid] < target && target <= nums[right]) {
        left = mid + 1;
      } else {
        right = mid - 1;
      }
    }
  }

  return false;
};

var nums1 = [2, 5, 6, 0, 0, 1, 2];
var target1 = 0;
console.log(search(nums1, target1)); // Output: true

var nums2 = [2, 5, 6, 0, 0, 1, 2];
var target2 = 3;
console.log(search(nums2, target2)); // Output: false
