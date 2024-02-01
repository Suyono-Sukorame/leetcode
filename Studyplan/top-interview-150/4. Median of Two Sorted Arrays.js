/**
 * @param {number[]} nums1
 * @param {number[]} nums2
 * @return {number}
 */
var findMedianSortedArrays = function (nums1, nums2) {
  const mergedArray = mergeArrays(nums1, nums2);
  const length = mergedArray.length;

  if (length % 2 === 0) {
    const mid1 = mergedArray[length / 2 - 1];
    const mid2 = mergedArray[length / 2];
    return (mid1 + mid2) / 2;
  } else {
    return mergedArray[Math.floor(length / 2)];
  }
};

function mergeArrays(nums1, nums2) {
  let result = [];
  let i = 0;
  let j = 0;

  while (i < nums1.length && j < nums2.length) {
    if (nums1[i] < nums2[j]) {
      result.push(nums1[i]);
      i++;
    } else {
      result.push(nums2[j]);
      j++;
    }
  }

  while (i < nums1.length) {
    result.push(nums1[i]);
    i++;
  }

  while (j < nums2.length) {
    result.push(nums2[j]);
    j++;
  }

  return result;
}

const nums1 = [1, 3];
const nums2 = [2];
console.log(findMedianSortedArrays(nums1, nums2)); // Output: 2.00000

const nums3 = [1, 2];
const nums4 = [3, 4];
console.log(findMedianSortedArrays(nums3, nums4)); // Output: 2.50000
