/**
 * @param {number[]} nums
 * @return {boolean}
 */
var increasingTriplet = function (nums) {
  let firstMin = Infinity;
  let secondMin = Infinity;

  for (const num of nums) {
    if (num <= firstMin) {
      firstMin = num;
    } else if (num <= secondMin) {
      secondMin = num;
    } else {
      // If we find a number greater than both firstMin and secondMin,
      // we have found an increasing triplet.
      return true;
    }
  }

  // No increasing triplet found.
  return false;
};
