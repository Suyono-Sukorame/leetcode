/**
 * @param {number[][]} matrix
 * @param {number} target
 * @return {number}
 */
var numSubmatrixSumTarget = function (matrix, target) {
  const m = matrix.length;
  const n = matrix[0].length;

  for (let i = 0; i < m; i++) {
    for (let j = 1; j < n; j++) {
      matrix[i][j] += matrix[i][j - 1];
    }
  }

  let count = 0;

  for (let left = 0; left < n; left++) {
    for (let right = left; right < n; right++) {
      const prefixSumMap = { 0: 1 };
      let currentSum = 0;

      for (let row = 0; row < m; row++) {
        const currentColSum = matrix[row][right] - (left > 0 ? matrix[row][left - 1] : 0);
        currentSum += currentColSum;

        if (prefixSumMap[currentSum - target] !== undefined) {
          count += prefixSumMap[currentSum - target];
        }

        prefixSumMap[currentSum] = (prefixSumMap[currentSum] || 0) + 1;
      }
    }
  }

  return count;
};

console.log(
  numSubmatrixSumTarget(
    [
      [0, 1, 0],
      [1, 1, 1],
      [0, 1, 0],
    ],
    0
  )
);
console.log(
  numSubmatrixSumTarget(
    [
      [1, -1],
      [-1, 1],
    ],
    0
  )
);
console.log(numSubmatrixSumTarget([[904]], 0));
