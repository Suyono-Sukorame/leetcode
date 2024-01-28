/**
 * @param {number} m
 * @param {number} n
 * @param {number} maxMove
 * @param {number} startRow
 * @param {number} startColumn
 * @return {number}
 */
var findPaths = function (m, n, maxMove, startRow, startColumn) {
  const mod = 10 ** 9 + 7;
  const memo = new Map();

  function helper(row, col, moves) {
    if (row < 0 || row >= m || col < 0 || col >= n) {
      return 1;
    }

    if (moves === 0) {
      return 0;
    }

    const key = `${row}-${col}-${moves}`;
    if (memo.has(key)) {
      return memo.get(key);
    }

    const up = helper(row - 1, col, moves - 1);
    const down = helper(row + 1, col, moves - 1);
    const left = helper(row, col - 1, moves - 1);
    const right = helper(row, col + 1, moves - 1);

    const result = (up + down + left + right) % mod;
    memo.set(key, result);

    return result;
  }

  return helper(startRow, startColumn, maxMove);
};

console.log(findPaths(2, 2, 2, 0, 0));
console.log(findPaths(1, 3, 3, 0, 1));
