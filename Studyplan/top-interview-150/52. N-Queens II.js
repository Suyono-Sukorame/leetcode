/**
 * @param {number} n
 * @return {number}
 */
var totalNQueens = function (n) {
  const backtrack = (row, colPlacements, result) => {
    if (row === n) {
      result.push([...colPlacements]);
      return;
    }

    for (let col = 0; col < n; col++) {
      if (isValidPlacement(row, col, colPlacements)) {
        colPlacements.push(col);

        backtrack(row + 1, colPlacements, result);

        colPlacements.pop();
      }
    }
  };

  const isValidPlacement = (row, col, colPlacements) => {
    for (let prevRow = 0; prevRow < row; prevRow++) {
      const prevCol = colPlacements[prevRow];

      if (prevCol === col || prevCol - prevRow === col - row || prevCol + prevRow === col + row) {
        return false;
      }
    }
    return true;
  };

  const result = [];

  backtrack(0, [], result);

  return result.length;
};

console.log(totalNQueens(4)); // Output: 2
console.log(totalNQueens(1)); // Output: 1
