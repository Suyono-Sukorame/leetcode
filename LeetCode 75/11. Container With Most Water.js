/**
 * @param {number[]} height
 * @return {number}
 */
var maxArea = function (height) {
  let maxArea = 0;
  let left = 0;
  let right = height.length - 1;

  while (left < right) {
    const h = Math.min(height[left], height[right]);
    const w = right - left;
    const area = h * w;

    maxArea = Math.max(maxArea, area);

    if (height[left] < height[right]) {
      left++;
    } else {
      right--;
    }
  }

  return maxArea;
};

// Example usage:
const example1 = [1, 8, 6, 2, 5, 4, 8, 3, 7];
console.log(maxArea(example1)); // Output: 49

const example2 = [1, 1];
console.log(maxArea(example2)); // Output: 1
