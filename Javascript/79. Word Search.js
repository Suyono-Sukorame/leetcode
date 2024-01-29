/**
 * @param {character[][]} board
 * @param {string} word
 * @return {boolean}
 */
var exist = function (board, word) {
  const m = board.length;
  const n = board[0].length;

  const dfs = function (i, j, index) {
    if (index === word.length) {
      return true;
    }

    if (i < 0 || i >= m || j < 0 || j >= n || board[i][j] !== word[index]) {
      return false;
    }

    const temp = board[i][j];
    board[i][j] = "#";

    if (dfs(i + 1, j, index + 1) || dfs(i - 1, j, index + 1) || dfs(i, j + 1, index + 1) || dfs(i, j - 1, index + 1)) {
      return true;
    }

    board[i][j] = temp;
    return false;
  };

  for (let i = 0; i < m; i++) {
    for (let j = 0; j < n; j++) {
      if (dfs(i, j, 0)) {
        return true;
      }
    }
  }

  return false;
};

var board = [
  ["A", "B", "C", "E"],
  ["S", "F", "C", "S"],
  ["A", "D", "E", "E"],
];
var word1 = "ABCCED";
console.log(exist(board, word1)); // Output: true

var word2 = "SEE";
console.log(exist(board, word2)); // Output: true

var word3 = "ABCB";
console.log(exist(board, word3)); // Output: false
