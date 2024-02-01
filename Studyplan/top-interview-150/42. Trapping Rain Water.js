/**
 * @param {number[]} height
 * @return {number}
 */
var trap = function (height) {
  const n = height.length;
  if (n <= 2) {
    return 0;
  }

  let leftMax = new Array(n).fill(0);
  let rightMax = new Array(n).fill(0);

  leftMax[0] = height[0];
  for (let i = 1; i < n; i++) {
    leftMax[i] = Math.max(leftMax[i - 1], height[i]);
  }

  rightMax[n - 1] = height[n - 1];
  for (let i = n - 2; i >= 0; i--) {
    rightMax[i] = Math.max(rightMax[i + 1], height[i]);
  }

  let trappedWater = 0;
  for (let i = 0; i < n; i++) {
    trappedWater += Math.min(leftMax[i], rightMax[i]) - height[i];
  }

  return trappedWater;
};

console.log(trap([0, 1, 0, 2, 1, 0, 1, 3, 2, 1, 2, 1])); // Output: 6
console.log(trap([4, 2, 0, 3, 2, 5])); // Output: 9
