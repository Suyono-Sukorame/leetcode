/**
 * @param {Array} arr
 * @param {number} size
 * @return {Array}
 */
var chunk = function (arr, size) {
  if (size <= 0) {
    return [];
  }

  const result = [];
  let index = 0;

  while (index < arr.length) {
    result.push(arr.slice(index, index + size));
    index += size;
  }

  return result;
};

console.log(chunk([1, 2, 3, 4, 5], 1)); // Output: [[1],[2],[3],[4],[5]]
console.log(chunk([1, 9, 6, 3, 2], 3)); // Output: [[1,9,6],[3,2]]
console.log(chunk([8, 5, 3, 2, 6], 6)); // Output: [[8,5,3,2,6]]
console.log(chunk([], 1)); // Output: []
