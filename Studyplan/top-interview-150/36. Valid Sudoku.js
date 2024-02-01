/**
 * @param {character[][]} board
 * @return {boolean}
 */
var isValidSudoku = function (board) {
  const isValidArray = (arr) => {
    const seen = new Set();
    for (let val of arr) {
      if (val !== "." && seen.has(val)) {
        return false;
      }
      seen.add(val);
    }
    return true;
  };

  for (let i = 0; i < 9; i++) {
    if (!isValidArray(board[i])) {
      return false;
    }
  }

  for (let i = 0; i < 9; i++) {
    const col = [];
    for (let j = 0; j < 9; j++) {
      col.push(board[j][i]);
    }
    if (!isValidArray(col)) {
      return false;
    }
  }

  for (let i = 0; i < 9; i += 3) {
    for (let j = 0; j < 9; j += 3) {
      const subBox = [];
      for (let x = i; x < i + 3; x++) {
        for (let y = j; y < j + 3; y++) {
          subBox.push(board[x][y]);
        }
      }
      if (!isValidArray(subBox)) {
        return false;
      }
    }
  }

  return true;
};

const board1 = [
  ["5", "3", ".", ".", "7", ".", ".", ".", "."],
  ["6", ".", ".", "1", "9", "5", ".", ".", "."],
  [".", "9", "8", ".", ".", ".", ".", "6", "."],
  ["8", ".", ".", ".", "6", ".", ".", ".", "3"],
  ["4", ".", ".", "8", ".", "3", ".", ".", "1"],
  ["7", ".", ".", ".", "2", ".", ".", ".", "6"],
  [".", "6", ".", ".", ".", ".", "2", "8", "."],
  [".", ".", ".", "4", "1", "9", ".", ".", "5"],
  [".", ".", ".", ".", "8", ".", ".", "7", "9"],
];

const board2 = [
  ["8", "3", ".", ".", "7", ".", ".", ".", "."],
  ["6", ".", ".", "1", "9", "5", ".", ".", "."],
  [".", "9", "8", ".", ".", ".", ".", "6", "."],
  ["8", ".", ".", ".", "6", ".", ".", ".", "3"],
  ["4", ".", ".", "8", ".", "3", ".", ".", "1"],
  ["7", ".", ".", ".", "2", ".", ".", ".", "6"],
  [".", "6", ".", ".", ".", ".", "2", "8", "."],
  [".", ".", ".", "4", "1", "9", ".", ".", "5"],
  [".", ".", ".", ".", "8", ".", ".", "7", "9"],
];

console.log(isValidSudoku(board1));
console.log(isValidSudoku(board2));
