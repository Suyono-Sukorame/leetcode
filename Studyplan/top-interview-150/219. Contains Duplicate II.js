/**
 * @param {number[]} nums
 * @param {number} k
 * @return {boolean}
 */
var containsNearbyDuplicate = function (nums, k) {
  const numIndicesMap = {};

  for (let i = 0; i < nums.length; i++) {
    const currentNum = nums[i];

    if (numIndicesMap[currentNum] !== undefined) {
      if (i - numIndicesMap[currentNum] <= k) {
        return true;
      }
    }

    numIndicesMap[currentNum] = i;
  }

  return false;
};

const nums1 = [1, 2, 3, 1];
const k1 = 3;
console.log(containsNearbyDuplicate(nums1, k1)); // Output: true

const nums2 = [1, 0, 1, 1];
const k2 = 1;
console.log(containsNearbyDuplicate(nums2, k2)); // Output: true

const nums3 = [1, 2, 3, 1, 2, 3];
const k3 = 2;
console.log(containsNearbyDuplicate(nums3, k3)); // Output: false
