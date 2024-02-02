/**
 * @param {number[]} nums
 * @return {number}
 */
var longestSubarray = function (nums) {
  // Number of zero's in the window.
  let zeroCount = 0;
  let longestWindow = 0;
  // Left end of the window.
  let start = 0;

  for (let i = 0; i < nums.length; i++) {
    zeroCount += nums[i] === 0 ? 1 : 0;

    // Shrink the window until the zero counts come under the limit.
    while (zeroCount > 1) {
      zeroCount -= nums[start] === 0 ? 1 : 0;
      start++;
    }

    longestWindow = Math.max(longestWindow, i - start);
  }

  return longestWindow;
};
