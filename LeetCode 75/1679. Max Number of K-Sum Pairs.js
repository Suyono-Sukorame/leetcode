/**
 * @param {number[]} nums
 * @param {number} k
 * @return {number}
 */
var maxOperations = function (nums, k) {
  const numCount = new Map();
  let operations = 0;

  for (const num of nums) {
    const complement = k - num;

    if (numCount.has(complement) && numCount.get(complement) > 0) {
      // If the complement is in the map and its count is greater than 0,
      // we can perform an operation by removing both numbers.
      operations++;
      numCount.set(complement, numCount.get(complement) - 1);
    } else {
      // Increment the count of the current number in the map.
      numCount.set(num, (numCount.get(num) || 0) + 1);
    }
  }

  return operations;
};
