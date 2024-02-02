/**
 * @param {Array} arr
 * @param {Function} fn
 * @return {Array}
 */
var sortBy = function (arr, fn) {
  return arr.sort((a, b) => fn(a) - fn(b));
};

const example1 = [5, 4, 1, 2, 3];
const result1 = sortBy(example1, (x) => x);
console.log(result1);
// Output: [1, 2, 3, 4, 5]

const example2 = [{ x: 1 }, { x: 0 }, { x: -1 }];
const result2 = sortBy(example2, (d) => d.x);
console.log(result2);
// Output: [{"x": -1}, {"x": 0}, {"x": 1}]

const example3 = [
  [3, 4],
  [5, 2],
  [10, 1],
];
const result3 = sortBy(example3, (x) => x[1]);
console.log(result3);
// Output: [[10, 1], [5, 2], [3, 4]]
