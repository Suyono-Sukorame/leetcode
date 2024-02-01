/**
 * @param {number[]} nums
 * @param {number} k
 * @return {number[][]}
 */
var divideArray = function (nums, k) {
  // Sort the array
  nums.sort((a, b) => a - b);

  // Initialize result array
  let result = [];

  // Iterate through the sorted array
  for (let i = 0; i < nums.length; i += 3) {
    // Check if it is possible to form a group of three elements
    if (i + 2 < nums.length && nums[i + 2] - nums[i] <= k) {
      result.push([nums[i], nums[i + 1], nums[i + 2]]);
    } else {
      // If not possible, return an empty array
      return [];
    }
  }

  return result;
};

// Example usage:
const example1 = divideArray([1, 3, 4, 8, 7, 9, 3, 5, 1], 2);
console.log(example1); // Output: [[1, 1, 3], [3, 4, 5], [7, 8, 9]]

const example2 = divideArray([1, 3, 3, 2, 7, 3], 3);
console.log(example2); // Output: []
