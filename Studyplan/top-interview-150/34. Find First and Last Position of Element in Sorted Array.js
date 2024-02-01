/**
 * @param {number[]} nums
 * @param {number} target
 * @return {number[]}
 */
var searchRange = function (nums, target) {
  const findFirstOccurrence = function (nums, target) {
    let start = 0;
    let end = nums.length - 1;
    let result = -1;

    while (start <= end) {
      const mid = Math.floor((start + end) / 2);

      if (nums[mid] >= target) {
        end = mid - 1;
        if (nums[mid] === target) {
          result = mid;
        }
      } else {
        start = mid + 1;
      }
    }

    return result;
  };

  const findLastOccurrence = function (nums, target) {
    let start = 0;
    let end = nums.length - 1;
    let result = -1;

    while (start <= end) {
      const mid = Math.floor((start + end) / 2);

      if (nums[mid] <= target) {
        start = mid + 1;
        if (nums[mid] === target) {
          result = mid;
        }
      } else {
        end = mid - 1;
      }
    }

    return result;
  };

  const firstOccurrence = findFirstOccurrence(nums, target);

  if (firstOccurrence === -1) {
    return [-1, -1];
  }

  const lastOccurrence = findLastOccurrence(nums, target);

  return [firstOccurrence, lastOccurrence];
};

// Contoh penggunaan:
const nums1 = [5, 7, 7, 8, 8, 10];
const target1 = 8;
console.log(searchRange(nums1, target1)); // Output: [3, 4]

const nums2 = [5, 7, 7, 8, 8, 10];
const target2 = 6;
console.log(searchRange(nums2, target2)); // Output: [-1, -1]

const nums3 = [];
const target3 = 0;
console.log(searchRange(nums3, target3)); // Output: [-1, -1]
