/**
 * @param {number[]} nums
 * @param {number} k
 * @return {number}
 */
var longestOnes = function (nums, k) {
  let left = 0;
  let maxOnes = 0;
  let zeroCount = 0;

  // Use two pointers to maintain a window with at most k zeros.
  for (let right = 0; right < nums.length; right++) {
    if (nums[right] === 0) {
      zeroCount++;
    }

    // Shrink the window if zero count exceeds k.
    while (zeroCount > k) {
      if (nums[left] === 0) {
        zeroCount--;
      }
      left++;
    }

    // Update the maximum consecutive ones in the current window.
    maxOnes = Math.max(maxOnes, right - left + 1);
  }

  return maxOnes;
};
