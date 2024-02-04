/**
 * @param {number[][]} intervals
 * @return {number}
 */
var eraseOverlapIntervals = function (intervals) {
  if (intervals.length <= 1) {
    return 0;
  }

  intervals.sort((a, b) => a[1] - b[1]);

  let end = intervals[0][1];
  let count = 1;

  for (let i = 1; i < intervals.length; i++) {
    if (intervals[i][0] >= end) {
      end = intervals[i][1];
      count++;
    }
  }

  return intervals.length - count;
};

const example1 = eraseOverlapIntervals([
  [1, 2],
  [2, 3],
  [3, 4],
  [1, 3],
]);
console.log(example1); // Output: 1

const example2 = eraseOverlapIntervals([
  [1, 2],
  [1, 2],
  [1, 2],
]);
console.log(example2); // Output: 2

const example3 = eraseOverlapIntervals([
  [1, 2],
  [2, 3],
]);
console.log(example3); // Output: 0
