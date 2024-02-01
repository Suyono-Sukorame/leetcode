/**
 * @param {character[][]} board
 * @return {void} Do not return anything, modify board in-place instead.
 */
var solve = function (board) {
  if (!board || board.length === 0) {
    return;
  }

  const numRows = board.length;
  const numCols = board[0].length;

  const dfs = function (row, col) {
    if (row < 0 || row >= numRows || col < 0 || col >= numCols || board[row][col] !== "O") {
      return;
    }

    // Mark the current cell as visited
    board[row][col] = "T"; // Temporary mark

    // Explore adjacent cells
    dfs(row - 1, col); // Up
    dfs(row + 1, col); // Down
    dfs(row, col - 1); // Left
    dfs(row, col + 1); // Right
  };

  // Traverse the border and mark connected 'O' cells
  for (let row = 0; row < numRows; row++) {
    dfs(row, 0); // Left border
    dfs(row, numCols - 1); // Right border
  }

  for (let col = 0; col < numCols; col++) {
    dfs(0, col); // Top border
    dfs(numRows - 1, col); // Bottom border
  }

  // Flip surrounded 'O' cells to 'X' and revert temporary marks to 'O'
  for (let row = 0; row < numRows; row++) {
    for (let col = 0; col < numCols; col++) {
      if (board[row][col] === "O") {
        board[row][col] = "X"; // Surrounded 'O'
      } else if (board[row][col] === "T") {
        board[row][col] = "O"; // Revert temporary mark to 'O'
      }
    }
  }
};

// Example usage:
const example1 = [
  ["X", "X", "X", "X"],
  ["X", "O", "O", "X"],
  ["X", "X", "O", "X"],
  ["X", "O", "X", "X"],
];
solve(example1);
console.log(example1);
// Output:
// [["X","X","X","X"],
//  ["X","X","X","X"],
//  ["X","X","X","X"],
//  ["X","O","X","X"]]

const example2 = [["X"]];
solve(example2);
console.log(example2);
// Output: [["X"]]
