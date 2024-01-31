/**
 * @param {number[]} nums
 * @return {string[]}
 */
var summaryRanges = function (nums) {
  if (nums.length === 0) {
    return [];
  }

  const result = [];
  let start = nums[0];
  let end = nums[0];

  for (let i = 1; i < nums.length; i++) {
    if (nums[i] === end + 1) {
      end = nums[i];
    } else {
      result.push(formatRange(start, end));
      start = end = nums[i];
    }
  }

  result.push(formatRange(start, end));

  return result;
};

/**
 * Helper function to format a range as a string
 * @param {number} start
 * @param {number} end
 * @return {string}
 */
function formatRange(start, end) {
  return start === end ? start.toString() : `${start}->${end}`;
}

const nums1 = [0, 1, 2, 4, 5, 7];
console.log(summaryRanges(nums1)); // Output: ["0->2", "4->5", "7"]

const nums2 = [0, 2, 3, 4, 6, 8, 9];
console.log(summaryRanges(nums2)); // Output: ["0", "2->4", "6", "8->9"]
