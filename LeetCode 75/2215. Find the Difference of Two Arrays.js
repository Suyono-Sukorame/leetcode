/**
 * Returns the elements in nums1 that don't exist in nums2.
 * @param {number[]} nums1
 * @param {number[]} nums2
 * @return {number[]}
 */
function getElementsOnlyInFirstList(nums1, nums2) {
  const onlyInNums1 = new Set();

  // Iterate over each element in nums1.
  for (let num of nums1) {
    let existInNums2 = false;

    // Check if num is present in nums2.
    for (let x of nums2) {
      if (x === num) {
        existInNums2 = true;
        break;
      }
    }

    if (!existInNums2) {
      onlyInNums1.add(num);
    }
  }

  // Convert to array.
  return Array.from(onlyInNums1);
}

/**
 * Finds the difference between two arrays.
 * @param {number[]} nums1
 * @param {number[]} nums2
 * @return {number[][]}
 */
function findDifference(nums1, nums2) {
  return [getElementsOnlyInFirstList(nums1, nums2), getElementsOnlyInFirstList(nums2, nums1)];
}
